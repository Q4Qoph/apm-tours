# Implementation Roadmap

This is the authoritative implementation status record. Statuses below reflect repository evidence audited on 2026-11-03. Update a task only after inspecting the code and recording relevant verification.

## Status key

- `[ ]` Not started.
- `[-]` In progress or partially implemented; remaining work is stated.
- `[x]` Completed and verified against its acceptance criteria.

Do not mark a feature complete because files exist. Record which checks passed and which were not run. The owner has directed a source-faithful copy of the selected public Tourm pages with minimal Laravel changes. A first content pass now adapts selected homepage sections; the Trip Finder, broader content approval, and booking/enquiry workflows remain future work. See [IMPLEMENTATION-PLAN.md](IMPLEMENTATION-PLAN.md) and [FRONTEND.md](FRONTEND.md).

## Project Overview

### Goals

Create an A&PM Tours & Travel website that presents approved agency services and destinations, gathers travel enquiries, and supports staff-led consultation and quotations. The site is an agency website, not a live booking, inventory, ticketing, or payment platform.

### Technology baseline

- PHP `^8.3`; Laravel Framework locked at `v13.39.0` with a `^13.17` manifest constraint.
- Composer-managed backend dependencies and PHPUnit tests.
- Vite `^8`, `laravel-vite-plugin` `^3.1`, and Tailwind CSS `^4` are declared in `package.json`; there is no npm lockfile or `node_modules/` in the audited tree.
- Tourm's static Bootstrap/CSS/JavaScript assets are copied under `public/assets/`; the selected **Home Travel Agency** and directed public pages are integrated nearly verbatim as Blade views, with local asset paths, clean named Laravel routes, and shared layout boundaries adapted for Laravel. Previous `.html` URLs for implemented pages permanently redirect to clean paths. Filament remains **Planned**, not installed.
- The project is a Laravel-first application; see [ADR 0001](decisions/0001-laravel-monolith.md).

This documents repository requirements and locked/declaration versions. It does not establish production PHP/Node versions or the active database driver.

### Current scope

The repository is an early Laravel scaffold with the Tourm Home Travel Agency and selected public page bodies copied into Blade using shared partials and clean named routes; previous `.html` URLs for implemented pages redirect to their clean equivalents. The homepage has first A&PM content passes for selected sections. The Trip Finder form remains a demo, while its adjacent carousel now displays 10 Company Profile destination cards with extracted images. Other copied pages may retain Tourm material. Browser comparison, copy/image approval, and the consultation-led enquiry workflow remain outstanding. The supplied policy documents render as static pages, but owner approval for public release is **Not yet verified**. Hosting and admin access decisions remain **Not yet verified**.

### Long-term objectives

After the public site and quotation workflow are approved and verified, provide staff with secure enquiry/quotation administration. Defer broader travel-management, live availability, booking, ticketing, and payment functions until separately approved requirements justify them.

## Implementation Phases

### 1. Laravel project foundation

- **Objective:** Establish a reproducible, verified Laravel baseline for A&PM work.
- **Components/files:** `composer.json`, `composer.lock`, `artisan`, `bootstrap/`, `config/`, `routes/`, `tests/`, `package.json`, `phpunit.xml`.
- **Dependencies:** Approved local environment values; a valid Git checkout; Node/npm versions compatible with the declared Vite packages.
- **Approach:** Preserve the Laravel 13 scaffold, document setup effects, verify a clean local setup and baseline tests/build without exposing secrets or pointing setup at production data.
- **Acceptance criteria:** Dependencies install from their manifests; Artisan boots; migrations run against an isolated development database; baseline tests and asset build pass; local secrets stay untracked.
- **Status:** `[-]` Laravel scaffold and default migrations are present; project-specific setup and baseline verification remain open.
- **Verified:** `php artisan --version` reports Laravel 13.39.0; Composer/npm scripts and available Artisan commands were inspected. Composer and Node manifests exist.
- **Not verified:** Fresh dependency installation, frontend build, and migration state. The scaffold test suite has since been run during the landing-page integration; no migrations or build were run.
- **Blockers/decisions:** No npm lockfile; Git metadata is unavailable in the supplied workspace. Active runtime database driver is **Not yet verified**.

  - [x] Inspect the framework, manifests, routes, starter migrations, test configuration, and available scripts.
  - [ ] Verify clean local setup, baseline test run, asset build, and isolated migration run.

