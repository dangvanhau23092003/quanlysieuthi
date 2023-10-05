@extends('admin.layouts.master')  
    

    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Sửa danh mục</h3>
                <div class="form-new">     
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__section">
                            <div class="contact__input">
                                <label for="">Loại sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="tên sản phẩm" value="{{isset($product_type)?$product_type->name:''}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="contact__input">
                                <label for="">Mô tả</label>
                                
                                    <input  name="description" id="" class="form-control form-control-height" placeholder="Mô tả sản phẩm " value="{{isset($product_type)?$product_type->description:''}}"></input>
                                    <!-- <p class="form-control form-control-height"><input type="" contenteditable="" name="description" value="{{isset($product_type)?$product_type->description:''}}"></p> -->
                               
        
                                <!-- @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror -->
                            </div>
                            <div class="contact__input">
                                <label for="">Ảnh sản phẩm</label><br>
                                <img src="/source/image/product/{{$product_type->image}}" alt="anh loi" width="150px" height="auto"><br>
                                <input type="file" style="padding:15px 0"  name="image">
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