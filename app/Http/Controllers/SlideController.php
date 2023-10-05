<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;


class SlideController extends Controller
{
    public function getSlide()
    {
        $slides = Slide::all();
        return view('admin.slide',compact('slides'));
    }

    public function getSlideAdd(Request $request)
    {
        $slides = Slide::all();
        return view('admin.slide-add', compact('slides'));
    }

    public function postSlideAdd(Request $request) 
    {
        $name = '';
        if($request->hasfile('image')){
            $this->validate($request,[ 
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                
                
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                
                
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/slide'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                'image'=>'required',
                'link'=>'required',
                
            ],[
                'image.required' => 'Bạn chưa chọn hình ảnh',        
            ]);
        }
        $slide = new Slide();

        $slide->image=$name;
        $slide->save();

        return redirect('admin/slide')->with('success','Thêm mới banner thành công!');
    }

    //cập nhật
    public function getSlideEdit(string $id) {
        $slide = Slide::find($id);
        return view('admin.slide-edit', compact('slide'));
    }

    public function putSlideEdit(Request $request , $id) {
        $name = '';
        if($request->hasfile('image')){
            $this->validate($request,[ 
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source/image/slide'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
            $this->validate($request,[
                // 'image'=>'required',
                
            ],[
                // 'image.required' => 'Bạn chưa chọn hình ảnh',
                
            ]);
        }
        $slide = Slide::find($id);

        if($name==''){
            $name=$slide->image;
        }
        $slide->image=$name;
        $slide->save();

        return redirect('admin/slide')->with('success','Cập nhật banner thành công!');
    }

    //xóa
    public function delSlide($id) 
    {
        $slide=Slide::find($id);
        $slide->delete();
        
        return redirect('admin/slide')->with('success','Xóa thành công!');
    }

}
