@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="grid">
            <div class="container__cart">
                <div class="header__cart">
                    <h3>GIỎ HÀNG</h3>
                    <p><a style="text-decoration: none; color: black; font-weight: 600" href="{{route('index')}}">Trang chủ</a> / Giỏ hàng</p>
                </div>
                @if (Session::has('success'))
                    <div class="notification">
                        <p> {{Session::get('success')}} </p>
                        <span class="notification__progress"></span>
                    </div>
                @endif
                <div>
                    <table style="width:100% ; margin-bottom: 15px">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($productCarts)
                            @foreach($productCarts as $product)
                                <tr style="text-align:center">           
                                    <td style="max-width: 200px">{{$product['item']->tensanpham}}</td>
                                    <td><img src="/source/image/product/{{$product['item']->image}}" alt="" height="70px"></td>
                                    <td>{{$product['qty']}}</td>
                                    <td>{{$product['item']->giamoi !=0?number_format($product['item']->giamoi,0):
                                        number_format($product['item']->giacu,0)}}
                                    </td>
                                    <td>
                                        <a style="color: black" href="{{route('delCartItem', $product['item']['id'])}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                    @if (@empty($productCarts))
                        <div style="text-align: center">
                            <img src="/source/image/avatar/cart.png" style="width: 180px; height: auto" alt=""><br/>
                            <span>Giỏ hàng trống</span>
                        </div>
                    @endif
                    <div class="cart-quantity">
                        <h3 class="title-cart">Tổng số giỏ hàng</h3>
                        <div class="cart-order">
                            <span>Đang chuyển hàng:</span> Free Shipping
                        </div>
                        <div class="cart-order">
                            <span>Tổng giỏ hàng :</span> {{isset($totalPrice)?number_format($totalPrice,0,".",","):0}} đ
                        </div>
                        <a href="{{route('getCheckout')}}">
                            <button class="btn__add-cart">Thanh toán</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection