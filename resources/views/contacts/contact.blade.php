@extends('layouts.master')

@section('content')

<!-- CONTACT -->
<div class="container">
    <!-- contact -->
    @if (Session::has('success'))
    <div class="notification">
        <p> {{Session::get('success')}} </p>
        <span class="notification__progress"></span>
    </div>
    @endif
    <div class="grid">
        <div class="header__cart">
            <h3>LIÊN HỆ</h3>
            <p><a style="text-decoration: none; color: black; font-weight: 600" href="{{route('index')}}">Trang chủ</a> / Liên hệ</p>
        </div>
        <div class="container__contact">
            <div class="container__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.6033953224915!2d108.26932427489297!3d15.982074841765744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314210efbf6e02f1%3A0xfee4ea97fef2d429!2zUGjhuqFtIFRo4bqtbiBEdeG6rXQsIEjDsmEgSOG6o2ksIE5nxakgSMOgbmggU8ahbiwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694285659533!5m2!1svi!2s" width="600" height="450" style="border:1px solid #ccc;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>  
            <div class="container__content">
                <h2 class="header__contact">LIÊN HỆ</h2>
                <form action="{{route('postContact')}}" method="POST">
                    @csrf
                    <div class="container__inside">
                        <div class="group__input">
                            <input type="text" class="form__input" placeholder="Name" name="name"></input>
                        </div>
                        <div class="group__input">
                            <input type="email" class="form__input" placeholder="Email" name="email"></input>
                        </div>
                        <div class="group__input">
                            <textarea type="text" style="height: 140px; padding:10px 15px" rows="5" cols="100" class="form__input"  placeholder="Ghi chú" name="message"></textarea>
                        </div>
                    </div>
                    <div class="btn_contact">
                        <button type="submit" class="button__contact">Gửi</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection