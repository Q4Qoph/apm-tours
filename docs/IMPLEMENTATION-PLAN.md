# A&PM Website Implementation Plan

**Status:** The owner has directed a source-faithful copy of the selected Tourm page set with minimal Laravel adaptation, a flat header navigation, and FAQ/legal links in the footer. Current implementation status is tracked in [IMPLEMENTATION.md](IMPLEMENTATION.md); this plan does not approve unrelated redesign or booking features.

This plan uses the supplied business documents and the current Laravel repository and Tourm HTML directory. Keep actual progress and verification in [IMPLEMENTATION.md](IMPLEMENTATION.md).

## 1. Project outcome

Build an A&PM Tours & Travel marketing and enquiry website on the existing Laravel application. Reuse the Tourm Bootstrap design and shared page elements across the selected public pages. The site should help customers understand A&PM's services, destinations and terms, then contact the team for consultation and a quotation.

The website is not a live travel inventory or instant booking, ticketing or payment platform. A&PM staff confirm suitability, supplier availability, prices, inclusions and booking terms. A travel enquiry alone does not create a booking.

## 2. Business source material reviewed

| Document | Information to use | Version/date stated in source |
| --- | --- | --- |
| Company Profile | Legal/brand names, service catalogue, destinations, audiences, service philosophy, enquiry-to-trip workflow, contact channels and brand promise. | `v1` |
| Website FAQs | 69 questions covering services, customers, planning, quotations, destinations, corporate/group travel, safety, responsible travel and contact. | `v0` |
| Terms & Conditions | Website and travel-service terms; enquiries and confirmation; pricing, payments, changes, cancellations/refunds; suppliers; safety; complaints; privacy; governing law. | `1.0`, effective 1 November 2026 |
| Privacy Policy | Data collection and use, travel suppliers, sensitive data, cross-border transfers, retention, security, rights, minors and complaints. | Effective 1 November 2026 |
| Cookies Policy | Necessary and optional cookie categories, consent, preferences, analytics/marketing, retention and third parties. | Effective 1 November 2026 |

The company profile lists safaris and holiday packages, accommodation, private/group transport, guide coordination, flight ticketing and travel agency services, destination management, corporate travel and tailor-made experiences. It identifies Kenya destinations and East African itineraries, with travel support beyond the region. Audiences include leisure travellers, couples/families, diaspora travellers, groups, educational/special-interest travellers, corporate clients and international travel agents/operators.

The stated operating flow is enquiry and consultation → itinerary design → written quotation and booking terms/payment schedule → client confirmation and required payment → supplier reservations → pre-travel support → journey coordination → post-trip follow-up. The Terms define confirmation as requiring A&PM acceptance, cleared required payment and written confirmation. Availability is not guaranteed by an enquiry or an unconfirmed quotation.

Use facts and wording from these supplied documents as the content source. Do not invent package prices, availability, customer testimonials, destinations, supplier relationships or guarantees. Confirm that the legal/privacy documents and their stated effective dates are the versions intended for public release; do not silently rewrite legal terms during page conversion.

## 3. Repository and Tourm findings

- The Laravel application maps `/` and clean page paths to shared-shell Blade views in `resources/views/pages/`; previous source `.html` URLs permanently redirect to clean paths.
- `resources/views/layouts/app.blade.php` and shared partials in `resources/views/partials/` provide the document shell, common overlays/scripts, variant-aware header, shared desktop/mobile navigation, and footer. The Home and Pages demo dropdowns are removed; source submenus for Destination, Service, Activities, and Blog remain. Static policy views are in `resources/views/pages/legal/`.
- The Tourm demo folder contains 48 HTML files. Eighteen are homepage/demo variants including `index.html`; the selected design is `home-travel-agency.html`. Do not convert every homepage demo into an A&PM page.
- The source folder has **no standalone header, footer or component partial files**. Each HTML page embeds its own markup.
- The most reusable source header is `header-layout1`, present on 29 files (28 have the same normalized markup). The selected Travel Agency homepage uses a distinct `header-layout8`. Keep the Home source appearance; About now shares that variant by owner direction, while other inner pages retain `header-layout1`.
- `footer-layout2` appears on 34 files, with a common normalized structure on 31. The current Blade footer is based on this family.
- Repeated preloader, mobile menu, side menu, search overlay and scroll-to-top markup also appears in page files. Move only the pieces confirmed as global into the Laravel shell.
- Across the source files, 110 forms point to the template's external `mail.php`, 56 have no explicit action and 50 use `action="#"`. None should be assumed to submit to Laravel.
- Three files are empty (`+256214203215.html`, `home-traveler.html`, `shop-detailis.html`); `team.html` and `team-details.html` are short 404 pages. Treat these as incomplete source material, not pages to convert.
- No Tourm HTML pages for Terms, Privacy or Cookies were found. Those pages need a simple shared legal-page presentation using the supplied document text.

