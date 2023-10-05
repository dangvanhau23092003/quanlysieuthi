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
                <h3 class="mt-4">Danh sách người dùng</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tên người dùng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Phân quyền</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên người dùng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Phân quyền</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                                @foreach ($users as $user)
                                <tr>      
                                    <td> {{$user -> name}} </td>
                                    <td> {{$user -> email}} </td>
                                    <td> {{$user -> address}}</td>
                                    <td> {{$user -> phone}}</td>
                                    <td> {{$user -> getLevelText()}}</td>
                                    <div class="flex">
                                        <td><a href="{{route('admin.user-edit', $user->id)}}"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{route ('admin.delUser', $user -> id)}}" method="POST">
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

