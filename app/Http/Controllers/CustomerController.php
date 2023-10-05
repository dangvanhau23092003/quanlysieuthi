<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function getCustomer() {
        $customers=Customer::all();
        return view('admin.customer', compact('customers'));
    }

    public function getCustomerEdit(string $id)
    {
        $customer = Customer::find($id);
        return view('admin.customer-edit',compact('customer'));
    }

    //update customer
    public function putCustomerEdit(Request $request, string $id)
    {
        $name = '';
        $this->validate($request,
        [  
            'name'=>'required',
            'email'=>'required|email',
            // 'phone_number'=>'required',
            'gender'=>'required',
            'address'=>'required',
        ],
        [
        'name.required'=>"Vui lòng nhập tên",
        'email.required'=>'Vui lòng nhập email',
        'email.email'=>'Không đúng định dạng email',
        'address.required'=>'Vui lòng nhập địa chỉ',
        'gender.required'=>'Vui lòng chọ giới tính',
        'phone_number.required'=>'Vui lòng nhập số điện thoại'
        ]);

        $customer = Customer :: find($id);
       
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->phone_number=$request->phone_number;
        $customer->gender=$request->gender;
        $customer->note=$request->note;

        $customer->save();
        
        return redirect('admin/customer')->with('success','Cập nhật thông tin khách hàng thành công!');
        
    }

    //DELETE
    public function delCustomer($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect('admin/customer')->with('success','Xóa khách hàng thành công!');
    }
}
