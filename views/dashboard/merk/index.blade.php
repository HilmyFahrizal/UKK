@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger mb-3 col-lg-10" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <div class="card row pt-3">
            <div class="card-body p-1">
                <h2 style="text-align: center">Merk</h2>
            </div>
            <div>
                <a type="button" class="btn btn-outline-primary btn-dark ms-3 " href="/dashboard/merk/create">+ Merk
                </a>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-4 card-body text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Nama Merk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($merks as $i => $merk)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><img src="{{ asset('storage/' . @$merk->logo) }}" width="80" height="55"
                                        alt="" style="object-fit: contain"></td>
                                <td>{{ $merk->nm_merk }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/dashboard/merk/{{ $merk->id }}/edit"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-outline-danger btn-sm hapus"
                                        data-id="{{ $merk->id }}"><i class="fa fa-trash-o "
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-center">
                {{ $merks->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('table').on('click', '.hapus', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Yakin menghapus merk?',
                text: "ini akan menghapus semua relasi yang ada!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url('dashboard/merk') }}/' + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            _method: 'DELETE'
                        },
                        error: function() {
                            Swal.showValidationMessage('Gagal menghapus data')
                        }
                    });
                }
            }).then((result) => {
                1
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Berhasil menghapus merk!', '', 'success')
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
