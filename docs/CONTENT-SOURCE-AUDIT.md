# Website copy compared with supplied documents

Review date: 2026-11-04. Scope: repository views, not a confirmation that the same code is deployed. Source documents were read from the supplied Downloads files; private chat images and source binaries were not copied into Git.

## Source precedence

1. Owner-approved stakeholder corrections, including the subsequent green-footer direction.
2. Company Profile **v1**, DOCX and PDF, for company facts and service scope.
3. Supplied FAQ and policy v0 documents for their corresponding page text.

The Downloads directory also contains older profile v0 files; these were excluded from the comparison baseline. Word XML text and PDF raw text were extracted read-only. All substantive profile v1 paragraphs (longer than 45 characters) match the PDF after case/spacing/punctuation normalization. A first comparison using PDF column layout produced apparent omissions; raw text extraction resolved them.

## Findings and corrections

| Website area | Finding | Result |
| --- | --- | --- |
| FAQ | Ten unrelated property questions and external Tourm form; no correspondence to the supplied FAQ | Replaced with all 69 source-backed questions/answers using the existing Bootstrap/Tourm accordion, grouped into 11 topics with jump links. Replaced the demo form with a Contact CTA and policy links. |
| FAQ identity/contact | Draft FAQ question 67 lists superseded handles | Uses owner-approved APMTours_KE handles, with Instagram @APMTours_KE; no invented social URLs. |
| Flight services | Profile v1 says flight ticketing is planned; FAQ questions 10/32 and About could imply current availability | FAQ answers 10/32 and About now preserve the planned qualification and invite confirmation with the team. Services and Home already retain the planned wording. |
| Terms | Source compared with document body | All 186 source paragraphs are accounted for after approved substitutions. No missing substantive source copy identified. |
| Privacy | Source compared with document body | All 165 source paragraphs accounted for after approved substitutions. |
| Cookies | Source compared with document body | All 90 source paragraphs accounted for after approved substitutions. Initial apparent differences were title case and separators/spacing in opening metadata. |
| About | Identity, audiences, mission/vision/purpose and seven values reviewed against profile v1 | Supported summaries retained; flight qualification corrected. The site is a summary, not a verbatim publication of the whole profile. |
| Services | Eight categories/descriptions reviewed against profile v1 | Categories correspond to the source, including planned flight services. No category omission identified. |
| Destinations | Ten entries/descriptions reviewed against profile v1 | Source-backed destinations and descriptions retained. No location is inferred from an unrelated stock photograph. |
| Home | Grouped services, seven delivery steps, destination carousel and consultation CTAs reviewed | Supported adaptations retained. The five owner-directed Why Choose points are a summary of service philosophy; they are not the profile's separate six-point list. This is documented as a content adaptation, not silently expanded. |
| Contact/footer/panel | Compared profile contact data with newer stakeholder messages | Stakeholder-approved copy, contact presentation and revised handles take precedence over the older source labels. |
| Shared metadata | Author/description/keywords still identified the site as Tourm; language was `zxx` | Shared author/description now describe A&PM with source-backed copy, template keywords removed, document language set to English. FAQ has an A&PM page title. |

## Approved exceptions retained

- Legal effective dates: **01 October 2026**, replacing the source November dates wherever repeated.
- Email **inside** Terms, Privacy and Cookies: **info@apmtours.com**, including Terms section 31, Privacy section 22 and Cookies section 19.
- General contact areas and the shared footer, including when shown below legal content: **reservations@apmtours.com**.
- Footer introduction: the stakeholder's “plans, coordinates, and connects you…” text and “We design journeys around you.”
- Social handles: APMTours_KE; Instagram @APMTours_KE. Full URLs remain unconfirmed.
- The policy comparison normalizes case, punctuation and whitespace for matching; this does not erase changes in the actual source files. Existing tables, numbered clauses and approved wording are preserved.

## Remaining content gaps

- Home Trip Finder is still a demo with sample choices and an external vendor form action; approved search requirements/catalogue remain unimplemented.
- Activities, tours and several service/destination detail views still include Tourm titles/content, offers, prices or claims. Blog and Gallery were subsequently adapted with profile-based guidance and illustrative selected photos, as recorded in FRONTEND.md. The supplied company documents do not provide publication history, actual tour offers, or complete per-destination detail copy. New blog guidance is an adaptation of the supplied profile, with no invented publication dates or authors. They must not be represented as verified A&PM products or testimonials.
- The shared after-footer partial still contains an unused Tourm login/register popup with external form actions. Authentication is not implemented; this needs a dedicated cleanup before treating the site as release-ready.
- Error and untouched copied page titles still require a subsequent metadata/content pass; the shared metadata has been corrected.
- Profile sustainability and positioning content are not published as complete standalone website sections. This is a coverage opportunity, not evidence of incorrect existing summaries.
- Full profile URLs, legal owner sign-off, image approval and browser interaction/visual review remain outstanding. This is a content-fidelity review, not independent verification of commercial claims or legal advice.

## Verification

- Passed `php artisan view:cache` and `php artisan test` (2 existing tests, 2 assertions).
- Passed temporary request/render checks: FAQ, Terms, Privacy and Cookies return HTTP 200.
- FAQ: all 69 rendered questions/answers match the extracted source with the three documented adaptations (10, 32, 67); each question has a unique matching accordion answer/control.
- Policies: all extracted source paragraphs matched the rendered legal section after the approved date/email substitutions, with case/spacing/punctuation normalized.
- Profile DOCX/PDF substantive-text comparison passed as described above.
- Passed `git diff --check`. Browser accordion interaction, topic-jump positioning, responsive appearance and owner copy review remain pending. Source documents are unchanged; no deployment is performed by this review.
