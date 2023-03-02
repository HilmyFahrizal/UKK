<?php

namespace App\Models;

use App\Models\Merk;

use App\Traits\Uuid;
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Produk extends Model
{
    use Uuid;
    use Sortable;
    protected $fillable = ['uuid', 'nm_produk', 'deskripsi', 'gambar', 'stok', 'berat', 'harga', 'merk_id', 'kategori_id'];
    protected $with = ['pesanan'];
    protected $appends = ['terjual', 'untung'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function pembayaran()
    {
        return $this->belongsToMany(Pembayaran::class, 'pesanans', 'produk_id', 'pembayaran_id');
    }

    public function getTerjualAttribute()
    {
        $terjual = 0;
        foreach ($this->pesanan()->whereHas('pembayaran', function ($q) {
            $q->where('payment_status', '2');
        })->get() as $pesanan) {
            $terjual += $pesanan->kuantitas;
        }
        return $terjual;
    }

    public function getUntungAttribute()
    {
        $untung = 0;
        foreach ($this->pesanan()->whereHas('pembayaran', function ($q) {
            $q->where('payment_status', '2');
        })->get() as $pesanan) {
            $untung += $pesanan->sub_total;
        }
        return $untung;
    }

    public $sortable = ['produk_id', 'gambar', 'nm_produk', 'stok', 'harga', 'berat', 'kategori_id', 'merk_id', 'deskripsi',];
}
