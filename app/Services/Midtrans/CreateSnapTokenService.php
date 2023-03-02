<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Keranjang;

class CreateSnapTokenService extends Midtrans
{
    protected $pembayaran;

    public function __construct($pembayaran)
    {
        parent::__construct();

        $this->pembayaran = $pembayaran;
    }

    public function getSnapToken()
    {
        $produks = [];
        foreach ($this->pembayaran->pesanans as $pesanan) {
            array_push($produks, [
                'id' => $pesanan->produk->id,
                'price' => $pesanan->produk->harga,
                'quantity' => $pesanan->kuantitas,
                'name' => $pesanan->produk->nm_produk,
            ]);
        }
        array_push($produks, [
            'id' => $this->pembayaran->id,
            'price' => $this->pembayaran->ongkir,
            'quantity' => 1,
            'name' => 'Ongkir',
        ]);
        $params = [
            'transaction_details' => [
                'order_id' => $this->pembayaran->uuid,
                'gross_amount' => $this->pembayaran->total,
            ],
            'item_details' => $produks,
            'customer_details' => [
                'first_name' => $this->pembayaran->alamat->nm_penerima,
                'email' => auth()->user()->email,
                'phone' => $this->pembayaran->alamat->no_hp
            ]

        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
