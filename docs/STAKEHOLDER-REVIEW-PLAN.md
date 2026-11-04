# Stakeholder Feedback — Action Plan

Date: 2026-11-04. Status: **Approved by owner on 2026-11-04; code implemented, browser/owner acceptance pending.**

## Review basis and scope

Reviewed all ten WhatsApp screenshots downloaded today between 19:07 and 19:11. They contain forwarded stakeholder feedback, including overlapping messages and marked screenshots. Only the project-related messages inform this plan; unrelated chat details are excluded. The screenshots remain outside the repository.

The current Git working tree was clean at review. The plan was approved on 2026-11-04. Implementation follows the proposed visual treatments; no production deployment has been performed in this task.

## Proposed implementation order

### 1. Correct shared footer content and presentation

- [-] Replace the existing company introduction and slogan with the supplied wording:

  > A&PM Tours & Travel Ltd plans, coordinates, and connects you to exceptional journeys across Kenya, East Africa, and beyond.
  > We design journeys around you.

- [-] Apply the requested white background to the footer area shown in the screenshots; use existing forest-green brand tokens for readable text, icons, and links. **Approved interpretation:** the message says the background “will change to white” beside the footer logo/animation screenshot; it does not explicitly define whether this includes the copyright strip. Proposed scope: footer widgets white, copyright strip retained in green.
- [-] Retain the approved header logo. The stakeholder explicitly says to retain it for now.
- [-] Retain the motion of the illustrated animation and recolor it for a white background. **Identified:** the footer uses `public/assets/img/shape/shape_8.png` with Tourm’s `movingX` animation. Its alpha mask now displays in forest green; motion is retained and disabled when reduced motion is requested. The map-pin preloader is a separate element.
- [-] Reformat Get In Touch into distinct labeled rows with suitable icons:
  - Call/WhatsApp: +254 788 799 517; preserve separate working telephone and WhatsApp actions.
  - Email: reservations@apmtours.com.
  - Website: apmtours.com.
  - Address: P.O. Box 9820-00200, Nairobi, Kenya; use the requested envelope icon for the postal address.
  - FAQs: link to the existing FAQ route.
- [-] Rename Social Media to “Follow us on”. Show separate platform rows/icons: Facebook APMTours_KE; LinkedIn APMTours_KE; Instagram @APMTours_KE; X APMTours_KE. Use an X icon rather than the old Twitter bird.
- [-] Place Blog and Gallery links with that column as requested; avoid unnecessary duplicate links within the footer.

Files: `resources/views/partials/site-footer.blade.php`, scoped overrides in `public/assets/css/apm-brand.css`, and the specific animation asset/partial after identification.

Acceptance: the shared footer is consistent across all routed pages; text matches the supplied wording; contact actions work; white/green contrast is readable; no invented social URLs. Handles identify accounts but do not confirm their full URLs, particularly LinkedIn. Use text until owner-provided URLs are available.

### 2. Apply the legal-page corrections with precise email scope

- [-] Change every displayed effective-date occurrence in Terms & Conditions, Privacy Policy, and Cookies Policy to **01 October 2026**, including component props, opening tables, and any repeated metadata.
- [-] Use **info@apmtours.com only within those three legal documents**. This includes Terms section 31, Privacy section 22, Cookies section 19, opening contact information, and repeated document contact lines.
- [-] Keep **reservations@apmtours.com** for general enquiries, the shared site footer, Contact page, and other marketing content. A shared footer appearing below a legal document remains general site content; its address should not be changed to info@.
- [-] Reduce legal headings, subheadings, and body type using styles scoped to the existing legal-document wrapper. Proposed starting sizes for review: H1 32px desktop/28px mobile; H2 22px/20px; H3 18px; body 16px with comfortable line height. Maintain readable tables and small-screen wrapping.
- [-] Preserve all other legal wording and section numbering. These edits do not establish approval of the complete policy documents or their legal adequacy.

Files: `resources/views/pages/legal/{terms,privacy,cookies}.blade.php`, `resources/views/components/legal-document.blade.php`, `public/assets/css/apm-brand.css`.

Acceptance: no November effective date or reservations email remains inside the three document bodies; info@ does not replace general enquiry contacts; numbered contact sections are checked individually; typography remains accessible and responsive.

### 3. Update header styling and menu trigger

- [-] Use forest-green navigation text on the white header across desktop, sticky, and mobile variants.
- [-] Make Request A Quote a filled green button with readable light text. Proposed hover/focus treatment: white fill, green text and visible green border; apply keyboard focus styling as well as hover. The stakeholder also suggests dark-green-to-green as an alternative; approve the white treatment or select that alternative.
- [-] Replace the nine-circle slide-out-menu trigger with a conventional three-horizontal-line icon, keeping its current open/close action and accessible label.
- [-] Retain header logo artwork and current approved navigation destinations.

Files: `resources/views/partials/site-header.blade.php`, `resources/views/partials/site-nav-items.blade.php` only if markup requires it, and `public/assets/css/apm-brand.css`.

Acceptance: shared header variants agree; trigger opens the intended panel; navigation and quote CTA work by mouse and keyboard; hover/focus contrast remains clear.

### 4. Align the Contact page with the annotations

