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

Stakeholder feedback received on 2026-11-04 is mapped to files, acceptance criteria, and unresolved visual decisions in [STAKEHOLDER-REVIEW-PLAN.md](STAKEHOLDER-REVIEW-PLAN.md). The owner approved the plan on 2026-11-04. Shared footer/header, Contact, legal corrections, and slide-out panel changes are implemented; Blade compilation, the existing two tests, and nine route/render checks passed. Browser visual/interaction checks and final stakeholder acceptance remain pending.

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

### Footer visual revision — 2026-11-04

The owner superseded the white-footer treatment with a green footer and a white background around only the logo. Light text/icons and the white animated plane provide contrast. Approved contact/social content is retained. The change is implemented in scoped brand CSS; browser visual acceptance remains pending.

### Shared header consistency — 2026-11-04

All routed pages now use the same A&PM header and footer through `layouts/app.blade.php`. Removed the route-dependent `header-layout1` branch, including its demo top bar and sign-in controls. FAQ, Terms, Privacy, and Cookies inherit the same header used by Home, About, and Contact. Page bodies are unchanged. Blade compilation, existing tests, and rendered header/footer consistency checks pass; browser visual review remains pending.

### Source-document proofreading — 2026-11-04

FAQ now presents all 69 supplied questions using the existing accordion, grouped into 11 topics; the unrelated property FAQ/demo form is removed. FAQ flight-service answers and About retain the profile’s planned qualification, and FAQ social handles follow the approved correction. Shared metadata now identifies A&PM. All source policy paragraphs match the rendered documents after approved date/email substitutions. Blade compilation, the two existing tests, source-parity and request checks passed; browser/owner review and deployment remain pending. See [CONTENT-SOURCE-AUDIT.md](CONTENT-SOURCE-AUDIT.md) for remaining demo pages and document precedence.

FAQ visual adjustment: removed the opening breadcrumb/banner and promoted the retained introduction heading to H1. Question content and approved revisions are unchanged. Blade compilation and FAQ render/content checks passed.

### Blog/Gallery content and navigation — 2026-11-04

Implemented shared Blog and Gallery header links and removed their former footer links. Blog now presents three profile-based travel-guidance articles with clean individual routes and a reusable article wrapper. The legacy detail URL redirects to the planning guide. Gallery presents nine existing illustrative photographs with captions and Tourm lightbox controls. Demo posts, author/date claims and fake pagination are removed from these pages. Blade compilation, existing tests and five-page HTTP/link/image checks pass; browser and owner acceptance and deployment remain pending.

### Approved stakeholder photographs and labels — 2026-11-06

