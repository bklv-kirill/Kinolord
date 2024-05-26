<?php

namespace App\Models;

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
}
