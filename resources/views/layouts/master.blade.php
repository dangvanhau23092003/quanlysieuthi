<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/source/assets/css/style.css">
    <link rel="stylesheet" href="/source/assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>web</title>
    <link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC1UlEQVR4AXWTU6BkORRFkxTHtm3Pz9i2bZtt27Zt27b5bKNs1+rcausjONrHAjjpRJ2rnvcXtO3k2ffDJG/W76MCpf3+jwdy7jyV7nFEuGbmh7UrLsG9/VkCWU8T3n8+od12/OvOxrHmIny5jfoZQKcE8Bd2bOfc/Dgx5wyIToO6t6DyfH0U1ClS5ZLg3rOoXXEx4bq57x4HECwb+Ldr2/MkI7sgPpO0Rxt7zewca+HycyUdmpggKMEvieTYMiCHIxHJmOe8ujU3kAhshPhc0v43oNYOMcHA/xVCSD64z0TMI7jxGknxNEUo5wydToP+GYBgaf9/fNmfQHQj6dCj4LWRqDYxtoONKe3O5qEbLfT4006r383ce40Vx14Fbknd6gt1FHm3C+e2lzZFK/8A7/+kg4polYmZvW2YzZLrr7Jw+6UK+5mKJt+aIKWPX5IKCNzrz8Pojqhfd2dNsupR8FlJeSSXWE188bDSUSiuvFDx51dm4kEtCwsIy4O18AhC+8/Em/XrGFG39tb6ZJkdnIKkS7JlhInd8xSVZZIX7rOyaJSJoDYgIUlHFUQEOBThHDvGnAjHpkez4nkWqJcQUcRrbVilpGsLM2DmoVslt92gjdMS4kYU+rgV3s2X4C9o3UUY1fRtPgt8Oty3JA/dJNk4zkK8wpQxyN5o1bUw8+HLClL6hARpv6Bw7oVEXWueFXF/1l21qy4nXXImrT400b+tGSISfPJguCnJf7/bmDzIlEkDbezbfi41yy8mlYybBCB8ec16OhZfAB4JIX3qFThEBiQdlpDUJyYy8mihiaJZFxCunvbpkUlMJaNWX85/g2qWnEe6yHywHpWHTp0Ah4RqSWSvhewZ52OM/Um7kAHJb9GjftnF1K88j9D6M0ns0kO17Sy8K86gYsF5VC+9iGDZ4D9Pu43Gifv33WtsnWPzk7uNFtevu6vKtf21tcbEGmN/ov4BgBS74zWXkCoAAAAASUVORK5CYII=">
    @yield('css')
</head>
<body>
    <div class="app">
        <!-- HEADER -->
        @include('layouts.header')
        <!-- CONTAINER -->
        @yield('content')
        <!-- FOOTER -->
        @include('layouts.footer')
    </div>
</body>
    <script src="/source/assets/js/script.js"></script>
    <!-- MODAL -->
    <!-- <div class="modal">
        <div class="modal__overlay">
            <div class="model__body"> -->
                <!-- Đăng ký -->
                <!-- <div class="modal__inner">
                    <h2>Đăng ký</h2>
                    <div class="auth__form">
                        <div class="form__group">
                            <input type="text" class="form__group-input" placeholder="name">
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__group-input" placeholder="username">
                        </div>
                        <div class="form__group">
                            <input type="email" class="form__group-input" placeholder="email">
                        </div>
                        <div class="form__group">
                            <input type="password" class="form__group-input" placeholder="password">
                        </div>
                        <div class="form__group">
                            <input type="password" class="form__group-input" placeholder="confirmPassword">
                        </div>
                    </div>
                    <div class="form__btn">
                        <button>Đăng ký</button>
                    </div>
                    <div class="form__group">
                        <span class="form-help">Bạn đã có tài khoản? <a href="">Đăng nhập</a></span>
                    </div>
                </div> -->

                <!-- Đăng nhập -->
                <!-- <div class="modal__inner">
                    <h2>Đăng nhập</h2>
                    <div class="auth__form">
                        <div class="form__group">
                            <input type="email" class="form__group-input" placeholder="email">
                        </div>
                        <div class="form__group">
                            <input type="password" class="form__group-input" placeholder="password">
                        </div>
                        <div class="form__group">
                            <div>
                                <input type="checkbox" class="form__group-checkbox" placeholder="password">
                                    Nhớ tài khoản
                            </div>
                            <span class="form-help"><a href="">Quên mật khẩu</a></span>
                        </div>
                    </div>
                    <div class="form__btn">
                        <button>Đăng nhập</button>
                    </div>
                    <div class="form__group">
                        <span class="form-help">Bạn chưa có tài khoản? <a href="">Đăng ký</a></span>
                    </div> -->
                    <!-- Đăng nhập với google -->
                    <!-- <div class="other-help">
                        <button><i class="fa-brands fa-google fa-bounce"></i> 
                            <span>Sign in with Google</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</html>