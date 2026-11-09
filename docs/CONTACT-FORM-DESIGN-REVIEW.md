# Contact form design review

Date: 2026-11-09. **Status: Owner-approved and implemented locally; full interactive/owner acceptance remains pending.**

## Evidence and scope

Reviewed the owner's full-page screenshot, current Contact Blade view and enquiry partial, copied theme CSS and A&PM overrides, and original local Tourm `contact.html` at `/home/difre/websites/APM/html.themehour.net/tourm/demo/contact.html`. The source is a reference, not a production dependency. Applied the Web Interface Guidelines review skill. Reviewed public source content, not interactive browser renderings, for the external examples below. Go2Africa's enquiry page was iframe-only to the research tool; Audley's requested quote URL was inaccessible, so neither supports detailed visual findings here.

## Current visual findings

- `resources/views/pages/contact.blade.php:6`: the full-section `video_bg_1.jpg` photo is stretched/cropped over the height of the form. Dark introductory text overlaps detailed water, boats and buildings in the screenshot. Its measured contrast has not been audited; the visible background variability makes readability unreliable.
- `resources/views/pages/contact.blade.php:8`: `align-items-center` vertically centres a short introduction beside a long form, leaving a large empty upper-left area.
- `resources/views/pages/contact.blade.php:9`: the introduction gets seven desktop grid columns, the main task gets five. Large `.sec-title` typography competes with the form heading.
- `resources/views/partials/contact-enquiry-form.blade.php:4`: the narrow card makes the heading wrap. Combined with inherited 64px inputs and 40px card padding, stacked hints and the textarea, this creates a long card.
- The form already has useful accessibility behaviour: explicit labels, autocomplete, native email/tel/select inputs, error summary and field errors, preserved values, keyboard focus, CSRF/spam controls and separate acknowledgement-failure handling. Keep these during a visual change.
- Existing field icons are decorative and can be retained subtly if they do not reduce input space. Placeholders must not replace labels to recreate the demo's compactness.

## Research findings

