@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Cập nhật sản phẩm</h3>
                <div class="form-new">     
                    <form action="" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="content__section">
                            <div class="contact__input">
                                <label for="">Loại sản phẩm</label>
                                <select class="form-control" name="id_type" id="input" require="require">       
                                    @foreach($types as $type)
                                        <option value="{{$type -> id}}" {{$type->id==$product->id_type?"selected":""}}>{{$type -> name}}</option>
                                    @endforeach  
                                </select>  
                                @error('id_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="tên sản phẩm" 
                                    value="{{isset($product)?$product->tensanpham:''}}">
                                @error('tensanpham')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Giá mới</label>
                                <input type="text" class="form-control" name="giamoi" placeholder="Giá mới"
                                    value="{{isset($product)?$product->giamoi:''}}">
                                @error('giamoi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Giá cũ</label>
                                <input type="text" class="form-control" name="giacu" placeholder="Giá cũ"
                                    value="{{isset($product)?$product->giacu:''}}">
                                @error('giacu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="mota" placeholder="Mô tả"
                                    value="{{isset($product)?$product->mota:''}}">
                                @error('mota')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Chọn sản phẩm</label><br/>
                                <select class="form-control" name="new" id="input" require="require">                                       
                                    <option value="0" {{$product->new?"selected":""}}>Bán chạy nhất</option>                                
                                    <option value="1" {{$product->new?"selected":""}}>Giảm giá sốc</option>
                                </select>  
                                @error('new')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact__input">
                                <label for="">Ảnh sản phẩm</label><br />
                                <img src="/source/image/product/{{$product->image}}" alt="" height="200px"><br />
                                <input type="file" class="" name="image">
                            </div>
                            <div>
                                <button class="btn-update" type="submit">Cập nhật</button>
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