# Contact form implementation plan

Date: 2026-11-09. **Status: Approved and implemented locally — browser acceptance and real SMTP delivery pending.**

## Confirmed scope

Build a functioning enquiry form on the existing Contact page using the original Tourm HTML form design. Send each valid enquiry to both owner-approved recipients through Cloudflare SMTP:

- `apmtourske@gmail.com`
- `j.nyabuti.85@gmail.com`

Use `reservations@apmtours.com` as the configured sender and the visitor's validated email as Reply-To. An enquiry begins staff consultation; it does not confirm a reservation, availability, price or payment. Preserve existing contact cards, approved company copy, shared header/footer, and floating WhatsApp action.

The supplied Cloudflare screenshots show both recipient addresses verified, the sending domain enabled, and sending DNS records configured. Routing rules forward six branded addresses to the company Gmail only; leave those rules unchanged. API-token creation, application SMTP configuration and actual delivery to either recipient are **Not yet verified**. No credentials were inspected or recorded.

## Original template findings

The original source was located read-only at `/home/difre/websites/APM/html.themehour.net/tourm/demo/contact.html`. This is a local reference location, not an application dependency or a path to put into production markup.

The relevant form has `contact-form style2 ajax-contact` classes, a heading, Bootstrap `row`/`col-12 form-group` wrappers, input icons, a native select enhanced by `nice-select`, a three-row textarea, a `th-btn style3` submit button with plane icon, and a `form-messages` feedback paragraph.

| Original element | Proposed reuse/adaptation |
| --- | --- |
| `contact-form style2` | Preserve form presentation inside the current Contact page's right-hand column. |
| “Book a tour” heading | Use the existing “Tell us about your trip” wording. |
| First Name (`name`) | Use Full name with explicit label and autocomplete. |
| Your Mail (`email3`) | Use Email address with consistent `email` field name and unique ID. |
| Select Tour Type (`subject`) | Use Enquiry type with approved broad service choices below. Remove demo Africa Adventure/Asia/Scandinavia/Europe choices. |
| Your Message | Keep textarea styling; add label, useful hint and length limit. |
| User/mail/chat/plane icons | Reuse existing local assets through `asset()`; decorative icons have empty alt text. |
| `form-messages` | Render accessible Laravel success/failure feedback without injecting server HTML through the theme handler. |
| External `mail.php` action | Replace with a named Laravel POST route and CSRF field. |
| `.ajax-contact` | Omit for this form to avoid the theme's global submit handler. |

Current `pages/contact.blade.php` already has `contact-form style2` as a non-form wrapper containing email and WhatsApp CTAs. Replace that wrapper with the adapted source form. Keep the adjacent approved How We Deliver text and current section background. Do not restore the source video, map, breadcrumb banner, demo contact cards, newsletter or account features.

The copied `main.js` handler serializes the global `.ajax-contact` selector, reads shared field selectors and updates all `.form-messages`; other shared demo forms also carry that class. It is unsuitable for this Laravel form. Preserve the plugin dependency order and unrelated theme behaviour. Use a regular POST/redirect flow, with no new frontend package or AJAX dependency. Keep the source select's styling only if keyboard/error handling works with the installed enhancement; otherwise use its native Bootstrap select presentation.

## Proposed first-enquiry fields

The owner approved these fields with the implementation plan. This is an email payload, not a database schema.

| Field | Required | Proposed server rules |
| --- | --- | --- |
| Full name | Yes | String, maximum 120 characters. |
| Email address | Yes | Valid email, maximum 254 characters; reject line breaks. |
| Phone/WhatsApp | No | String, maximum 40 characters; support international punctuation rather than Kenya-only formatting. |
| Enquiry type | Yes | Allowlisted value: General enquiry; Safari & holiday planning; Accommodation; Transport & transfers; Guide coordination; Destination planning; Corporate & group travel; Tailor-made travel. |
| Message | Yes | String, 10–5000 characters. Hint invites destination, dates/flexibility, travellers and preferences without requiring a long initial form. |
| Honeypot | No human input | Must be empty; hidden from normal interaction and assistive technology. |

Do not list planned flight ticketing as an active service. No files, passport details, payment details, medical information or marketing opt-in in this first form. Place a short privacy notice linking the existing Privacy Policy beside submission. Do not invent a response-time promise or bundle marketing consent into the enquiry. Final notice wording remains subject to owner approval.

## Proposed Laravel implementation