### 2. Tourm HTML integration and Blade conversion

- **Objective:** Integrate the selected Tourm **Home Travel Agency** design into maintainable Blade views while preserving required Bootstrap and plugins.
- **Components/files:** `resources/views/layouts/app.blade.php`, shared partials under `resources/views/partials/`, public and legal views under `resources/views/pages/`, named clean routes and legacy redirects in `routes/web.php`, and Tourm assets under `public/assets/`.
- **Dependencies:** Copied Tourm assets/source HTML and the approved A&PM header/footer logos are available; the broader brand kit and approved page copy remain outstanding.
- **Approach:** Preserve the supplied HTML structure, classes, responsive behavior, asset use, and plugin behavior. Adapt visible content only when explicitly requested or approved. Convert local `assets/...` URLs to Laravel `asset()` calls and keep the original document shell, shared layout/partials, and page components with minimal structural changes.
- **Acceptance criteria:** The page is served through Laravel; every referenced local asset resolves; Tourm structure, classes, and plugin dependency order are retained while copy is adapted only when requested; header/footer reuse is provided by partials. Browser comparison is required before calling the integration verified.
- **Status:** `[-]` Home, About, Services and detail, Activities and detail, Destinations and detail, Tours and detail, FAQ, Contact, Blog and detail, Gallery, and Error source bodies are copied into Blade; Home and About now have first-pass A&PM content adaptations; the Home About introduction uses the source `about-area` component from `home-forest.html`. Terms, Privacy, and Cookies views use the supplied DOCX text. Shared overlays/scripts, shared desktop/mobile navigation, header variants, footer, local assets, and clean named routes with redirects from previous `.html` URLs for implemented pages are in place. Header navigation contains Home, About Us, Destination, Service, and Contact; Destination and Service are direct links without dropdowns, and Activities, Our Tour, and Blog have been removed from the header. Home, About, Destination, Service pages (including service details), and Contact use `header-layout8`; other inner pages retain `header-layout1`. Contact’s original page-title banner has been removed; it inherits the shared header/footer and now uses the Company Profile v1 postal address, phone/WhatsApp, email, website, social media handles, brand promise, and consultation-to-quotation copy. Direct email and WhatsApp links replace the external demo form; unrelated Tourm video/map embeds were removed. Enquiry persistence is still Planned. All routed pages use the same profile-backed footer; the nonfunctional demo newsletter, unsupported payment badges, placeholder contact information, and generic Instagram gallery have been removed. Static checks confirm the shared nav has five direct links and no Destination or Service submenus, Activities, Our Tour, or Blog; Blade caching and the route list passed after this update. Browser comparison remains pending. The homepage services section now uses Tourm `feature-area2` with four Company Profile service groups. The next section reuses `blog-grid4-static` from `home-hiking.html` for seven Company Profile delivery stages; the five-point Why Choose component from `home-hiking-2.html` follows it. The shorter About planning-process section was removed at the owner’s direction; the expanded seven-stage Home process remains. The separate destination section formerly below Services remains removed at the owner’s direction. The carousel beneath Trip Finder now displays the ten profile-listed destinations. The Destinations page remains accessible. Browser comparison remains.
- **Verified:** All explicit and data-driven local asset references currently found in Blade views resolve to files under `public/`; no raw local `assets/...` attributes remain in Blade. A prior integration audit confirmed `php artisan route:list --except-vendor`, `php artisan view:cache`, and HTTP-kernel smoke responses for the converted routes. The Home and About content updates have received static markup, route-reference, and asset-path checks; the new seven-stage section order and stage copy also passed static checks. `php artisan view:cache` compiled all Blade templates successfully. A static footer audit confirmed all 19 page views extend the shared layout, the layout includes the footer partial once, and no page view duplicates or overrides footer markup; browser rendering remains unverified. The About, Destination, Service, and Contact pages use Home's `header-layout8` variant through the route condition. Contact’s profile-derived details and copy, social handles, removal of Tourm demo form/video/map content, shared-shell inheritance, and local asset references passed static checks; `php artisan view:cache` passed after the update. Browser comparison remains pending. The source page bodies are copied with local asset URL conversion; shared navigation/footer links use named routes. The homepage now selectively replaces Tourm demo copy with A&PM services, a seven-stage delivery process, Why Choose content, destination cards, and value content while retaining the original components and Trip Finder form. The standalone destination section after Services remains removed. Services are followed by the seven-stage How We Deliver section, then Why Choose. Beneath Trip Finder, the Tourm package carousel now displays ten Company Profile destinations using WebP artwork extracted from the supplied DOCX and cross-checked against the supplied PDF. Their card images, intrinsic dimensions, concise briefs, section markup, and named `/destination` Explore links passed static checks; demo prices and “Book Now” links are absent. Browser rendering remains unverified. The About planning-process block and its unused partial were removed at the owner’s direction; the separate seven-stage Home process remains. The shared preloader preserves the Tourm wrapper IDs used by `main.js` while replacing the animated TOURM text with the A&PM map-pin spinner; reduced-motion preferences are honored. Its About introduction now uses the `home-forest.html` `about-area` markup with two profile-based paragraphs and service-philosophy feature copy; all five source image/icon assets resolve under `public/assets/`. The homepage Services overview uses `feature-area2` from `home-winter-holiday-travel.html` with selected WebP crops for safari, travel planning, and cultural experiences; the Groups & Corporate slot retains its Company Profile illustration. The new photo crops match the Tourm slot dimensions and the original card icon assets remain in place. The standalone `/service` overview now reuses Tourm's `destination-item` cards for all eight Company Profile service categories and descriptions, with downloaded photos for safari, transport, destination planning, and cultural experiences; the better-fitting profile illustrations remain for Accommodation, Guide Coordination, Flight Ticketing, and Corporate Travel; unsupported package, hotel, transport-inventory, review, and pricing examples were removed. Its eight optimized WebP image paths and Contact route references resolve, and `php artisan view:cache` compiles the view. Browser and owner review remain unverified. The new homepage Why Choose section uses five Company Profile points and the source icons from `home-hiking-2.html`, plus selected safari photography; the homepage Services section uses that demo’s pale travel-pattern background, sized to cover the complete section. About now uses Company Profile content for the company introduction, mission/vision/purpose, and core values; fictional staff and testimonials were removed. Its page-title banner and final Tourm brand/gallery sections are removed; the introduction photos use selected downloaded imagery. About no longer includes a planning-process partial; Home presents the expanded seven-stage process in the `home-hiking.html` component with selected planning, wildlife, coastal, and transport thumbnails. `public/assets/js/main.js` preserves Tourm behavior except that the global context-menu blocker was removed at the user's request.
- **Not verified:** Browser comparison, mobile navigation/sliders interactions, accessibility review, legal-document owner approval, asset performance, and the Vite build. The PHPUnit suite was not run for this homepage content pass.
- **Blockers/decisions:** The homepage Trip Finder form still contains sample filter options and posts to the external demo `mail.php`; it is not a working search. Its adjacent carousel now uses profile destinations and contains no demo prices or booking links. Demo packages, prices, testimonials, staff details, contact information and form actions may also remain on other copied pages. They are not approved A&PM content or a working enquiry flow; handle them in focused content/integration work before production. The Contact page provides direct email and WhatsApp links but does not yet persist enquiries in Laravel.

