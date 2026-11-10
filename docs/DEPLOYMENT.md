# Contabo production deployment

Verified 2026-11-09 during the owner-authorized release. This runbook supersedes earlier statements that the hosting target and deployment procedure were unknown.

## Target and application

- Public domain: `https://apmtours.com` (also configured for `www.apmtours.com`).
- SSH target: `root@169.58.31.181`, using the owner's `~/.ssh/contabo_ed25519` key. Never put key contents in the repository.
- Application checkout: `/var/www/apm-tours`, branch `main`, origin `https://github.com/Q4Qoph/apm-tours.git`.
- Web service: Apache (`apache2`); document root `/var/www/apm-tours/public`.
- PHP: 8.4.27 CLI and active `php8.4-fpm`; writable Laravel runtime directories belong to `www-data`.
- Source access uses the `www-data` group. Keep private environment/configuration out of Git and public output.
- The server has an existing mode-only difference on `artisan` (0644 rather than tracked 0755). It predates this release and was preserved; `php artisan` works without the executable bit.

## Released application revision

`afc5c35` — Add contact enquiries and acknowledgements; refine footer and contact layout.

The owner required the GitHub push before server deployment. Local verification passed first: 29 tests/150 assertions, Pint on affected PHP files, Blade compilation and whitespace checks. The server fast-forwarded from `2d67830` to the published revision. Composer manifests/lock and frontend dependencies did not change; no package installation, npm build or database migrations were required. Composer optimized production autoload files were regenerated without scripts. The server's older Composer emitted PHP deprecation notices, but autoload generation and platform requirements passed.

## Backup and release procedure

1. Inspect the local diff, GitHub branch and server working tree. Preserve server-only edits; do not reset/clean the checkout. Confirm production mode and disabled debug using boolean checks.
2. Push the reviewed commit to GitHub before changing the live checkout.
3. Create a root-private backup under `/var/backups/apm-tours/`: current revision, tracked source archive, server patch, private environment and bootstrap cache. Backups contain secrets and must remain inaccessible to the web and other users.
4. Verify the fetched target revision and whether dependencies/schema actually changed.
5. Configure only the required approved environment variables over SSH, preserving all unrelated production settings. Do not copy the complete development environment or display credentials. For this release, the tested local mail credential and approved mail settings were securely streamed to production; no secret values were displayed or committed.
6. Use a brief maintenance window, fast-forward pull, regenerate optimized autoloads without dependency updates, and preserve source/read permissions.
7. Run config/route/view clear and cache commands as `www-data`. Gracefully reload `php8.4-fpm`, bring Laravel up and verify the deployed revision.
8. Check public pages and versioned assets, then make one clearly synthetic live enquiry only when authorized. Confirm staff/acknowledgement transport acceptance; inbox arrival needs recipient confirmation.

Backup for this application release: `/var/backups/apm-tours/20261109T202701Z-before-afc5c35`. A root-private `/root/apm-latest-release-backup` pointer records it. There is no database migration in this release and no database rollback was needed. For rollback, restore the prior application revision and applicable cached/environment configuration from the root-private backup, rebuild caches, reload PHP and verify; preserve unrelated source changes and data. Never use an indiscriminate hard reset or restore development secrets over production.

## Mail and public verification

The release configures Cloudflare SMTP with implicit TLS on port 465, the approved A&PM sender, the two approved staff recipients and optional IPv4 source binding. See CONTACT-FORM-PLAN.md and .env.example for nonsecret setting names. Actual token values exist only in private runtime configuration. Config/route/view caches were rebuilt after configuration.

Live verification passed for Home, About, Destinations, Services, Blog, Gallery, Contact, FAQ and all three policies (11 HTTP 200 responses). Public HTML contains the new form/layout, footer policy bar, address pin and single floating WhatsApp link; the footer website row is omitted. The versioned brand stylesheet contains the new layout rules; both direct origin and public stylesheet requests returned HTTP 200.

