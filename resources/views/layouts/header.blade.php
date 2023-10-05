<!-- HEADER -->
<header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <div class="header__topbar">
                        <div class="header__address">
                           <span><i class="fa-solid fa-phone"></i> Địa chỉ: Đà Nẵng - Hotline: 0123456789 </span>
                        </div>
                        <div class="header__customer">
                            <ul class="header__list">
                                <!-- THÔNG BÁO -->
                                <li class="header__option">
                                    <a href="{{route('getFavorite')}}" class="header__option-link" title="Thông báo">
                                        <i class="fa-solid fa-heart fa-beat"></i>
                                    </a>
                                </li>
                                <!-- USER -->
                                <li class="header__option">
                                    <a href="{{route('admin.getLogin')}}" class="header__option-link" title="Tài khoản">   
                                        @if(@empty(Auth::user()->avatar))
                                        <i class="fa-solid fa-user"></i> 
                                        @endif
                                        @if (Auth::check())
                                            <div class="avatar__header">
                                                <div class="avatar__header-user" style="background-image: url('/source/image/avatar/{{Auth::user()->avatar}}')"></div>
                                            </div>
                                            {{-- <img src="/source/image/product/{{Auth::user()->avatar}}" style="border-radius: 100%; width: 22px; height: 22px;"></img> --}}
                                        @endif
                                        @if(Auth::check())
                                            <span style="padding-left: 6px">{{ Auth::user()->name }}</span>
                                        @endif                
                                    </a>
                                    <form class="header__logout" action="{{route('getLogout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn__logout" style="" title="Đăng xuất">Logout</button>
                                    </form>
                                </li>
                                <!-- CART -->
                                <li class="header__option">
                                    <a href="{{route('cart')}}" class="header__option-link" title="Giỏ hàng">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                    <span class="cart__quantity">@if(Session::has('cart')){{Session('cart')->totalQty}}
                                        @else <div style="display: none">
                                            <img src="/images/anh1.jpg" alt="">    
                                        </div> @endif</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="strikethrough"></div>
                    <div class="header__outer">
                        <!-- IMG -->
                            <a href="{{route('index')}}" class="header__navbar-link" title="Logo">
                                PHONE
                            </a>
                        <!-- MENU -->
                        <ul id="menu-tab" class="header__list">
                            <li class="header__item active">
                                <a href="{{route('index')}}" class="header__item-link">TRANG CHỦ</a>
                            </li>
                            <li class="header__item">
                                <a href="" class="header__item-link ">SẢN PHẨM</a>

                                    <ul class="menu__category">
                                        @foreach($loai_sp as $loai)
                                        <li class="menu__category-item">
                                            <a href="{{route('product', $loai->id)}}" class="menu__category-link">{{ $loai->name }}</a>
                                        </li>
                                        @endforeach
                                        {{-- <li class="menu__category-item">
                                            <a href="" class="menu__category-link">TABLE</a>
                                        </li>
                                        <li class="menu__category-item">
                                            <a href="" class="menu__category-link">TABLE</a>
                                        </li>
                                        <li class="menu__category-item">
                                            <a href="" class="menu__category-link">TABLE</a>
                                        </li>
                                        <li class="menu__category-item">
                                            <a href="" class="menu__category-link">TABLE</a>
                                        </li> --}}
                                    </ul>
                            </li>
                            <li class="header__item">
                                <a href="" class="header__item-link">GIỚI THIỆU</a>
                            </li>
                            <li class="header__item">
                                <a href="{{route('contact')}}" class="header__item-link">LIÊN HỆ</a>
                            </li>
                            {{-- <div class="active"></div> --}}
                        </ul>
                        <!-- SEARCH -->           
                        <form action="{{route('postSearchProduct')}}" method="GET">
                            <div class="header__search">
                                @csrf
                                <input type="text" name="key" title="Tìm kiếm" placeholder="Tìm kiếm...">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                        </div>
                </nav>
            </div>
        </header>

{{-- <script>
    var header = document.getElementById('menu-tab');
    var btns = document.getElementsByClassName('header__item-link');
    for( var i=0 ; i<btns.length; i++) {
        btns[i].addEventListener('click', function(){
            var current=document.getElementsByClassName('active');
            current[0].className = current[0].className.replace(' active', '');
            this.className += ' active';
        })
    }
</script> --}}