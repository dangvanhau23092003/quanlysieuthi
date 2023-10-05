<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{

    //gửi email
    public function contact() {
        return view('contacts.contact');
    }

    public function getContact() {
        $contacts = Contact :: all();
        return view('admin.contact', compact('contacts'));
    }

    //cập nhật trạng thái
    public function updateContact(Request $request, $id)
    {
    $contact = Contact :: find($id);

    $contact->status = $request->input('status');
    $contact->save();

    return redirect('admin/contact')->with('success','Cập nhật trạng thái thành công!');
    }


    public function postContact(Request $request) {



        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->message=$request->message;

        $name=$request->name;
        $email=$request->email;
        $message=$request->message;

        $contact->save();

        // kiểm tra có user có email như vậy không
        $user=User::where('email',$contact)->get();
        //dd($user);
        // if($user->count()!=0){
            //gửi mật khẩu reset tới email
            $sentData = [
                'name' => 'Tên khách hàng:'.$name.'',
                'email' => 'Email của khách hàng: ' .$email.'',
                'message' => 'Nội dung ghi chú của khách hàng: ' .$message.'',
            ];
            Mail::to($request->user())->cc("dangvanhau23092003@gmail.com")->bcc("dangvanhau23092003@gmail.com")->send(new ContactMail($sentData));
            Session::flash('success', 'Cảm ơn bạn đã liên hệ!');

            return view('contacts.contact');
        // }
        // else {
        //       return redirect()->route('getEmail')->with('message','Your email is not right');
        // }
        // Gửi email thông báo hoặc xử lý logic khác

        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ!');
    }

    public function deleteContact($id) {
        $contact=Contact::find($id);
        $contact->delete();
        
        return redirect('admin/contact')->with('success','Xóa thành công!');
    }
}
