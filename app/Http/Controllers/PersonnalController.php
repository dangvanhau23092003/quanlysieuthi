<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getPersonnal()
    {
        $personnals=Personnel::all();
        return view('admin.personnal',compact('personnals'));
    }

    public function getPersonnalAdd() {
        $personnals = Personnel::all();
        return view('admin.personnal-add',compact('personnals'));
    }

    public function postPersonnalAdd(Request $request) {

        $personnal = new Personnel();

        $personnal->name=$request->name;
        $personnal->email=$request->email;
        $personnal->phone=$request->phone;
        $personnal->address=$request->address;
        $personnal->save();
        
        return redirect('admin/personnal')->with('success','Thêm mới nhân viên thành công!');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function getPersonnalEdit(string $id)
    {
        $personnal = Personnel::find($id);
        return view('admin.personnal-edit',compact('personnal'));
    }

    public function putPersonnalEdit(Request $request, string $id)
    {
        $name = '';
        $this->validate($request,
        [  
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
        ],
        [
        'name.required'=>"Vui lòng nhập tên",
        'email.required'=>'Vui lòng nhập email',
        'email.email'=>'Không đúng định dạng email',
        'address.required'=>'Vui lòng nhập địa chỉ',
        'phone.required'=>'Vui lòng nhập số điện thoại'
        ]);

        $personnal = Personnel :: find($id);
       
        $personnal->name=$request->name;
        $personnal->email=$request->email;
        $personnal->address=$request->address;
        $personnal->phone=$request->phone;
        // if($name == '') {
        //     $name=$user->address;
        // }
        // $user->address=$name;
        $personnal->save();
        
        return redirect('admin/personnal')->with('success','Cập nhật thành công!');
        
    }

    //DELETE
    public function delPersonnal($id)
    {
        $personnal=Personnel::find($id);
        $personnal->delete();
        return redirect('admin/personnal')->with('success','Xóa thành công!');
    }

}
