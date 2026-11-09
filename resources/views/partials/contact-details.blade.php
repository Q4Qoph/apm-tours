<div class="th-widget-contact apm-contact-details">
    <div class="info-box_text"><div class="icon"><i class="fas fa-phone" aria-hidden="true"></i></div><div class="details"><p><span class="visually-hidden">{{ ($showWhatsApp ?? true) ? 'Call/WhatsApp:' : 'Call:' }} </span><a href="tel:+254788799517" class="info-box_link">+254 788 799 517</a>@if ($showWhatsApp ?? true)<br><a href="https://wa.me/254788799517" class="info-box_link">Message on WhatsApp</a>@endif</p></div></div>
    <div class="info-box_text"><div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div><div class="details"><p><span class="visually-hidden">Email: </span><a href="mailto:reservations@apmtours.com" class="info-box_link">reservations@<wbr>apmtours.com</a></p></div></div>
    @if ($showWebsite ?? true)
    <div class="info-box_text"><div class="icon"><i class="fas fa-globe" aria-hidden="true"></i></div><div class="details"><p><span class="visually-hidden">Website: </span><a href="https://apmtours.com" class="info-box_link">apmtours.com</a></p></div></div>
    @endif
    <div class="info-box_text"><div class="icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></div><div class="details"><p><span class="visually-hidden">Address: </span>P.O. Box 9820-00200,<br>Nairobi, Kenya</p></div></div>
    <div class="info-box_text"><div class="icon"><i class="fas fa-question-circle" aria-hidden="true"></i></div><div class="details"><p><a href="{{ route('faq') }}" class="info-box_link">FAQs</a></p></div></div>
</div>
