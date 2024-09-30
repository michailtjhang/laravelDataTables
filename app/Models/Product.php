<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'product';
    protected $keyType = 'string';

    protected $fillable = [
        'id_product',
        'name_product',
        'harga_satuan',
        'stok_product',
    ];
}