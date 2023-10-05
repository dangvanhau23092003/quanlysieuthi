@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Thêm mới sản phẩm</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.product-add.postProductAdd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content__section">
                            <div class="contact__input">
                                <label for="">Loại sản phẩm</label>
                                {{-- <input type="text" class="form-control" name="name" placeholder="Loại sản phẩm"> --}}
                                <select class="form-control" name="id_type" id="input" require="require">
                                    @foreach($types as $type)
                                        <option value="{{$type -> id}}">{{$type -> name}}</option>
                                    @endforeach     
                                </select>  
                                @error('id_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="tên sản phẩm">
                                @error('tensanpham')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Giá mới</label>
                                <input type="text" class="form-control" name="giamoi" placeholder="Giá mới">
                                @error('giamoi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Giá cũ</label>
                                <input type="text" class="form-control" name="giacu" placeholder="Giá cũ">
                                @error('giacu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="mota" placeholder="Mô tả">
                                @error('mota')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Chọn sản phẩm</label><br/>
                                <input type="radio" name="new" value="0" checked="checked" >Bán chạy nhất
                                <input type="radio" name="new" value="1" >Giảm giá sốc
                            </div>
                            <div class="contact__input">
                                <label for="">Ảnh sản phẩm</label>
                                <input type="file" class="" name="image">
                                @error('image')
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