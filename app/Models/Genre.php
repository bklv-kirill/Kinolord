<?php

namespace App\Models;

use App\Casts\Genre\NameCast;
use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    use HasSlug;

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $casts = [
        'name' => NameCast::class,
    ];
}