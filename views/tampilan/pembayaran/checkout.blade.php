@extends('tampilan.layouts.index')

@section('container')
    <style>
        .offcanvas-size-xl {
            width: min(95vw, 500px) !important;
        }
    </style>
    <div class="container" style="margin-top: 130px">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="panelsStayOpen-headingOne">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                <strong>Data Diri</strong>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">+ Tambah data</button>

                                <div class="offcanvas offcanvas-end offcanvas-size-xl" tabindex="-1" id="offcanvasRight"
                                    aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="col-lg-12 mb-4">
                                            <h3>Isi Data Anda</h3>
                                            <form class="row contact_form" action="/daftarAlamat" method="post"
                                                novalidate="novalidate">
                                                @csrf
                                                <div class="col-md-12 form-group">
                                                    <label for="FloatingInput">Nama Penerima</label>
                                                    <input type="text" required class="form-control" id="first"
                                                        name="nm_penerima">
                                                </div>
                                                <div class="col-md-12 form-group ">
                                                    <label for="FloatingInput">No. HP</label>
                                                    <input type="number" required class="form-control" id="company" name="no_hp"
                                                        placeholder="Nomor Telepon">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="FloatingInput">Provinsi</label>
                                                    <select class="form-select" required name="provinsi_id" id="provinsi_id"
                                                        aria-label="Default select example">
                                                        <option value="" selected>Pilih Provinsi..</option>
                                                        @foreach ($provinsis as $provinsi)
                                                            <option value="{{ $provinsi->id }}">
                                                                {{ $provinsi->name_province }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="FloatingInput">Kota</label>
                                                    <select class="form-select" required aria-label="Default select example"
                                                        name="kota_id" id="kota_id">
                                                        <option selected>Pilih Kota..</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="FloatingInput">Alamat</label>
                                                    <input type="text" required class="form-control" id="company" name="alamat"
                                                        placeholder="Alamat">
                                                </div>
                                                <div class="col-md-12 form-group mb-5">
                                                    <label for="FloatingInput">Kode Pos</label>
                                                    <input type="number" required class="form-control" id="company"
                                                        name="kode_pos" placeholder="Kode Pos">
                                                </div>
                                                <div class="col-md-12 d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="btn btn-outline-success col-md-6">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                <strong> Layanan pengiriman</strong>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <form action="/checkout/charger" method="post">
                                    @csrf
                                    <div class="col-lg-12 mb-4">
                                        <label for="FloatingInput">Pilih Alamat Pengiriman</label>
                                        <select class="form-select" required name="alamat_id" id="alamat_id"
                                            aria-label="Default select example">
                                            <option value="" selected>Pilih alamat..</option>
                                            @foreach ($alamats as $alamat)
                                                <option value="{{ $alamat->id }}">{{ $alamat->nm_penerima }} |
                                                    {{ $alamat->no_hp }} |
                                                    {{ $alamat->alamat }},
                                                    {{ $alamat->kota->nama_kab_kota }},
                                                    {{ $alamat->provinsi->name_province }}
                                                    |
                                                    {{ $alamat->kode_pos }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Pilih Ekspedisi</label>
                                        <select class="form-select" name="courier" id="courier">
                                            <option selected>Pilih ekspedisi..</option>
                                            <option value="jne">JNE</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="pos">POS</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Pilih Layanan Pengiriman</label>
                                        <select class="form-select" name="layanan" id="layanan"
                                            aria-label="Default select example">
                                            <option selected>Pilih layanan..</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Catatan</label><br>
                                        <textarea name="catatan" id="" class="w-100" rows="6" style="resize: none"></textarea>
                                    </div>
                                    <input type="hidden" name="ongkir">
                                    <input type="hidden" name="estimasi">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                <strong> Detail barang</strong>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <table class="table mt-1 ms-1 card-body text-center col-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>harga</th>
                                            <th>subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjangs as $i => $keranjang)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td><img src="{{ asset('storage/' . $keranjang->produk->gambar) }}"
                                                        width="80" height="55" alt=""
                                                        style="object-fit: contain"></td>
                                                <td>{{ $keranjang->produk->nm_produk }}</td>
                                                <td>{{ $keranjang->kuantitas }}</td>
                                                <td class="product-price">Rp.
                                                    {{ number_format($keranjang->produk->harga, 0, ',', '.') }}
                                                </td>
                                                <td class="product-total">Rp.
                                                    {{ number_format($keranjang->subtotal, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-outline-warning btn-lg mt-3">Selesai</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#courier').on('change', function(e) {
            console.log('tes');
            const inp = $('#layanan')
            const ongkir = $('#ongkir')
            inp.prop("disabled", true);
            $.ajax({
                url: "/checkout/cek_ongkir",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    alamat_id: $('[name="alamat_id"]').val(),
                    courier: $('[name="courier"]').val(),
                },
                dataType: 'json',
                success: function({
                    results
                }) {
                    const data = results[0];
                    inp.empty()
                    inp.append(new Option('-- Pilih Layanan --', ''))
                    data.costs.forEach(cost => {
                        inp.append(new Option(cost.service + ' | ' + cost
                            .description + ' | ' + cost.cost[0].value, cost.service));
                        // console.log(cost);
                        // console.log(cost);
                    })
                    inp.on('change', function(e) {
                        // ongkir.html(cost);
                        const selected = data.costs.find(cost => cost.service === e.target
                            .value);
                        ongkir.html('Rp. ' + selected.cost[0].value);
                        document.querySelector('[name="ongkir"]').value = selected.cost[0]
                            .value;
                        document.querySelector('[name="estimasi"]').value = selected.cost[0]
                            .etd;
                    })
                    inp.prop("disabled", false);
                }
            })
        });
    </script>
    <script>
        $('#provinsi_id').on('change', function(e) {
            const inp = $('#kota_id')
            inp.prop("disabled", true);
            $.ajax({
                url: "{{ route('checkout.get_data') }}?provinsi=" + e.target.value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    inp.empty()
                    inp.append(new Option('Pilih kota..', ''))
                    data.forEach(el => inp.append(new Option(el.nama_kab_kota, el.id)))
                    inp.prop("disabled", false);
                }
            })
        });
    </script>
@endsection
