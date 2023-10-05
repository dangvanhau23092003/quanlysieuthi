@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="grid">
            <div class="container__cart">
                <div class="header__cart">
                    <h3>Đặt hàng</h3>
                    <p><a style="text-decoration: none; color: black; font-weight: 600" href="{{route('index')}}">Trang chủ</a> / Đặt hàng</p>
                </div>
                @if (Session::has('success'))
                    <div class="notification">
                        <p> {{Session::get('success')}} </p>
                        <span class="notification__progress"></span>
                    </div>
                @endif
                <div>
                    <form action="{{route('postCheckout')}}" method="post">
                        @csrf
                        <div class="container__checkout">
                            <div class="information-order">
                                <h2>Thông tin thanh toán</h2>
                                <div class="form__group">
                                    <input type="text" class="form__group-input" name="name" placeholder="Họ tên" required>
                                </div>
                                <div class="choose-gender">
                                    <input type="radio" name="gender" value="nam" checked="checked"> Nam
                                    <input type="radio" name="gender" value="nữ"> Nữ
                                </div>
                                <div class="form__group">
                                    <input type="email" name="email" class="form__group-input" placeholder="Email" required>
                                </div>
                                <div class="form__group">
                                    <input type="text" name="address" class="form__group-input" placeholder="Địa chỉ" required>
                                </div>
                                <div class="form__group">
                                    <input type="number" name="phone_number" class="form__group-input" placeholder="Điện thoại" required>
                                </div>
                                <div class="form__group"> 
                                    <textarea class="form__group-input" name="note" style="height: 100px" name="" id="" cols="30" rows="10" placeholder="Ghi chú" required></textarea>
                                </div>
                            </div>

                            <div class="your-order">
                                <h2>Đơn hàng của bạn</h2>
                                @isset($productCarts)
                                @foreach($productCarts as $product)
                                    <div class="content-order"> 
                                        <img src="/source/image/product/{{$product['item']->image}}" alt="" height="60px" style="padding: 0 35px">
                                        <div class="information-product">
                                            <ul>
                                                <li>Tên sản phẩm:<span>{{$product['item']->tensanpham}}</span></li>
                                                <li>Giá : <span>{{number_format($product['item']->giamoi)}} ₫</span></li>
                                                <li>Số lượng: <span>{{$product['qty']}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                @endisset
                                <div class="total-order"> 
                                    <span>Tổng tiền:</span>{{isset($totalPrice)?number_format($totalPrice,0,".",","):0}} đ
                                </div>
                                <div>
                                    <h2>Hình thức thanh toán</h2>
                                    <div class="payments">
                                        <span onclick="myFunction()">
                                            <input type="radio" name="payment" value="COD" checked="checked">Trả tiền mặt khi nhân hàng
                                        </span>
                                        <div>
                                            <i id="show">Trả tiền mặt khi giao hàng.</i>
                                        </div>
                                    </div>
                                    <div class="payments">
                                        <span onclick="handleTransfer()">
                                            <input type="radio"  value="ATM" name="payment" >Chuyển khoản ngân hàng
                                        </span>
                                        <div>
                                            <i id="showTransfer" style="display: none">Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi.
                                                Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng
                                                sẽ đươc giao sau khi tiền đã chuyển..
                                            </i>
                                        </div>
                                    </div>
                                    
                                        <button type="submit" class="btn__add-cart">Đặt hàng</button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


<script>
    function myFunction() {
    var x = document.getElementById("show");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function handleTransfer() {
        var x = document.getElementById("showTransfer");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>
