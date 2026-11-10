<form action="{{ route('destinations') }}" method="GET" class="booking-form style8">
    <div class="input-wrap">
        <div class="row align-items-center justify-content-between">
            <div class="form-group col-md-6 col-lg-auto">
                <div class="icon"><i class="fa-light fa-route" aria-hidden="true"></i></div>
                <div class="search-input">
                    <label for="trip-region">Destination</label>
                    <select name="region" id="trip-region" class="form-select nice-select">
                        <option value="">All destinations</option>
                        @foreach (config('destinations.regions') as $region)
                            <option value="{{ $region }}">{{ $region }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6 col-lg-auto">
                <div class="icon"><i class="fa-regular fa-person-hiking" aria-hidden="true"></i></div>
                <div class="search-input">
                    <label for="trip-style">Type</label>
                    <select name="travel_style" id="trip-style" class="form-select nice-select">
                        <option value="">Any travel style</option>
                        @foreach (config('destinations.travel_styles') as $style)
                            <option value="{{ $style }}">{{ $style }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6 col-lg-auto">
                <div class="icon"><i class="fa-light fa-clock" aria-hidden="true"></i></div>
                <div class="search-input">
                    <label for="trip-duration">Duration</label>
                    <select name="duration" id="trip-duration" class="form-select nice-select">
                        <option value="">Flexible</option>
                        @for ($days = 1; $days <= 14; $days++)
                            <option value="{{ $days }}">{{ $days }} {{ $days === 1 ? 'day' : 'days' }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-btn col-md-12 col-lg-auto"><button type="submit" class="th-btn"><img src="{{ asset('assets/img/icon/search.svg') }}" alt="">Search</button></div>
        </div>
    </div>
</form>