A real public HTTPS form GET/POST retained cookies and CSRF, used synthetic content, and returned the expected staff-submission success without an acknowledgement-failure notice. SMTP accepted staff notifications and the acknowledgement to the owner's explicitly authorized test inbox. Final inbox arrival and owner acceptance remain unverified from this environment. No extra email was sent merely to check stylesheets or page status. Automated tests were run locally, not against the production database.

Full live browser keyboard/zoom/error-state review remains pending; earlier local responsive previews and their font/preloader limitations are recorded in CONTACT-FORM-DESIGN-REVIEW.md. Remaining demo content/policy acceptance issues in the existing site are unchanged by this release.

## Sole staff recipient — 2026-11-10

The owner changed the contact form's staff-notification recipient to `reservations@apmtours.com` only. Local private configuration and `.env.example` now use that single address; tests assert one staff recipient and exclude the two former direct Gmail recipients. Visitor acknowledgement and visitor Reply-To remain unchanged. The owner's current Cloudflare routing screenshot shows reservations forwarding to the company Gmail inbox, so that inbox still receives forwarded enquiries; the website no longer addresses either Gmail directly. Cloudflare rules were not changed. This supersedes earlier dual-recipient instructions.

Verification for the recipient change: focused contact suite passed (27 checks/148 assertions), Pint and whitespace checks passed. Applied the single-recipient production setting after a root-private environment backup at `/var/backups/apm-tours/20261110T190948Z-recipient-change`, rebuilt configuration as www-data, and verified the exact runtime recipient array, production mode, disabled debug and cached config. Origin Contact returned HTTP 200. No code deployment, Git commit/push, Cloudflare rule change or real email test was performed for this configuration change.

### Contact abuse protection — 2026-11-10

Implemented locally: fail-closed server-verified Turnstile with hostname/action/replay checks, 5/minute and 20/hour IP limits, 3/hour normalized-email limit, ten-minute duplicate suppression and one acknowledgement attempt/email/hour. Existing CSRF, validation and honeypot remain; fixed mail routing and no reflected customer content in acknowledgements reduce relay abuse. Full suite passed (48 tests/269 assertions), along with formatting, Blade compilation and whitespace checks. Current Turnstile site/secret keys are absent; local submission is intentionally unavailable until configured. No new live code, Git push, real mail test or Cloudflare rule change was performed. See CONTACT-SPAM-PROTECTION.md for setup, proxy/cache requirements, limits and incoming-routing boundaries.

### Production release verified — 2026-11-10

Pushed application commits 9d52940 and 4c8c96f to GitHub before deploying 4c8c96f to Contabo. Root-private rollback backup: /var/backups/apm-tours/20261110T195739Z-before-9d52940 (the name reflects the initial release target; it contains the prior 637df7a source/environment/cache). Turnstile keys were streamed privately from local configuration; production SMTP and unrelated settings were preserved. Runtime boolean checks confirm production mode, debug disabled, cached configuration, challenge enabled, both keys present and reservations@apmtours.com as the sole staff recipient.

Fast-forward deployment, optimized autoload generation, config/route/view caches and PHP-FPM reload succeeded; the existing artisan mode difference was preserved. No dependencies, database migrations or frontend build were needed. The older server Composer emitted deprecation notices but completed successfully. Eleven public pages returned HTTP 200. Live keyword search, Uganda regional results, fourteen-day preferences/contact prefill, canonical Turnstile markup without the removed heading, approved WhatsApp URL and new 14,352-byte redacted image passed checks. A public CSRF/session-backed POST without a challenge was rejected; no successful enquiry or real email was sent during this release. Final local suite: 57 tests/362 assertions passed.

Remaining acceptance: a genuine human Turnstile completion and inbox receipt on production, plus full browser keyboard/responsive review. Automated HTTP checks do not establish those outcomes. Review Cloudflare trusted CIDRs during future releases.
