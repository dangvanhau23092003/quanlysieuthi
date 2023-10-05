<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_product;
use App\Models\Product;


class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function product_type(string $id) {
        $discount_product = Product::find($id);
        $bestseller_product = Product::find($id);
        return view('product_type', compact('discount_product','bestseller_product'));
    }

    public function getProductType()
    {
        $product_types=Type_product::all();
        return view('admin.product-type',compact('product_types'));
    }

    //ADD
    public function getProductTypeAdd() {
        $product_types = Type_product::all();
        return view('admin.product-type-add',compact('product_types'));
    }

    public function postProductTypeAdd(Request $request) {

        $product_type = new Type_product();

        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'description'=>'required',
                'name'=>'required',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required'=>'Bạn chưa nhập mô tả',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/product'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                'description'=>'required',
                'name'=>'required',
                'image'=>'required'
            ],[
                'description.required'=>'Bạn chưa nhập mô tả',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'image.required' => 'Bạn chưa chọn hình ảnh'
            ]);
        }

        $product_type->name=$request->name;
        $product_type->description=$request->description;
        $product_type->image=$name;
        $product_type->save();
        
        return redirect('admin/product-type')->with('success','Thêm mới danh mục thành công!');

    }

    //EDIT
    public function getProductTypeEdit(string $id) {
        $product_type = Type_product::find($id);
        return view('admin.product-type-edit',compact('product_type'));
    }

    public function putProductTypeEdit(Request $request , $id) {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'description'=>'required',
                'name'=>'required',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required'=>'Bạn chưa nhập mô tả',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/product'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                'description'=>'required',
                'name'=>'required',
                // 'image'=>'required'
            ],[
                'description.required'=>'Bạn chưa nhập mô tả',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                // 'image.required' => 'Bạn chưa chọn hình ảnh'
            ]);
        }

        $product_type = Type_product::find($id);

        $product_type->name=$request->name;
        $product_type->description=$request->description;
        if($name==''){
            $name=$product_type->image;
        }
        $product_type->image=$name;
        $product_type->save();

        return redirect('admin/product-type')->with('success','Cập nhật thành công!');
    }

    //DELETE
    public function delProductType($id)
    {
        $product_type=Type_product::find($id);
        $product_type->delete();
        return redirect('admin/product-type')->with('success','Xóa thành công!');
    }
    
    //SEARCH
    public function getSearch() {
        return view ('admin/search-category');
    }

    public function postSearch(Request $request) {
        $search=$request->txtsearch;
        if($search!=''){
            $category=Type_product::where('name','like','%'.$search.'%')
            // ->orWhere('tensanpham','like','%'.$search.'%')
            ->orWhere(function($query) {
                $query->select('id_type')
                    ->from('type_products')
                    ->whereColumn('products.id_type','type_products.id')
                    ->limit(1);
            },'like','%'.$search.'%')->get();
        }else{
            $category=Type_product::all();
        }
        return view('',compact('category','search'));
    }
}
