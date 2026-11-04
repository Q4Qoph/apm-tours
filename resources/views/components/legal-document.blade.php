@props(['title', 'effectiveDate'])

<section class="space apm-legal-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <header class="mb-5">
                    <h1>{{ $title }}</h1>
                    <p class="mb-0">Effective date: {{ $effectiveDate }}</p>
                </header>
                <article class="legal-document">
                    {{ $slot }}
                </article>
            </div>
        </div>
    </div>
</section>
