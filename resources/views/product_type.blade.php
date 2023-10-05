@extends('layouts.master')

@section('content')
<!-- CONTAINER -->
<div class="container">
    <div class="grid">
        <div class="container__product-detail">
            <div class="header__cart">
                <h3>CHI TIẾT SẢN PHẨM</h3>
                <p><a style="text-decoration: none; color: black; font-weight: 600" href="{{route('index')}}">Trang chủ</a> / Chi tiết sản phẩm</p>
            </div>
            <div class="grid__row">
                <div class="container__wrapper-detail">
                    {{-- <div class="grid__column-6"> --}}
                        <div class="image__detail">
                            <img class="image__detail-product" src="/source/image/product/{{$discount_product->image}}" alt="">
                        </div>
                    {{-- </div> --}}

                    {{-- <div class="grid__column-6">  --}}
                        <div class="content__information-product">
                            <h2 class="content__title"> {{$discount_product->tensanpham}} </h2>
                            <p class="content__describe">
                                {{$discount_product -> mota}}
                            </p>
                            <!-- Giá -->
                            <div class="product__price">
                                <span class="product__price-new">{{number_format($discount_product->giamoi)}}₫</span>
                                <span class="product__price-old">{{number_format($discount_product->giacu)}}₫</span>
                            </div>
                            <!-- tăng giảm số lượng -->
                            <!-- <div class="product__price">
                                <span class="cong">+</span>
                                <input type="number" min="1" value=1>
                                <span class="cong">-</span>
                            </div> -->
                            <!-- mua -->
                            <div class="product__price">
                                <button class="btn__add-cart">
                                    <a href="{{route('addCart', $discount_product->id)}}">
                                        Thêm vào giỏ hàng
                                    </a>
                                </button>
                                <button class="btn__buy">
                                    <a href="{{route('getCheckout')}}">
                                        Mua ngay
                                    </a>
                                </button>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection