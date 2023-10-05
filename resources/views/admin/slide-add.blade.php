@extends('admin.layouts.master')  
    

    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">THÊM MỚI BANNER</h3>
                <div class="form-new">     
                    <form action="{{route ('admin.slide-add.postSlideAdd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content__section">
                            <div class="contact__input">
                                <p>Ảnh sản phẩm</p>
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