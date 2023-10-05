<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class MailController extends Controller
{
    //EMAIL
    public function getEmail() {
        return view('emails.input-email');
    }

    public function postinputEmail(Request $req) {
        $email=$req->txtEmail;
        //validate

        // kiểm tra có user có email như vậy không
        $user=User::where('email',$email)->get();
        //dd($user);
        // if($user->count()!=0){
            //gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];
            Mail::to($req->user())->cc("dangvanhau23092003@gmail.com")->bcc("dangvanhau23092003@gmail.com")->send(new SendMail($sentData));
            Session::flash('message', 'Send email successfully!');
           
            return view('emails.input-email');  //về lại trang đăng nhập của khách
        // }
        // else {
        //       return redirect()->route('getEmail')->with('message','Your email is not right');
        // }
    }//hết postInputEmail
}
