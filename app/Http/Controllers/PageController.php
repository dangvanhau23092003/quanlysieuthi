<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Type_product;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Slide;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index()
    {
        $discount_products=Product::where('new',1)->paginate(4);
        $bestseller_products=Product::where('new',0)->paginate(8);
        $slides = Slide:: all();
        return view('index', compact('discount_products','bestseller_products', 'slides'));
    }

    public function product($type) {
        $loai = Type_product::all();
        $sp_theoloai = Product::where('id_type',$type)->get();
        return view('product',compact('loai', 'sp_theoloai'));
    }

    public function cart() {
        return view('cart');
    }

    public function getCheckout() {
        return view('checkout');
    }

    //Đặt hàng
    public function postCheckout(Request $request) {
        $cart=Session::get('cart');
        $customer= new Customer();
        $customer->name=$request->input('name');
        $customer->gender=$request->input('gender');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->phone_number=$request->input('phone_number');
        $customer->note=$request->input('note');
        $customer->save();

        $bill=new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->input('payment');
        $bill->note=$request->input('note');
        $bill->save();

        foreach($cart->items as $key=>$value)
        {
            $bill_detail=new Bill_detail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('success','Đặt hàng thành công');
    }

    //thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    public function addCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function addManyToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addMany($product,$id,$request->qty);
        $request->session()->put('cart',$cart);
       
        return redirect()->back();
    }

    public function delCartItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else Session::forget('cart');
        return redirect()->back()->with('success','Xóa sản phẩm thành công');
    }

    //TÌM KIẾM
    public function postSearchProduct(Request $request) {
        $loai = Type_product::all();
        $product_search = Product::where('tensanpham','like','%'.$request->key.'%')
            ->orWhere('giamoi','like','%'.$request->key.'%')->get();
        return view('search', compact('product_search', 'loai'));
    }

    //đăng ký
    public function getSignin() {
        return view('signup');
    }

    public function postSignin(Request $req)
    {
        $name= '';
        if($req->hasfile('avatar')){
        $this->validate($req,
            ['email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                'repassword'=>'required|same:password',
                'avatar'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            ],
            ['email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử  dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'avatar.mimes'=>'Chỉ chấp nhận file hình ảnh',
            'avatar.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            ]);
            $file = $req->file('avatar');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/avatar'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($req,[
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                'repassword'=>'required|same:password',
                'avatar'=>'required'
                ],
                ['email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử  dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'repassword.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'avatar.required'=>'Vui lòng chọn ảnh',
            ]);
        }

            $user=new User();

            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->phone=$req->phone;
            $user->address=$req->address;
            $user->avatar=$req->avatar;
            $user->level=3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
            $user->save();
            return redirect()->back()->with('success','Tạo tài khoản thành công');
    }

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
            return redirect('/')->with(['message'=>'Đăng nhập thành công 🤗🤗']);
        }else{
            return redirect()->back()->with(['thongbao'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

}