@extends('layouts.app')
@section('title', 'Planning your trip with A&PM | A&PM Tours & Travel')
@section('content')
<x-editorial-article title="Planning your trip with A&amp;PM" image="service-destination.webp" alt="Travel planning materials arranged on a map" width="900" height="790" summary="Start with your dates, interests and travel party, then work towards an itinerary and written quotation.">
    <h2 class="h3">Start with the journey you have in mind</h2>
    <p>Tell us your preferred travel dates, number of travellers, interests, budget range and preferred travel style. Accommodation preferences and any special requirements help us understand what matters to your group.</p>
    <h2 class="h3">Shape a practical itinerary</h2>
    <p>A&amp;PM uses your requirements to propose suitable destinations, pacing and inclusions. Our service portfolio brings together safaris and holidays, accommodation, transport, guide coordination, corporate travel and tailor-made experiences. Flight ticketing and related agency services are planned; discuss availability with the team.</p>
    <h2 class="h3">Review the written quotation</h2>
    <p>Review your itinerary, inclusions, booking terms and payment schedule before confirming. An enquiry begins the consultation process and does not confirm a booking. Arrangements depend on availability and written confirmation under the applicable terms.</p>
    <h2 class="h3">Prepare for departure</h2>
    <p>After confirmation, A&amp;PM coordinates agreed supplier reservations and shares relevant confirmations, trip information, packing guidance and contact details. During the journey, the team coordinates service delivery and remains available for support.</p>
    <p>For practical answers about enquiries and confirmation, visit our <a href="{{ route('faq') }}">FAQs</a>. Review the <a href="{{ route('terms') }}">Terms &amp; Conditions</a> alongside your quotation.</p>
</x-editorial-article>
@endsection
