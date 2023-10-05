@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="grid">
                @if(session('message'))
                    <div class="alert alert-success">
                            {{ session('message') }}
                    </div>
                @endif
            <div style="height: 44vh">     
                <div class="modal__overlay">
                    <div class="model__body">
                        <div class="modal__inner">
                            <form action="{{route('postinputEmail')}}" method="POST">
                                @csrf
                                <h2>Email của bạn</h2>
                                <div class="form__group">
                                    <input class="form__group-input" name="txtEmail" placeholder="Nhập địa chỉ email" type="text" 
                                        value="{{isset($request->txtEmail)?$request->txtEmail:''}}">
                                </div>
                                    <div class="form__btn">
                                        <button type="submit">Gửi</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection