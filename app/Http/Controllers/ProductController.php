<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type_product;

class ProductController extends Controller
{
    public function getProduct()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    //ADD PRODUCT
    public function getProductAdd()
    {
        $product = Product::all();
        $types = Type_product::all();
        return view('admin.product-add',compact('product', 'types'));
    }

    public function postProductAdd(Request $request)
    {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[            
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'mota'=>'required',
                'tensanpham'=>'required',
                'giamoi' => ['required', 'numeric', 'min:0'],
                'giacu' => ['required', 'numeric', 'min:0']
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'mota.required'=>'Bạn chưa nhập mô tả',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'giamoi.numeric'=>'Bạn chưa nhập giá mới',
                'giacu.numeric'=>'Bạn chưa nhập giá cũ'
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/product'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                'mota'=>'required',
                'tensanpham'=>'required',
                'giamoi' => ['required', 'numeric', 'min:0'],
                'giacu' => ['required', 'numeric', 'min:0'],
                'image'=>'required'
            ],[
                'mota.required'=>'Bạn chưa nhập mô tả',
                'tensanpham.required'=>'Bạn chưa nhập tên sản phẩm',
                'giamoi.numeric'=>'Bạn chưa nhập giá mới',
                'giacu.numeric'=>'Bạn chưa nhập giá cũ',
                'image.required' => 'Bạn chưa chọn hình ảnh'
            ]);
        }

        $product = new Product();
       
        $product->id_type=$request->id_type;
        $product->tensanpham=$request->tensanpham;
        $product->mota=$request->mota;
        $product->giamoi=$request->giamoi;
        $product->giacu=$request->giacu;
        $product->new=$request->new;
        $product->image=$name;
        $product->save();
        
        return redirect('admin/product')->with('success','Thêm mới thành công!');
    }

    //EDIT PRODUCT
    public function getProductEdit( string $id) {
        $product = Product::find($id);
        $types = Type_product::all();
        return view('admin.product-edit', compact('product', 'types'));
    }

    public function putProductEdit(Request $request , $id) {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'mota'=>'required',
                'tensanpham'=>'required',
                'giamoi' => ['required', 'numeric', 'min:0'],
                'giacu' => ['required', 'numeric', 'min:0']
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'mota.required'=>'Bạn chưa nhập mô tả',
                'tensanpham.required'=>'Bạn chưa nhập tên sản phẩm',
                'giamoi.numeric'=>'Bạn chưa nhập giá mới',
                'giacu.numeric'=>'Bạn chưa nhập giá cũ',
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/product'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                'mota'=>'required',
                'tensanpham'=>'required',
                'giamoi' => ['required', 'numeric', 'min:0'],
                'giacu' => ['required', 'numeric', 'min:0'],
                // 'image'=>'required'
            ],[
                'mota.required'=>'Bạn chưa nhập mô tả',
                'tensanpham.required'=>'Bạn chưa nhập tên sản phẩm',
                'giamoi.numeric'=>'Bạn chưa nhập giá mới',
                'giacu.numeric'=>'Bạn chưa nhập giá cũ',
                // 'image.required' => 'Bạn chưa chọn hình ảnh'
            ]);
        }

        $product = Product::find($id);

        $product->id_type=$request->id_type;
        $product->tensanpham=$request->tensanpham;
        $product->mota=$request->mota;
        $product->giamoi=$request->giamoi;
        $product->giacu=$request->giacu;
        $product->new=$request->new;

        if($name==''){
            $name=$product->image;
        }
        $product->image=$name;
        $product->save();

        return redirect('admin/product')->with('success','Cập nhật thành công!');
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product')->with('success','Xóa thành công!');
    }
}