### 3. A&PM branding and responsive UI customization

- **Objective:** Adapt the template consistently to approved A&PM identity and mobile/tablet/desktop layouts.
- **Components/files:** Planned Blade components/views and `resources/css/`, with approved brand image files under the chosen public asset directory.
- **Dependencies:** Integrated logo, the logo/document-derived color direction, font guidance, approved copy, and responsive design acceptance criteria.
- **Approach:** Replace demo brand/copy with approved content, customize Bootstrap tokens/styles narrowly, and test accessible responsive behavior.
- **Acceptance criteria:** No demo identity remains; brand assets and text are approved; layouts and interactions work at target viewports and keyboard navigation is usable.
- **Status:** `[-]` Transparent A&PM logo variants are integrated: horizontal in the header/mobile menu and stacked in the footer. The supplied favicon kit is installed in `public/` and referenced by the shared layout. Logo/document-derived working colors are applied through `public/assets/css/apm-brand.css`. A first pass of homepage copy is in place; owner copy/image approval, typography guidance, and a full responsive brand review remain outstanding.
- **Verification:** Repeated policy-document styles and logo artwork support forest green `#0B5A3C`, gold `#C8942D`, and amber `#F69F28`. The shared layout loads the separate override after Tourm `style.css`; browser-level visual verification is pending.
- **Blockers/decisions:** Approved brand kit and a longer-term Tailwind/Bootstrap/Vite strategy.

