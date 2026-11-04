@props(['title', 'image', 'alt', 'width', 'height', 'summary'])
<section class="th-blog-wrapper space apm-editorial-page">
    <div class="container"><div class="row justify-content-center"><div class="col-lg-10">
        <nav aria-label="Breadcrumb" class="mb-4"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('blog') }}">Blog</a> / <span aria-current="page">{{ $title }}</span></nav>
        <article class="th-blog blog-single">
            <header class="mb-4"><span class="sub-title">A&amp;PM travel guidance</span><h1>{{ $title }}</h1><p>{{ $summary }}</p></header>
            <figure class="blog-img"><img src="{{ asset('assets/img/apm-selected/'.$image) }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}"><figcaption class="mt-2">Illustrative travel photography.</figcaption></figure>
            <div class="blog-content">{{ $slot }}</div>
        </article>
        <div class="btn-group mt-4"><a class="th-btn th-icon" href="{{ route('contact') }}">Discuss your trip</a><a class="th-btn style4" href="{{ route('blog') }}">All articles</a></div>
    </div></div></div>
</section>
