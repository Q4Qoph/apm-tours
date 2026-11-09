# A&PM Tours & Travel — Agent Instructions

These instructions describe the repository as audited on 2026-11-03. Treat statements marked **Planned** as future work, not existing functionality. When repository evidence and an assumption conflict, inspect the code and update these instructions rather than relying on the assumption.

## 1. Project Overview

A&PM Tours & Travel is a travel agency. This Laravel website is intended to present the agency and its approved services, help prospective customers explore travel options, and collect enquiries for staff follow-up. It is a marketing and consultation-led site, not a live inventory, instant-booking, ticketing, or payment platform. Do not describe it as an automated booking system.

## 2. Business Context

- The intended customer journey is: learn about an approved service or destination → send a travel enquiry → discuss requirements with the agency → receive a tailored quotation → confirm arrangements with staff.
- The supplied Company Profile v1 describes safari/holiday packages, accommodation, private and group transport, guide coordination, flight ticketing/travel-agency assistance, destination management, corporate travel, and tailor-made travel. It focuses on Kenya and East African itineraries, with support beyond the region, and identifies leisure, family/couple, diaspora, group, educational/special-interest, corporate, and travel-trade audiences.
- The Company Profile, FAQ, and policy documents were supplied outside this repository; their business summary is recorded in `docs/IMPLEMENTATION-PLAN.md`. Confirm that facts and draft policy versions are approved before publishing them. Do not infer unlisted destinations, active offers, or current commercial terms from the Tourm demo copy.
- Keep availability, itinerary, inclusions, and quotation decisions subject to staff confirmation. A submitted enquiry is not a booking or a confirmed reservation.
- Do not invent prices, package availability, testimonials, awards, affiliations, guarantees, or other commercial claims.

## 3. Current Technology Stack

Confirmed from `composer.json`, `composer.lock`, `package.json`, and the repository files:

- PHP requirement: `^8.3`; PHP 8.4.27 and Composer 2.7.1 were available in the audit environment.
- Laravel Framework: locked at `v13.39.0` (manifest constraint `^13.17`).
- Other locked PHP development tools include Laravel Pint 1.32.1, PHPUnit 12.5.43, Mockery 1.6.15, Faker 1.24.1, Laravel Pail 1.2.7, and Laravel PAO 1.1.5.
- Frontend declarations: Vite `^8.0.0`, `laravel-vite-plugin` `^3.1`, Tailwind CSS `^4.0.0`, and `@tailwindcss/vite` `^4.0.0`. `resources/css/app.css`, `resources/js/app.js`, and `vite.config.js` are the current frontend entry points.
- Node 24.15.0 and npm 12.2.0 were available in the audit environment; the repository does not pin their versions.
- `package-lock.json`, other npm lockfiles, and `node_modules/` are absent. Treat frontend package versions as declarations, not a verified installed dependency tree.
- Tourm's static Bootstrap, CSS, JavaScript, font, and image assets are under `public/assets/`; the supplied A&PM header and footer logos are under `public/assets/img/brand/`. These are static files, not Composer/npm packages. The selected **Home Travel Agency** and approved public Tourm source pages are converted nearly verbatim to Blade; browser comparison remains pending.
- Filament and Laravel Boost are not installed. Filament is **Planned**, not part of the current stack.
- `config/database.php` defaults to SQLite and also defines MySQL, MariaDB, PostgreSQL, and SQL Server connections. The active runtime driver is **Not yet verified**; do not inspect or print `.env` values to determine it.

## 4. Repository Structure

Existing locations:

- `app/Http/Controllers/` — currently only Laravel's base controller.
- `app/Models/` — currently only the default `User` model.
- `app/Providers/` — application service provider.
- `bootstrap/` and `config/` — Laravel bootstrap and configuration.
- `database/migrations/`, `factories/`, and `seeders/` — default user/session, cache, and queue schema plus Laravel starter data.
- `public/` — Laravel entry point, web server rules, favicon, `robots.txt`, and copied Tourm theme assets under `assets/`.
- `resources/views/` — Laravel welcome view, Tourm-derived public pages under `pages/`, static policy views under `pages/legal/`, shared layout, and reusable source-derived partials under `partials/`.
- `resources/css/` and `resources/js/` — Vite source assets.
- `routes/web.php` — maps clean public paths to Blade views and permanently redirects legacy Tourm `.html` URLs for implemented pages to their clean equivalents; unmatched paths use the source-style error view as the 404 fallback. `routes/console.php` contains the default `inspire` command.
- `tests/Feature/` and `tests/Unit/` — default example tests.
- `storage/` — Laravel runtime data; never commit generated logs, caches, or customer uploads.
- `docs/` — project roadmap and verified technical guidance; start at `docs/README.md`.

