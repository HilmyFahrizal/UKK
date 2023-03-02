@extends('tampilan.layouts.index')
@section('container')
    <!-- ***** Main Banner Area Start ***** -->
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="page-heading mb-5" id="top">
            @if (session('success'))
                <div class="alert alert-success mb-3 col-lg-10" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-content">
                            <h2>Cek Produk Terbaru Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="mb-4">
                <div class="row justify-content-cneter my-5">
                    <input type="text" id="cari" class="form-control col-8 p-3" placeholder="Cari Produk"
                        autocomplete="off">
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/produk">Semua</a></li>
                        @foreach ($kategoris as $kategori)
                            <li><a class="dropdown-item" href="/produk/{{ $kategori->id }}">{{ $kategori->nm_kategori }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row" id="SearchProduct">
                @foreach ($produks as $produk)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul class="d-flex justify-content-center">
                                        <li><a class="rounded" href="/produk/{{ $produk->id }}/detail"><i
                                                    class="fa fa-eye"></i></a></li>
                                        <li>
                                            <form action="/keranjang/{{ $produk->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="many">
                                                <input type="hidden" name="kuantitas" value="1">
                                                @if ($produk->stok > 0)
                                                    <button type="submit" class="btn btn-lg btn-light rounded">
                                                        <i class="fa-solid fa-cart-plus fa-xs"></i>
                                                    </button>
                                                @else
                                                    <button disabled type="submit" class="btn btn-lg btn-light rounded">
                                                        <i class="fa-solid fa-cart-plus fa-xs"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="" width="200"
                                    height="300" style="object-fit: contain">
                            </div>
                            <div class="down-content">
                                <h4>{{ $produk->nm_produk }}</h4>
                                <span>Rp. {{ number_format($produk->harga) }}</span>
                                <ul class="stars">
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <p>stok {{ $produk->stok }}</p>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li>
                                <a href="">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="pull-center">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
@section('script')
    <script>
        $('#kategori').on('change', function() {
            const id = this.value;
            $.ajax({
                url: '/produk/' + id,
                dataType: 'json',

                beforeSend: function() {
                    $loader.show();
                }
            }).done(

            );
        })
    </script>
    <script>
        function debounce(func, timeout = 500) {
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    func.apply(this, args);
                }, timeout);
            };
        }
        const cari = document.querySelector('#cari');
        const products = document.querySelector('#SearchProduct');
        // const halos = ['tes',
        //     'halo', 'tod'
        // ];
        cari.addEventListener('keyup', debounce(function() {
            const cariBr = cari.value;
            const url = `/cari`;
            $.ajax({
                url: url,
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                },
                data: {
                    cari: cariBr,
                },
                success: function(response) {
                    // console.log(response.barangs);
                    // let barangs = response.barangs;
                    products.innerHTML = response.map(produk => `<div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul class="d-flex justify-content-center">
                                        <li><a class="rounded" href="/produk/${ produk.id }/detail"><i
                                                    class="fa fa-eye"></i></a></li>
                                        <li>
                                            <form action="/keranjang/${ produk.id }" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="many">
                                                <input type="hidden" name="kuantitas" value="1">
                                                ${produk.stok > 0 ? `<button type="submit" class="btn btn-lg btn-light rounded">
                                                                                                    <i class="fa-solid fa-cart-plus fa-xs"></i>
                                                                                                </button>` : `<button disabled type="submit" class="btn btn-lg btn-light rounded">
                                                                                                    <i class="fa-solid fa-cart-plus fa-xs"></i>
                                                                                                </button>`}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <img src="/storage/${produk.gambar }" alt="" width="200"
                                    height="300" style="object-fit: contain;">
                            </div>
                            <div class="down-content">
                                <h4>${ produk.nm_produk }</h4>
                                <span>${Intl.NumberFormat().format(produk.harga)}</span>
                                <ul class="stars">
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <li><i></i></li>
                                    <p>stok ${ produk.stok }</p>

                                </ul>
                            </div>
                        </div>
                    </div>`).join('');
                }
            });
        }, 500));
    </script>
@endsection
