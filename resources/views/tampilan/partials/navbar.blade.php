<header class="header-area header-sticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src={{ asset('assets/front/images/logo7.png') }}>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="/keranjang" class="{{ Request::Is('keranjang') ? 'active' : '' }}">
                                <i class="fa fa-shopping-cart mt-2"></i>
                                @if (Auth::check())
                                    <span class=" top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ \App\Models\Keranjang::where('user_id', auth()->user()->id)->count() }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="scroll-to-section"><a href="/"
                                class="{{ Request::Is('/') ? 'active' : '' }}">Home</a></li>
                        <li class="scroll-to-section"><a href="/produk"
                                class="{{ Request::Is('produk') ? 'active' : '' }}">Produk</a></li>
                        @auth
                            <li class="submenu">
                                <a class="{{ Request::Is('fitur') ? 'active' : '' }}" href="javascript:;">
                                    @if (isset(auth()->user()->avatar))
                                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="rounded-circle"
                                            width="20px" height="20px" alt="" style="object-fit: cover;">
                                    @else
                                        <i class="fa fa-user-circle me-1    " aria-hidden="true"></i>
                                    @endif
                                    {{ auth()->user()->nm_user }}
                                </a>
                                <ul class="p-0">
                                    <li><a href="/profil" type="submit" class="dropdown-item">Profil</a></li>
                                    <li><a href="/pesanan" type="submit" class="dropdown-item">Pesanan</a></li>
                                    @if (auth()->user()->is_admin == 1)
                                        <li><a rel="nofollow" class="{{ Request::Is('dashboard') ? 'active' : '' }}"
                                                href="/dashboard">Dashboard</a>
                                        </li>
                                    @endif
                                    <li><a href="/logout" type="submit" class="dropdown-item"><i class="fa fa-sign-out"
                                                aria-hidden="true"></i> Logout</a></li>
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <li class="scroll-to-section"><a class="{{ Request::Is('masuk') ? 'active' : '' }}"
                                    href="/login"><i class="fa fa-sign-in me-1" aria-hidden="true"></i>Masuk</a></li>
                        @endguest
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
