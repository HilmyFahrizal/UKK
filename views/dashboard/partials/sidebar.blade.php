<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/dashboard">
            <span class="ms-1 font-weight-bold">Dashboard</span>
            <img src={{ asset('assets/front/images/logo7.png') }} style="height : 40px">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::Is('dashboard') ? 'active' : '' }}" href="/dashboard" id="dashboard">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Halaman Utama</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::Is('dashboard/produk') ? 'active' : '' }}" href="/dashboard/produk"
                    id="produk">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::Is('dashboard/merk') ? 'active' : '' }}" href="/dashboard/merk"
                    id="catatan">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list-ul text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Merk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::Is('dashboard/kategori') ? 'active' : '' }}" href="/dashboard/kategori"
                    id="kategori">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user', 'dashboard/produk', 'dashboard/produk/create', 'dashboard/produk/*/edit', 'dashboard/merk', 'dashboard/merk/create', 'dashboard/merk/*/edit', 'dashboard/kategori', 'dashboard/kategori/create', 'dashboard/kategori/*/edit') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts1"
                    aria-expanded="{{ Request::is('dashboard/produk', 'dashboard/produk/create', 'dashboard/produk/*/edit', 'dashboard/merk', 'dashboard/merk/create', 'dashboard/merk/*/edit', 'dashboard/kategori', 'dashboard/kategori/create', 'dashboard/kategori/*/edit') ? 'true' : 'false' }}"
                    aria-controls="collapseLayouts1" id="pembelian">
                    <div
                        class="icon icon-shape icon-sm py-0  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-database text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Master </span>
                </a>
                <div class="collapse {{ Request::is('dashboard/user', 'dashboard/produk', 'dashboard/produk/create', 'dashboard/produk/*/edit', 'dashboard/merk', 'dashboard/merk/create', 'dashboard/merk/*/edit', 'dashboard/kategori', 'dashboard/kategori/create', 'dashboard/kategori/*/edit') ? 'show' : '' }}"
                    id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav d-block">
                        <a class="nav-link {{ Request::Is('dashboard/user') ? 'active' : '' }}" href="/dashboard/user"
                            id="user">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-user-o text-dark fa-2x" aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengguna</span>
                        </a>
                        <a class="nav-link {{ Request::Is('dashboard/produk', 'dashboard/produk/create', 'dashboard/produk/*/edit') ? 'active' : '' }}"
                            href="/dashboard/produk" id="produk">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Produk</span>
                        </a>
                        <a class="nav-link {{ Request::Is('dashboard/merk', 'dashboard/merk/create', 'dashboard/merk/*/edit') ? 'active' : '' }}"
                            href="/dashboard/merk" id="catatan">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-list-ul text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1 py-auto">Merk</span>
                        </a>
                        <a class="nav-link {{ Request::Is('dashboard/kategori', 'dashboard/kategori/cretee', 'dashboard/kategori/*/edit') ? 'active' : '' }}"
                            href="/dashboard/kategori" id="kategori">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Kategori</span>
                        </a>
                    </nav>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/detailPesanan/*', 'dashboard/pemesanan', 'dashboard/konfirmasi', 'dashboard/proses', 'dashboard/dikirim', 'dashboard/selesai', 'dashboard/batal') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="{{ Request::is('dashboard/detailPesanan/*', 'dashboard/pemesanan', 'dashboard/konfirmasi', 'dashboard/proses', 'dashboard/dikirim', 'dashboard/selesai', 'dashboard/batal') ? 'true' : 'false' }}"
                    id="pembelian">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembelian <span
                            class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::withTrashed()->count() }}</span></span>
                </a>
                <div class="collapse {{ Request::is('dashboard/pemesanan', 'dashboard/konfirmasi', 'dashboard/proses', 'dashboard/dikirim', 'dashboard/selesai', 'dashboard/batal') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav d-block">
                        <a class="nav-link {{ Request::Is('dashboard/pemesanan') ? 'active' : '' }}"
                            href="{{ '/dashboard/pemesanan' }}"><i class="fa fa-envelope me-2 ms-5" aria-hidden="true"
                                style="color: #7c65ff"></i>
                            Pemesanan <span
                            class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::where('payment_status', '=', '1')->where('status', '!=', '5')->count() }}</span>
                        </a>
                        <a class="nav-link {{ Request::Is('dashboard/konfirmasi') ? 'active' : '' }}"
                            href="{{ '/dashboard/konfirmasi' }}"><i class="fa fa-check-circle-o me-2 ms-5"
                                aria-hidden="true" style="color: rgb(245, 153, 237)"></i>
                            Konfirmasi <span
                                class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::where('payment_status', '=', '2')->where('status', '=', '1')->count() }}</span></a>
                        <a class="nav-link {{ Request::Is('dashboard/proses') ? 'active' : '' }}"
                            href="{{ '/dashboard/proses' }}"><i class="fa fa-clock-o me-2 ms-5" aria-hidden="true"
                                style="color: #b6ac20"></i>
                            Proses<span
                                class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::where('status', '=', '2')->count() }}</span></a>
                        <a class="nav-link {{ Request::Is('dashboard/dikirim') ? 'active' : '' }}"
                            href="{{ '/dashboard/dikirim' }}"><i class="fa fa-truck me-2 ms-5" aria-hidden="true"
                                style="color: #66def3"></i>Dikirim
                            <span
                                class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::where('status', '=', '3')->count() }}</span></a>
                        <a class="nav-link {{ Request::Is('dashboard/selesai') ? 'active' : '' }}"
                            href="{{ '/dashboard/selesai' }}"><i class="fa fa-paper-plane-o me-2 ms-5"
                                aria-hidden="true" style="color: #81fc96"></i>Selesai <span
                                class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::where('status', '=', '4')->count() }}</span></a>
                        <a class="nav-link {{ Request::Is('dashboard/batal') ? 'active' : '' }}"
                            href="{{ '/dashboard/dibatalkan' }}"><i class="fa fa-times me-2 ms-5 ps-1"
                                aria-hidden="true" style="color: #f5332d"></i>Dibatalkan <span
                                class="badge text-bg-info ms-2">{{ App\Models\Pembayaran::withTrashed()->where('status', '=', '5')->orWhere('payment_status', '=', '3')->count() }}</span></a>
                    </nav>

                </div>
            </li>

        </ul>
    </div>
</aside>
