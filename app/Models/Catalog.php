<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalog'; // make sure matches your DB

    // Custom method to find by slug
    public static function findBySlug(string $slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
}