When needed, put HTTP validation in `app/Http/Requests/`, authorization policies in `app/Policies/`, jobs in `app/Jobs/`, and add Eloquent models in `app/Models/`. Organize public Blade pages under `resources/views/pages/`, policy pages under `resources/views/pages/legal/`, and shared layouts/partials/components in their corresponding subdirectories. Copied Tourm files currently live under `public/assets/{css,js,fonts,img}/`; preserve their references and dependency order when editing them.

## 5. Frontend and Template Rules

- The selected Tourm **Home Travel Agency** and public source pages are copied into Blade views under `resources/views/pages/`. The Home and About pages now have first A&PM content passes based on the supplied Company Profile; the homepage About introduction uses the existing Tourm Home Forest `about-area` component, its service overview uses `feature-area2` from `home-winter-holiday-travel.html` with selected photo crops for safari, planning, and cultural experiences plus the Company Profile image for Groups & Corporate, and its seven-stage delivery process reuses `blog-grid4-static` from `home-hiking.html` with selected travel photos. Several generic images on Home, About, and Services were also replaced with cropped WebP images from recent downloads. See `docs/FRONTEND.md` for the image map and why destination artwork remains unchanged. About omits its Tourm page-title banner and final brand-logo/gallery strips; its profile-backed introduction and Core Values remain. Other copied pages remain close to source. Preserve Tourm structure, classes, assets, and interactions during these changes. Local asset URLs use `asset()`. Browser comparison remains outstanding.
- `resources/views/layouts/app.blade.php` loads the Tourm CSS and JavaScript once. `partials/template-before-header.blade.php` and `template-after-footer.blade.php` hold the repeated source overlays and scripts. The shorter consultation-to-coordination section was removed from About at the owner’s direction; Home retains the expanded seven-stage process from `home-hiking.html`. `layouts/app.blade.php` includes the same `header-layout8` A&PM header on every page, including FAQ, legal, and copied inner pages; route-dependent header variants are removed. The Contact view omits its original page-title banner and inherits the shared header and footer. Desktop and mobile navigation reuse `partials/site-nav-items.blade.php`, which contains Home, About Us, Destination, Service, Blog, Gallery, and Contact. `partials/site-footer.blade.php` is included unconditionally by the shared layout for every routed page. It uses Company Profile contact details and social handles; the nonfunctional demo newsletter, payment badges, placeholder contact information, and generic Instagram gallery are removed. The A&PM favicon kit is stored at the root of `public/` and referenced by the shared layout head.
- Static Terms, Privacy, and Cookies pages under `resources/views/pages/legal/` were generated from the provided DOCX documents. Their supplied draft/version status still requires owner confirmation before public release.
- Use a shared Blade layout such as `resources/views/layouts/app.blade.php`, shared navigation/footer and repeated sections as partials under `resources/views/partials/`, and reusable Blade components under `resources/views/components/`. Page-specific markup belongs in page views; do not copy full navigation/footer markup across pages.
- When converting the supplied Tourm page, preserve its markup, copy, classes, links, forms, Bootstrap styling, plugin assets, and dependency order. Make only changes required for Laravel integration, such as using `asset()` for local assets and extracting the existing header/footer into partials. Do not redesign or rewrite template content unless the user requests it. Check script and stylesheet references before removing or reordering a plugin.
- The Laravel starter still declares Tailwind/Vite, but the landing page loads Tourm's Bootstrap/theme CSS and scripts directly from `public/assets/` and does not load the Tailwind entry point. Preserve Bootstrap and the original script dependency order. Do not add another UI framework or casually remove the starter assets; document any later change to the Vite/Tailwind setup.
- `public/assets/js/main.js` intentionally differs from Tourm source by removal of the global `contextmenu` blocker and style-switcher handlers, plus a short preloader fallback so slow page assets do not keep the entire screen covered. The shared layout preloads the first Home hero image and versions `main.js` with its file modification time so CDN caches refresh after changes. Preserve other source interactions and keyboard handling unless the user requests a separate change.
- A&PM header/footer logo files have been supplied and are used in the page. The user has directed the visual work to follow the approved logo and company-document brand context. Repeated document styling and the logo support forest green (`#0B5A3C`) with gold (`#C8942D`) and sunset amber (`#F69F28`); treat these as working brand tokens, since no formal palette guide was supplied. Preserve readable contrast and keep future brand overrides separate from the copied Tourm stylesheet. The homepage Trip Finder form still has Tourm destination/type options and an external demo form action; its adjacent carousel now displays 10 destination highlights and images from the Company Profile. Selected downloaded photos are illustrative and do not prove A&PM delivered a depicted trip or works with pictured people or suppliers. Other copied views may still contain Tourm offers, testimonials, contact details, and external form actions; treat them as unapproved placeholders. The About page no longer presents Tourm guide profiles or testimonials as A&PM staff/customers. Preserve remaining template placeholders during faithful conversion, and replace them only when the user requests a content pass using approved information. Do not deploy placeholders as factual A&PM content.
- Use `asset()` for copied Tourm public assets on all converted pages. Links to implemented pages use named Laravel routes with clean paths; legacy `.html` URLs for those pages permanently redirect to clean equivalents. Unimplemented Tourm placeholders may still contain demo links. Use Blade's `@vite` only for application bundles deliberately loaded by the page and compatible with Bootstrap; do not load the Tailwind starter entry just by convention. Avoid machine-specific paths and unapproved remote assets.

