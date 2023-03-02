<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $with = ['pesanans', 'alamat'];

    protected $guarded = ["Uuid"];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
