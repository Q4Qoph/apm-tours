@extends('layouts.app')

@section('title', 'Frequently Asked Questions | A&PM Tours & Travel')

@section('content')
<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Planning with A&amp;PM</span>
            <h1 class="sec-title">Answers to your travel questions</h1>
            <p>Learn about our services, destinations, planning process and travel support. An enquiry starts a conversation; arrangements remain subject to a written quotation, availability and confirmation.</p>
        </div>
        <nav aria-label="FAQ topics" class="mb-5"><ul class="list-unstyled d-flex flex-wrap gap-3 justify-content-center">
            <li><a href="#faq-topic-1">About A&amp;PM</a></li>
            <li><a href="#faq-topic-2">Travel services</a></li>
            <li><a href="#faq-topic-3">Planning and confirmation</a></li>
            <li><a href="#faq-topic-4">Destinations and budgets</a></li>
            <li><a href="#faq-topic-5">Accommodation, transport and guides</a></li>
            <li><a href="#faq-topic-6">Corporate and travel-trade support</a></li>
            <li><a href="#faq-topic-7">Tailor-made experiences</a></li>
            <li><a href="#faq-topic-8">Prices, payments and cancellations</a></li>
            <li><a href="#faq-topic-9">Responsible travel and service quality</a></li>
            <li><a href="#faq-topic-10">Pre-travel and journey support</a></li>
            <li><a href="#faq-topic-11">Contact and enquiries</a></li>
        </ul></nav>
        <div class="row"><div class="col-lg-10 offset-lg-1">
            <section id="faq-topic-1" aria-labelledby="faq-topic-heading-1" class="mb-5">
                <h2 id="faq-topic-heading-1" class="h3">About A&amp;PM</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion1">
                    <div class="accordion-card style2 active">
                        <h3 class="accordion-header" id="faq-heading-1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-1" aria-expanded="true" aria-controls="faq-answer-1">1. Who is A&amp;PM Tours &amp; Travel Ltd?</button>
                        </h3>
                        <div id="faq-answer-1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#faqAccordion1">
                            <div class="accordion-body style2"><p class="faq-text">A&amp;PM Tours Ltd, branded as A&amp;PM Tours &amp; Travel Ltd, is a travel and tourism company that connects travellers to curated experiences, local destination knowledge, global travel expertise and end-to-end travel support across Kenya and beyond.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-2" aria-expanded="false" aria-controls="faq-answer-2">2. Who does A&amp;PM Tours &amp; Travel serve?</button>
                        </h3>
                        <div id="faq-answer-2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#faqAccordion1">
                            <div class="accordion-body style2"><p class="faq-text">We serve international leisure travellers, couples, families, diaspora travellers, small groups, educational and special-interest travellers, incentive groups, corporate clients, and international travel agents or tour operators seeking a dependable destination partner.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-3" aria-expanded="false" aria-controls="faq-answer-3">3. What makes A&amp;PM Tours &amp; Travel different?</button>
                        </h3>
                        <div id="faq-answer-3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#faqAccordion1">
                            <div class="accordion-body style2"><p class="faq-text">Our service approach emphasizes personalised planning, responsive communication, transparent value, trusted partners, strong local knowledge and scalable support for leisure, group, corporate and international travel requirements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-4" aria-expanded="false" aria-controls="faq-answer-4">4. Does the company only arrange safaris?</button>
                        </h3>
                        <div id="faq-answer-4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#faqAccordion1">
                            <div class="accordion-body style2"><p class="faq-text">No. Safaris are an important part of our offering, but the company also coordinates accommodation, private and group transport, guides, flight ticketing and travel reservations, destination management, corporate travel and tailor-made experiences.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-5" aria-expanded="false" aria-controls="faq-answer-5">5. What does “Travel 360°” mean in the company profile?</button>
                        </h3>
                        <div id="faq-answer-5" class="accordion-collapse collapse" aria-labelledby="faq-heading-5" data-bs-parent="#faqAccordion1">
                            <div class="accordion-body style2"><p class="faq-text">It represents a broad, integrated travel approach in which multiple travel needs can be coordinated through one brand and one point of contact rather than handled separately by the traveller.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-2" aria-labelledby="faq-topic-heading-2" class="mb-5">
                <h2 id="faq-topic-heading-2" class="h3">Travel services</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion2">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-6" aria-expanded="false" aria-controls="faq-answer-6">6. What types of safaris and holiday packages do you arrange?</button>
                        </h3>
                        <div id="faq-answer-6" class="accordion-collapse collapse" aria-labelledby="faq-heading-6" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">We arrange tailor-made Kenya safaris, leisure trips, weekend escapes, family holidays and themed travel experiences, with itineraries shaped around the client’s interests, budget and preferred travel style.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-7" aria-expanded="false" aria-controls="faq-answer-7">7. Can you reserve hotels, lodges, camps and resorts?</button>
                        </h3>
                        <div id="faq-answer-7" class="accordion-collapse collapse" aria-labelledby="faq-heading-7" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Yes. We source and coordinate hotel, lodge, camp and resort reservations aligned with the traveller’s budget, destination and preferred style of travel.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-8" aria-expanded="false" aria-controls="faq-answer-8">8. Do you arrange airport transfers and tour transport?</button>
                        </h3>
                        <div id="faq-answer-8" class="accordion-collapse collapse" aria-labelledby="faq-heading-8" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Yes. We coordinate airport transfers and tour transport through licensed vehicle operators, including private and group movements where required.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-9" aria-expanded="false" aria-controls="faq-answer-9">9. Can you arrange a professional tour guide?</button>
                        </h3>
                        <div id="faq-answer-9" class="accordion-collapse collapse" aria-labelledby="faq-heading-9" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Yes. We coordinate qualified guides based on destination, language, group profile and travel interests.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-10" aria-expanded="false" aria-controls="faq-answer-10">10. Do you provide flight ticketing and travel agency services?</button>
                        </h3>
                        <div id="faq-answer-10" class="accordion-collapse collapse" aria-labelledby="faq-heading-10" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Domestic and international flight ticketing, travel reservations and related agency services are planned within our service portfolio. Contact A&amp;PM to confirm the arrangements available for your journey.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-11" aria-expanded="false" aria-controls="faq-answer-11">11. What is destination management?</button>
                        </h3>
                        <div id="faq-answer-11" class="accordion-collapse collapse" aria-labelledby="faq-heading-11" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Destination management means end-to-end in-country coordination for individuals, groups, agents and partner organisations. It can bring together accommodation, transport, guides, activities and other ground arrangements into one coordinated programme.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-12">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-12" aria-expanded="false" aria-controls="faq-answer-12">12. What corporate travel services are available?</button>
                        </h3>
                        <div id="faq-answer-12" class="accordion-collapse collapse" aria-labelledby="faq-heading-12" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Our corporate travel solutions include business travel coordination, executive transfers, conference travel, group movements and itinerary management.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-13">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-13" aria-expanded="false" aria-controls="faq-answer-13">13. Do you arrange special-interest travel?</button>
                        </h3>
                        <div id="faq-answer-13" class="accordion-collapse collapse" aria-labelledby="faq-heading-13" data-bs-parent="#faqAccordion2">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Tailor-made experiences may include cultural, adventure, honeymoon, educational, photography, nature and other bespoke interest-based journeys.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-3" aria-labelledby="faq-topic-heading-3" class="mb-5">
                <h2 id="faq-topic-heading-3" class="h3">Planning and confirmation</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion3">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-14">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-14" aria-expanded="false" aria-controls="faq-answer-14">14. How do I start planning a trip with A&amp;PM Tours &amp; Travel?</button>
                        </h3>
                        <div id="faq-answer-14" class="accordion-collapse collapse" aria-labelledby="faq-heading-14" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Start by contacting us with your preferred travel dates, number of travellers, interests, budget and preferred travel style. This forms the basis of the initial enquiry and consultation.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-15">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-15" aria-expanded="false" aria-controls="faq-answer-15">15. What information do you need to prepare an itinerary?</button>
                        </h3>
                        <div id="faq-answer-15" class="accordion-collapse collapse" aria-labelledby="faq-heading-15" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">We typically need your travel dates, party size, destinations or interests, budget range, accommodation preference and the type of experience you want. Additional details may be requested where they are relevant to the itinerary.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-16">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-16" aria-expanded="false" aria-controls="faq-answer-16">16. Can you design a custom itinerary instead of using a fixed package?</button>
                        </h3>
                        <div id="faq-answer-16" class="accordion-collapse collapse" aria-labelledby="faq-heading-16" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Bespoke itinerary development is a core part of our operating model. We create practical itineraries with suitable destinations, pacing and inclusions based on the traveller’s requirements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-17">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-17" aria-expanded="false" aria-controls="faq-answer-17">17. What happens after I approve an itinerary?</button>
                        </h3>
                        <div id="faq-answer-17" class="accordion-collapse collapse" aria-labelledby="faq-heading-17" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Once the itinerary and quotation are accepted, the next step is confirmation under the applicable booking terms, followed by supplier reservations for accommodation, licensed transport, guides and required activities.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-18">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-18" aria-expanded="false" aria-controls="faq-answer-18">18. Will I receive a written quotation?</button>
                        </h3>
                        <div id="faq-answer-18" class="accordion-collapse collapse" aria-labelledby="faq-heading-18" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s delivery process includes a clear package price, booking terms and payment schedule before supplier reservations are finalised.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-19">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-19" aria-expanded="false" aria-controls="faq-answer-19">19. When are accommodation, vehicles and guides reserved?</button>
                        </h3>
                        <div id="faq-answer-19" class="accordion-collapse collapse" aria-labelledby="faq-heading-19" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Supplier reservations are made after the itinerary, quotation and booking arrangements have progressed to the confirmation stage, subject to availability and the applicable booking terms.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-20">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-20" aria-expanded="false" aria-controls="faq-answer-20">20. What happens before I travel?</button>
                        </h3>
                        <div id="faq-answer-20" class="accordion-collapse collapse" aria-labelledby="faq-heading-20" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Pre-travel support includes sharing confirmations, trip information, packing guidance and contact details relevant to the journey.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-21">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-21" aria-expanded="false" aria-controls="faq-answer-21">21. Does A&amp;PM remain involved while I am travelling?</button>
                        </h3>
                        <div id="faq-answer-21" class="accordion-collapse collapse" aria-labelledby="faq-heading-21" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">Yes. During journey delivery, the company coordinates the trip, monitors service delivery and remains available for support.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-22">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-22" aria-expanded="false" aria-controls="faq-answer-22">22. What happens after the trip?</button>
                        </h3>
                        <div id="faq-answer-22" class="accordion-collapse collapse" aria-labelledby="faq-heading-22" data-bs-parent="#faqAccordion3">
                            <div class="accordion-body style2"><p class="faq-text">The company closes supplier accounts, collects client feedback and uses the experience to support referrals, repeat business and continuous service improvement.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-4" aria-labelledby="faq-topic-heading-4" class="mb-5">
                <h2 id="faq-topic-heading-4" class="h3">Destinations and budgets</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion4">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-23">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-23" aria-expanded="false" aria-controls="faq-answer-23">23. Which destinations in Kenya do you currently feature?</button>
                        </h3>
                        <div id="faq-answer-23" class="accordion-collapse collapse" aria-labelledby="faq-heading-23" data-bs-parent="#faqAccordion4">
                            <div class="accordion-body style2"><p class="faq-text">The company profile highlights Maasai Mara, Amboseli, Naivasha, Lake Nakuru, Samburu, Mount Kenya, Tsavo East &amp; West, the Kenya Coast and Nairobi, with East Africa cross-border itineraries also included.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-24">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-24" aria-expanded="false" aria-controls="faq-answer-24">24. Do you organise travel beyond Kenya?</button>
                        </h3>
                        <div id="faq-answer-24" class="accordion-collapse collapse" aria-labelledby="faq-heading-24" data-bs-parent="#faqAccordion4">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company profile includes cross-border East African itineraries linking Kenya with Tanzania, Uganda, Rwanda and beyond.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-25">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-25" aria-expanded="false" aria-controls="faq-answer-25">25. Do you offer different budget levels?</button>
                        </h3>
                        <div id="faq-answer-25" class="accordion-collapse collapse" aria-labelledby="faq-heading-25" data-bs-parent="#faqAccordion4">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The destination portfolio is intended to support flexible budget, mid-range and premium configurations, with private and small-group options.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-5" aria-labelledby="faq-topic-heading-5" class="mb-5">
                <h2 id="faq-topic-heading-5" class="h3">Accommodation, transport and guides</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion5">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-26">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-26" aria-expanded="false" aria-controls="faq-answer-26">26. How do you choose accommodation for a client?</button>
                        </h3>
                        <div id="faq-answer-26" class="accordion-collapse collapse" aria-labelledby="faq-heading-26" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Accommodation is sourced according to the traveller’s destination, budget and travel style, using hotels, lodges, camps and resorts as appropriate to the itinerary.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-27">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-27" aria-expanded="false" aria-controls="faq-answer-27">27. Do you own the vehicles used for tours?</button>
                        </h3>
                        <div id="faq-answer-27" class="accordion-collapse collapse" aria-labelledby="faq-heading-27" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">The company provides tour transport and airport transfers arranged through licensed vehicle operators. The specific vehicle for a trip is matched to the itinerary and group requirements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-28">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-28" aria-expanded="false" aria-controls="faq-answer-28">28. How do you select transport providers?</button>
                        </h3>
                        <div id="faq-answer-28" class="accordion-collapse collapse" aria-labelledby="faq-heading-28" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Our service standards emphasise carefully selected, licensed and insured partners known for reliability, service quality, continuity and guest satisfaction.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-29">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-29" aria-expanded="false" aria-controls="faq-answer-29">29. Can you arrange transport for groups?</button>
                        </h3>
                        <div id="faq-answer-29" class="accordion-collapse collapse" aria-labelledby="faq-heading-29" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Private and group transport, group movements, airport transfers and corporate movements are part of the company’s service portfolio.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-30">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-30" aria-expanded="false" aria-controls="faq-answer-30">30. How are guides selected?</button>
                        </h3>
                        <div id="faq-answer-30" class="accordion-collapse collapse" aria-labelledby="faq-heading-30" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Guides are coordinated according to destination, language, group profile and travel interests, with an emphasis on qualified and dependable service providers.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-31">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-31" aria-expanded="false" aria-controls="faq-answer-31">31. Can accommodation, transport and guiding all be coordinated under one booking?</button>
                        </h3>
                        <div id="faq-answer-31" class="accordion-collapse collapse" aria-labelledby="faq-heading-31" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s service philosophy is built around one point of contact and coordinated delivery, allowing multiple travel components to be brought together in one itinerary.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-32">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-32" aria-expanded="false" aria-controls="faq-answer-32">32. Can A&amp;PM coordinate both flights and ground arrangements?</button>
                        </h3>
                        <div id="faq-answer-32" class="accordion-collapse collapse" aria-labelledby="faq-heading-32" data-bs-parent="#faqAccordion5">
                            <div class="accordion-body style2"><p class="faq-text">Our service portfolio brings together accommodation, transport, guide coordination and destination support, with flight ticketing and travel reservations planned. Contact A&amp;PM to discuss and confirm the flight and ground arrangements available for your itinerary.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-6" aria-labelledby="faq-topic-heading-6" class="mb-5">
                <h2 id="faq-topic-heading-6" class="h3">Corporate and travel-trade support</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion6">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-33">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-33" aria-expanded="false" aria-controls="faq-answer-33">33. What can you manage for a corporate traveller?</button>
                        </h3>
                        <div id="faq-answer-33" class="accordion-collapse collapse" aria-labelledby="faq-heading-33" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">Corporate support can include business travel coordination, executive transfers, conference travel, group movements and itinerary management.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-34">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-34" aria-expanded="false" aria-controls="faq-answer-34">34. Can you coordinate travel for conferences or business groups?</button>
                        </h3>
                        <div id="faq-answer-34" class="accordion-collapse collapse" aria-labelledby="faq-heading-34" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Conference travel and group movement coordination are specifically included in the company’s corporate travel solutions.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-35">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-35" aria-expanded="false" aria-controls="faq-answer-35">35. Do you work with travel agents and tour operators outside Kenya?</button>
                        </h3>
                        <div id="faq-answer-35" class="accordion-collapse collapse" aria-labelledby="faq-heading-35" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">Yes. International travel agents and tour operators are identified as target clients where they require a dependable local or cross-border destination partner.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-36">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-36" aria-expanded="false" aria-controls="faq-answer-36">36. What support can you provide to an overseas travel agent?</button>
                        </h3>
                        <div id="faq-answer-36" class="accordion-collapse collapse" aria-labelledby="faq-heading-36" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">A&amp;PM can provide destination management and in-country coordination for agents and partner organisations, including supplier coordination and ground arrangements aligned with the confirmed programme.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-37">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-37" aria-expanded="false" aria-controls="faq-answer-37">37. Can you handle executive airport transfers?</button>
                        </h3>
                        <div id="faq-answer-37" class="accordion-collapse collapse" aria-labelledby="faq-heading-37" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Executive transfers are included within the company’s corporate travel solutions and can be coordinated with other itinerary requirements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-38">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-38" aria-expanded="false" aria-controls="faq-answer-38">38. Can you manage a multi-city or cross-border business itinerary?</button>
                        </h3>
                        <div id="faq-answer-38" class="accordion-collapse collapse" aria-labelledby="faq-heading-38" data-bs-parent="#faqAccordion6">
                            <div class="accordion-body style2"><p class="faq-text">The company’s itinerary-management and East Africa destination capabilities support complex travel planning. The final programme will depend on the requested destinations, supplier availability and applicable travel requirements.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-7" aria-labelledby="faq-topic-heading-7" class="mb-5">
                <h2 id="faq-topic-heading-7" class="h3">Tailor-made experiences</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion7">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-39">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-39" aria-expanded="false" aria-controls="faq-answer-39">39. Can you create a honeymoon itinerary?</button>
                        </h3>
                        <div id="faq-answer-39" class="accordion-collapse collapse" aria-labelledby="faq-heading-39" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Honeymoons are specifically included among the tailor-made experiences the company can coordinate.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-40">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-40" aria-expanded="false" aria-controls="faq-answer-40">40. Do you organise cultural experiences?</button>
                        </h3>
                        <div id="faq-answer-40" class="accordion-collapse collapse" aria-labelledby="faq-heading-40" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Cultural journeys can be incorporated into tailor-made itineraries, with an emphasis on respectful engagement with local communities, heritage and culture.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-41">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-41" aria-expanded="false" aria-controls="faq-answer-41">41. Can you organise photography-focused travel?</button>
                        </h3>
                        <div id="faq-answer-41" class="accordion-collapse collapse" aria-labelledby="faq-heading-41" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Photography is included among the company’s special-interest travel options and can be incorporated into safari or nature itineraries.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-42">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-42" aria-expanded="false" aria-controls="faq-answer-42">42. Do you arrange educational or group learning trips?</button>
                        </h3>
                        <div id="faq-answer-42" class="accordion-collapse collapse" aria-labelledby="faq-heading-42" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Educational trips and small-group travel are included among the company’s target markets and tailor-made experience categories.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-43">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-43" aria-expanded="false" aria-controls="faq-answer-43">43. Can you design an adventure-focused trip?</button>
                        </h3>
                        <div id="faq-answer-43" class="accordion-collapse collapse" aria-labelledby="faq-heading-43" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Adventure and nature experiences can be combined with safari, mountain, lake, coastal or cross-border itineraries depending on the client’s interests.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-44">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-44" aria-expanded="false" aria-controls="faq-answer-44">44. Can families and couples request private arrangements?</button>
                        </h3>
                        <div id="faq-answer-44" class="accordion-collapse collapse" aria-labelledby="faq-heading-44" data-bs-parent="#faqAccordion7">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company specifically serves couples and families seeking private, flexible and safe travel arrangements, and the destination portfolio supports private travel options.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-8" aria-labelledby="faq-topic-heading-8" class="mb-5">
                <h2 id="faq-topic-heading-8" class="h3">Prices, payments and cancellations</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion8">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-45">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-45" aria-expanded="false" aria-controls="faq-answer-45">45. How is the price of a trip determined?</button>
                        </h3>
                        <div id="faq-answer-45" class="accordion-collapse collapse" aria-labelledby="faq-heading-45" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">Pricing depends on the selected itinerary, travel dates, accommodation level, transport, guides, activities, group size and other confirmed inclusions. A clear package price is provided during the quotation stage.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-46">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-46" aria-expanded="false" aria-controls="faq-answer-46">46. What is included in my quoted package?</button>
                        </h3>
                        <div id="faq-answer-46" class="accordion-collapse collapse" aria-labelledby="faq-heading-46" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">The quotation should clearly state the services included in your package. A&amp;PM’s service philosophy emphasizes clearly defined inclusions and coordinated delivery.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-47">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-47" aria-expanded="false" aria-controls="faq-answer-47">47. Are there fixed deposit percentages for every booking?</button>
                        </h3>
                        <div id="faq-answer-47" class="accordion-collapse collapse" aria-labelledby="faq-heading-47" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">The company profile does not prescribe one universal deposit percentage. Your quotation and booking terms should state the applicable payment schedule for your specific journey.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-48">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-48" aria-expanded="false" aria-controls="faq-answer-48">48. What is your cancellation or refund policy?</button>
                        </h3>
                        <div id="faq-answer-48" class="accordion-collapse collapse" aria-labelledby="faq-heading-48" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">The company profile does not specify a single universal cancellation or refund schedule. Applicable conditions should be stated in the booking terms and may also depend on the cancellation rules of airlines, accommodation providers and other suppliers used for the journey.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-49">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-49" aria-expanded="false" aria-controls="faq-answer-49">49. Can prices change after I receive a quotation?</button>
                        </h3>
                        <div id="faq-answer-49" class="accordion-collapse collapse" aria-labelledby="faq-heading-49" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">The company profile emphasizes transparent pricing, but supplier availability and booking status can affect final arrangements. Customers should rely on the validity, inclusions and confirmation conditions stated in the specific quotation and booking terms.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-50">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-50" aria-expanded="false" aria-controls="faq-answer-50">50. Do you offer budget, mid-range and premium travel options?</button>
                        </h3>
                        <div id="faq-answer-50" class="accordion-collapse collapse" aria-labelledby="faq-heading-50" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s destination portfolio is designed to support flexible budget, mid-range and premium configurations.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-51">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-51" aria-expanded="false" aria-controls="faq-answer-51">51. Will I know the payment schedule before confirming?</button>
                        </h3>
                        <div id="faq-answer-51" class="accordion-collapse collapse" aria-labelledby="faq-heading-51" data-bs-parent="#faqAccordion8">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s process includes issuing booking terms and a payment schedule as part of quotation and confirmation.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-9" aria-labelledby="faq-topic-heading-9" class="mb-5">
                <h2 id="faq-topic-heading-9" class="h3">Responsible travel and service quality</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion9">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-52">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-52" aria-expanded="false" aria-controls="faq-answer-52">52. How does A&amp;PM support safe and reliable travel?</button>
                        </h3>
                        <div id="faq-answer-52" class="accordion-collapse collapse" aria-labelledby="faq-heading-52" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">The company works through professional planning, responsive communication and carefully selected suppliers, including licensed transport operators and qualified guides appropriate to the journey.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-53">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-53" aria-expanded="false" aria-controls="faq-answer-53">53. How do you promote responsible wildlife tourism?</button>
                        </h3>
                        <div id="faq-answer-53" class="accordion-collapse collapse" aria-labelledby="faq-heading-53" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">We encourage responsible wildlife viewing and conservation-aware travel choices.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-54">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-54" aria-expanded="false" aria-controls="faq-answer-54">54. How do you support local communities?</button>
                        </h3>
                        <div id="faq-answer-54" class="accordion-collapse collapse" aria-labelledby="faq-heading-54" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">The company seeks to work with local guides, suppliers and community-based experiences where appropriate.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-55">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-55" aria-expanded="false" aria-controls="faq-answer-55">55. What is your approach to environmental stewardship?</button>
                        </h3>
                        <div id="faq-answer-55" class="accordion-collapse collapse" aria-labelledby="faq-heading-55" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">We encourage lower-impact travel choices and responsible accommodation and transport partners where practical.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-56">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-56" aria-expanded="false" aria-controls="faq-answer-56">56. How do you approach cultural tourism?</button>
                        </h3>
                        <div id="faq-answer-56" class="accordion-collapse collapse" aria-labelledby="faq-heading-56" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">The company promotes respectful engagement with local cultures, communities and heritage.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-57">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-57" aria-expanded="false" aria-controls="faq-answer-57">57. Will travellers receive guidance on responsible behaviour?</button>
                        </h3>
                        <div id="faq-answer-57" class="accordion-collapse collapse" aria-labelledby="faq-heading-57" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s responsible-tourism framework includes practical pre-trip guidance intended to support safe and respectful travel behaviour.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-58">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-58" aria-expanded="false" aria-controls="faq-answer-58">58. How do you maintain service quality?</button>
                        </h3>
                        <div id="faq-answer-58" class="accordion-collapse collapse" aria-labelledby="faq-heading-58" data-bs-parent="#faqAccordion9">
                            <div class="accordion-body style2"><p class="faq-text">A&amp;PM’s model is based on supplier coordination, service monitoring, responsive communication and post-trip feedback, supported by carefully selected partners and clear service standards.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-10" aria-labelledby="faq-topic-heading-10" class="mb-5">
                <h2 id="faq-topic-heading-10" class="h3">Pre-travel and journey support</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion10">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-59">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-59" aria-expanded="false" aria-controls="faq-answer-59">59. What pre-travel information will I receive?</button>
                        </h3>
                        <div id="faq-answer-59" class="accordion-collapse collapse" aria-labelledby="faq-heading-59" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">Pre-travel support may include booking confirmations, trip information, packing guidance and relevant contact details.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-60">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-60" aria-expanded="false" aria-controls="faq-answer-60">60. Do you provide visa advice?</button>
                        </h3>
                        <div id="faq-answer-60" class="accordion-collapse collapse" aria-labelledby="faq-heading-60" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">The company profile does not define a formal visa-advisory service. Travellers should verify entry requirements applicable to their nationality and itinerary; A&amp;PM can provide trip information relevant to the confirmed travel arrangements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-61">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-61" aria-expanded="false" aria-controls="faq-answer-61">61. Who do I contact if I need help during my trip?</button>
                        </h3>
                        <div id="faq-answer-61" class="accordion-collapse collapse" aria-labelledby="faq-heading-61" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">A&amp;PM remains available during journey delivery to coordinate the trip and support service delivery. The relevant contact details should be included with your pre-travel information.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-62">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-62" aria-expanded="false" aria-controls="faq-answer-62">62. What happens if a supplier issue occurs during the journey?</button>
                        </h3>
                        <div id="faq-answer-62" class="accordion-collapse collapse" aria-labelledby="faq-heading-62" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">The company’s role includes coordinating the trip and monitoring service delivery. If an issue arises, contact A&amp;PM promptly so the team can work with the relevant supplier and support the confirmed itinerary.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-63">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-63" aria-expanded="false" aria-controls="faq-answer-63">63. Can I provide feedback after my trip?</button>
                        </h3>
                        <div id="faq-answer-63" class="accordion-collapse collapse" aria-labelledby="faq-heading-63" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">Yes. Post-trip follow-up includes collecting feedback, which supports service improvement, referrals and repeat business.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-64">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-64" aria-expanded="false" aria-controls="faq-answer-64">64. Can you help me plan another trip after I return?</button>
                        </h3>
                        <div id="faq-answer-64" class="accordion-collapse collapse" aria-labelledby="faq-heading-64" data-bs-parent="#faqAccordion10">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company’s objective includes building long-term relationships with travellers, suppliers and partner organisations, and repeat travel can be planned through the same consultation and itinerary-development process.</p></div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq-topic-11" aria-labelledby="faq-topic-heading-11" class="mb-5">
                <h2 id="faq-topic-heading-11" class="h3">Contact and enquiries</h2>
                <div class="accordion-area accordion mb-30" id="faqAccordion11">
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-65">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-65" aria-expanded="false" aria-controls="faq-answer-65">65. How can I contact A&amp;PM Tours &amp; Travel Ltd?</button>
                        </h3>
                        <div id="faq-answer-65" class="accordion-collapse collapse" aria-labelledby="faq-heading-65" data-bs-parent="#faqAccordion11">
                            <div class="accordion-body style2"><p class="faq-text">You can contact us by telephone or WhatsApp on +254 788 799 517, by email at reservations@apmtours.com, or through the website at https://apmtours.com.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-66">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-66" aria-expanded="false" aria-controls="faq-answer-66">66. Can I contact you on WhatsApp?</button>
                        </h3>
                        <div id="faq-answer-66" class="accordion-collapse collapse" aria-labelledby="faq-heading-66" data-bs-parent="#faqAccordion11">
                            <div class="accordion-body style2"><p class="faq-text">Yes. The company profile lists +254 788 799 517 as the WhatsApp contact number.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-67">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-67" aria-expanded="false" aria-controls="faq-answer-67">67. Which social media channels can I follow?</button>
                        </h3>
                        <div id="faq-answer-67" class="accordion-collapse collapse" aria-labelledby="faq-heading-67" data-bs-parent="#faqAccordion11">
                            <div class="accordion-body style2"><p class="faq-text">You can find A&amp;PM on Instagram as @APMTours_KE, and on Facebook, LinkedIn and X as APMTours_KE.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-68">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-68" aria-expanded="false" aria-controls="faq-answer-68">68. What should I include in my first enquiry?</button>
                        </h3>
                        <div id="faq-answer-68" class="accordion-collapse collapse" aria-labelledby="faq-heading-68" data-bs-parent="#faqAccordion11">
                            <div class="accordion-body style2"><p class="faq-text">For the fastest planning process, include your intended travel dates, number of travellers, destinations or interests, approximate budget, preferred travel style and any special requirements.</p></div>
                        </div>
                    </div>
                    <div class="accordion-card style2">
                        <h3 class="accordion-header" id="faq-heading-69">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-answer-69" aria-expanded="false" aria-controls="faq-answer-69">69. What is the best way to request a personalised itinerary?</button>
                        </h3>
                        <div id="faq-answer-69" class="accordion-collapse collapse" aria-labelledby="faq-heading-69" data-bs-parent="#faqAccordion11">
                            <div class="accordion-body style2"><p class="faq-text">Contact the reservations team through email, telephone, WhatsApp or the website and provide your travel requirements. The company will use these details for consultation and itinerary design.</p></div>
                        </div>
                    </div>
                </div>
            </section>
        </div></div>
        <div class="title-area text-center mt-5">
            <h2 class="sec-title">Still have a question?</h2>
            <p>Tell us what you have in mind and our team will help you plan the next step.</p>
            <a href="{{ route('contact') }}" class="th-btn th-icon">Contact A&amp;PM</a>
            <p class="mt-3"><a href="{{ route('terms') }}">Terms &amp; Conditions</a> · <a href="{{ route('privacy') }}">Privacy Policy</a> · <a href="{{ route('cookies') }}">Cookies Policy</a></p>
        </div>
    </div>
</section>
@endsection
