<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Order;

class Catalog extends Model
{
    protected $table = 'catalogs';
    protected $primaryKey = 'catalog_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Custom method to find by slug
    public static function findBySlug(string $slug)
    {
        return static::where('catalog_id', $slug)->firstOrFail();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'catalog_id', 'catalog_id');
    }
}
