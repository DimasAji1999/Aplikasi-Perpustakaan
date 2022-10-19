<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    public function buku_r(){
    	return $this->belongsTo('App\Models\M_produk','buku');
    }
    public function user_r(){
    	return $this->belongsTo('App\Models\User','user');
    }
    public function status_r(){
        return $this->belongsTo('App\Models\M_status','status','kode')->withDefault(['nama'=>'Menunggu Verifikasi']);
    }
}