The actual framework, commands and current verified progress remain documented in [AGENTS.md](../AGENTS.md), [ARCHITECTURE.md](ARCHITECTURE.md), [FRONTEND.md](FRONTEND.md) and [TESTING.md](TESTING.md).

## 4. Directed page map

This is the recommended first sitemap. Source/demo content must be reconciled to the supplied A&PM material before publication.

| Page | Tourm source | A&PM content source | Current status |
| --- | --- | --- | --- |
| Home | `home-travel-agency.html` | Company Profile, services/destinations and consultation flow | Copied into Blade; preserve selected source design. |
| About | `about.html` | Company Profile: identity, purpose, mission, values, service philosophy | Copied into Blade; source Tourm copy remains pending replacement. |
| Services and service detail | `service.html`, `service-details.html` | Company Profile service list | Both source layouts copied; content review remains. |
| Activities and activity detail | `activities.html`, `activities-details.html` | Company Profile and itinerary/experience facts | Both source layouts copied at the owner's direction; content review remains. |
| Destinations and destination detail | `destination.html`, `destination-details.html` | Company Profile destinations | Both source layouts copied; no live availability or prices are established. |
| Tours and tour detail | `tour.html`, `tour-details.html` | Company Profile and FAQs | Both source layouts copied; demo offers/prices remain unapproved placeholders. |
| FAQs | `faq.html` | Website FAQs document | Tourm FAQ page copied; whether and how to publish the 69 supplied FAQ answers remains open. |
| Contact / enquiry | `contact.html` | Company Profile contact channels and approved enquiry fields | Source layout copied; its form is not connected to Laravel. |
| Blog and blog detail | `blog.html`, `blog-details.html` | Future approved editorial content | Both source layouts copied at the owner's direction; all current posts are Tourm demo content. |
| Gallery | `gallery.html` | Approved A&PM travel images | Source layout copied; images/content remain unapproved demo material. |
| Error | `error.html` | N/A | Source page copied; used for `/error` and the 404 fallback. |
| Terms | New Blade page; no source HTML counterpart | Terms & Conditions document | Static view copied from supplied DOCX; approval before publication remains open. |
| Privacy | New Blade page; no source HTML counterpart | Privacy Policy document | Static view copied from supplied DOCX; approval before publication remains open. |
| Cookies | New Blade page; no source HTML counterpart | Cookies Policy document | Static view copied from supplied DOCX; approval and live consent behavior remain open. |

**Not part of this copy pass:** Resort listings/details, team/guide profiles, commerce (`shop`, `cart`, `checkout`, `wishlist`), account/login, and unused homepage demos. They need real content, user flows or business data that the supplied materials do not establish. A Tourm layout alone is not evidence that A&PM offers that feature.

## 5. Shared component plan

### Existing reusable starting points

- `resources/views/layouts/app.blade.php` — current document shell and shared asset loading.
- `resources/views/partials/site-header.blade.php` — source-derived `header-layout8` and `header-layout1` variants; both share `partials/site-nav-items.blade.php`.
- `resources/views/partials/template-before-header.blade.php` and `template-after-footer.blade.php` — repeated Tourm global overlays and scripts, extracted once for the shared shell.
- `resources/views/partials/site-footer.blade.php` — current source-derived footer.
- `public/assets/img/brand/apm-header-logo.png` and `apm-footer-logo.png` — current transparent A&PM logo variants.

The source header differences are handled through a variant in one shared partial. Do not copy either header or the mobile navigation into individual pages.

### Proposed shared building blocks

