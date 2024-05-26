<div class="card">
    <div class="preview">
        <img src="{{ $kpData['poster']['previewUrl'] ?? '/images/preview.png' }}" alt="{{ $kpData['name'] ?? $kpData['alternativeName'] }}">
    </div>
    <div class="infos">
        <div class="main-infos">
            <div class="info">
                <h3>Название</h3>
                <p>{{ getCardName($kpData) }}</p>
            </div>
            <div class="info">
                <h3>Описание</h3>
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
            <div class="info">
                <p>{!! $countries . $year . $genres !!}</p>
            </div>
        </div>
    </div>
</div>
