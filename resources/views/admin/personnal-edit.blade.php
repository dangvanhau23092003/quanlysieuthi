@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>             
            <div class="container-fluid px-4">
                <h3 class="mt-4">Cập nhật nhân viên</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.personnal-edit', $personnal -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__section">
                            <!-- <div class="form-group">
                                <select name="level">
                                    <option value="1">Quản trị viên</option>
                                    <option value="3">Khách hàng</option>
                                    Thêm các lựa chọn khác tùy theo yêu cầu của bạn
                                </select>
                            </div> -->

                            <div class="contact__input">
                                <label for="">Tên nhân viên</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($personnal) ? $personnal->name : '' }}"  placeholder="Tên nhân viên" require="require" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="contact__input">
                                <label for="">Tên tài khoản</label>
                                <input type="email" class="form-control" name="email" value="{{ isset($personnal) ? $personnal->email : '' }}" placeholder="Tên tài khoản" require="require">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ isset($personnal) ? $personnal->address : '' }}" placeholder="Địa chỉ" require="require">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                               <label for="">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" value="{{ isset($personnal) ? $personnal->phone : '' }}" placeholder="Số điện thoại" require="require">
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