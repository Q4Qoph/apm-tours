# Search and Trip Finder Research

**Status:** Competitive research and product recommendation for owner review. No search feature has been implemented. **Research date:** 2026-11-02.

## Purpose

The client's Bonfire reference asks for a similar site architecture. This review interprets “architecture” as information architecture and the visitor path through destinations, journeys, details, and enquiries. It does not recommend replacing A&PM's Laravel application or copying another company's brand, offers, or business model.

The goal is to retain search as an important discovery feature while keeping A&PM's consultation-led quotation process clear. A trip finder should help visitors find relevant published journeys; it must not imply live inventory, confirmed availability, or instant booking.

## Current A&PM implementation

- `resources/views/pages/home.blade.php` has a Tourm filter form with Destination, Type, and Duration fields, followed by a carousel now repurposed for 10 Company Profile destination highlights. The form remains demo behavior.
- The form currently posts to Tourm's external demo `mail.php`. It does not filter A&PM journeys or create an A&PM enquiry.
- The current carousel contains unapproved demo countries, names, and prices.
- `routes/web.php` maps `/tour` and `/tour-details` to static Blade views; previous `.html` paths redirect to clean routes. There is no search-results endpoint or query logic.
- `app/Models/` contains only the starter `User` model. Existing migrations are Laravel starter migrations; there is no approved trip catalogue or travel data schema.

Therefore the current widget is a visual search pattern, not a working A&PM search feature. Its form action and demo inventory need to be replaced before it is presented as functional.

## Reference-site patterns

