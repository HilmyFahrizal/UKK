@extends('dashboard.layouts.main')
@section('container')
    @if (session('gagal'))
        <div class="alert alert-warning  mb-3 ms-4 col-lg-10" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/merk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="floatingInput" class="form-label">Logo</label>
                        <input type="file" class="form-control bg-light @error('logo') is-invalid @enderror"
                            name="logo" required oninvalid="this.setCustomValidity('kesalahan input')"
                            oninput="setCustomValidity('')" />
                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="floatingInput" class="form-label">Nama Merk</label>
                        <div class="bru">
                            <input type="text" class="form-control bg-light @error('nm_merk') is-invalid @enderror"
                                name="nm_merk" required oninvalid="this.setCustomValidity('kesalahan input')"
                                oninput="setCustomValidity('')" />
                        </div>
                        @error('nm_merk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-dark">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var i = 0;
            $('#tmbl').click(function() {
                i++;
                $('#bru').append(`<input id="row'+1+'" type="text" class="form-control bg-light @error('nm_merk') is-invalid @enderror"
name="nm_merk" required oninvalid="this.setCustomValidity('kesalahan input')"
oninput="setCustomValidity('')" />`);
            });
        });
    </script>
@endsection
