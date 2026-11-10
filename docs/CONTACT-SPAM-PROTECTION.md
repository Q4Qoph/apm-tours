# Contact and email abuse protection

Date: 2026-11-10. Status: **Implemented and tested locally; local Turnstile keys are configured. Genuine browser challenge completion and production rollout are pending.**

## Scope and threat boundaries

The owner requested protection against contact-form spam, bots and misuse of email routing. Website submission, authenticated SMTP sending and incoming email forwarding are separate entry points. These measures reduce abuse; they cannot guarantee elimination of human-submitted spam or prevent the public reservations address from receiving direct unwanted email.

The sole staff recipient remains `reservations@apmtours.com`. Cloudflare forwards that address to the company Gmail according to the owner's screenshot. Request fields cannot choose staff recipients, sender or message headers. Visitor acknowledgements contain only fixed company text, without copying submitted message/name content or exposing staff inboxes.

## Implemented application protections

- Existing CSRF protection, bounded server validation, header-injection rejection and honeypot are retained.
- Cloudflare Turnstile Managed widget is embedded only on Contact. VerifyContactChallenge calls the fixed Siteverify endpoint with a 3-second connection and 5-second total timeout. Only an HTTP-success response with strict boolean success, the exact request hostname and `contact_enquiry` action permits submission. Failed verification, provider errors/timeouts and missing keys reject the request before mail. Base validation failures do not consume a verification token.
- Production configuration always enables Turnstile. Local/test disablement is available for isolated tests through TURNSTILE_ENABLED; it is not a production bypass. Production rejects loopback hostnames. Allowed application hostnames are apmtours.com/www.apmtours.com plus localhost/127.0.0.1 outside production. Configure the same allowed hosts in the Cloudflare widget.
- A shared-cache token digest claim lasts six minutes and prevents replay/concurrent redemption, including provider convergence windows. Tokens themselves are not logged or placed in mail.
- Request limits: 5 attempts/minute and 20 attempts/hour per request IP; 3 attempts/hour per normalized submitted email across IPs. Rate-limit responses retain the form, show accessible HTTP 429 feedback and Retry-After. Email identifiers use keyed hashes in cache.
- Duplicate normalized-email/type/message payloads are suppressed for ten minutes using an atomic shared-cache claim. A duplicate is described as recently submitted or still being processed, not falsely accepted as newly delivered. The claim is released after a transport failure so a genuine retry can proceed with a fresh challenge. SMTP can still have ambiguous partial-delivery outcomes; no exactly-once guarantee is claimed.
- Acknowledgements are limited to one attempt per email per hour. Additional accepted enquiries can reach staff without repeatedly emailing the visitor. Acknowledgement failure retains enquiry success and does not invite repeat submission.
- All counters/claims use Laravel's configured cache store. Do not flush the entire cache casually or use an ephemeral per-request cache in production. Multiple application hosts require a shared cache to maintain global limits.

## Turnstile setup

In the Cloudflare account dashboard, open Turnstile, Add widget, name it A&PM Contact Form, add apmtours.com, www.apmtours.com and local test hostnames, choose Managed, leave pre-clearance off and create it. A separate local-development widget is preferable when managing production keys independently.

Add privately:

```dotenv
TURNSTILE_ENABLED=true
TURNSTILE_SITE_KEY="PUBLIC_WIDGET_SITE_KEY"
TURNSTILE_SECRET_KEY="PRIVATE_WIDGET_SECRET"
```

The site key is public and appears in the widget. Never publish the secret, use the SMTP token as the Turnstile secret, or deploy dummy/testing keys to production. The owner supplied the local keys privately. Boolean checks confirm both are present and verification is enabled. When keys are absent, the form displays verification-unavailable guidance and disables submission; server checks also reject bypass attempts. The existing live code has not been updated with these changes.

After keys are provided, refresh local cached configuration, verify the Managed widget in an actual browser, and test server-side rejection of missing/bad tokens without sending real mail. Production rollout must include the corresponding private keys and rebuilt config cache in the same release; deployment authorization is separate from local implementation. Do not switch off verification to make a failing rollout appear successful.

The single-use token expires after five minutes according to Cloudflare. A rejected/expired challenge requires a fresh challenge. The widget must load from Cloudflare's canonical script; do not self-host it or reintroduce the theme's demo AJAX handler.

## Incoming routing and SMTP safeguards

The website changes do not configure Cloudflare's incoming mail rules, Gmail filtering, token scope, edge WAF or DNS authentication policy. No Cloudflare dashboard mutation was performed.