## 6. Laravel Architecture and Conventions

- Follow Laravel 13 conventions and the established directory structure. Keep routes declarative and named; route HTTP behavior through controllers as the application grows.
- Keep controllers focused on HTTP concerns. Put nontrivial request validation in Form Requests, persistence and relationships in Eloquent models, and authorization in policies/gates. Introduce an action/service only when a real workflow warrants a separate unit; do not create layers for trivial pass-through code.
- Define Eloquent relationships explicitly, eager-load data used by views, and avoid query-per-item loops. Use explicit mass-assignment allowlists; never use an unguarded model for user-submitted data.
- Add or change database schema only through reversible Laravel migrations. Do not edit an existing migration that may have run in another environment; add a new migration instead. Add indexes and foreign keys to support actual access patterns and relationships.
- Use queues/jobs only for work that needs asynchronous processing, such as a confirmed slow notification or integration. The default jobs schema exists, but no business queue workflow is implemented.
- Keep business rules out of Blade templates and avoid unnecessarily complex controllers, speculative abstractions, or broad refactors.

## 7. Data and Business Workflow Rules

- **Planned:** a public enquiry captures only the information needed to understand a travel request and allow staff follow-up. Validate server-side, persist through an intentional migration/model, and provide staff with a consultation and quotation workflow.
- Staff must verify requirements, availability, pricing, and terms before issuing a quotation or confirming travel. Do not convert a form submission into an automatic booking, inventory hold, or payment.
- Do not create package, booking, payment, availability, or destination tables until an approved workflow and data model require them. Do not seed fictional packages, offers, customer records, or testimonials as real business data.
- The current migrations are Laravel starter migrations only; they do not represent a travel domain schema. Migration state in the configured database is **Not yet verified**.

## 8. Admin Development Rules

- Filament integration is **Planned**; there is no Filament package, panel, resource, or admin route in the repository today.
- Keep admin operations in the admin-panel layer (planned Filament panel/resources under `app/Filament/`) and keep public marketing/enquiry pages in web routes and Blade. Share domain models/actions where appropriate; do not put admin-only controls in public templates.
- Before exposing an admin panel, implement authenticated access, explicit authorization for each sensitive action, least-privilege roles or permissions, secure password handling, and production-safe account provisioning. Hiding a link or guessing an obscure URL is not authorization.
- Do not add public admin registration or assume a role-management plugin is installed. Choose and document the actual access/role model when Filament work is approved.

