<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'pemesanan'; untuk menyesuaikan aturan penulisan di laravel
    protected $fillable = [
        'user_id',
        'medicines',
        'name_customer',
        'total_price',
    ];

    protected $cast = [
        'medicines' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo
        (User::class);
    }
}