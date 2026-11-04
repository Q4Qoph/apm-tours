@extends('layouts.app')
@section('title', 'Responsible travel with A&PM | A&PM Tours & Travel')
@section('content')
<x-editorial-article title="Responsible travel with A&amp;PM" image="service-culture.webp" alt="People in traditional red attire at an outdoor gathering" width="900" height="790" summary="Explore the principles behind respectful wildlife, community and cultural experiences.">
    <h2 class="h3">Respect wildlife and natural places</h2>
    <p>A&amp;PM’s responsible-tourism approach encourages responsible wildlife viewing and conservation-aware travel choices. The company supports lower-impact travel choices and responsible accommodation and transport partners where practical.</p>
    <h2 class="h3">Value local knowledge and communities</h2>
    <p>The Company Profile describes working with local guides, suppliers and community-based experiences where appropriate. Cultural travel should encourage respectful engagement with local communities, heritage and culture.</p>
    <h2 class="h3">Plan with suitable suppliers</h2>
    <p>Supplier coordination is central to A&amp;PM’s operating model. The profile calls for carefully selected, licensed and insured partners, with service standards focused on reliability and guest satisfaction. The specific arrangements for a trip are confirmed through consultation and quotation.</p>
    <h2 class="h3">Prepare, ask questions and share feedback</h2>
    <p>Pre-travel guidance supports safe and respectful behaviour during the journey. Ask the team about the arrangements relevant to your itinerary and use the contact details provided for support. Post-trip feedback helps inform service improvement.</p>
    <p>For practical answers about enquiries and confirmation, visit our <a href="{{ route('faq') }}">FAQs</a>. Review the <a href="{{ route('terms') }}">Terms &amp; Conditions</a> alongside your quotation.</p>
</x-editorial-article>
@endsection
