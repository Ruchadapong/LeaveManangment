<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;

class SigninController extends Controller
{
    public function login(Request $request)
    {


        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'permission' => '0'])) {
                return redirect('leave-management');
            } else if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'permission' => '1'])) {
                $userstatus = User::where('email', $data['email'])->first();
                if ($userstatus->status == 0) {
                    return redirect('/')->with('flash_alert_errors', 'Your account not activated.');
                }
                return redirect('leave-management');
            } else {
                return redirect('/')->with('flash_alert_errors', 'Email or Password invalid!')->withInput();
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
            $emailcount = User::where('email', $data['email'])->count();
            $usercount = User::where('name', $data['name'])->count();
            if ($emailcount > 0 || $usercount > 0) {
                return redirect()->back()->with('flash_alert_errors', 'Name or Email already exists!');
            } else {

                /*Save data to Database */
                $users = new User;
                $users->name = $data['name'];
                $users->email = $data['email'];
                $users->password = bcrypt($data['password']);
                $users->department = $data['department'];
                $users->save();

                /*send Confirmation Email */
                $email = $data['email'];
                $messageData =
                    [
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'code' => base64_encode($data['email'])
                    ];
                Mail::send(
                    'email.confirm',
                    $messageData,
                    function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Confirm your leave-management Account');
                    }

                );
                return redirect()->back()->with('flash_alert_success', 'Register Success!');
            }
        }
        return view('login.register');
    }

    public function dashboard()
    {
        return view('leave.content');
    }
}
