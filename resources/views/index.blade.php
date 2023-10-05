@extends('layouts.master')

@section('content')
        <div class="container">
            {{-- <div style="max-width: 100% "> --}}
                {{-- <video loop autoplay style="width: 100%;" src="https://images.samsung.com/is/content/samsung/assets/vn/2302/pcd/kv/01-hd01-DM-Series-kv-pc-1440x640.mp4"></video> --}}
            {{-- </div> --}}
            <div class="grid">
                {{-- <div class="slider"> --}}
                    @foreach ($slides as $slide)
                    <div class="header__slider fade">
                        {{-- <img src="source/image/slide/{{$slide->image}}" alt="" class="" height="auto"> --}}
                        <div class="img-banner" style="background-image: url('source/image/slide/{{$slide->image}}')"></div>
                    </div>
                {{-- <div class="header__slider fade">
                    <img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190620/ourmid/pngtree-apple-x-promotions-banner-image_170052.jpg" alt="" class="">
                </div> --}}
                @endforeach
                {{-- </div> --}}
            </div>
            <div class="grid">
                <div class="container__heading">
                    <div class="container__title">
                        <h2 class="container__title-discount">Giảm giá sốc</h2>
                    </div>
                    <div class="container__title">
                        <a href="" class="container__see-all">Xem tất cả</a>
                    </div>
                </div>
                <!-- Nội dung sản phẩm -->
                <div class="container__product">
                    <div class="grid__row">
                        <div class="grid__column-12">
                            <div class="home__product">
                                {{-- @php
								    $stt=0;
							    @endphp --}}
                                <div class="grid__row">
                                    @isset($discount_products)
                                    @foreach($discount_products as $discount_product)
                                        {{-- @php
                                            $stt++;
                                        @endphp --}}
                                    <!-- ẢNH 1 -->
                                    <div class="grid__column-3">
                                        <div class="product__list">
                                            <div class="product__image">
                                                <a href="{{route('product_type', $discount_product->id)}}">
                                                    <div class="img" style="background-image: url(/source/image/product/{{$discount_product->image}}); "></div>
                                                </a>
                                                <div class="product__details-hover">
                                                    <div class="product__details">
                                                        <button class="product__add-cart">
                                                            <a href="{{route('addCart', $discount_product->id)}}">
                                                                Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                            </a>
                                                        </button>
                                                        <span class="product__view-details">
                                                            <a href="{{route('product_type', $discount_product->id)}}"><i class="fa-solid fa-eye"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__name">
                                                <span>{{$discount_product->tensanpham}}</span>
                                            </div>
                                            <div class="product__price">
                                                <span class="product__price-new">{{number_format($discount_product->giamoi)}}₫</span>
                                                <span class="product__price-old">{{number_format($discount_product->giacu)}}₫</span>
                                                <div class="add-favorite">
                                                    <a href="{{route('addFavorite', $discount_product->id)}}">
                                                        <i class="fa-solid fa-heart"></i>                                                        
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
								    @endisset
                                    <!-- ẢNH 2 -->
                                    <!-- <div class="grid__column-3">
                                        <div class="product__list">
                                            <div class="product__image">
                                                <a href="">
                                                    <div class="img" style="background-image: url(/images/laptop3.jpg); "></div>
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
                                    </div> -->
                                    <!-- ẢNH 3 -->
                                    <!-- <div class="grid__column-3">
                                        <div class="product__list">
                                            <div class="product__image">
                                                <a href="">
                                                    <div class="img" style="background-image: url(/images/samsung3.jpg); "></div>
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
                                    </div> -->
                                    <!-- ẢNH 4 -->
                                    <!-- <div class="grid__column-3">
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
                                    </div> -->
                                </div>
                                <!-- phân trang -->
                                <span>
                                    {!! $discount_products->links() !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="container__heading">
                    <div class="container__title">
                        <h2 class="container__title-discount">Bán chạy nhất</h2>
                    </div>
                    <div class="container__title">
                        <a href="" class="container__see-all">Xem tất cả</a>
                    </div>
                </div>
                <!-- Nội dung sản phẩm -->
                <div class="container__product">
                    <div class="grid__row">
                        <div class="grid__column-12">
                            <div class="home__product">
                                <div class="grid__row">
                                    @isset($bestseller_products)
                                    @foreach ($bestseller_products as $bestseller_product)
                                    <!-- ẢNH 1 -->
                                    <div class="grid__column-3">
                                        <div class="product__list">
                                            <div class="product__image">
                                                <a href="{{route('product_type', $bestseller_product->id)}}">
                                                    <div class="img" style="background-image: url(/source/image/product/{{$bestseller_product->image}}); "></div>
                                                </a>
                                                <div class="product__details-hover">
                                                    <div class="product__details">
                                                        <button class="product__add-cart">
                                                            <a href="{{route('addCart', $bestseller_product->id)}}">
                                                                Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i>
                                                            </a>
                                                        </button>
                                                        <span class="product__view-details">
                                                            <a href="{{route('product_type', $bestseller_product->id)}}"><i class="fa-solid fa-eye"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__name">
                                                <span>{{$bestseller_product->tensanpham}}</span>
                                            </div>
                                            <div class="product__price">                                             
                                                <span class="product__price-new">{{number_format($bestseller_product->giamoi)}} ₫</span>
                                                <span class="product__price-old">{{number_format($bestseller_product->giacu)}} ₫</span>                                              
                                                <div class="add-favorite">
                                                    <a href="{{route('addFavorite', $bestseller_product->id)}}">
                                                        <i class="fa-solid fa-heart"></i>                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                    @endisset
                                </div>
                                <!-- phân trang -->
                                <span>
                                    {!! $bestseller_products->links() !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection


