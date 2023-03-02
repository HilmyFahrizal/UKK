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
                <h2 style="text-align: center">Pengguna</h2>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-3 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Pengeluaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $user->nm_user }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (isset($user->alamat))
                                        {{ $user->alamat }}
                                    @else
                                        (belum diisi)
                                    @endif
                                </td>
                                <td>
                                    @if (isset($user->no_telepon))
                                        {{ $user->no_telepon }}
                                    @else
                                        (belum diisi)
                                    @endif
                                </td>
                                <td>
                                    Rp. {{ number_format($user->pengeluaran, 0, ',', '.') }}
                                </td>
                                {{-- <td class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-danger btn-sm hapus"><i
                                            class="fa fa-trash-o " aria-hidden="true"
                                            data-id="{{ $user->id }}"></i></button>
                                </td> --}}
                                <td>
                                    <form action="/dashboard/hapusUser/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm show-delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                    <a href="/dashboard/editUser/{{ $user->id }}" class="btn btn-outline-warning"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="pull-center">
                {{ $pembayarans->links() }}
            </div> --}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.show-delete').click(function(event) {
            let form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Yakin menghapus user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    {{-- <script>
        $('table').on('click', '.hapus', function() {
            let id = $(this).data('id')
            console.log(id);
            Swal.fire({
                title: 'Yakin menghapus user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url('dashboard/hapusUser') }}/' + id,
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
                    Swal.fire('Berhasil menghapus user!', '', 'success')
                    window.location.reload()
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Batal',
                        'user tetap ada',
                        'error'
                    )
                }
            })
        });
    </script> --}}
@endsection
