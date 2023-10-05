<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $req) {
        $this -> validate($req,
        [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
        ]);
        $credentials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect('/admin/dashboard')->with(['message'=>'Đăng nhập thành công trang admin 🤗🤗']);
        }else{
            return redirect()->back()->with(['thongbao'=>'Đăng nhập không thành công']);
        }
    }

    //DASHBOARD
    public function dashboard(){
        $discount_products=Product::where('new',1)->paginate(4);
        $bestseller_products=Product::where('new',0)->paginate(8);
        $total_discount_products = $discount_products->total();
        $total_bestseller_products = $bestseller_products->total();
        $total_products = $total_discount_products + $total_bestseller_products;
        //user
        $users=User::all();
        $total_users = $users->count();
        //bill
        $bills=Bill::all();
        $total_bills = $bills->count();
        return view('admin.dashboard',compact('total_products','discount_products','bestseller_products','total_users','total_bills'));
    }
    
    public function getUser()
    {
        $users=User::all();
        return view('admin.user',compact('users'));
    }

    //EDIT USER
    public function getUserEdit(string $id)
    {
        $user = User::find($id);
        return view('admin.user-edit',compact('user'));
    }

    public function putUserEdit(Request $request, string $id)
    {
        $name = '';
        if($request->hasfile('avatar')){
            $this->validate($request,
            [  
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone'=>'required',
                'level'=>'required',
                'avatar'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            ],
            [
            'name.required'=>"Vui lòng nhập tên",
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'level.required'=>'Vui lòng chọn quyền',
            ]);
            $file = $request->file('avatar');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/avatar'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }      
        else{
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone'=>'required',
                'level'=>'required',
                // 'avatar'=>'required',
            ],[
                'name.required'=>"Vui lòng nhập tên",
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'address.required'=>'Vui lòng nhập địa chỉ',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'level.required'=>'Vui lòng chọn quyền',
            ]);
        }


            $user = User :: find($id);
        
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->level=$request->level;
            if($name==''){
                $name=$user->avatar;
            }
            $user->avatar=$name;
            $user->save();
            
            return redirect('admin/user')->with('success','Cập nhật người dùng thành công!');     
    }


    public function delUser(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user')->with('success','Xóa người dùng thành công!');
    }

    //BILL
    public function getBill() {
        $bills = Bill::all();
        return view('admin.bill',compact('bills'));
    }

    //Update BILL
    public function updateBill(Request $request, $id) {
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();

        return redirect('admin/bill')->with('success','Cập nhật đơn hàng thành công');
    }
}
