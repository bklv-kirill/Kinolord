<div class="card">
    <div class="preview">
        <a href="{{ $kpData['poster']['previewUrl'] }}" data-fancybox data-caption="{{ $kpData['name'] ?? $kpData['alternativeName'] }}">
            <img src="{{ $kpData['poster']['previewUrl'] }}" alt="{{ $kpData['name'] ?? $kpData['alternativeName'] }}"/>
        </a>
    </div>
    <div class="infos">
        <div class="main-infos">
            <div class="info">
                <h3><a href="{{ route('movie.show', $kpData['id']) }}">{{ getCardName($kpData) }}</a></h3>
            </div>
            <div class="info">
                <p>{{ getCardDescription($kpData) }}</p>
            </div>
            @isset($kpData['totalSeriesLength'])
                <div class="info">
                    <p>Серий: {{ $kpData['totalSeriesLength'] }}</p>
                </div>
            @endisset
            @isset($kpData['seriesLength'])
                <div class="info">
                    <p>Длительность серии (сред.): {{ $kpData['seriesLength'] }} мин.</p>
                </div>
            @endisset
        </div>

        @php
            $countries = isset($kpData['countries']) ? getCardCountries($kpData) : '';
            $year = isset($kpData['year']) ? getCardYear($kpData) : '';
            $genres = isset($kpData['genres']) ? getCardGenres($kpData) : '';
        @endphp
        <div class="secondary-infos">
            @if($rating = getCardRating($kpData))
                <div class="info">
                    <p>{!! $rating !!}</p>
                </div>
            @endif
            <div class="info">
                <p>{!! $countries . $year . $genres !!}</p>
            </div>
        </div>
    </div>
</div>