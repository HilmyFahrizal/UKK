@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-warning mb-3 col-lg-10" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <div class="card row pt-3">
            <div class="card-body p-1">
                <h2 style="text-align: center">Kategori</h2>
            </div>
            <div>
                <a type="button" class="btn btn-outline-primary btn-dark ms-3" href="/dashboard/kategori/create"> + Kategori
                </a>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-4 card-body text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $i => $kategori)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $kategori->nm_kategori }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/dashboard/kategori/{{ $kategori->id }}/edit"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-outline-danger btn-sm hapus"
                                        data-id="{{ $kategori->id }}"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-center">
                {{ $kategoris->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('table').on('click', '.hapus', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Yakin menghapus Kategori?',
                text: "ini akan menghapus semua relasi yang ada!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url('dashboard/kategori') }}/' + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            _method: 'DELETE'
                        },
                        error: function() {
                            Swal.showValidationMessage('Gagal menghapus kategori')
                        }
                    });
                }
            }).then((result) => {
                1
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Berhasil menghapus kategori!', '', 'success')
                    window.location.reload()
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Batal',
                        'merk tetap ada',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
