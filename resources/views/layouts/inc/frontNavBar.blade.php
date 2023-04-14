<header>
    <div class="top-header">
        <div class="container">
            <div class="top-header--wrap">
                <div class="top-header__left">
                    <h4>Cửa hàng bán đồng hồ Hương Việt</h4>
                </div>
                <ul class="top-header__right">
                    <li>
                        <a href="#"><i class="fa-solid fa-arrow-right-to-bracket"></i>Tài
                            khoản</a>
                        <ul>
                            <li>
                                <a href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Đăng ký</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Yêu thích</a>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="center-header">
        <div class="container">
            <div class="center-header--wrap">
                <div class="center-header__search">
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ isset($search_product) ? $search_product : '' }}" name="key"
                            placeholder="Nhập từ khóa tìm kiếm..." />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="center-header__logo">
                    <a href="{{ route('home') }}">
                        <p>Huong Viet</p>
                        <span>watch store</span>
                    </a>
                </div>
                <div class="center-header__right">
                    <div class="header__contact">
                        <i class="fa-solid fa-phone-volume fa-beat"></i>
                        <span>Liên hệ: </span>
                        <span>{{ $settings->where('key', 'phone_number')->first()->value }}</span>
                    </div>
                    <div class="header__cart">
                        <a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                        <div class="count cart-count">{{ $cart_items_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <ul class="main-menu">
                <li><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
                <li><a href="{{ route('blogs.list') }}">Bài viết</a></li>
                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                <li><a href="{{ route('aboutUs.client') }}">Về chúng tôi</a></li>

            </ul>
        </div>
    </div>
</header>