- [-] Keep Telephone & WhatsApp, Email, and social information, using the revised handles and the general reservations email.
- [-] **Approved interpretation:** remove the crossed-out postal-address card from the Contact page and move Telephone & WhatsApp into the first position. The postal address remains in the footer and legal documents.
- [-] Give Website its own clearly labeled entry rather than combining it with Email, consistent with the footer feedback.
- [-] Position the social information alongside the other contact entries where the existing responsive component permits it.

Files: `resources/views/pages/contact.blade.php`, scoped brand CSS if necessary.

Acceptance: approved contact order is followed, no old handles remain in this page, links are usable on mobile, and the address remains in the locations where it is still required.

### 5. Clean the shared slide-out panel

- [-] Replace Tourm demo Get In Touch details with the approved A&PM phone/WhatsApp, reservations email, website, and postal address.
- [-] Replace generic social links with the revised account labels/icons; use X rather than Twitter. Await full approved account URLs before creating links.
- [-] Replace the panel's placeholder company paragraph with the approved short introduction from task 1.
- [-] **Approved recommendation:** remove the unrelated construction-themed Recent Posts block rather than inventing A&PM articles. The screenshot asks for Get In Touch corrections but does not explicitly request removing Recent Posts.

Files: `resources/views/partials/template-before-header.blade.php`, existing icon assets/classes, scoped CSS if needed.

Acceptance: no Tourm contact details or generic social-homepage links remain in the shared panel; it opens/closes correctly and remains usable on narrow screens.

## Verification and completion gate

- [x] Compare changed text against the ten source screenshots, including email exceptions and legal contact section numbers.
- [x] Check named routes, mailto/tel/WhatsApp links, referenced icon assets, and social labels.
- [x] Compile Blade views and run focused existing tests relevant to changed routes. Record actual commands and outcomes.
- [ ] Inspect Home, About, Destination, Services, Contact, all three legal pages, and a representative copied page at mobile and desktop widths. Check sticky header, footer, slide-out panel, keyboard focus, and reduced-motion behavior.
- [x] Review Git diff and confirm changes are limited to the approved feedback.
- [x] Update `docs/FRONTEND.md` and applicable tasks in `docs/IMPLEMENTATION.md` with verified results. Preserve source documents and record stakeholder-requested exceptions.
- [ ] Obtain visual/content acceptance before marking this feedback implemented and verified. Deployment and live checks follow the approved release workflow; do not mark deployment complete from local changes alone.

## Approved defaults and remaining inputs

1. Approve white footer widget area with the green copyright strip retained, or specify white for the whole footer.
2. Identify the plane-like animation shown beside the footer logo; confirm whether this means a footer decoration, cursor animation, or preloader.
3. Approve the proposed Contact-page interpretation: remove its postal card, place phone/WhatsApp first, separate Website, then socials.
4. Choose the quote button hover treatment: white with green text (proposed), or lighter green from dark green.
5. Approve removal of the slide-out panel's unrelated Recent Posts block.
6. Provide full social profile URLs if clickable social links are required; confirm LinkedIn's actual page URL rather than inferring it from a handle.

The owner approved the proposed defaults. Full social URLs remain an external input; the site displays the revised handles without inventing links. Website code is implemented, but full feature acceptance remains open pending mobile/desktop browser and owner review.

## Implementation and verification results — 2026-11-04

- Shared company-introduction, contact-details, and social-profiles partials now keep the footer and slide-out panel aligned; Contact reuses the social partial. The footer widgets are white, the copyright strip stays green, and the existing plane decoration is green with its motion retained.
- Header navigation is green, the quote button uses the approved green/white hover and keyboard-focus treatment, and the desktop panel trigger uses three horizontal lines. Header logo is retained.
- Contact cards now show phone/WhatsApp, email, website, and socials; its postal card is removed. Postal details remain in the shared footer/panel and legal documents.
- Three legal documents have the requested date and scoped info@ email, with smaller scoped typography. Remaining policy wording is preserved.
- `apm-brand.css` uses a file-modification-time URL version so the release does not reuse stale CDN styling.
- **Passed:** `php artisan view:cache`; `php artisan test` (2 tests, 2 assertions); `git diff --check`.
- **Passed:** temporary in-process HTTP/render checks for Home, About, Destination, Service, Contact, Terms, Privacy, Cookies, and Gallery: all HTTP 200; exactly one footer per page; approved footer/sidebar content; legal email/date scope; Contact-card structure. The checks used testing settings with array sessions/cache and no production database.
- **Pending:** mobile/desktop visual review, interactive panel/header behavior in a browser, hover/focus appearance, and final stakeholder acceptance. No browser, Playwright, or Puppeteer is installed in this session.
- **Pending:** full approved social URLs; handles remain text. No commit, push, or production deployment was performed.

## Owner revision — green footer with white logo background

This direction supersedes the earlier white-footer proposal: restore green across the footer, use light text/icons, and give only the logo link a padded white background. The copyright remains green. The existing plane retains its motion and returns to white for contrast. Contact details, legal corrections, social handles, and other approved content remain applicable. CSS changes are scoped to `.apm-site-footer`; Contact and the slide-out panel retain their own surfaces. Visual browser acceptance remains pending.