## 9. Security and Privacy

- Never print, copy into documentation, or commit `.env`, credentials, API keys, private certificates, or customer data. Put secret names/placeholders in `.env.example`, never live values. Keep logs free of passwords, payment details, and unnecessary personal information.
- Keep Laravel CSRF protection on state-changing web forms and include `@csrf` in Blade forms. Validate every request server-side; use authorization policies/gates for protected records and actions.
- Escape output with Blade's `{{ }}` by default. Avoid `{!! !!}` for user-controlled or untrusted content; sanitize rich text with a vetted sanitizer if a future feature truly requires HTML.
- Rate-limit public enquiry endpoints and add practical spam controls. Validate uploads by size and allowed content type, generate safe filenames, store private/customer documents on non-public storage, and authorize every download.
- Collect only data needed for the enquiry, limit access and retention, and follow approved privacy/consent requirements. Never treat client-side validation as a security boundary.

## 10. Frontend Quality Standards

- Build mobile-first and verify the layout at narrow, medium, and wide viewports. Preserve keyboard access, visible focus, semantic headings/landmarks, labeled form fields, useful error messages, and adequate contrast.
- Give each page a descriptive title and meta description; use meaningful headings, canonical URLs where appropriate, social metadata, and accurate `robots.txt`/indexing behavior. Do not add SEO claims unsupported by approved business facts.
- Optimize images for the display size, prefer suitable modern formats when the source allows, set intrinsic dimensions, provide useful alt text, lazy-load below-the-fold images, and prioritize the actual hero image.
- Protect Core Web Vitals by limiting unnecessary JavaScript, loading noncritical scripts without blocking rendering, and preserving required plugin order. Recheck theme-dependent interactions after changing assets.
- Keep A&PM brand presentation consistent across pages and use the documented logo/document-derived color direction in `docs/FRONTEND.md`. Do not invent extra brand colors or use unapproved stock imagery as a claim about the agency's real trips.

## 11. Testing and Verification

Commands verified from the current Composer/npm scripts or available Laravel/Pint commands:

| Task | Command | Evidence / notes |
| --- | --- | --- |
| Install PHP dependencies | `composer install` | `composer.json` and `composer.lock` are present. |
| Install frontend dependencies | `npm install --ignore-scripts` | This is the npm invocation in the existing Composer setup script. No npm lockfile exists, so resolution is not pinned. |
| Start the application dev processes | `composer run dev` | Composer `dev` script exists and Laravel exposes the `dev` Artisan command. |
| Start Vite alone | `npm run dev` | Declared in `package.json`. |
| Run migrations | `php artisan migrate` | Laravel command is available. Check the target environment before running; it changes the database. |
| Build frontend assets | `npm run build` | Declared in `package.json`; no build was run during this audit. |
| Check PHP formatting without edits | `vendor/bin/pint --test` | Pint binary and `--test` option are present. |
| Run the test suite | `composer test` or `php artisan test` | Composer script clears config then runs Artisan tests. No tests were run for this documentation task. |

There is no JavaScript/CSS lint script in `package.json`. Do not invent npm scripts or assume `npm ci` is available without a lockfile. Tests currently consist of Laravel's example root-response feature test and a trivial unit example; add focused feature tests with future behavior. The audit did not run migrations, a build, or the test suite.

## 12. Git and Change Management

- Before editing, inspect `git status --short --branch` and review existing changes. Preserve unrelated and uncommitted work; do not reset, clean, or overwrite it.
- Make focused changes and avoid unrelated refactors. Use meaningful commit messages when a commit is requested; do not create commits unless asked.
- Get explicit approval before destructive operations, data deletion, force pushes, or production deployments.
- At audit time, the supplied `.git` directory was empty and Git status/branch commands failed with “not a git repository.” The branch and pre-existing change state are therefore **Not yet verified**. In this workspace, do not infer that the project is clean; verify status in a valid checkout before further changes.

## 13. Agent Workflow

