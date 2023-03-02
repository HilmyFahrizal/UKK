<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use Uuid;
    protected $fillable = ['uuid', 'nm_kategori'];
    protected $appends = ['terjual'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function pesanan()
    {
        return $this->hasManyThrough(Pesanan::class, Produk::class);
    }

    public function getTerjualAttribute()
    {
        $terjual = 0;
        foreach ($this->pesanan()->whereHas('pembayaran', function ($q) {
            $q->where('payment_status', 2);
        })->get() as $pesanan) {
            $terjual += $pesanan->kuantitas;
        }
        return $terjual;
    }
}
