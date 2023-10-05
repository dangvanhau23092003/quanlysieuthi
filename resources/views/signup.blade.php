@extends('layouts.master')

@section('content')
    <!-- MODAL -->
    <div class="container">
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
        
    @if (Session::has('success'))
        <div class="notification">
            <p> {{Session::get('success')}} </p>
            <span class="notification__progress"></span>
        </div>
    @endif
    <div class="modal">
        <div class="modal__overlay">
            <div class="model__body">
                <!-- Đăng ký -->
                <div class="modal__inner">
                    <form action="{{route('postsignin')}}" method="post" class="beta-form-checkout">
                        @csrf
                        <h2>Đăng ký</h2>
                        <div class="auth__form">
                            <div class="form__group">
                                <input type="text" class="form__group-input" placeholder="Name" name="name" required>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <input type="email" class="form__group-input" placeholder="Email" name="email" required>
                            </div>
                            @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <input type="text" class="form__group-input" placeholder="Address" name="address" required>
                            </div>
                            @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <input type="number" class="form__group-input" placeholder="Phone" name="phone" required>
                            </div>
                            @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <input type="password" class="form__group-input" placeholder="Password" name="password" required>
                            </div>
                            @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <input type="password" class="form__group-input" placeholder="RePassword" name="repassword" required>
                            </div>
                            @error('repassword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form__group">
                                <label for="input_upload"><i class="fa-solid fa-cloud-arrow-down"></i> Chọn ảnh đại diện</label>
                                <input type="file" name="avatar" id="input_upload" required>
                            </div>
                            @error('avatar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form__btn">
                            <button>Đăng ký</button>
                        </div>
                        <div class="form__group">
                            <span class="form-help">Bạn đã có tài khoản? <a href="/login">Đăng nhập</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection