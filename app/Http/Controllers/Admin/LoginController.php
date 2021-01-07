<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Dashboard\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Mail;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');

    }// end of getLogin

    public function login(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email'=>$request->input("email"),'password'=>$request->input("password")],$remember_me)) {
           return redirect()->route('welcome');
        }else {
            return redirect()->route('get.admin.login');
            return redirect()->back()->with(['error'=>'هناك خطأ بالبيانات']);
        }
        
    }// end of login

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }// end of logout

    function ForgotPassword(){

        return view('auth.forgot_password');
    }// end of forgot_password

    function ForgotPasswordPost(Request $request){
// return $request;
        $admin = Admin::where('email' , $request->email)->first();

        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin, 'token' =>$token]));
            session()->flash('success','The Link Reset Sent');
        }
        return bacK();

    }// end of forgot_password Post

    public function ResetPassword($token)
    {
        $check_token = DB::table('password_resets')->where('token' ,$token)->where('created_at' ,'>',
        Carbon::now()->subHours(2))->first();
        
        if (!empty($check_token)) {

            return view('auth.reset_password',['data' => $check_token]);
        }else {
            return redirect()->route('forgot-password');

        }// end of else

    }// end of ResetPassword

    public function ResetPasswordFinal(Request $request ,$token)
    {

        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],[],[
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation'
        ]);

        $check_token = DB::table('password_resets')->where('token' ,$token)->where('created_at' ,'>',
        Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {
            $admin = Admin::where('email' ,$check_token->email)->update(
                ['email'=>$check_token->email,
                'password'=>bcrypt($request->password)]);

                DB::table('password_resets')->where('email' ,$request->email)->delete();
                admin()->attempt(['email'=>$check_token->email,'password'=>$request->password], true);
                return redirect()->route('welcome');

        }else {

            return redirect()->route('forgot-password');

        }// end of else



    }// end of ResetPasswordFinal

}// end of class
