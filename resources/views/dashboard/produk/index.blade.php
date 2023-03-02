{{-- @dd($produks) --}}
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
                <h2 style="text-align: center">Produk</h2>
            </div>
            <div>
                <a type="button" class="btn btn-outline-primary btn-dark ms-3" href="/dashboard/produk/create"> + Produk
                </a>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-1 text-center">
                    <thead>
                        <tr>
                            <th class="text-dark">No</th>
                            <th class="text-dark">@sortablelink('gambar', 'Gambar')</th>
                            <th>@sortablelink('nm_produk', 'Nama Produk')</th>
                            <th>@sortablelink('harga', 'Harga')</th>
                            <th>@sortablelink('stok', 'Stok')</th>
                            <th>@sortablelink('merk_id', 'Merk')</th>
                            <th>@sortablelink('kategori_id', 'Kategori')</th>
                            <th>@sortablelink('deskripsi', 'Deskripsi')</th>
                            <th class="text-dark">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $i => $produk)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><img src="{{ asset('storage/' . $produk->gambar) }}" alt="" class="img-fluid"
                                        style="height: 50px; width: 50px;object-fit: contain" />
                                </td>
                                <td>{{ $produk->nm_produk }}</td>
                                <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>{{ $produk->merk->nm_merk }}</td>
                                <td>{{ $produk->kategori->nm_kategori }}</td>
                                <td>{{ $produk->deskripsi }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/dashboard/produk/{{ $produk->id }}/edit"
                                        class="btn btn-outline-primary btn-sm me-2"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-outline-danger btn-sm hapus"
                                        data-id="{{ $produk->id }}"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-center">
                {{ $produks->links() }}
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
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
