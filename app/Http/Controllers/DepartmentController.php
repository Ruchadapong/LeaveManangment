<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();

            if (empty($data)) {
                return redirect()->back()->with('flash_error_message');
            }
        }

        return view('leave.department.add-depatment');
    }

    public function view()
    {
        $departments = Department::get();

        return view('leave.department.view-department')->with(compact('departments'));
    }
}
