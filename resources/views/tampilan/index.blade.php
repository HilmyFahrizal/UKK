@extends('tampilan.layouts.index')
@section('container')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Tenda</h4>
                                <span>Bagus, Awet &amp; Terjangkau </span>
                                <div class="main-border-button">
                                    <a href="/produk">Beli sekarang!</a>
                                </div>
                            </div>
                            <img src={{ asset('assets/front/images/left-banner-image-01.jpg') }} alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Carrier</h4>
                                            <span>Carrier terbaik untuk camping</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Carrier</h4>
                                                <p>Tas yang sering digunakan oleh pendaki ataupun adventurer yang meiliki
                                                    kapasitas lebih besar dari tas biasanya di disain khusus untuk mendaki
                                                </p>
                                            </div>
                                        </div>
                                        <img src={{ asset('assets/front/images/carrier-image-baner.jpg') }}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Jaket</h4>
                                            <span>Jaket terbaik untuk outdoor</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Jaket</h4>
                                                <p>Jaket dengan bahan yang lebih tebal agar lebih hangat saat berada di alam
                                                    bebas</p>
                                            </div>
                                        </div>
                                        <img src={{ asset('assets/front/images/jaket-image-banner.jpg') }}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Sepatu</h4>
                                            <span>Sepatu terbaik untuk mendaki</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Sepatu</h4>
                                                <p>Sepatu yang didesain khusus untuk dapat melewati trek alam seperti trek
                                                    licin, berlumpur untuk melindungi kaki anda</p>
                                            </div>
                                        </div>
                                        <img src={{ asset('assets/front/images/sepatu-image-baner.jpg') }}>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Perlengkapan lainnya</h4>
                                            <span>Perlengkapan yang dibutuhkan para pendaki</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Perlnegkapan Lain</h4>
                                                <p>Perlengkapan yang biasanya digunakan oleh para pendaki untuk melengkapi
                                                    persiapan mendaki</p>
                                            </div>
                                        </div>
                                        <img src={{ asset('assets/front/images/perlengkapan-image-baner.jpg') }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section" id="carrier">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Produk Terbaru</h2>
                        <span>Produk keluaran terbaru dari merk ternama</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul class="align-items-center d-flex h-100 justify-content-center">
                                        <li><a class="rounded" href="/produk/{{ $produk->id }}/detail"><i
                                                    class="fa fa-eye"></i></a></li>
                                        {{-- <li><a class="rounded" href=""><i class="fa fa-star"></i></a></li> --}}
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
                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid" alt=""
                                    style="height: 240px; width: 416px;object-fit: contain">
                            </div>
                            <div class="down-content">
                                <div class="bawah">
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->


    {{-- <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or edit this layout. You can convert this template as any kind of ecommerce CMS theme as you wish.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        </div>
                        <p>There are 5 pages included in this HexaShop Template and we are providing it to you for absolutely free of charge at our TemplateMo website. There are web development costs for us.</p>
                        <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                        <div class="main-border-button">
                            <a href="produk.php">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Leather Bags</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src={{ asset("assets/front/images/explore-image-01.jpg") }} alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src={{ asset("assets/front/images/explore-image-02.jpg") }} alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** --> --}}

    <!-- ***** Social Area Starts ***** -->
    {{-- <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="font-putih">Social Media</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-01.jpg') }} alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-02.jpg') }} alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-03.jpg') }} alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-04.jpg') }} alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-05.jpg') }} alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src={{ asset('assets/front/images/instagram-06.jpg') }} alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    {{-- <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your Email Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button"><i
                                            class="fa fa-paper-plane"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- ***** Subscribe Area Ends ***** -->
@endsection