1. Keep named GET `/contact` rendering the page. Add named POST `/contact` (`contact.send`) handled by a focused `ContactEnquiryController`.
2. Validate through `SendContactEnquiryRequest`, using an allowlist for enquiry types and bounded strings. Only validated fields reach the mail template.
3. Add route throttling (proposed initial limit: 5 attempts per minute per IP), CSRF protection and the honeypot. Return useful accessible 429 feedback. Shared-IP tradeoffs and actual abuse should guide later tuning. Turnstile can be added if needed; it is not assumed configured.
4. Build a `ContactEnquiry` mailable with an escaped Blade notification template containing validated fields. Use a controlled subject derived from the enquiry type, a fixed configured sender and validated Reply-To. Do not use the visitor as From or accept recipients/headers from the form.
5. Put recipient settings in `config/contact.php`, sourced from environment placeholders. Supply the two approved recipients through private deployment configuration. Use `config()`, not direct `env()` calls in controllers/views.
6. Submit using POST/redirect/GET. Preserve input after validation or mail failure, show field errors and a linked error summary, and expose feedback to assistive technology. Success copy: “Your enquiry has been sent to our team. This is not a confirmed booking.” SMTP acceptance is not proof of inbox delivery.
7. Configure a finite SMTP timeout and handle transport failure without returning success, exposing credentials or logging the message body/contact data. Keep call/email/WhatsApp alternatives available. Explain that retrying after an uncertain transport result may produce a duplicate.

### Storage and queue decision

Recommended smallest first release: **email-only**, synchronous sending, with no database table or queue worker. This requires explicit owner confirmation because there is no saved enquiry/retry record if delivery fails, staff mail retention governs the resulting copies, and SMTP failure after partial delivery can make retries produce duplicates.

If durable tracking/retries are required, agree retention, access and deletion first, then design an enquiry record plus delivery workflow through a new reversible migration. Do not create an enquiry table, job/outbox system or admin panel merely to make the form look functional. Do not use the existing log mailer as a successful production fallback, since it can mislead visitors and log personal data.

No automatic customer acknowledgement is included in the initial scope. Notifications go to both approved staff inboxes; customer-facing replies are a separate workflow. Neither screenshot establishes branded reply configuration in Gmail.

## Cloudflare SMTP configuration

The owner's SMTP screen and current `config/mail.php` match these settings:

```dotenv
MAIL_MAILER=smtp
MAIL_SCHEME=smtps
MAIL_HOST=smtp.mx.cloudflare.net
MAIL_PORT=465
MAIL_USERNAME=api_token
MAIL_PASSWORD="PRIVATE_EMAIL_SENDING_TOKEN"
MAIL_FROM_ADDRESS=reservations@apmtours.com
MAIL_FROM_NAME="A&PM Tours & Travel"
CONTACT_RECIPIENTS="apmtourske@gmail.com,j.nyabuti.85@gmail.com"
```

`api_token` is literal; the token needs Email Sending: Edit for the intended account. Keep the actual password in private runtime settings, never Git or chat. `.env.example` receives placeholders only. Check whether an existing `MAIL_URL` overrides individual SMTP settings without printing its value. Confirm outbound port 465 is available from the hosting environment and refresh cached configuration through the actual release process. Hosting/runtime credentials remain unverified; no deployment is authorized by this planning task.

## Expected files when implementation is approved

- Modify `resources/views/pages/contact.blade.php` for the adapted template form.
- Add a small `resources/views/partials/contact-enquiry-form.blade.php` only if needed to keep page structure readable.
- Modify `routes/web.php` for the named POST route and throttle.
- Add `app/Http/Controllers/ContactEnquiryController.php` and `app/Http/Requests/SendContactEnquiryRequest.php`.
- Add `app/Mail/ContactEnquiry.php` and `resources/views/mail/contact-enquiry.blade.php`.
- Add `config/contact.php`; adjust `config/mail.php` for a bounded SMTP timeout if required.
- Update `.env.example` with nonsecret variable examples.
- Add scoped `apm-brand.css` rules only where needed for labels, validation/focus and mobile layout; preserve the copied theme CSS.
- Add `tests/Feature/ContactEnquiryTest.php` and update frontend, architecture, testing and implementation docs to match delivered behaviour.

## Verification and acceptance