Use this sequence for each task:

1. **Inspect** `AGENTS.md`, Git state, and the relevant files. Read `docs/IMPLEMENTATION.md` and related technical docs before feature work.
2. **Understand** current behavior and constraints; mark unknown requirements rather than guessing.
3. **Plan** the smallest change that addresses the request.
4. **Implement** only the authorized scope and preserve existing work.
5. **Test** the relevant behavior using verified project commands; do not claim unrun checks passed.
6. **Review** the diff, file references, security implications, and user-visible behavior. Update implementation tracking and relevant technical docs after meaningful changes.
7. **Summarize** what changed, the files touched, tests and outcomes, and any risks or remaining work.

Every completion report must state what changed, which files changed, what tests/checks ran and whether they passed, and known risks or remaining work. If a check was not run, say so.

## 14. Current Development Phase

**Repository state:** early Laravel scaffold with a source-faithful multi-page Tourm-to-Blade conversion in progress; it is not a completed travel website.

- **Present:** Laravel 13 application skeleton; the unused Laravel starter view remains at `resources/views/welcome.blade.php`, while `/` renders the Tourm Home Travel Agency page; default user model and starter user/session, cache, and queue migrations; Vite/Tailwind starter assets; minimal example tests.
- **Present:** Tourm Home Travel Agency, About, Services and detail, Activities and detail, Destinations and detail, Tours and detail, FAQ, Contact, Blog and detail, Gallery, and Error source markup is in Blade views. Home and About contain first-pass A&PM content adaptations; About omits the page-title banner and final Tourm brand/gallery sections; Home uses the seven-stage How We Deliver section; About no longer includes the shorter planning-process section at the owner’s direction. Named routes use clean paths and previous `.html` URLs redirect to them; shared layout/overlays/header/footer are in place, and desktop/mobile navigation share one partial. Destination and Service are direct links without dropdowns. Activities and Our Tour are removed from the header navigation; Blog and Gallery are now direct header links. Static Terms, Privacy and Cookies Blade pages use the supplied documents. The supplied header/footer logos and A&PM favicon kit are integrated.
- **Present:** The `/service` overview now presents all eight Company Profile service categories and descriptions in Tourm's existing service-card structure and links enquiries to Contact. Selected downloaded photos are used for safari, transport, destination planning, and cultural experiences; profile illustrations remain for accommodation, guide coordination, flight ticketing, and corporate travel. Tourm demo package, hotel, transport, review, and price examples were removed from that overview. `/service-details` still contains unapproved Tourm demo content.
- **Not present:** An approved A&PM color/typography kit, enquiry/quotation persistence, travel-domain models/migrations, an implemented admin system, or deployment configuration. Filament is **Planned**, not installed.
- **Planned/in progress:** Browser-compare converted pages with Tourm source; review Home, About, and Services copy/imagery; adapt remaining placeholders only using approved A&PM content; replace the demo Trip Finder form/action with an approved Laravel search flow; then consider secured administration.
- The homepage Trip Finder form retains Tourm sample options and an external form action; its adjacent carousel now uses Company Profile destinations. Some copied inner pages still retain Tourm demo content, prices, contact details and external form actions; these are not production-ready A&PM information. Home, About, and Services adaptations still need owner and visual review. Legal documents were supplied as v0/1.0 drafts and need owner approval before publication. The active database, hosting target, enquiry workflow and admin role model are **Not yet verified**.
- `README.md` is generic Laravel documentation. `CLAUDE.md` repeats the former Boost bootstrap setup; neither file contains the missing A&PM business catalogue or brand specifications.
- The Composer Boost installation requested by the former bootstrap instructions could not complete because Packagist DNS resolution failed. Boost remains absent and the Composer manifests were unchanged; do not treat Boost as an installed project dependency.

## 15. Project-Specific Anti-Patterns

Do not:

