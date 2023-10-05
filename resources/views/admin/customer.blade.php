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
                <h3 class="mt-4">Danh sách khách hàng</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        {{-- <div class="btn-add">
                            <a class="add-link" href=""><i class="fa-sharp fa-solid fa-circle-plus"></i> Thêm mới</a>
                        </div> --}}
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Giới tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th>Tên người dùng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </tfoot> --}}
                            
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>      
                                    <td>{{$customer -> name}}</td>
                                    <td>{{$customer -> email}} </td>
                                    <td>{{$customer -> gender}} </td>
                                    <td>{{$customer -> address}} </td>
                                    <td>{{$customer -> phone_number}} </td>
                                    <td>{{$customer -> note}} </td>

                                    <div class="flex">
                                        <td><a href="{{route('admin.customer-edit', $customer->id)}}"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{route('admin.delCustomer' , $customer->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Nút xóa -->
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