### 4. Public website pages

- **Objective:** Publish the approved agency pages and clear enquiry calls to action.
- **Components/files:** Current `routes/web.php`, copied views under `resources/views/pages/`, shared layout/partials/components, and planned approved business copy and enquiry workflow.
- **Dependencies:** Approved sitemap, service/destination facts, contact details, and the Tourm/brand work above.
- **Approach:** Build only agreed pages and reusable sections; use named Laravel routes and shared Blade shell; keep claims factual and enquiry-led.
- **Acceptance criteria:** Each approved page has correct content, working links, responsive/accessibility checks, page metadata, and no invented offers or placeholder content.
- **Status:** `[-]` Requested Tourm source pages and static policy pages are routed through the shared Blade shell. About, Services, and Destinations overview/detail pages inherit the shared header/footer and use the Home/About `header-layout8`; their page-title banners are removed. About’s final Tourm brand-logo and gallery sections were also removed at the owner’s direction. Contact uses that header variant with no page-title banner and has profile-backed contact information, planning copy, and direct email/WhatsApp links; a Laravel enquiry workflow remains Planned. The Destinations overview now uses 10 profile-backed cards and artwork in the source grid/list views; its detail page remains a Tourm demo pending approved destination-specific copy. The `/service` overview now uses all eight Company Profile service descriptions and embedded illustrations; its detail page still contains Tourm demo content. The homepage and About page have first A&PM content adaptations; the Trip Finder form remains the copied demo widget; the adjacent homepage destination carousel uses profile content and images. Other page content, legal approval, and visual/interaction comparison remain outstanding before production.
- **Verification:** `php artisan route:list --except-vendor`, prior Blade compilation, and prior HTTP-kernel smoke responses passed for mapped routes. `php artisan view:cache` most recently passed after the destination-overview content update. Browser rendering and responsive checks remain unverified; About has static markup, route and asset checks only. The homepage Trip Finder form and destination-page search field remain unconnected; other copied pages may retain demo content.
- **Blockers/decisions:** Approved page copy, legal draft approval, public FAQ selection, enquiry fields, and staff follow-up are not yet agreed or implemented.

### 5. Database and dynamic content

- **Objective:** Add only data structures required by an approved content or enquiry workflow.
- **Components/files:** Planned `database/migrations/`, `app/Models/`, factories, seeders, and any necessary Form Requests/actions.
- **Dependencies:** Agreed content ownership, fields, retention/privacy requirements, relationships, and active target database.
- **Approach:** Model real workflows first; use reversible additive migrations, explicit relationships, constraints, and indexes; never reuse sample fixtures as real offers.
- **Acceptance criteria:** Schema reflects approved requirements, migrations work both up/down on an isolated database, data access is authorized, and tests cover important constraints/relationships.
- **Status:** `[ ]` Not started for travel-domain data. Current migrations are Laravel starter tables only.
- **Verification:** Migration files were inspected; active database migration state was not checked.
- **Blockers/decisions:** No approved content model; runtime database and retention policy are **Not yet verified**.

### 6. Filament administration

- **Objective:** Provide staff-only management for approved content and, if agreed, enquiries/quotations.
- **Components/files:** Planned Composer dependency, `app/Filament/`, panel provider/configuration, policies, and any roles/permissions implementation.
- **Dependencies:** Filament version compatible with Laravel 13, administrator/staff role model, account provisioning, and data scope.
- **Approach:** Add a protected panel inside the Laravel application; authorize each operation; expose only approved resources; keep public Blade and admin UI boundaries clear.
- **Acceptance criteria:** No public registration; authenticated staff access; least privilege; policies tested; production-safe initial admin creation and recovery documented.
- **Status:** `[ ]` Not started; Filament is not installed.
- **Verification:** Composer package inventory and routes/config were inspected; there is no Filament panel/resource.
- **Blockers/decisions:** Filament compatibility/version and staff roles/access policy are **Not yet verified**.

### 7. Customer enquiries and quotations