- Mix Bootstrap, Tailwind, or another frontend framework without a deliberate, documented need; do not replace the selected Tourm Bootstrap design with Tailwind without an approved decision.
- Duplicate navigation, footer, or repeated page markup instead of using Blade layouts, partials, and components.
- Put business rules, database access, or complex conditionals in Blade; write overly complex controllers or unnecessary service/repository layers.
- Add speculative travel tables or build booking, payment, ticketing, or live-availability functionality before the consultation/quotation requirements are approved.
- Present invented prices, package availability, destinations, testimonials, or commercial claims as facts.
- Hardcode production secrets, expose customer data, or trust hidden controls/client-side validation for security.
- Edit unrelated files, overwrite user changes, or remove a working Tourm plugin before checking its references and dependencies.

## 16. Documentation and Implementation Tracking

- `AGENTS.md` at the repository root contains coding-agent instructions. All project development documentation belongs in `docs/`.
- Read `docs/README.md` for the documentation index and `docs/IMPLEMENTATION.md` for current phase, progress, blockers, and next tasks before implementation work. Review `docs/IMPLEMENTATION-PLAN.md` for the owner-directed source-page copy scope and remaining decisions; read `docs/LANDING-PAGE-PLAN.md` before changing homepage content or section flow. Do not infer approval for unrelated features. Consult `docs/ARCHITECTURE.md`, `docs/DATABASE.md`, `docs/FRONTEND.md`, `docs/DEVELOPMENT.md`, or `docs/TESTING.md` as relevant to the change.
- Update applicable implementation tasks and technical documentation after meaningful code or workflow changes. Keep statements consistent with the current files and verified behavior; distinguish **Planned** work from implemented work.
- Record significant approved architecture decisions as dated ADRs in `docs/decisions/`. Do not silently rewrite historical decisions; add a superseding ADR when a decision changes.
- Mark features complete only after their acceptance criteria have been verified. Code existing in the repository alone does not prove a feature is complete.
- Keep detailed technical explanations in the relevant `docs/` file and link to them from `AGENTS.md` rather than duplicating full content here.

## 17. Approved Stakeholder Content Exceptions (2026-11-04)

- Follow `docs/STAKEHOLDER-REVIEW-PLAN.md` for the approved corrections and remaining visual acceptance. The owner revised the footer direction: keep the footer green with light text and a white background around only the logo. Preserve the footer plane’s existing motion with a white mask for contrast and reduced-motion support.
- General contact areas use reservations@apmtours.com. Terms, Privacy, and Cookies document bodies use info@apmtours.com and effective date 01 October 2026, including their numbered contact sections. These requested exceptions supersede the original draft dates/emails; preserve other policy wording.
- Social profiles display APMTours_KE (Instagram @APMTours_KE); full profile URLs remain unconfirmed. Reuse the shared company-introduction, contact-details, and social-profiles partials. Do not restore generic social links or the slide-out panel’s unrelated demo posts.
- Keep the brand CSS filemtime query version so CDN caches refresh after stylesheet changes.

## 18. Source-document Content Audit (2026-11-04)

Read `docs/CONTENT-SOURCE-AUDIT.md` before editing company, FAQ, or policy copy. FAQ contains 69 source-backed questions; preserve planned flight-service qualifications and the owner-approved social-handle exceptions. About also qualifies flight ticketing as planned. The policy documents retain source text with approved date/email corrections. Some copied detail/blog/tour pages and demo form overlays remain unapproved; do not infer their claims from the corrected FAQ.

## 19. Blog and Gallery Content (2026-11-04)

Blog and Gallery now appear in shared desktop/mobile navigation and are moved out of the footer links. Blog has three static, profile-based travel-guidance articles with individual named routes and a shared editorial component; no fake authors, dates, comments, or package prices. `/blog-details` permanently redirects to the planning article. Gallery uses nine existing selected photographs with a clear illustrative-image note and the existing popup-image plugin. Never describe those photos as completed A&PM trips or verified supplier relationships. These pages still need visual/owner review before being marked fully accepted.

## 20. Approved Photo and Label Revisions (2026-11-06)

Shared contact rows omit redundant visible field labels; social rows show platform icons and account handles, with platform names kept accessible to screen readers. Do not restore visible platform prefixes or invent profile URLs. Six supplied photographs now have optimized `stakeholder-*.webp` derivatives; see `docs/FRONTEND.md` for placements. The Home buildings hero slide is replaced, Home/Destinations Nairobi cards share the approved giraffe photo, Services uses new safari/transport photos, and Gallery contains fifteen illustrative images, including all six supplied photographs. Browser acceptance remains pending.

