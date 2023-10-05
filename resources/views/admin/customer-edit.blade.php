@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>             
            <div class="container-fluid px-4">
                <h3 class="mt-4">Sửa thông tin khách hàng</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.customer-edit', $customer -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__section"> 
                            <div class="contact__input">
                                <label for="">Tên khách hàng</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($customer) ? $customer->name : '' }}"  placeholder="Tên nhân viên" require="require" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="contact__input">
                                <label for="">Tên tài khoản</label>
                                <input type="email" class="form-control" name="email" value="{{ isset($customer) ? $customer->email : '' }}" placeholder="Tên tài khoản" require="require">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Giới tính</label>
                                <select class="form-control" name="gender" id="input" require="require">                                       
                                    <option value="nam" {{$customer->gender?"selected":""}}>Nam</option>                                
                                    <option value="nữ" {{$customer->gender?"selected":""}}>Nữ</option>
                                </select>  
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ isset($customer) ? $customer->address : '' }}" placeholder="Địa chỉ" require="require">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                               <label for="">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone_number" value="{{ isset($customer) ? $customer->phone_number : '' }}" placeholder="Số điện thoại" require="require">
                                @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                               <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="note" value="{{ isset($customer) ? $customer->note : '' }}" placeholder="ghi chú" require="require">
                                @error('note')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn-update" type="submit">Cập nhật</button>
                                <button class="btn-comeback" type="submit"><a href="/admin/customer">Quay lại</a></button>
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