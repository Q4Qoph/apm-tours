# Testing and Quality Checks

## Current setup

PHPUnit is configured by `phpunit.xml` with separate `tests/Unit/` and `tests/Feature/` suites. The test environment uses an in-memory SQLite database, array cache/session, synchronous queue, and array mail.

Current examples are `tests/Feature/ExampleTest.php` (root route response) and `tests/Unit/ExampleTest.php` (a basic assertion). They are Laravel scaffold tests, not coverage of A&PM pages or business workflows. No A&PM-specific test suite has been implemented.

## Commands

| Check | Command | Configuration/evidence |
| --- | --- | --- |
| Full test suite | `composer test` | Composer script clears configuration and runs `php artisan test`. |
| Full test suite directly | `php artisan test` | Laravel Artisan command is available. |
| PHP formatting check | `vendor/bin/pint --test` | Pint check mode does not write formatting changes. |
| Frontend production build | `npm run build` | Declared in `package.json`; no frontend test/lint script is declared. |

Do not report a check as passed unless it was run. After the Blade integration, `php artisan test` passed (2 tests, 2 assertions); the frontend build was not run. These are scaffold tests and do not verify the page appearance or Tourm interactions, which remain unverified in a browser.

## Verification expectations

- Add feature tests for public routes, validation, authorization, enquiry persistence, and staff workflow as those features are implemented.
- Test authorization failures as well as successful paths. Use the test database configuration; never run destructive test setup against production data.
- Recheck responsive layout, keyboard navigation, form labels/errors, metadata, image loading, and template plugin behavior when the public site is built.
- Run Pint in check mode and `npm run build` for relevant code changes. There is no configured JS/CSS linter or frontend unit-test runner; do not invent npm scripts.
- Record exact commands, outcomes, and known gaps in `docs/IMPLEMENTATION.md` when a phase's verification status changes.

## Contact enquiry coverage — 2026-11-09

Added `tests/Feature/ContactEnquiryTest.php`: 24 focused checks for rendered form, both recipients and sender/Reply-To, optional phone, validation and limits, header injection, honeypot, rate limiting, CSRF, retained/escaped input, escaped email output, invalid recipient configuration and transport failure. Mail fakes/mocks avoid network calls; tests use array sessions/cache and no business database. Cross-request tests retain the session cookie for JSON session fidelity.

Passed `php artisan test --filter=ContactEnquiryTest` (24 checks, 127 assertions), full `php artisan test` (26 tests, 129 assertions), Pint for affected PHP files, Blade compilation and whitespace check. SMTP inbox delivery and browser interaction remain unverified. The earlier statement that coverage consists only of scaffold examples is superseded.

### Visitor acknowledgement update — 2026-11-09

Added acknowledgement recipient/sender/Reply-To and HTML/plain-text content tests, plus the independent acknowledgement-failure path with no resubmission instruction. Focused suite: 27 checks/148 assertions; full suite: 29 tests/150 assertions. A live HTTP-kernel form submission using actual SMTP confirmed staff notification and visitor acknowledgement acceptance after local IPv4 binding. Inbox receipt and browser visual interaction remain pending.

### Contact abuse protection — 2026-11-10

Implemented locally: fail-closed server-verified Turnstile with hostname/action/replay checks, 5/minute and 20/hour IP limits, 3/hour normalized-email limit, ten-minute duplicate suppression and one acknowledgement attempt/email/hour. Existing CSRF, validation and honeypot remain; fixed mail routing and no reflected customer content in acknowledgements reduce relay abuse. Full suite passed (48 tests/269 assertions), along with formatting, Blade compilation and whitespace checks. Current Turnstile site/secret keys are absent; local submission is intentionally unavailable until configured. No new live code, Git push, real mail test or Cloudflare rule change was performed. See CONTACT-SPAM-PROTECTION.md for setup, proxy/cache requirements, limits and incoming-routing boundaries.
