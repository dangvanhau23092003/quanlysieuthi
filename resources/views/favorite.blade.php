@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="grid">
            <div class="container__cart" style="margin-bottom:122px">
                <div class="header__cart">
                    <h3>YÊU THÍCH</h3>
                    <p><a style="text-decoration: none; color: black; font-weight: 600" href="{{route('index')}}">Trang chủ</a> / Yêu thích</p>
                </div>
                @if (Session::has('message'))
                    <div class="notification">
                        <p> {{Session::get('message')}} </p>
                        <span class="notification__progress"></span>
                    </div>
                @endif
                <div>
                    <table style="width:100% ; margin-bottom: 15px">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Giá</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        @foreach ($discount_products as $discount_product)
                        <tbody>
                            <tr style="text-align:center">           
                                <td style="max-width: 200px">{{$discount_product->tensanpham}} </td>
                                <td><img src="/source/image/product/{{$discount_product->image}}" alt="" height="70px"></td>
                                <td>{{number_format($discount_product->giamoi)}}</td>
                                <td>
                                    <form action="{{route('delFavorite',$discount_product->id)}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button style="cursor: pointer;border: none;" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @if(@empty($discount_products)) 
                        <div style="text-align: center">
                            <img src="/source/image/avatar/cart.png" style="width: 180px; height: auto" alt=""><br/>
                            <span>Không có sản phẩm yêu thích</span>
                        </div>                       
                    @endif
                    {{-- @if (@empty($productCarts))
                        <div style="text-align: center">
                            <img src="https://dieuhoanoithat.vn/public/frontend/images/cart-emty.png" style="width: 180px; height: auto" alt=""><br/>
                            <span>Giỏ hàng trống</span>
                        </div>
                    @endif --}}
                    
                </div>
            </div>
        </div>
    </div>

@endsection