## 21. Approved Footer and Navigation Alignment (2026-11-09)

The owner approved a compact footer with explicit responsive columns, smaller white-backed logo, and a separate bottom bar for copyright, Terms, Privacy and Cookies. Footer Explore reuses `partials/site-nav-items.blade.php` so desktop/mobile headers and footer share Home, About Us, Destinations, Services, Blog, Gallery and Contact. This supersedes the earlier Blog/Gallery footer exclusion. Activities/Tours are removed from footer navigation; their demo routes remain. FAQ stays in the contact column. Preserve approved wording, green surface, social handles without invented URLs, and plane motion/reduced-motion support. See `docs/FRONTEND.md`; browser acceptance remains pending.

Owner correction (2026-11-09): use a location pin for the shared address row; this supersedes the earlier envelope-icon instruction. Email keeps its envelope icon.

## 22. Floating WhatsApp Contact (2026-11-09)

Use the approved 0788799517 number (`https://wa.me/254788799517`) for the always-visible floating WhatsApp link beside scroll-to-top in the shared after-footer partial. The footer omits its WhatsApp action through `showWhatsApp => false` on the contact-details include, retaining its telephone link; the Contact page and slide-out panel keep their existing WhatsApp actions. Preserve labeled native controls, keyboard focus and safe-area spacing. Browser acceptance remains pending; see `docs/FRONTEND.md`.

## 23. Approved Email-only Contact Form (2026-11-09)

Contact now uses a source-derived Tourm form through `partials/contact-enquiry-form.blade.php`; preserve its labels, privacy notice, native select, feedback and source styling without `.ajax-contact`. POST `/contact` (`contact.send`) validates via SendContactEnquiryRequest and sends ContactEnquiry synchronously over SMTP to configured staff recipients, with visitor Reply-To. The owner approved both Gmail recipients and email-only scope. No enquiry model/table, queue worker, admin or customer acknowledgement was added. Protect CSRF, honeypot and the 5-per-minute/IP limiter. Read `docs/CONTACT-FORM-PLAN.md` for private configuration, failure behaviour, coverage and outstanding browser/live SMTP verification. No production release or real email test has occurred.

Live verification update (2026-11-09): runtime SMTP settings passed safe checks; a network-enabled test authenticated and Cloudflare accepted one synthetic enquiry addressed to both approved recipients. Inbox delivery, Reply-To and browser acceptance still need owner verification. No deployment performed. See `docs/CONTACT-FORM-PLAN.md`.

### Visitor acknowledgement update — 2026-11-09

The owner subsequently approved automatic visitor acknowledgement. After successful staff notification, send ContactAcknowledgement to the validated visitor address with fixed content, A&PM sender/Reply-To and no booking confirmation. Acknowledgement failure must not turn an accepted staff enquiry into a resubmission request. The form notice mentions the acknowledgement. Optional MAIL_SOURCE_IP enables local IPv4 binding; TLS verification stays enabled. A live local form test obtained SMTP acceptance for staff and visitor messages; inbox receipt and browser acceptance remain pending. This supersedes section 23’s earlier customer-acknowledgement exclusion; see docs/CONTACT-FORM-PLAN.md.

## 24. Approved Contact Visual Revision (2026-11-09)

Contact uses a warm-neutral background, compact introduction/three process steps and a top-aligned 4/8 desktop layout with a wider Tourm-derived form. Scoped brand CSS uses smaller headings, 50px controls, a resizable message field and full-width mobile submit. Preserve visible labels, privacy/acknowledgement notice, validation and mail flow. Do not restore the removed opening card row or full-height photo behind body text. See `docs/CONTACT-FORM-DESIGN-REVIEW.md` for snapshot verification and remaining live interaction/owner acceptance.

Footer follow-up (2026-11-09): omit the website row in the footer through `showWebsite => false`; retain it by default in the shared contact panel. Preserve scoped footer row alignment, inline flex-positioned Explore arrows and reset contact-text offsets.
