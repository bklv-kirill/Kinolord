<?php

if (! function_exists('getCardName')) {
    function getCardName(array $kpData): string
    {
        return $kpData['name'] ?? ($kpData['alternativeName'] ?? 'Информация отстутствует');
    }
}

if (! function_exists('getCardDescription')) {
    function getCardDescription(array $kpData): string
    {
        $fullDescription = str($kpData['description'] ?? 'Информация отсутствует');
        $fullDescription = $fullDescription->length >= 250 ? $fullDescription->substr(0, 250) . '...' : $fullDescription;


        return $kdData['shortDescription'] ?? $fullDescription ?? 'Информация отстутствует';
    }
}

if (! function_exists('getCardYear')) {
    function getCardYear(array $kpData): string
    {
        return $kpData['year'] ? ' - ' . $kpData['year'] : '';
    }
}

if (! function_exists('getCardCountries')) {
    function getCardCountries(array $kpData): string
    {
        $countries = [];

        foreach ($kpData['countries'] as $country) {
            $countries[] = $country['name'];
        }

        return !empty($countries) ? implode(', ', $countries) : '';
    }
}

if (! function_exists('getCardGenres')) {
    function getCardGenres(array $kpData): string
    {
        $genres = [];

        foreach ($kpData['genres'] as $genre) {
            $genres[] = $genre['name'];
        }

        return !empty($genres) ? ' - ' . implode(', ', $genres) : '';
    }
}