- [-] Implemented the approved six-photo placement plan: replace the buildings hero slide, update safari/transport service photos and Nairobi cards, and add two gallery photos. Shared contact/social rows omit redundant visible labels while preserving accessible names, handles and contact actions. See [FRONTEND.md](FRONTEND.md#approved-photo-and-label-revisions--2026-11-06) for the source-to-placement map.
- Verified: Blade compilation; existing suite (2 tests, 2 assertions); HTTP 200 for Home, Destinations, Services, Gallery, Contact and FAQ using isolated array sessions/cache; image file/dimension checks; whitespace diff check.
- Pending: browser review of mobile email wrapping, hero text contrast, image crops and gallery lightbox. No production release performed for these revisions.

Owner follow-up: all six newly supplied photographs now appear in Gallery (15 images total), each with descriptive alt text and the existing lightbox link. Blade compilation and checks for all six image references and 15 lightbox entries passed; browser visual review remains pending.

Home image selection correction: reverted the latest first-slide and Who We Are replacements at the owner’s request. Await explicit selection from the six new photos; all six remain in Gallery. Blade compilation passed after restoring the prior references.

Owner selected photo 2 (yellow safari vehicles) for the second Home slider image, replacing the sunset safari photograph. Updated Home and frontend documentation; Blade compilation and diff checks passed. Browser visual review remains pending.

Owner selected photo 5 (giraffe beside white safari van) for the main Home Who We Are image. Updated image reference, alt text and dimensions; Blade compilation and diff checks passed. Visual acceptance remains pending.

### Approved footer hierarchy and header alignment — 2026-11-09

- [-] Implemented the approved compact footer: smaller white-backed logo, explicit responsive columns, intact social handles, and a separate copyright/policy bottom bar. Explore reuses the header/mobile navigation partial with Home, About Us, Destinations, Services, Blog, Gallery and Contact. Removed footer promotion of demo Activities/Tours; FAQ remains in contact details. This supersedes the earlier Blog/Gallery footer exclusion.
- Passed Blade compilation, existing suite (2 tests, 2 assertions), whitespace checks and temporary 11-page HTTP/render checks for navigation parity and separate policies using array sessions/cache.
- Pending: browser review of responsive layout, wrapping, keyboard focus and animation. No frontend build or deployment performed. See FRONTEND.md for implementation details.

Owner correction — 2026-11-09: the shared postal-address row now uses the existing Font Awesome location-pin icon (`fa-map-marker-alt`) in the footer and contact panel, superseding the earlier envelope-icon direction. Email retains its envelope. Blade compilation and whitespace checks passed; browser review remains pending.

### Floating WhatsApp contact — 2026-11-09

- [-] Added the approved floating WhatsApp link beside scroll-to-top using 0788799517 in international link format. Removed the footer's WhatsApp action while retaining its call link; other contact locations retain existing actions. Converted scroll-to-top into a labeled button and added scoped safe-area/focus styles.
- Passed Blade compilation, existing suite (2 tests, 2 assertions), 11-page render checks, JS syntax and whitespace checks. Browser placement/interaction and WhatsApp handoff remain pending; no build or deployment performed. See FRONTEND.md.

Owner positioning revision — 2026-11-09: WhatsApp is now the rightmost floating control, with scroll-to-top 12px to its left. Desktop/mobile safe-area offsets are preserved. CSS offset inspection and whitespace checks passed; browser verification remains pending.

### Contact form planning — 2026-11-09

- [x] Located and inspected original Tourm `contact.html` and its form handler against the current Contact page. Recorded a source-derived Laravel form proposal in [CONTACT-FORM-PLAN.md](CONTACT-FORM-PLAN.md).
- [ ] Confirm fields, privacy wording and email-only versus durable storage; implement form and verify actual delivery to both approved Gmail recipients. Cloudflare screenshots show sending enabled/DNS configured; private credentials and real SMTP delivery remain unverified. No form/backend implementation, SMTP test or deployment performed during planning.

### Approved contact form implementation — 2026-11-09

- [-] Implemented the approved Tourm source-derived contact form with full name, email, optional phone, enquiry type and message. Added local POST route, Form Request, honeypot, 5-per-minute/IP limiter, synchronous SMTP mailable, escaped notification, configured dual recipients and visitor Reply-To. Form feedback retains input on validation/delivery failures; no database persistence, queue or automatic customer acknowledgement.
- Passed focused contact suite (24 checks/127 assertions), full suite (26 tests/129 assertions), Pint on affected PHP, Blade compilation and whitespace checks.
- Pending: private SMTP and recipient environment configuration, actual delivery to both inboxes, browser acceptance and separately approved deployment. No live email, credential inspection, migration or frontend build performed. See CONTACT-FORM-PLAN.md.

### Live SMTP verification — 2026-11-09

At the owner's request, runtime configuration was checked without printing credentials or environment values. Host, port, implicit TLS, literal username, token presence, lack of MAIL_URL override, approved sender and exact two-recipient list all passed. Configuration was not cached. The first sandboxed connection was blocked by networking; the approved network-enabled retry authenticated and Cloudflare SMTP accepted one synthetic ContactEnquiry notification addressed to both approved staff inboxes. The notification body explicitly identifies it as a test with no travel arrangements requested.

This verifies SMTP authentication/submission, not final inbox delivery or real-browser submission. Owner confirmation from both inboxes, Reply-To handling and browser acceptance remain pending. No production deployment performed; no credentials printed or committed. Earlier statements that no live SMTP test has occurred are superseded by this result.

## Approved visitor acknowledgement — 2026-11-09

The owner requested an automatic acknowledgement and authorized a live test to their supplied Gmail address. This supersedes the earlier exclusion of customer acknowledgement. After the staff notification is accepted by SMTP, ContactEnquiryController sends ContactAcknowledgement separately to the validated visitor email. Its HTML/plain-text message uses a fixed subject and company text, confirms the enquiry process without confirming a booking or promising a response time, and allows replies to the configured A&PM sender. It does not repeat submitted message content or disclose staff recipients. Existing CSRF, validation, honeypot and rate limiting remain. The form privacy notice mentions the acknowledgement.

If staff delivery fails, no acknowledgement is attempted. If only the acknowledgement fails, the page retains staff-submission success and warns that the visitor need not resubmit. Logs contain only generic text and the exception class. No persistence or automatic retry was added.

Verification: focused contact suite 27 checks/148 assertions; full suite 29 tests/150 assertions; formatting, Blade compilation and whitespace checks passed. A real local HTTP-kernel GET/POST test retained the session cookie and CSRF token and used isolated array sessions/cache with actual SMTP. Both the staff notification and visitor acknowledgement were accepted by Cloudflare, with no form errors. Final inbox delivery and visual browser review remain pending. No production deployment performed.

The first real attempt failed before staff notification acceptance because the default PHP SMTP connection reported network unreachable. A credential-free OpenSSL TLS handshake passed, and an IPv4-bound PHP authentication probe passed. Added optional MAIL_SOURCE_IP configuration; the private local environment and nonsecret example use `0.0.0.0` to bind IPv4. Hostname/certificate checks remain enabled. The successful live form test used that setting. This is a local network fix; confirm appropriate source binding/connectivity on the deployment host. No token or other credential values were printed or recorded.

### Contact opening section removed — 2026-11-09

At the owner’s request, removed the Contact page’s opening Get In Touch introduction and four telephone/email/website/social cards shown in their screenshot. The page now starts with the existing How We Deliver content and enquiry form. Promoted its retained heading to H1 to preserve the page heading hierarchy. Shared contact details, footer, floating controls, form delivery and acknowledgement remain unchanged. Blade compilation, focused contact tests and whitespace checks passed; browser visual review remains pending.

### Contact form visual research — 2026-11-09

- [x] Reviewed the current screenshot/code and original Tourm contact form against public form-usability/accessibility guidance and travel enquiry examples. Findings and a proposed compact, readable layout are recorded in CONTACT-FORM-DESIGN-REVIEW.md.
- [ ] Implement and browser-verify the revised visual direction after owner confirmation. No application code, credentials, delivery flow or live email changed in this research task.

### Approved contact visual revision — 2026-11-09

Implemented the approved review in CONTACT-FORM-DESIGN-REVIEW.md: warm-neutral background instead of the full-section photo, compact top-aligned introduction and three process steps, wider form in a 4/8 desktop grid, smaller typography, 50px controls, shorter hints and full-width mobile submit. Modified Contact view, enquiry partial and scoped brand CSS; backend validation, staff mail and acknowledgement are unchanged. Passed focused contact tests (27 checks/148 assertions), Blade compilation, static markup checks, 11-page navigation/render checks and whitespace review. Inspected temporary Firefox snapshots at 1440/768/375px using local assets, hidden preloader and fallback/local fonts; live typography, keyboard/zoom/feedback states and final owner acceptance remain pending. No real emails, build or deployment performed for this visual task.

### Footer row alignment and website removal — 2026-11-09

Corrected inherited Tourm offsets: Explore arrows now participate in flex layout rather than using a fixed top offset; links occupy their column width so About Us does not wrap unnecessarily. Footer navigation/contact/social lists use 40px minimum rows and 12px gaps. Contact details reset the inherited negative margin, align with centred icon circles and retain natural multi-line address height. At the owner's request, the footer passes `showWebsite => false` to omit its redundant website row; the shared contact panel keeps its existing website entry by default.

Passed Blade compilation, 11-page HTTP/navigation checks, footer content checks and whitespace review. Inspected a 1440px Firefox footer-only rendered snapshot using local assets/fallback fonts; arrow and icon/text alignment looked consistent. Live responsive/interaction acceptance remains pending. No backend tests, build or real emails were run for this presentation change.

### Production release — 2026-11-09

Owner explicitly authorized pushing to GitHub and deploying over Contabo SSH. Pushed application commit `afc5c35`, backed up the existing server checkout/private configuration, configured approved production SMTP securely, fast-forwarded the live checkout, regenerated optimized autoload/config/route/view caches and gracefully reloaded PHP-FPM. The site is live. No dependency upgrades, frontend build or database migrations were required. Existing server-only artisan mode change was preserved.

Verified locally: 29 tests/150 assertions, Pint, Blade compilation, whitespace. Verified live: 11 public pages HTTP 200; origin/public versioned stylesheet HTTP 200; expected form, footer and floating-control markup; one real public HTTPS enquiry with cookies/CSRF returned staff success and no acknowledgement-failure notice. SMTP accepted both staff notification and owner-authorized visitor acknowledgement. Inbox arrival and full interactive/owner acceptance remain pending. See DEPLOYMENT.md for target, root-private backup, procedure and remaining limitations. Earlier deployment-absent statements are superseded.

## Sole staff recipient — 2026-11-10

The owner changed the contact form's staff-notification recipient to `reservations@apmtours.com` only. Local private configuration and `.env.example` now use that single address; tests assert one staff recipient and exclude the two former direct Gmail recipients. Visitor acknowledgement and visitor Reply-To remain unchanged. The owner's current Cloudflare routing screenshot shows reservations forwarding to the company Gmail inbox, so that inbox still receives forwarded enquiries; the website no longer addresses either Gmail directly. Cloudflare rules were not changed. This supersedes earlier dual-recipient instructions.

Verification for the recipient change: focused contact suite passed (27 checks/148 assertions), Pint and whitespace checks passed. Applied the single-recipient production setting after a root-private environment backup at `/var/backups/apm-tours/20261110T190948Z-recipient-change`, rebuilt configuration as www-data, and verified the exact runtime recipient array, production mode, disabled debug and cached config. Origin Contact returned HTTP 200. No code deployment, Git commit/push, Cloudflare rule change or real email test was performed for this configuration change.

### Contact abuse protection — 2026-11-10

Implemented locally: fail-closed server-verified Turnstile with hostname/action/replay checks, 5/minute and 20/hour IP limits, 3/hour normalized-email limit, ten-minute duplicate suppression and one acknowledgement attempt/email/hour. Existing CSRF, validation and honeypot remain; fixed mail routing and no reflected customer content in acknowledgements reduce relay abuse. Full suite passed (48 tests/269 assertions), along with formatting, Blade compilation and whitespace checks. Current Turnstile site/secret keys are absent; local submission is intentionally unavailable until configured. No new live code, Git push, real mail test or Cloudflare rule change was performed. See CONTACT-SPAM-PROTECTION.md for setup, proxy/cache requirements, limits and incoming-routing boundaries.

### Local Turnstile key/rejection verification — 2026-11-10

Local keys are now present and verification enabled (safe boolean checks only). The configured real Siteverify endpoint rejected an intentionally invalid token with HTTP 200 and invalid-input-response, without reporting a secret-key error. Local form rendering and missing/forged-token rejection passed with no emails sent. Full suite still passes (48 tests/269 assertions), with formatting/Blade/whitespace checks. Local server started at localhost:8000. Genuine browser challenge completion and successful mail submission remain pending, as does production rollout. See CONTACT-SPAM-PROTECTION.md.

### Verification heading removed — 2026-11-10

At the owner’s request, removed the redundant visible “Spam protection” heading above Turnstile. The widget retains its built-in status, privacy/help links and accessible feedback. Verification, rate limits and failure messages are unchanged; appearance remains the default always-visible mode. Blade compilation, focused protection tests and whitespace checks passed. No deployment or real email test performed.

### Approved screenshot follow-up and destination search — 2026-11-10

The owner clarified that both search controls must search the existing destinations. Implemented validated GET keyword/region filtering of existing highlights through DestinationController and shared config, including result counts, reset and no-results contact guidance. Home now offers Kenya/Uganda/Tanzania/Zanzibar, durations 1–14 days, and submits to Destinations instead of external demo mail. Travel-style/duration preferences are preserved into a prefilled Contact enquiry, not treated as unverified availability filters. Replaced Home's Pre-Travel Support thumbnail with an imagegen plate-redacted WebP derivative; all active WhatsApp links already match the supplied URL. Full suite passes (55 tests/337 assertions), with Pint, Blade and whitespace checks. See STAKEHOLDER-FOLLOWUP-2026-11-10.md for scope and image-edit provenance. Production rollout authorized; final live checks recorded separately.

### Final pre-release checks — 2026-11-10

Production inspection found no Apache RemoteIP handling. Added Laravel trust for Cloudflare's published IPv4/IPv6 CIDRs in bootstrap/cloudflare-proxies.php, verified against their official endpoints on this date; only X-Forwarded-For and X-Forwarded-Proto are trusted from those ranges. Direct callers cannot supply trusted proxy headers. Two additional request tests prove per-visitor limiting behind a trusted edge and resistance to forged headers from an untrusted caller. Review provider CIDRs on future releases. This supersedes the earlier statement that proxy handling was not changed. Final local suite: 57 tests/362 assertions, all passing; formatting, Blade compilation and whitespace also pass. No new real emails sent for this release preparation.
