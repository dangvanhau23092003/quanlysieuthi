@extends('admin.layouts.master')  
    

    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">CẬP NHẬT BANNER</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.slide-edit' , $slide -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__section">
                            <div class="contact__input">
                                <p>Ảnh sản phẩm</p>
                                <img src="/source/image/slide/{{$slide->image}}" alt="" width="150px"><br>
                                <input type="file" style="padding:15px 0" class="" name="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn-update" type="submit">Cập nhật</button>
                                <button class="btn-comeback" type="submit"><a href="{{route('admin.getSlide')}}">Quay lại</a></button>
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