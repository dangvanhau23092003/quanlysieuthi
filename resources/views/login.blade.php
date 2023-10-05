@extends('layouts.master')

@section('content')
    <!-- MODAL -->
    <div class="container">
        <div class="modal">
        <!-- Đăng nhập -->
        @if (Session::has('thongbao'))
            <div class="notification">
                <p> {{Session::get('thongbao')}} </p>
                <span class="notification__progress"></span>
            </div>
        @endif
        <div class="modal__overlay">
            <div class="model__body">
                <div class="modal__inner">
                    <form action="{{route('admin.postLogin')}}" method="post" class="beta-form-checkout">
                        @csrf
                        <h2>Đăng nhập</h2>
                        <div class="auth__form">
                            <div class="form__group">
                                <input type="email" class="form__group-input" placeholder="Email" name="email" required>
                            </div>
                            <div class="form__group">
                                <input type="password" class="form__group-input" placeholder="Password" name="password" required>
                            </div>
                            <div class="form__group">
                                <div>
                                    <input type="checkbox" class="form__group-checkbox" placeholder="password">
                                        Nhớ tài khoản
                                </div>
                                <span class="form-help"><a href="{{route('getEmail')}}">Quên mật khẩu</a></span>
                            </div>
                        </div>
                        <div class="form__btn">
                            <button type="submit">Đăng nhập</button>
                        </div>
                        <div class="form__group">
                            <span class="form-help">Bạn chưa có tài khoản? <a href="/signup">Đăng ký</a></span>
                        </div>
                        <!-- Đăng nhập với google -->
                        <div class="other-help">
                            <button><i class="fa-brands fa-google fa-bounce"></i> 
                                <span>Sign in with Google</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection