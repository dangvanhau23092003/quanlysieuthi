@extends('layouts.master')

@section('content')

<!-- CONTAINER -->
<div class="container">
            <div class="grid">
                <!-- Nội dung sản phẩm -->
                <div class="container__product-category">
                    <!-- Title -->
                    <h3 class="container__title-about">
                        FOR YOU
                    </h3>
                    <p>Tất cả những sản phẩm Mới nhất được mở bán Hàng Tuần sẽ được cập nhật liên tục tại đây.</p>
                    <div class="app__content">
                        <div class="grid__row">
                            <!-- <div class="grid__column-12"> -->
                            <!-- DANH MỤC -->
                            <div class="grid__column-3">
                                <!-- DANH MỤC -->
                                <div class="container__category">
                                    <h3 class="container__part-category">DANH MỤC</h3>
                                    <!--  -->
                                    <div class="container__wrapper-checkbox">
                                        @foreach ($loai as $l)
                                        <label class="container__checkbox">
                                            <a href="{{route('product', $l->id)}}">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <p>{{$l -> name}}</p>
                                            </a>
                                        </label>
                                        @endforeach
                                    </div>          
                                </div>
                                <!-- KÍCH CỠ -->
                                <!-- <div class="container__category">
                                    <h3 class="container__part-category">KÍCH CỠ</h3>
                                    
                                    <div class="container__wrapper-checkbox">
                                        <label class="container__checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <p>36</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <p>37</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <p>38</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox" >
                                            <span class="checkmark"></span>
                                            <p>39</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <p>40</p>
                                        </label>
                                    </div>
                                    
                                </div> -->
                                <!-- MÀU SẮC -->
                                <!-- <div class="container__category">
                                    <h3 class="container__part-category">MÀU SẮC</h3>
                                    
                                    <div class="container__wrapper-checkbox">
                                        <label class="container__checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <p>Màu đỏ</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <p>Màu đen</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox" >
                                            <span class="checkmark"></span>
                                            <p>Màu trắng</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <p>Màu vàng</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox" >
                                            <span class="checkmark"></span>
                                            <p>Màu xanh</p>
                                        </label>
                                        <label class="container__checkbox">
                                            <input type="checkbox" >
                                            <span class="checkmark"></span>
                                            <p>Màu hồng</p>
                                        </label>
                                    </div>
                                    
                                </div>
                                <button class="increase__price">Xóa bộ lọc</button> -->
                            </div>

                            <!-- </div> -->
    
                            <div class="grid__column-9">
                                <div class="choose__price">
                                    <button class="increase__price">Giá tăng dần</button>
                                    <button class="reduce__price">Giá giảm dần</button>
                                </div>

                                <div class="home__product">
                                    <div class="grid__row">
                                    @foreach ($sp_theoloai as $sp)
                                        <!--  -->
                                        <div class="grid__column-4">
                                            <div class="product__list">
                                                <div class="product__image">
                                                    <a href="{{route('product_type', $sp->id)}}">
                                                        <div class="img" style="background-image: url(/source/image/product/{{$sp->image}}); "></div>
                                                    </a>
                                                    <div class="product__details-hover">
                                                        <div class="product__details">
                                                            <button class="product__add-cart">
                                                                <a href="{{route('addCart', $sp->id)}}">
                                                                    Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                                </a>
                                                            </button>
                                                            <span class="product__view-details">
                                                                <a href="{{route('product_type', $sp->id)}}"><i class="fa-solid fa-eye"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__name">
                                                    <span>{{$sp->tensanpham}}</span>
                                                </div>
                                                <div class="product__price">
                                                    <span class="product__price-new">{{number_format($sp->giamoi)}} ₫</span>
                                                    <span class="product__price-old">{{number_format($sp->giacu)}} ₫</span>
                                                    <div class="add-favorite">
                                                    <a href="{{route('addFavorite', $sp->id)}}">
                                                        <i class="fa-solid fa-heart"></i>                                                        
                                                    </a>
                                                </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    @endforeach
                                        <!--  -->
                                        {{-- <div class="grid__column-4">
                                            <div class="product__list">
                                                <div class="product__image">
                                                    <a href="">
                                                        <div class="img" style="background-image: url(https://bizweb.dktcdn.net/thumb/1024x1024/100/347/923/products/164944-4.png); "></div>
                                                    </a>
                                                    <div class="product__details-hover">
                                                        <div class="product__details">
                                                            <button class="product__add-cart">
                                                                Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                            </button>
                                                            <span class="product__view-details">
                                                                <a href=""><i class="fa-solid fa-eye"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__name">
                                                    <span>Giày Converse Chuck Taylor All Star 1970s Enamel Red - Hi</span>
                                                </div>
                                                <div class="product__price">
                                                    <span class="product__price-new">2.400.000 ₫</span>
                                                    <span class="product__price-old">-25%</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--  -->
                                        {{-- <div class="grid__column-4">
                                            <div class="product__list">
                                                <div class="product__image">
                                                    <a href="">
                                                        <div class="img" style="background-image: url(https://bizweb.dktcdn.net/thumb/1024x1024/100/347/923/products/164944-4.png); "></div>
                                                    </a>
                                                    <div class="product__details-hover">
                                                        <div class="product__details">
                                                            <button class="product__add-cart">
                                                                Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                            </button>
                                                            <span class="product__view-details">
                                                                <a href=""><i class="fa-solid fa-eye"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__name">
                                                    <span>Giày Converse Chuck Taylor All Star 1970s Enamel Red - Hi</span>
                                                </div>
                                                <div class="product__price">
                                                    <span class="product__price-new">2.400.000 ₫</span>
                                                    <span class="product__price-old">-25%</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--  -->
                                        {{-- <div class="grid__column-4">
                                            <div class="product__list">
                                                <div class="product__image">
                                                    <a href="">
                                                        <div class="img" style="background-image: url(https://bizweb.dktcdn.net/thumb/1024x1024/100/347/923/products/164944-4.png); "></div>
                                                    </a>
                                                    <div class="product__details-hover">
                                                        <div class="product__details">
                                                            <button class="product__add-cart">
                                                                Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                            </button>
                                                            <span class="product__view-details">
                                                                <a href=""><i class="fa-solid fa-eye"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__name">
                                                    <span>Giày Converse Chuck Taylor All Star 1970s Enamel Red - Hi</span>
                                                </div>
                                                <div class="product__price">
                                                    <span class="product__price-new">2.400.000 ₫</span>
                                                    <span class="product__price-old">-25%</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                    </div>
                                </div>
                            </div>
    
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

@endsection