- **Objective:** Collect travel requirements and support a staff-led consultation and quotation process.
- **Components/files:** Planned public form/view, named routes, Form Request, controller/action as warranted, enquiry/quotation migrations and models, notifications, and admin resources.
- **Dependencies:** Approved enquiry fields, consent/privacy/retention terms, staff workflow/statuses, notification destination, and Phase 5/6 decisions.
- **Approach:** Validate and rate-limit submissions; store only necessary personal data; staff confirm availability, price, inclusions, and terms before sending a quotation; record follow-up safely.
- **Acceptance criteria:** Valid enquiry is stored once, errors are usable, spam controls are active, unauthorized users cannot read/update records, notifications do not expose personal data, and enquiry never auto-books or charges.
- **Status:** `[ ]` Not started; there are no enquiry or quotation routes, models, or tables.
- **Verification:** Not run; workflow is absent.
- **Blockers/decisions:** Field set, notification channel, consent/retention, quotation lifecycle, and staff permissions are **Not yet verified**.

### 8. Testing, optimization, and security

- **Objective:** Verify site behavior, accessibility, performance, and security before release.
- **Components/files:** `tests/`, `phpunit.xml`, Pint, Vite build, relevant application views/routes/policies, and future CI configuration.
- **Dependencies:** Implemented pages/workflows and agreed browsers, accessibility/performance targets, and threat/privacy requirements.
- **Approach:** Add focused Laravel feature/unit tests per behavior; run Pint check and frontend build; test mobile, keyboard, validation, authz, rate limits, and asset loading; optimize images and noncritical JS.
- **Acceptance criteria:** Relevant tests and quality checks pass; no known high-risk authorization/privacy issue; key page performance/accessibility checks meet agreed targets.
- **Status:** `[ ]` Not started for project-specific quality work. Existing tests are Laravel examples only.
- **Verification:** `phpunit.xml`, example tests, Pint availability, and npm scripts were inspected; the suite/build were not run during this audit.
- **Blockers/decisions:** No CI, JS/CSS lint, frontend tests, or numeric performance/accessibility targets are configured.

### 9. Production deployment

- **Objective:** Operate the approved application securely with repeatable releases, backups, and recovery.
- **Components/files:** Deployment platform/configuration, environment/secrets setup, web server, database, queue/scheduler if needed, health checks, logs, and backup runbook.
- **Dependencies:** Approved host, domain/TLS, runtime/database, mail provider, storage, traffic/data needs, and recovery objectives.
- **Approach:** Choose deployment model first; document environment variables by name only; define build/release, migration, rollback, backup/restore, and incident procedures.
- **Acceptance criteria:** A documented deployment succeeds in a staging environment; secrets are managed outside source; backups restore; health and rollback procedures are verified.
- **Status:** `[ ]` Not started; no deployment configuration was found.
- **Verification:** No CI, Docker/compose, or host-specific deployment files were found; no deploy/backup was attempted.
- **Blockers/decisions:** Hosting provider, production database, domain, email, storage, and recovery policy are **Not yet verified**.

### 10. Future travel-management functionality

- **Objective:** Consider larger operational capabilities only after the website and quotation workflow are stable and business requirements are approved.
- **Components/files:** To be determined from approved future requirements; do not add speculative models or routes now.
- **Dependencies:** A separate business case, process maps, supplier/inventory integrations, regulatory/payment requirements, and security review.
- **Approach:** Scope each capability independently; prefer a documented ADR and phased implementation; keep manual staff confirmation until an automation is explicitly approved.
- **Acceptance criteria:** Each feature has approved scope, data/security model, operational owner, test plan, and measurable acceptance criteria before coding.
- **Status:** `[ ]` Deferred; booking, live availability, ticketing, and payment are outside the current scope.
- **Verification:** Not applicable; no such feature is implemented.
- **Blockers/decisions:** No approved requirements or integration agreements.

## Current Development State

### Verified checks

