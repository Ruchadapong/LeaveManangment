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
                return redirect('leave-management')->with('flash_sign-in_success', 'Welcome Administrator.');
            } else if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'permission' => '1'])) {
                $userstatus = User::where('email', $data['email'])->first();
                if ($userstatus->status == 0) {
                    return redirect('/')->with('flash_alert_errors', 'Your account not activated.');
                }
                return redirect('leave-management');
            } else {
                return redirect('/')->with('flash_alert_errors', 'Email or Password incorrect!')->withInput();
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
                $users->phone = $data['phone'];
                // $users->created_at = $data['created_at'];
                // $users->update_at = $data['update_at'];

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

    public function confirmAccount($email)
    {
        $email = base64_decode($email);
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) {
            $userDetail = User::where('email', $email)->first();
            if ($userDetail->status == 1) {
                return redirect('/')->with('flash_confirm_success', 'Email account is activated. You can sign-in now');
            } else {
                User::where('email', $email)->update(['status' => 1]);
                return redirect('/')->with('flash_confirm_success', 'Email account is activated. You can sign-in now');
            }
        } else {
            abort(404);
        }
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            //get user detail
            $userDetail = User::where('email', $data['email'])->first();

            //check email user
            $userEmailCount = User::where('email', $data['email'])->count();
            if ($userEmailCount == 0) {
                return redirect()->back()->with('flash_alert_errors', 'Your email incorrect!')->withInput();
            }
            // update new password
            $new_password = bcrypt($data['password']);
            User::where('email', $data['email'])->update(['password' => $new_password]);

            //send email user
            $name = $userDetail->name;
            $email = $data['email'];
            $messageData = [
                'email' => $email,
                'password' => $data['password'],
                'name' => $name
            ];
            Mail::send('email.forgot_password', $messageData, function ($message) use ($email) {
                $message->to($email)
                    ->subject('New Password - Leave Management');
            });
            return redirect('/')->with('flash_forgot_success', 'Please check your email for new password!');
        }
        return view('login.forgot-password');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('flash_logout_success', 'Logged out Successfully');
    }

    public function dashboard()
    {
        return view('leave.content');
    }

    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $emailCount = User::where('email', $data['email'])->count();
        if ($emailCount > 0) {
            echo "false";
        } else {
            echo "true";
            die;
        }
    }

    public function checkName(Request $request)
    {
        $data = $request->all();
        $nameCount = User::where('name', $data['name'])->count();
        if ($nameCount > 0) {
            echo "false";
        } else {
            echo "true";
            die;
        }
    }
}
