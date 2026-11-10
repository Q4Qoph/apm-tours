@php($isList = ($viewMode ?? 'grid') === 'list')
<div class="{{ $isList ? 'col-12' : 'col-xxl-4 col-xl-6' }}">
    <div class="tour-box {{ $isList ? 'style-flex ' : '' }}th-ani">
        <div class="tour-box_img global-img">
            <img
                src="{{ asset($destination['image']) }}"
                alt="{{ $destination['alt'] }}"
                width="{{ $destination['width'] }}"
                height="{{ $destination['height'] }}"
                loading="lazy"
                decoding="async"
            >
        </div>
        <div class="tour-content">
            <h2 class="box-title">{{ $destination['name'] }}</h2>
            <p class="box-text apm-destination-summary">{{ $destination['description'] }}</p>
            <div class="tour-action">
                <a href="{{ route('contact', array_merge($planningPreferences ?? [], ['place' => $destination['name']])) }}" class="th-btn style4 th-icon">Plan a Trip</a>
            </div>
        </div>
    </div>
</div>
