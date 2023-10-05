@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>             
            <div class="container-fluid px-4">
                <h3 class="mt-4">Cập nhật thông tin</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.user-edit', $user -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__section">
                            {{--AVATAR--}}
                            <div class="avatar-user"> 
                                <div class="user-avtar" style="background-image: url(/source/image/avatar/{{$user->avatar}});"></div><br />
                                {{-- <img src="/source/image/product/{{$user->avatar}}"></img><br /> --}}
                            </div>
                            <label for="input_upload"><i class="fa-solid fa-cloud-arrow-down"></i> Chọn ảnh đại diện</label>
                            <input type="file" name="avatar" id="input_upload">
                            <div class="contact__input">
                                <label for="">Phân quyền</label>
                                <select class="form-control" name="level">
                                    <option value="1" {{$user->level=='1'?"selected":""}}>Quản trị viên</option>
                                    <option value="3" {{$user->level=='3'?"selected":""}}>Khách hàng</option>
                                    {{-- Thêm các lựa chọn khác tùy theo yêu cầu của bạn --}}
                                </select>
                            </div> 

                            <div class="contact__input">
                                <label for="">Tên người dùng</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}"  placeholder="Tên người dùng" require="require" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="contact__input">
                                <label for="">Tên tài khoản</label>
                                <input type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}" placeholder="Tên tài khoản" require="require">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ isset($user) ? $user->address : '' }}" placeholder="Địa chỉ" require="require">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                               <label for="">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" value="{{ isset($user) ? $user->phone : '' }}" placeholder="Số điện thoại" require="require">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div>
                                <button class="btn-update" type="submit">Cập nhật</button>
                                <button class="btn-comeback" type="submit"><a href="/admin/user">Quay lại</a></button>
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