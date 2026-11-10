# Stakeholder follow-up — 2026-11-10

Owner approved fixing the supplied screenshot feedback before the next production release. Their subsequent clarification is authoritative: both search controls must search the site's existing destination highlights. This supersedes the former plan to defer all Trip Finder behaviour until a journey catalogue exists; no live journey inventory or availability search is introduced.

## Implemented changes

- Home Trip Finder now submits a named Laravel GET request to Destinations, replacing the external demo mail.php action and ajax-contact handler. Its region choices are Kenya, Uganda, Tanzania and Zanzibar only; duration choices run from 1 day through 14 days. Travel-style options retain the source's familiar choices.
- Destination data moved from inline Blade to `config/destinations.php`. DestinationController filters the ten existing highlights by case-insensitive name/description/artwork-alt/region search and region selection. No new offers, prices, catalogue tables or supplier claims were created. The existing East Africa highlight serves Uganda, Tanzania and Zanzibar regional searches; its regional description follows the owner's four-region direction. Kenyan highlights remain discoverable. The GET URL is shareable.
- Both grid/list views render the same results. Search retains the query and preferences, displays the result count and clear-search link, and provides contact guidance when no highlight matches. Search input and the icon button are labeled; invalid/oversized/array query input is rejected by Form Requests.
- Travel style and duration are preferences, not inventory filters: there is no maintained destination-to-package-duration dataset. Results explicitly explain that these preferences do not confirm availability. Plan a Trip carries the chosen highlight and validated preferences to ContactPageController, which prefills the message. Existing posted input wins over prefilled text after errors. Contact POST security and delivery remain intact.
- The Pre-Travel Support vehicle plate is blurred in `public/assets/img/apm-selected/process-pretravel-redacted.webp` (248 × 220, 14,352 bytes), and Home references the new filename to avoid stale photo caches. The original external source photograph was not altered. The existing source is illustrative, not evidence of an A&PM vehicle or completed trip.
- All three active WhatsApp link references were checked; each already uses the supplied `https://wa.me/254788799517`. No new redirect service or recipient change was needed.

## Image edit provenance

Used the built-in imagegen skill/tool for the requested plate edit, then PHP GD only to resize/encode the generated result for the existing WebP thumbnail slot. Generated intermediate: `/home/difre/.codex/generated_images/01a1c084-4f70-7632-829d-47e9660a6a4c/exec-f10c367a-539b-4907-9fc9-9dc400cc6872.png`. Only the final project derivative is referenced by the site.

Prompt used:

> Use case: precise-object-edit. Edit target: the attached existing small travel photograph of a safari 4-wheel-drive vehicle on a rural reddish road. Primary request: blur ONLY the white front vehicle registration number plate so that every letter and number is unreadable. The plate is at the center of the front bumper below the radiator grille. Preserve the original photograph, crop, vehicle, road, sky, colors and all surrounding details as closely as possible; no new objects, no additional text, no watermark. Do not invent a different plate or change the car. Keep the original aspect ratio 248:220. This is a privacy redaction edit, not a new illustration.

The generated edit and final derivative were visually inspected: the plate characters are unreadable. Generated photo pixels are not guaranteed identical to the source outside the edit; do not describe the derivative as an unmodified original photograph.

## Verification and release scope

Passed local full suite: 55 tests, 337 assertions; Pint on affected PHP files; Blade compilation; whitespace; exact WhatsApp URL checks and thumbnail dimensions/format checks. Seven destination-search tests cover baseline results, names/descriptions/case, empty results/escaping, supported regions, four-country/fourteen-day homepage controls, enquiry-prefill flow and invalid input. Existing 48 contact/security tests remain passing. No new live messages were sent for these screenshot fixes. Final live/browser acceptance is recorded separately after deployment.

The release also includes the earlier owner-requested sole reservations recipient and locally tested Turnstile/rate-limit/replay/duplicate/acknowledgement controls. The owner reports local testing complete and explicitly requests production deployment. Production Turnstile keys must be configured privately in the same release; never ship the new form with missing keys or disable server validation to bypass a failed setup. Preserve production SMTP, app key and unrelated settings. Back up first and follow DEPLOYMENT.md.

### Final pre-release checks — 2026-11-10

Production inspection found no Apache RemoteIP handling. Added Laravel trust for Cloudflare's published IPv4/IPv6 CIDRs in bootstrap/cloudflare-proxies.php, verified against their official endpoints on this date; only X-Forwarded-For and X-Forwarded-Proto are trusted from those ranges. Direct callers cannot supply trusted proxy headers. Two additional request tests prove per-visitor limiting behind a trusted edge and resistance to forged headers from an untrusted caller. Review provider CIDRs on future releases. This supersedes the earlier statement that proxy handling was not changed. Final local suite: 57 tests/362 assertions, all passing; formatting, Blade compilation and whitespace also pass. No new real emails sent for this release preparation.

### Production release verified — 2026-11-10

Pushed application commits 9d52940 and 4c8c96f to GitHub before deploying 4c8c96f to Contabo. Root-private rollback backup: /var/backups/apm-tours/20261110T195739Z-before-9d52940 (the name reflects the initial release target; it contains the prior 637df7a source/environment/cache). Turnstile keys were streamed privately from local configuration; production SMTP and unrelated settings were preserved. Runtime boolean checks confirm production mode, debug disabled, cached configuration, challenge enabled, both keys present and reservations@apmtours.com as the sole staff recipient.

Fast-forward deployment, optimized autoload generation, config/route/view caches and PHP-FPM reload succeeded; the existing artisan mode difference was preserved. No dependencies, database migrations or frontend build were needed. The older server Composer emitted deprecation notices but completed successfully. Eleven public pages returned HTTP 200. Live keyword search, Uganda regional results, fourteen-day preferences/contact prefill, canonical Turnstile markup without the removed heading, approved WhatsApp URL and new 14,352-byte redacted image passed checks. A public CSRF/session-backed POST without a challenge was rejected; no successful enquiry or real email was sent during this release. Final local suite: 57 tests/362 assertions passed.

Remaining acceptance: a genuine human Turnstile completion and inbox receipt on production, plus full browser keyboard/responsive review. Automated HTTP checks do not establish those outcomes. Review Cloudflare trusted CIDRs during future releases.
