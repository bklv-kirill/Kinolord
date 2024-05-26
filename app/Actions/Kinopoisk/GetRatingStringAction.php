<?php

namespace App\Actions\Kinopoisk;

class GetRatingStringAction
{

    public function __invoke(int $rating, string $title): string
    {
        $ratingColor = $rating < 5 ? '#DC3545'
            : ($rating > 8 ? '#FFD700' : '#27cb00');

        return "{$title}: <span class='rating' style='color: $ratingColor'>{$rating}</span>";
    }

}