- Keep the catch-all disabled, as shown in the owner's screenshot, and use only intended explicit aliases. Forwarding to a verified destination does not let a visitor change the destination through this contact form.
- Incoming spam can still target reservations directly without using the website; Turnstile cannot challenge a normal incoming email. Inspect Cloudflare delivery outcomes and Gmail spam filtering. A separately reviewed Email Worker can add incoming filtering if actual abuse warrants it. Do not blindly reject all unfamiliar senders, forwarded SPF failures or arbitrary keywords, since new travel customers must be able to contact the agency.
- SMTP requires the private Email Sending: Edit token. Keep it server-side, account-scoped, separate from dashboard/global credentials and out of responses/logs. Anyone possessing it can send from onboarded domains in that account; rotate it if exposed. Consider a dedicated production token with appropriate source-IP restrictions after verifying actual egress addresses; do not break local development by applying unverified restrictions.
- Verify SPF/DKIM/DMARC and account security through the Cloudflare dashboard before changing authentication policy. The screenshots establish the configured forwarding rules, not an audit of all account permissions or domain authentication.
- Confirm Apache/Laravel sees the real client IP behind trusted Cloudflare proxies before relying exclusively on IP limits. Do not trust arbitrary forwarded headers or blanket-trust all proxies. Email limits, token verification and replay/duplicate controls provide additional layers; the origin network/proxy configuration has not been changed by this task.

## Verification

Passed full suite: 48 tests, 269 assertions. Includes widget/public-key rendering without secret exposure; required/malformed/expired/replayed token rejection; exact hostname/action and strict success checks; provider connection/server failures; missing-key fail-closed behaviour; replay convergence; invalid-form short circuit; duplicate rejection; cross-IP normalized-email throttling; slow hourly IP abuse; single acknowledgement per hour; production loopback rejection; and legitimate retry after SMTP failure. All external verification requests and mail are faked/mocked in these tests.

Formatting, Blade compilation and whitespace checks passed. Local keys are configured, but genuine Turnstile browser verification and a new successful email test remain pending. No production code deployment, Git commit/push or Cloudflare routing changes were made for these controls. The earlier sole-recipient production configuration change remains separate.

## References

- [Turnstile widget setup](https://developers.cloudflare.com/turnstile/get-started/widget-management/dashboard/)
- [Mandatory server validation, expiry and replay behaviour](https://developers.cloudflare.com/turnstile/get-started/server-side-validation/)
- [Email routing rules and verified destinations](https://developers.cloudflare.com/email-service/configuration/email-routing-addresses/)
- [Authenticated SMTP and token requirements](https://developers.cloudflare.com/email-service/api/send-emails/smtp/)
- [Email Worker filtering example](https://developers.cloudflare.com/email-service/examples/email-routing/spam-filtering/)

### Local key verification — 2026-11-10

After the owner saved widget keys privately, cleared local config cache and confirmed site/secret presence, enabled verification, allowed local hosts and reservations-only staff routing using boolean output. All 48 tests/269 assertions, formatting, Blade compilation and whitespace checks passed. Started the local server at http://localhost:8000/contact.

A real Cloudflare Siteverify request using an intentionally invalid token returned HTTP 200, `success: false`, `invalid-input-response`, with no secret-key error. The local HTTP-kernel form rendered the widget without leaking the secret and rejected missing and forged tokens. Mail was faked for the rejection probe, and zero emails were sent. This is not a successful human-challenge verification and does not confirm widget hostname settings; the owner must complete the Managed challenge in a browser. No production change, commit or push was performed.

### Verification heading removed — 2026-11-10

At the owner’s request, removed the redundant visible “Spam protection” heading above Turnstile. The widget retains its built-in status, privacy/help links and accessible feedback. Verification, rate limits and failure messages are unchanged; appearance remains the default always-visible mode. Blade compilation, focused protection tests and whitespace checks passed. No deployment or real email test performed.

### Final pre-release checks — 2026-11-10

Production inspection found no Apache RemoteIP handling. Added Laravel trust for Cloudflare's published IPv4/IPv6 CIDRs in bootstrap/cloudflare-proxies.php, verified against their official endpoints on this date; only X-Forwarded-For and X-Forwarded-Proto are trusted from those ranges. Direct callers cannot supply trusted proxy headers. Two additional request tests prove per-visitor limiting behind a trusted edge and resistance to forged headers from an untrusted caller. Review provider CIDRs on future releases. This supersedes the earlier statement that proxy handling was not changed. Final local suite: 57 tests/362 assertions, all passing; formatting, Blade compilation and whitespace also pass. No new real emails sent for this release preparation.
