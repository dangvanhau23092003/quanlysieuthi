@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Thêm mới nhân viên</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.personnal-add.postPersonnalAdd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content__section">                   
                            <div class="contact__input">
                                <label for="">Tên nhân viên</label>
                                <input name="name" class="form-control form-control-height" placeholder="Tên nhân viên"></input>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Tên tài khoản</label>
                                <input name="email" class="form-control form-control-height" placeholder="Tên tài khoản"></input>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Số điện thoại</label>
                                <input name="phone" class="form-control form-control-height" placeholder="Số điện thoại "></input>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Địa chỉ</label>
                                <input name="address" class="form-control form-control-height" placeholder="Địa chỉ"></input>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn-update" type="submit">Thêm</button>
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        </main>
        @endsection
    </div>

</body>
</html>