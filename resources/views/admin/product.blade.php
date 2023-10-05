
@extends('admin.layouts.master')  
        
        <div id="layoutSidenav_content">
            @section('content')
            <main>
                <!-- thông báo  -->
                @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
    
                <!-- thông báo thêm mới thành công -->
                @if (Session::has('success'))
                    <div class="notification">
                         {{Session::get('success')}}
                        <span class="notification__progress"></span>
                    </div>
                @endif
                <div class="container-fluid px-4">
                    <h3 class="mt-4">Danh sách sản phẩm</h3>
                    <div class="row">
                        <!-- <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Sản phẩm: {{isset($cates)?count($cates):0}} </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> -->
                        
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <div class="btn-add">
                                <a class="add-link" href="{{route('admin.product-add')}}"><i class="fa-sharp fa-solid fa-circle-plus"></i> Thêm mới</a>
                            </div>
                            <table id="datatablesSimple" >
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th >Loại sản phẩm</th>
                                        <!-- <th>id hoa don</th> -->
                                        <th>Giá mới</th>
                                        <th>Giá cũ</th>
                                        <th>Mô tả</th>
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th >Loại sản phẩm</th>
                                        <!-- <th>id hoa don</th> -->
                                        <th>Giá mới</th>
                                        <th>Giá cũ</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </tfoot>
                                
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr >
                                        <td>{{$product -> tensanpham}}</td>
                                        <td >{{$product->type_product->name}}</td>
                                        
                                        <td>{{number_format($product -> giamoi)}}</td>
                                        <td>{{number_format($product -> giacu)}}</td>
                                        <td>{{$product -> mota}}</td>
                                        <td>{{$product->getNameProduct()}} </td>
                                        <td><img src="/source/image/product/{{$product -> image}}" alt="ảnh lỗi" height="80em"></td>
                                        <td>
                                            <div style="display: flex">
                                                <a href="{{route('admin.product-edit', $product -> id)}}" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                                                <form action="{{route('admin.deleteProduct', $product -> id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Nút xóa sản phẩm -->
                                                    <button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
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
           
            
    