1. **Application layout:** Keep one `layouts/app.blade.php` for document metadata, Tourm CSS/JS assets and dependency order. Page views provide title/description and content sections. Load assets once.
2. **Site header:** Implemented as one partial with `header-layout8` on Home and About and `header-layout1` on other inner pages. Desktop and mobile use one shared route list. The Home mega-menu and Pages dropdown are removed; destination, service, activity, and blog detail submenus remain. Further visual changes require owner direction.
3. **Site footer:** Implemented as one `footer-layout2` partial; its demo newsletter strip is omitted on Home and About. FAQ, Terms, Privacy, and Cookies link from the footer; Tourm placeholder contact/social/content remains pending an approved content pass.
4. **Global template elements:** Repeated preloader, mobile navigation, side-menu/search overlay, scroll-to-top, account modal, and Tourm scripts are reused through the shared shell. Login/register and newsletter forms still use template markup and are not Laravel workflows.
5. **Inner-page banner/breadcrumb:** Reuse the common title/breadcrumb block on approved informational pages, with page-specific title and breadcrumb values.
6. **FAQ item:** Reuse the Tourm accordion structure for FAQs; keep the supplied question/answer text as data or explicit view content, not duplicated markup.
7. **Service/destination cards:** Componentize only repeated cards that have the same real A&PM fields. Keep decorative one-off sections in the page view; do not create a component for every HTML fragment.
8. **Legal pages:** Use one readable legal-page wrapper for Terms, Privacy and Cookies, with separate static content views and effective-date metadata. Keep line breaks, headings, lists and tables from the source documents legible and accessible.

Current Blade locations (add new components only when they remove real duplication):

```text
resources/views/layouts/app.blade.php
resources/views/partials/site-header.blade.php
resources/views/partials/site-nav-items.blade.php
resources/views/partials/site-footer.blade.php
resources/views/partials/template-before-header.blade.php
resources/views/partials/template-after-footer.blade.php
resources/views/components/legal-document.blade.php
resources/views/pages/{home,about,service,service-details,activities,activities-details,destination,destination-details,tour,tour-details,faq,contact,blog,blog-details,gallery,error}.blade.php
resources/views/pages/legal/{terms,privacy,cookies}.blade.php
```

The layout, source variants, and legal wrapper are shared. Keep page-specific body markup in its page view and avoid creating components for one-off HTML fragments.

## 6. Implementation phases and acceptance checks

Task status reflects the current repository and owner direction; detailed verification remains in [IMPLEMENTATION.md](IMPLEMENTATION.md).

### Phase 0 — Confirm scope and content

- [x] Owner directed source-copy scope for Home, About, Services/details, Activities/details, Destinations/details, Tours/details, FAQ, Contact, Blog/details, Gallery, Error, Terms, Privacy, and Cookies.
- [ ] Confirm which FAQ questions are approved for public launch and how they should be grouped.
- [ ] Confirm the supplied legal document versions/effective dates are ready to publish.
- [ ] Confirm enquiry fields, consent wording, staff recipient/follow-up channel and retention expectations before implementing a form.

**Acceptance:** A page list and content source are agreed; unresolved information is explicitly marked, not filled with invented claims.

### Phase 1 — Shared Blade shell and components

- [x] Audit the source page shell and preserve Tourm asset/script order.
- [x] Build the reusable header with homepage and inner-page variants and one shared desktop/mobile navigation list; remove only the Home and Pages dropdowns.
- [-] Build the shared footer and route legal links; replace placeholder contact/navigation details only after business information is approved.
- [-] Move repeated global overlays/scripts into shared partials; demo account/newsletter forms remain source markup.
- [x] Add named clean Laravel routes for copied pages, update converted page links, and permanently redirect previous `.html` URLs. Static route/link checks passed; browser verification remains outstanding.

**Acceptance:** Every approved page uses the same shared layout and footer; header variants render correctly; repeated markup has one source; local assets resolve with `asset()`; Tourm plugin order and page appearance remain intact.

### Phase 2 — Public information pages

- [-] Copy the selected source pages, including About, Services/details, Destinations/details, FAQs, Contact, Safaris/Tours, Activities, Blog, Gallery, and Error, into Blade views with minimal local asset and shell changes.
- [ ] Map copied sections to approved Company Profile/FAQ facts; replace Tourm copy and demo offers only when the owner requests the content pass.
- [x] Include Activities, Tours, Blog, Gallery, and Error layouts in the current copy pass as directed.
- [ ] Keep public calls to action quotation-led. Do not show invented prices, live availability or unverified testimonials.

