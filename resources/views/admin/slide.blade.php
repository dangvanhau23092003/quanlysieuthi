
@extends('admin.layouts.master')  
    

    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <!-- thông báo thêm mới thành công -->
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
            <div class="container-fluid px-4">
                <h3 class="mt-4">QUẢN LÍ BANNER</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <div class="btn-add">
                            <a class="add-link" href="{{route ('admin.slide-add')}}"><i class="fa-sharp fa-solid fa-circle-plus"></i> Thêm mới</a>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>     
                                    <th>Hình ảnh</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th>Hình ảnh</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                                @foreach ($slides as $slide)
                                <tr>      
                                    <td><img src="/source/image/slide/{{$slide->image}}" alt="" height="80em"></td>
                                    <div class="flex">
                                        <td><a href="{{route ('admin.slide-edit' , $slide -> id)}}"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{route ('admin.delSlide', $slide -> id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Nút xóa sản phẩm -->
                                            <button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        </td>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @endsection
    </div>

