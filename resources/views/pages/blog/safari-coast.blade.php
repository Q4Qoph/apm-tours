@extends('layouts.app')
@section('title', 'Planning a safari and coastal escape | A&PM Tours & Travel')
@section('content')
<x-editorial-article title="Planning a safari and coastal escape" image="hero-coast.webp" alt="Coastal town and beach beside the ocean" width="1760" height="978" summary="Explore how Kenya’s wildlife, lake and coastal destinations can fit into a personalised travel plan.">
    <h2 class="h3">Choose the experiences that interest you</h2>
    <p>The Company Profile features Maasai Mara, Amboseli, Naivasha, Lake Nakuru, Samburu, Mount Kenya, Tsavo East &amp; West, the Kenya Coast and Nairobi. A safari, lake experience or city stay can be discussed as part of a tailored itinerary.</p>
    <h2 class="h3">Consider a coastal extension</h2>
    <p>The Kenya Coast portfolio includes Diani, Mombasa, Malindi, Watamu and Lamu for beach extensions, relaxation and culture. Your preferred pace, travel dates and budget guide the discussion about which destinations suit the journey.</p>
    <h2 class="h3">Leave room for practical planning</h2>
    <p>Rather than assuming a fixed package or duration, share your priorities with A&amp;PM. We consider suitable destinations, pacing, accommodation, transport, guides and activities when preparing the proposed itinerary. The written quotation sets out the agreed inclusions and applicable terms.</p>
    <h2 class="h3">Discuss travel beyond Kenya</h2>
    <p>East African itineraries may link Kenya with Tanzania, Uganda, Rwanda and beyond. Contact the team to discuss the destinations and arrangements available for your proposed journey. No itinerary or supplier availability is confirmed by this article.</p>
    <p>For practical answers about enquiries and confirmation, visit our <a href="{{ route('faq') }}">FAQs</a>. Review the <a href="{{ route('terms') }}">Terms &amp; Conditions</a> alongside your quotation.</p>
</x-editorial-article>
@endsection
