<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $Pembayaran = $callback->getPembayaran();

            if ($callback->isSuccess()) {
                Pembayaran::where('uuid', $Pembayaran->uuid)->update([
                    'payment_status' => '2',
                ]);
            }

            if ($callback->isExpire()) {
                $pembayaran = Pembayaran::where('uuid', $Pembayaran->uuid)->first();

                $pembayaran->update([
                    'payment_status' => '3',
                ]);
                foreach ($pembayaran->pesanans as $pesanan) {
                    $produk = Produk::where('id', $pesanan->produk_id)->first();
                    $produk->update([
                        'stok' => $produk->stok + $pesanan->kuantitas
                    ]);
                }
                return redirect('/pesanan');
            }

            if ($callback->isCancelled()) {
                return;
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Pembayaran Telah Diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}
