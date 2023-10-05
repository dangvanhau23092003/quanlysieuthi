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
                <h3 class="mt-4">Quản lý đơn hàng</h3>
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
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên người dùng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                                @foreach($bills as $bill)
                                <tr>      
                                    <td> {{$bill->customers->name}} </td>
                                    <td> {{number_format($bill->total)}} </td>
                                    <td> {{$bill->payment}} </td>
                                    <td> {{$bill->date_order}} </td>
                                    <td> {{$bill->note}} </td>
                                    <td>
                                        <form action="{{route('admin.updateBill', $bill->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <select name="status" style="background-color:#eaff00; border: none; height: 40px">
                                                <option value="0" {{ $bill->status == '0' ? 'selected' : '' }}>Đơn hàng mới</option>
                                                <option value="1" {{ $bill->status == '1' ? 'selected' : '' }}>Đơn hàng đang giao</option>
                                                <option value="2" {{ $bill->status == '2' ? 'selected' : '' }}>Đơn hàng đã giao</option>
                                                <option value="3" {{ $bill->status == '3' ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                                            </select>

                                            <button type="submit" title="Cập nhật" style="background-color:yellow;height:24px;color:red ;margin-left: 10px; border:none"><i class="fa-solid fa-pen"></i></button>
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