| Site | Observed structure or search pattern | Useful lesson for A&PM |
| --- | --- | --- |
| [Bonfire Adventures](https://bonfireadventures.com/) | Separates destination discovery from Tours & Packages. Its catalogue groups coastal escapes, safaris, international trips, and seasonal deals. A package detail can show duration, transport, age information, overview, inclusions/exclusions, season/vehicle-based rates, and a travel-advisor CTA. | Strong reference for a clear destination/catalogue/detail hierarchy. Adopt the browsing architecture, not its live deal cadence, pricing, ratings, or booking claims. See [packages](https://bonfireadventures.com/packages/) and a [Maasai Mara package detail](https://bonfireadventures.com/packages/bush-packages-maasai-mara/). |
| [SafariBookings search results](https://www.safaribookings.com/tours/all-inclusive) | Marketplace filters include destination, dates/flexibility, travellers, tour length, price, starting point, comfort level, private/shared, safari type, and special interests. Results expose a count and compact route, duration, price basis, operator, and review details. | Useful reference for genuine filter-to-results behavior and result summaries. It is a large paid marketplace, not an A&PM business model; do not copy its ranking, review, or paid-placement system. |
| [Pollman's Tours & Safaris](https://www.pollmans.com/tailor-made-holidays/overland-safaris) | Distinguishes scheduled safaris from trips that can be privately guided or tailored. Cards expose duration and departure status before the visitor opens a trip. | Separate genuinely scheduled departures from tailor-made journeys. A&PM should not label a trip scheduled or available unless the operations team confirms it. |
| [Zawame Travel](https://zawametravel.com/) | Presents destination pages and sample routes with duration and “Price on request”; explains that itineraries can be changed and leads to a planning enquiry. | Good fit for a quote-led catalogue: let visitors compare route ideas, make customization explicit, and invite an enquiry without implying a fixed price. |
| [Safarizuru quote flow](https://safarizuru.co.ke/quote) | Uses a staged quote builder: destination, trip type, duration, dates, party size, budget, preferences, and contact details. | A multi-step form can collect useful detail, but A&PM should keep early steps short, allow flexible answers, and defer contact data until the visitor is ready to enquire. |
| [Go2Africa trip enquiry](https://www.go2africa.com/enquire-now) and [booking process](https://www.go2africa.com/african-travel-blog/how-it-works-our-booking-process) | Collects destination, dates, duration, party, budget, preferences, and contact details in a guided enquiry, then connects the traveller with a specialist. | The consultation path can feel guided rather than transactional. Do not copy its long form wholesale; A&PM's first search step should remain quick. |
| [Holiday Kenya Safaris](https://holidaykenyasafaris.ke/) | Lists tours by destination, trip type, and occasion; individual cards show duration, departure context, route, and listed price. Its quote journey asks for dates and group details after the visitor chooses a trip. | Let people browse concrete journeys first, then ask for information that helps prepare a relevant quotation. Only show prices and route details that A&PM has approved and can keep current. |

The exact client URL, `bonfireadventure.com` (singular), returned HTTP 429 to the research fetch. The Bonfire material available for review was on the plural `bonfireadventures.com` domain. Confirm with the client that this is the intended Bonfire reference.

## Recommended A&PM search experience

### 1. Make the homepage search a real Trip Finder

Keep the search panel shown in the screenshot. Place it prominently below or within the hero, before the journey cards. Label it **Find a trip** or **Explore journeys**, rather than presenting it as a booking or availability checker.

Start with a small set of useful fields that map to published catalogue data:

- **Destination:** approved destinations plus “Open to suggestions”.
- **Journey type:** only types that A&PM actually publishes, such as safari, coast/holiday, cultural/nature experience, or group travel. Keep corporate services separate if they do not have tour-style listings.
- **Duration:** useful ranges plus “Flexible”; align the options to the durations of real published journeys.
- **Travel month:** optional in the first release; add only when the catalogue can represent seasonal suitability accurately.

Do not require personal information or a budget merely to search. Budget may be an optional field in a later quotation form if A&PM approves the ranges and currency context.

### 2. Return matching journeys, not an email submission

Submit search criteria as a GET request to the tours/results page so the URL preserves the search and can be shared or revisited. The existing `/tour` route is a possible starting point, but it currently serves a static Tourm view and must not be described as search-enabled until implemented.

Results should provide:

- A result count, visible selected filters, and a clear-filters action.
- Cards with an approved journey name, destination, trip type, duration, concise route/experience summary, and an appropriate image.
- A clearly stated price basis only when current, approved pricing exists. Otherwise show **Request a quote** or **Price on request** only if the company approves that wording.
- A useful empty state: explain that there are no exact matches, offer to clear filters, and link to a custom-trip enquiry.

Do not copy marketplace filters just because they exist. Start with the few filters that the approved A&PM catalogue can support consistently. Add price, accommodation standard, party size, or starting city only if those data are accurate and maintained.

Selecting a card should open a journey detail page. From there, **Request a tailored quote** should carry the selected journey into the enquiry. An enquiry is not a booking; staff confirm itinerary, pricing, and availability.

### 3. Keep search and quotation as separate steps

Recommended path:

```mermaid
flowchart LR
    Home[Homepage Trip Finder] --> Results[Filtered journeys]
    Results --> Detail[Journey details]
    Detail --> Enquiry[Request a tailored quote]
    Enquiry --> Consultation[Staff consultation]
    Consultation --> Quote[Written itinerary and quotation]
    Quote --> Confirm[Customer confirmation under booking terms]
```

Search helps the visitor narrow the catalogue. The quotation form gathers the information staff need to respond. Keep the enquiry form focused: selected journey, dates or flexibility, party size, preferences, budget if approved, and contact details. Add a clear privacy notice and confirmation that the form sends an enquiry, not a reservation.

## Implementation direction

**Planned:** Before coding the search backend, approve an initial set of real journeys and the data needed to filter them. Do not invent package rows or create speculative migrations to make the widget look functional.

1. Confirm whether the first searchable catalogue covers tours/journeys only or also services and destinations. Recommended: Trip Finder searches journeys; top navigation separately exposes Services and Destinations.
2. Approve the first journey records, destination taxonomy, duration values, trip types, imagery, and whether any prices can be shown with a validity period and clear basis.
3. Replace the external `mail.php` action with a Laravel named route. Keep search requests non-personal and URL-addressable.
4. Implement query validation and filtering against the approved catalogue. The catalogue may be database-backed when its content ownership and admin workflow are decided; current models/migrations do not establish that design.
5. Add result count, active filters, clear/reset behavior, no-results guidance, and links to the existing tour detail/contact routes.
6. Verify mobile use, keyboard and screen-reader labels, validation messages, and result behavior. W3C guidance recommends programmatically associated labels for form controls and clear text feedback for errors ([labels](https://www.w3.org/WAI/tutorials/forms/labels/), [input validation](https://www.w3.org/WAI/tutorials/forms/validation/)).

## Decisions still needed

- Which A&PM journeys are approved for the first search catalogue?
- Is search limited to tours/holiday journeys, with services and destinations browsed separately?
- Which journey types and duration ranges match actual offerings?
- Can A&PM publish any current prices, or should the result/detail pages use quote-led wording?
- Can travel month improve the results, and who will maintain seasonal data?
- What should happen when no published journey matches: custom enquiry, callback, or another approved path?
- Which contact channels and response expectations may be promised publicly?

Until these decisions and catalogue content exist, keep the Trip Finder clearly marked as planned and do not leave the Tourm demo search endpoint or sample filter options in production. The current destination carousel is a profile-backed showcase, not searchable inventory or live availability.
