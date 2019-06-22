<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StaffController extends Controller
{
    public function view()
    {
        $users = User::get();
        $users = json_decode(json_encode($users));
        // echo "<pre>";
        // print_r($users);
        // die;
        return view('leave.staff.view-staff')->with(compact('users'));
    }

    public function add(Request $request)
    {

        // echo "<pre>";
        // print_r($users);
        // die;
        return view('leave.staff.add-staff');
    }
}
