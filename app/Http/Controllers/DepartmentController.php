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
            // echo "<pre>";
            // print_r($data);
            // die;
            if (empty($data)) {
                return redirect()->back()->with('flash_error_message');
            } else {
                $departments = new Department;
                $departments->department_name = $data['department_name'];
                $departments->department_abbr = $data['department_abbr'];
                $departments->status = $data['status'];
                $departments->save();
            }
            return redirect()->route('department.view')->with('flash_alert_success', 'Add Department Successfully!');
        }

        return view('leave.department.add-department');
    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // echo "<pre>";
            // print_r($data);
            // die;
            Department::where(['id' => $id])->update(['department_name' => $data['department_name'], 'department_abbr' => $data['department_abbr'], 'status' => $data['status']]);
            return redirect()->route('department.view')->with('flash_edit_success', 'Department has been updated successfully');
        }
        $DepartmentDetails = Department::where(['id' => $id])->first();
        /*ค้นหาข้อมูลจาก id ในตาราง user */
        return view('leave.department.edit-department')->with(compact('DepartmentDetails'));
    }

    public function delete($id)
    {
        Department::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'Department has been deleted successfully');
    }

    public function view()
    {
        $departments = Department::get();

        return view('leave.department.view-department')->with(compact('departments'));
    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            $search_department = $data['search'];

            if ($search_department != "") {
                $searches = Department::where('department_name', 'like', '%' . $search_department . '%')
                    ->orwhere('department_abbr', 'like', '%' . $search_department . '%')
                    ->orwhere('status', 'like', '%' . $search_department . '%')
                    ->get();
                if (count($searches) > 0) {
                    return view('leave.department.search-department')->with(compact('searches', 'search_department'));
                } else {
                    return view('leave.department.search-department')->with('flash_message_search');
                }
            }
        }
    }
}