- [W3C forms guidance](https://www.w3.org/WAI/tutorials/forms/) recommends short forms, only necessary information, visible labels/instructions, related-field grouping and understandable success/error feedback. Five existing fields are suitable for one simple page; a wizard is unnecessary here.
- [GOV.UK text-input guidance](https://design-system.service.gov.uk/components/text-input/) recommends visible labels above controls, short direct labels and field sizes appropriate to expected content. Placeholder-only labels disappear during entry and can be difficult to read.
- [Nielsen Norman Group](https://www.nngroup.com/articles/web-form-design/) recommends keeping forms short and visually associating labels with their fields. Its advice is usability guidance, not evidence that a particular A&PM layout will increase conversion by a known percentage.
- [W3C contrast guidance](https://www.w3.org/WAI/WCAG22/Understanding/contrast-minimum.html) requires adequate text/background contrast. A stable opaque reading surface is easier to verify than changing areas of a photograph.
- [Asilia's published enquiry component](https://www.asiliaafrica.com/newsletter/) uses familiar identity/contact fields and comments, with privacy information. It provides a compact enquiry-content reference; its marketing checkbox is not a reason to add newsletter subscription to A&PM.
- [BelAfrique](https://belafrique.com/contact-us/) separates personal and travel details in its much longer enquiry form. [Luxury Africa Tours](https://luxury-africa.com/enquire/) groups travel information, trip description and personal details. Adopt clear grouping, not their extra mandatory questions, budgets or flights workflow. These are observed industry approaches, not universally superior designs.

## Recommended visual direction

Keep the Tourm/Bootstrap card, controls, rounded treatment, green primary button and existing icons. Make a scoped layout revision through the Contact view and A&PM stylesheet.

1. Replace the full-height photograph behind text with the existing warm-neutral brand surface. If photography is retained, use a modest separate illustration rather than a background under body copy. Do not introduce a new image without owner approval.
2. Use a compact, top-aligned introduction in four desktop columns and give the form eight columns. Target the form content at roughly 560–640px wide; exact sizing requires browser review. Keep the field flow in one column on all sizes rather than splitting a five-field form merely to reduce height.
3. Reduce the introductory heading to about 36–40px desktop and 28–32px mobile. Reduce the card heading to about 28–32px. These are design starting points, not industry requirements.
4. Replace the long introductory presentation with a short contact invitation and a compact explanation of consultation, itinerary and quotation. Any revised company copy must stay within approved facts. Keep one H1 and a clear H2 for the form; do not restore the removed opening section or contact-card row.
5. Aim for 48–52px input/select heights, 16px input text, about 20px between fields, and 28–32px card padding desktop/20–24px mobile. Keep the textarea approximately 120–140px high initially and vertically resizable. Do not make fields smaller at the expense of touch access.
6. Retain full name, email, optional phone, enquiry type and message. Use simple group headings such as Your details / Your enquiry only if they improve clarity in the final layout; they are not an excuse for additional spacing or fields.
7. Shorten message guidance into readable hints while retaining the warning against sensitive details. Keep the privacy link and acknowledgement disclosure visible near submission. Keep the Send enquiry action prominent; on mobile it can fill the card width. Add an in-progress state only as progressive enhancement without breaking normal POST behaviour.
8. Keep the native select, server validation, accessible errors, retained input, staff notifications and customer acknowledgement. Do not reintroduce `.ajax-contact` or the external demo action.
9. On mobile, stack the concise introduction above the full-width form. Keep floating WhatsApp outside field/button hit areas and check sticky-header focus visibility at 200% zoom.

Suggested structure:

```text
Shared header

Warm neutral section
┌─────────────────────┬─────────────────────────────────┐
│ Short invitation    │ Tell us about your trip         │
│                     │ Short explanation               │
│ What happens next   │ Full name                       │
│ Consultation        │ Email address                   │
│ Itinerary           │ Phone / WhatsApp (optional)     │
│ Written quotation   │ Enquiry type                    │
│                     │ Message                         │
│                     │ Privacy / acknowledgement note  │
│                     │ Send enquiry                    │
└─────────────────────┴─────────────────────────────────┘

Existing shared footer
```

## Acceptance for a subsequent implementation

- Confirm the revised visual direction before replacing the existing photo treatment/copy.
- Keep the delivery contract and existing tests; add behaviour tests only if submission-state behaviour changes.
- Verify narrow, medium and wide viewports, 200% zoom, long email/name values, all error/success states and acknowledgement failure.
- Check labels, native select keyboard access, visible focus, contrast, wrapping and floating-control overlap in a browser. Screenshots alone do not establish interaction or WCAG conformance.
- Run relevant contact tests, Blade compilation and whitespace checks after implementation. Research-only task: these checks were not rerun, no live messages were sent, and no application code or credentials changed.

## Approved implementation and verification — 2026-11-09

The owner approved implementation. Contact now uses an opaque warm-neutral section, four/eight top-aligned desktop columns, a concise introduction and three consultation/itinerary/quotation steps. The form keeps Tourm's card, button, icons and Bootstrap wrappers with scoped brand overrides: maximum 704px card/approximately 640px content, 32px desktop padding, 50px controls, 132px resizable textarea, smaller headings, shorter hints and mobile full-width submit. Sensitive-data guidance, privacy/acknowledgement disclosure, error semantics, CSRF, validation and email delivery remain. No in-progress JavaScript was added; normal POST/redirect submission remains.

Passed Blade compilation, existing focused contact tests (27 checks/148 assertions), whitespace review, six static layout/markup checks and 11-page header/footer render checks. No backend or delivery behaviour changed; no additional tests or real emails were necessary. No Vite build performed because only Blade/static brand CSS changed.

Inspected headless Firefox layout captures at 1440px, 768px and 375px widths. The initial live capture showed the preloader; the local server then became unavailable. Final captures used a temporary PHP-rendered snapshot with local assets, preloader hidden only in that snapshot and remote Google Fonts removed to avoid network-dependent capture delays. These captures verify the layout with locally available/fallback fonts, not exact live typography, keyboard interaction, 200% zoom or all feedback states. The application preloader and Google Fonts loading are unchanged. Full live browser interaction and owner acceptance remain pending.