**Acceptance:** Route/render tests cover each approved page; navigation and breadcrumbs work; mobile layouts, keyboard access, headings, metadata and images are checked; no source demo links or unapproved claims remain on pages being released.

### Phase 3 — Legal and cookie pages

- [-] Convert Terms, Privacy and Cookies documents into separate static Blade pages; the text and effective dates are preserved from supplied DOCX files.
- [ ] Obtain owner confirmation of document versions before public release.
- [ ] Audit Tourm scripts and any external services for cookies/trackers. Do not activate optional analytics/marketing cookies before the required consent choice.
- [ ] If optional cookies are used, provide clear accept, reject and preference controls and a way to change the choice; link the Cookies Policy.

**Acceptance:** Each policy is readable at desktop/mobile widths, linked from the shared footer and relevant forms, and matches the approved document version. Cookie controls reflect the services actually enabled.

### Phase 4 — Enquiry and quotation intake

- [ ] Agree the minimum first-enquiry fields. The provided FAQ suggests travel dates, party size, destination/interests, budget range and preferred travel style; confirm any additional fields.
- [ ] Replace any Tourm `mail.php`, `#` or no-action form with a named Laravel POST route, CSRF protection, Form Request validation and rate limiting.
- [ ] Add an enquiry model/table through a reversible migration only after field, access, retention and notification requirements are agreed.
- [ ] Keep passport, payment-card and health data out of the initial enquiry unless a separately justified and secured workflow requires it.
- [ ] Acknowledge the enquiry and explain that staff consultation and written quotation follow; do not automatically reserve or charge.

**Acceptance:** Feature tests cover valid/invalid input, spam limits, persistence, authorization and notification behavior; privacy notice/consent is visible; enquiry never becomes an automatic booking.

### Phase 5 — Verification and release readiness

- [ ] Run the verified commands in [TESTING.md](TESTING.md) that apply to the change; add focused tests for new routes/forms.
- [ ] Compare migrated pages with the supplied source at mobile, tablet and desktop sizes; verify navigation, slider, gallery, modal and form behavior.
- [ ] Review accessibility, SEO metadata, asset loading, image dimensions, Core Web Vitals and third-party requests.
- [ ] Keep deployment and Filament administration as separate planned work until hosting and staff-access requirements are approved.

**Acceptance:** Relevant tests/build/format checks pass; no broken local assets or demo endpoints remain on released pages; remaining issues and deployment needs are recorded.

## 7. Data and privacy boundaries

- No travel-domain models or enquiry tables currently exist. Do not create package, booking, payment, availability or customer tables just to render the supplied static content.
- Static company profile, services, destination descriptions, FAQ and policy content can remain in Blade initially. Add a database/admin layer only when staff need to maintain that content or manage enquiries.
- Terms distinguish an enquiry from a confirmed booking and make price/availability depend on the written quotation and supplier confirmation. Preserve that distinction in page copy and form confirmation.
- The Privacy Policy describes passport, payment, health/accessibility, communications and travel data. The first enquiry should collect only the minimum needed to start consultation; detailed booking data belongs to a later, access-controlled workflow.
- The Cookies Policy describes optional categories and consent. Inventory actual loaded scripts before choosing a consent implementation; do not claim controls that are not working.

## 8. Remaining decisions

1. Which of the 69 supplied FAQs should replace the Tourm FAQ demo content, and how should they be grouped?
2. Confirm that the supplied Terms, Privacy and Cookies versions/effective dates are approved for publication.
3. Provide approved A&PM contact details, social URLs, destinations, services, itineraries, testimonials (if any), and image permissions before replacing template content.
4. Confirm enquiry fields, staff follow-up recipient/channel, and whether submissions should be stored in Laravel.
5. Define hosting/database requirements and staff roles before deployment or Filament work.

## 9. Current plan status

- **Already present:** Laravel Home Travel Agency and selected source-page Blade views, policy pages from supplied DOCX files, shared layout/overlays/header/footer/navigation, A&PM logos, named clean routes, and redirects for previous `.html` URLs.
- **Not yet implemented or verified:** A&PM content replacement, browser/visual comparison, functional Laravel enquiry forms, cookie preference controls, travel-domain schema, Filament administration, and deployment procedures.
- **Recommended next action:** Compare representative pages with the supplied HTML in a browser at mobile and desktop widths. Then proceed to the owner-directed content/branding pass using approved company facts and policy versions.
