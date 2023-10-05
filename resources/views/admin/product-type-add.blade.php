@extends('admin.layouts.master')  
    
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Thêm mới danh mục</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.product-type-add.postProductTypeAdd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content__section">
                            <div class="contact__input">
                                <label for="">Loại sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="tên sản phẩm">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="contact__input">
                                <label for="">Mô tả</label>
                                <textarea name="description" id="" cols="80" rows="10" class="form-control form-control-height" placeholder="Mô tả sản phẩm "></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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