- Render Contact with source-derived classes, explicit field labels, privacy link, unique IDs, CSRF field and local icons. Form action must be local; this form must not match `.ajax-contact`.
- Feature-test valid mail dispatch to both approved recipients and correct sender/Reply-To; optional phone omitted; invalid/missing/oversized fields and unknown enquiry types rejected; honeypot/rate limit enforced; no email sent on rejection; transport failure produces failure feedback and preserves input rather than reporting success.
- Test escaping in notification output and ensure recipients cannot be supplied through request input. Use Laravel mail fakes for content/routing contracts and a simulated transport failure for the error path. No real customer mail or production database in automated tests.
- Run focused PHPUnit tests, the existing full suite, Pint on changed PHP files, Blade compilation and whitespace checks. A Vite build is unnecessary unless application entry assets change; pages currently load static Tourm assets.
- Browser-check at narrow, medium and wide widths: field/icon alignment, textarea, select keyboard behaviour, error summary/focus, preserved values, success/failure feedback, repeated submissions and overlap with floating controls. Browser tooling availability remains unverified for this future task.
- After private SMTP configuration and explicit permission for real test messages, send a clearly synthetic enquiry. Verify receipt in both inboxes, Reply-To behaviour, spam placement and Cloudflare activity logs. Do not claim delivery from a screenshot or mocked test alone.
- Do not mark the form production-ready until browser review and real delivery verification pass. Deployment remains separately approved work.

## Approved decisions and remaining configuration

The owner approved the plan and requested implementation, accepting the proposed fields, privacy notice and email-only first release. No separate consent checkbox, automatic acknowledgement, database table or queue worker was added.

The source-derived form, named POST route, Form Request, SMTP mailable, recipient configuration, throttle and honeypot are implemented. SMTP is explicitly selected to avoid silently using the default log mailer. Missing/invalid recipient configuration fails closed. SMTP failures preserve input and log only a generic message plus exception class. SMTP timeout is 15 seconds. The select stays native for keyboard access; the demo AJAX class is omitted.

Verified locally: 24 focused contact checks; full suite 26 tests/129 assertions; Pint on all affected PHP files; Blade compilation and whitespace check. Tests cover both approved recipients, fixed sender and Reply-To, optional phone, missing/invalid/oversized input, header injection, honeypot, rate limiting with a 429 response, CSRF rejection, preserved/escaped values, mail escaping, missing recipient configuration and simulated SMTP failure. Cross-request rendering tests retain the session cookie, matching browser behaviour with JSON session serialization.

Remaining: privately configure SMTP credentials, sender and CONTACT_RECIPIENTS; confirm outbound SMTP connectivity and actual delivery/Reply-To in both inboxes; browser acceptance at narrow/medium/wide widths. No live email, credential inspection, frontend build, database migration or deployment was performed.

### Live SMTP verification — 2026-11-09

At the owner's request, runtime configuration was checked without printing credentials or environment values. Host, port, implicit TLS, literal username, token presence, lack of MAIL_URL override, approved sender and exact two-recipient list all passed. Configuration was not cached. The first sandboxed connection was blocked by networking; the approved network-enabled retry authenticated and Cloudflare SMTP accepted one synthetic ContactEnquiry notification addressed to both approved staff inboxes. The notification body explicitly identifies it as a test with no travel arrangements requested.

This verifies SMTP authentication/submission, not final inbox delivery or real-browser submission. Owner confirmation from both inboxes, Reply-To handling and browser acceptance remain pending. No production deployment performed; no credentials printed or committed. Earlier statements that no live SMTP test has occurred are superseded by this result.

## Approved visitor acknowledgement — 2026-11-09

The owner requested an automatic acknowledgement and authorized a live test to their supplied Gmail address. This supersedes the earlier exclusion of customer acknowledgement. After the staff notification is accepted by SMTP, ContactEnquiryController sends ContactAcknowledgement separately to the validated visitor email. Its HTML/plain-text message uses a fixed subject and company text, confirms the enquiry process without confirming a booking or promising a response time, and allows replies to the configured A&PM sender. It does not repeat submitted message content or disclose staff recipients. Existing CSRF, validation, honeypot and rate limiting remain. The form privacy notice mentions the acknowledgement.

If staff delivery fails, no acknowledgement is attempted. If only the acknowledgement fails, the page retains staff-submission success and warns that the visitor need not resubmit. Logs contain only generic text and the exception class. No persistence or automatic retry was added.

Verification: focused contact suite 27 checks/148 assertions; full suite 29 tests/150 assertions; formatting, Blade compilation and whitespace checks passed. A real local HTTP-kernel GET/POST test retained the session cookie and CSRF token and used isolated array sessions/cache with actual SMTP. Both the staff notification and visitor acknowledgement were accepted by Cloudflare, with no form errors. Final inbox delivery and visual browser review remain pending. No production deployment performed.

The first real attempt failed before staff notification acceptance because the default PHP SMTP connection reported network unreachable. A credential-free OpenSSL TLS handshake passed, and an IPv4-bound PHP authentication probe passed. Added optional MAIL_SOURCE_IP configuration; the private local environment and nonsecret example use `0.0.0.0` to bind IPv4. Hostname/certificate checks remain enabled. The successful live form test used that setting. This is a local network fix; confirm appropriate source binding/connectivity on the deployment host. No token or other credential values were printed or recorded.
