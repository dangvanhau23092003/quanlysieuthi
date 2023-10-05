
@extends('admin.layouts.master')  
    

    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <!-- thông báo cập nhật thành công -->
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
            <div class="container-fluid px-4">
                <h3 class="mt-4">Quản lí liên hệ</h3>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>  
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>      
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center">
                                            <form style="display:flex; align-items: center" action="{{route('admin.updateContact', $contact->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <!-- <label for="status">Trạng thái:</label> -->
                                                    <select style="background-color:#eaff00; border: none; height: 30px " name="status" id="status">
                                                        <option value="0" {{ !$contact->status ? 'selected' : '' }}>Chưa liên hệ</option>
                                                        <option value="1" {{ $contact->status ? 'selected' : '' }}>Đã liên hệ</option>
                                                    </select>
                                                </div>
                                                <button type="submit" title="Cập nhật" style="background-color:yellow;height:24px;color:red ;margin-left: 10px; border:none"><i class="fa-solid fa-pen"></i></button>
                                            </form>
                                            <form action="{{route('admin.deleteContact' , $contact->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Nút xóa -->
                                                <button type="submit" class="btn-delete" style="height:24px;color:red ;margin-left: 10px; border:none"><i class="fa-solid fa-trash"></i></button>
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