- [x] Laravel 13.39.0 scaffold, Composer lock, starter migrations, and default test structure audited.
- [x] The root and converted page routes rendered through the shared shell during the prior integration smoke check, with expected 200/404 statuses. `php artisan view:cache` passed after the latest homepage destination-carousel update. HTTP smoke responses and browser rendering have not been repeated since recent content changes. The existing test suite previously passed (2 tests, 2 assertions) and was not rerun for this image pass.
- [x] All 208 unique local asset paths currently referenced by Blade views exist under `public/` and are emitted through `asset()`; copied `main.js` is source-derived with the requested context-menu blocker and style-switcher handlers removed.
- [x] Documentation index, roadmap, architecture/database/frontend/development/testing guides, and ADR are present; local links and project commands were checked.
- [x] Studied the supplied Company Profile/FAQ, Tourm `index.html`, selected homepage, alternate homepage examples, and the pictured booking/package section; recorded the landing-page hierarchy in [LANDING-PAGE-PLAN.md](LANDING-PAGE-PLAN.md).
- [-] Adapted non-search homepage sections using Tourm components and profile-supported content: hero, introduction, services, the seven-stage How We Deliver process, Why Choose points, A&PM value points, and final enquiry CTA. Selected new downloadable photos for Home hero, About, service, process, Why Choose, and final CTA sections; retained profile destination art where individual locations are not verified. The separate destination section below Services remains removed at the owner’s direction; the `/destination` page remains available. Kept the Trip Finder form as-is and repurposed its adjacent carousel with 10 profile destinations and extracted images; removed demo prices and “Book Now” links. Static structure, process order, stage-copy and asset checks passed; browser and owner review are pending.
- [-] Adapted About with profile-supported identity, mission/vision/purpose, and core values; removed the separate planning-process section at the owner’s direction; the seven Core Values use Tourm’s `feature-area` card structure from `home-resort.html` with A&PM colors and value-specific icons. Removed the Tourm demo staff and testimonial sections. The page-title banner and final Tourm brand/gallery sections are removed; the introduction photos use selected downloadable images. Blade compilation and static structure/route/asset checks passed; browser and owner review are pending.
- [-] Adapted the `/service` overview with the eight Company Profile service descriptions using Tourm `destination-item` cards. Four relevant downloads replace profile art for safari, transport, destination planning, and cultural experiences; four better-fitting profile illustrations remain. Removed unsupported package, hotel, transport-inventory, review, and price examples. Blade compilation, Contact route lookup, and service-image checks passed; browser and owner review are pending. `service-details` remains a Tourm demo.
- [x] Compared Bonfire Adventures, SafariBookings, Pollman's, Zawame, Safarizuru, Go2Africa, and Holiday Kenya patterns; documented a planned A&PM trip-search/results/quotation flow in [SEARCH-AND-TRIP-FINDER-RESEARCH.md](SEARCH-AND-TRIP-FINDER-RESEARCH.md). Search remains unimplemented because the repository has no approved journey catalogue or search backend.
- [x] Reviewed the approved A&PM logo and company-document styling. Recorded normalized forest green, gold/amber, and warm neutral working tokens in [FRONTEND.md](FRONTEND.md) and [LANDING-PAGE-PLAN.md](LANDING-PAGE-PLAN.md); applied the palette in the separate A&PM stylesheet. Formal responsive visual review remains pending.

These checks do not mean the A&PM homepage or About page is approved for production or that the travel database, admin, or enquiry workflow is complete.

### In progress

- [-] Multi-page Tourm-to-Blade integration awaits browser comparison against source pages and interaction review. Phase 1 remains partial; clean setup, frontend build, and migration verification are outstanding.

### Next recommended tasks

1. Review the adapted Home, About, and Services copy and imagery at mobile and desktop widths; confirm the content before treating these pages as approved.
2. Decide the Trip Finder catalogue, filter taxonomy, pricing display, and no-results path using [SEARCH-AND-TRIP-FINDER-RESEARCH.md](SEARCH-AND-TRIP-FINDER-RESEARCH.md) before implementing search.
3. Approve A&PM content for Activities and other pages before adding teasers; confirm enquiry fields, staff follow-up, hosting/database expectations, and policy drafts before public launch or workflow/schema code.

### Known issues and unresolved decisions

- `.git` is an empty directory in the supplied workspace, so status, branch, and normal Git diff are unavailable. Do not assume the checkout is clean.
- No npm lockfile exists; dependency resolutions are not pinned.
- The broader A&PM brand kit, approved public-page copy, travel-domain schema, enquiry flow, Filament panel, and deployment configuration are absent. The approved logo is integrated as transparent header/footer variants. Tourm source markup is present in Blade. The homepage search widget remains demo content with an external form action, while other copied inner pages may retain placeholders. Home, About, and Services content and selected imagery still need owner and browser review; the Service Details page remains a Tourm demo. Legal pages use supplied draft documents and need owner sign-off.
- Active runtime database driver, admin role model, enquiry notification/retention policy, frontend framework transition, and hosting target are **Not yet verified**.

### Deferred

Live booking, inventory/availability, ticketing, payment processing, and broader travel-management functionality remain deferred until separately approved and designed.
