<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{

    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $model->slug = str($model->name)->slug('-');
        });
    }

}
