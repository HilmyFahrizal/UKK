<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pesanan extends Model
{
    use HasFactory, Uuid;

    protected $guarded = ['uuid'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
