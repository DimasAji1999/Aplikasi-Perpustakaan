<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_produk extends Model
{
    protected $table = 'm_produk';
    protected $fillable = [
        'kategori','judul','penulis','keterangan','stock'
    ];
}
