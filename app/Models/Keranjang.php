<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Keranjang extends Model
{
    use HasFactory, Uuid;
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }

    protected $appends = ['subtotal'];

    public function getSubtotalAttribute()
    {
        return $this->kuantitas * $this->Produk->harga;
    }
}
