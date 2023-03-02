{{-- @dd($pembayarans) --}}
@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card row pt-3 pe-2">
            <div class="card-body p-1">
                <h2 style="text-align: center">Pesanan Selesai</h2>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-3 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama pembeli</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pembayarans->count() > 0)
                            @foreach ($pembayarans as $i => $pembayaran)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $pembayaran->alamat->nm_penerima }}</td>
                                    <td>Rp. {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                                    <td>{{ $pembayaran->status == '4' ? 'Diterima' : '' }}</td>
                                    <td><a href="/pesanan/cetak_pdf/{{ $pembayaran->id }}" type="button"
                                            class="btn btn-outline-danger btn-sm me-2"><i class="fa fa-file-pdf-o me-2"
                                                aria-hidden="true"></i>PDF</a><a
                                            href="/dashboard/detailPesanan/{{ $pembayaran->id }}" type="button"
                                            class="btn btn-outline-info btn-sm" data-id=""><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center"> ------------------------------------------ Tidak ada
                                    pesanan yang selesai ------------------------------------------ </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('table').on('click', '.hapus', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Yakin menghapus produk?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url('dashboard/produk') }}/' + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            _method: 'DELETE'
                        },
                        error: function() {
                            Swal.showValidationMessage(
                                'Gagal menghapus data')
                        }
                    });
                }
            }).then((result) => {
                1
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Berhasil menghapus produk!', '', 'success')
                    window.location.reload()
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Batal',
                        'produk tetap ada',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
