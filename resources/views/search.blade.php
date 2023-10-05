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
                    <p>Tất cả những sản phẩm Mới nhất nằm trong BST được mở bán Hàng Tuần sẽ được cập nhật liên tục tại đây. Chắc chắn bạn sẽ 
                        tìm thấy những sản phẩm Đẹp Nhất - Vừa Vặn Nhất - Phù Hợp nhất với phong cách của mình.</p>
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
                                                <p>{{$l->name}}</p>
                                            </a>
                                        </label>
                                        @endforeach
                                    </div>      
                                </div>
                            </div>

                            <!-- </div> -->
    
                            <div class="grid__column-9">
                                <div class="choose__price">
                                    <button class="increase__price">Giá tăng dần</button>
                                    <button class="reduce__price">Giá giảm dần</button>
                                </div>

                                <div class="home__product">
                                    <div class="grid__row">
                                    @foreach ($product_search as $sp)
                                        <!--  -->
                                        <div class="grid__column-4">
                                            <div class="product__list">
                                                <div class="product__image">
                                                    <a href="">
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