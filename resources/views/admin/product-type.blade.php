
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
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                <div class="container-fluid px-4">
                    <h3 class="mt-4">Danh mục sản phẩm</h3>
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
                                <a class="add-link" href="{{route ('admin.product-type-add.postProductTypeAdd') }}"><i class="fa-sharp fa-solid fa-circle-plus"></i> Thêm mới</a>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </tfoot>
                                
                                <tbody>
                                    @foreach ($product_types as $product_type)
                                    <tr>
                                        <td>{{$product_type -> id}}</td>
                                        <td>{{$product_type -> name}}</td>
                                        <td>{{$product_type -> description}}</td>
                                        <td><img src="/source/image/product/{{$product_type -> image}}" alt="ảnh lỗi" height="80em"></td>
                                        <td><a href="{{route('admin.product-type-edit', $product_type -> id)}}"><i class="fa-solid fa-pen"></i></a>
                                            <form action="{{route('admin.delProductType', $product_type -> id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Nút xóa sản phẩm -->
                                                <button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                                            </form>
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
           
            
    