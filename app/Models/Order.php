<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'catalog_id',
        'name',
        'email',
        'phone_number',
        'address',
        'note',
        'wedding_date',
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'catalog_id');
    }

    public function index()
    {
        $orders = static::with('catalog')->get();
        return $orders;
    }

    public static function findBySlug(string $slug)
    {
        return static::where('order_id', $slug)->firstOrFail();
    }
}
