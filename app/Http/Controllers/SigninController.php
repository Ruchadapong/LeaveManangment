<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;



class SigninController extends Controller
{
    public function login(Request $request)
    {


        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'permission' => '0'])) {

                return redirect('leave-management');
            } else {
                // alert('<a href="#">Click me</a>')->html()->persistent("No, thanks");
                return redirect()->back();
            }
        }
        return view('login.login');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            //     $emailcount = User::where('email', $data['email'])->count();
            //     if ($emailcount > 0) {
            //         return redirect()->back()->with('error', 'Email already exists!');
            //     } else {
            //         $user = new User;
            //         $user->name = $data['name'];
            //         $user->email = $data['email'];
            //         $user->password = bcrypt($data['password']);
            //         $user->department = $data['department'];
            //         $user->save();
            //         return redirect()->back()->with('success', 'Register Success!');
            //     }
        }
        return view('login.register');
    }

    public function dashboard()
    {
        return view('leave.content');
    }
}
