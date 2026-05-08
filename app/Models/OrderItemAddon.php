<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_item_id',
        'addon_id',
        'addon_price',
    ];

    protected function casts(): array
    {
        return [
            'addon_price' => 'decimal:2',
        ];
    }
}
