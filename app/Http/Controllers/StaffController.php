<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Image;
use DB;

class StaffController extends Controller
{
    // show data function
    public function view()
    {
        $users = User::paginate(5);
        // $users = json_decode(json_encode($users));
        // echo "<pre>";
        // print_r($users);
        // die;
        return view('leave.staff.view-staff')->with(compact('users'));
    }

    //add data in database
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            $status = $data['status'];
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
                $users->position = $data['position'];
                $users->phone = $data['phone'];
                $users->phone = $data['office_phone'];


                if ($status == 0) {
                    /*send Confirmation Email */
                    $email = $data['email'];
                    $messageData =
                        [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'code' => base64_encode($data['email']),
                            'password' => $data['password']
                        ];
                    Mail::send(
                        'email.confirmAdd',
                        $messageData,
                        function ($message) use ($email) {
                            $message->to($email)
                                ->subject('Confirm your leave-management Account');
                        }

                    );
                    $users->status = $status;
                    $users->permission = $data['permission'];
                    $users->save();
                } else {
                    /*send Confirmation Email */
                    $email = $data['email'];
                    $messageData =
                        [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $data['password']
                        ];
                    Mail::send(
                        'email.sendAccount',
                        $messageData,
                        function ($message) use ($email) {
                            $message->to($email)
                                ->subject('Your leave-management Account');
                        }

                    );
                    $users->status = $status;
                    $users->permission = $data['permission'];
                    $users->save();
                }



                return redirect('leave-management/staff')->with('flash_alert_success', 'Add STAFF Successfully!');
            }
        }
        // echo "<pre>";
        // print_r($users);
        // die;
        return view('leave.staff.add-staff');
    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //upload image
            // echo "<pre>";
            // print_r($data);
            // die;
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    /*ถ้ามีเพิ่มข้อมูลแบบไฟล์ */
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'dashboard/images/user/large' . '/' . $fileName;
                    $medium_image_path = 'dashboard/images/user/medium' . '/' . $fileName;
                    $small_image_path = 'dashboard/images/user/small' . '/' . $fileName;
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                }
            } else {
                $fileName = $data['current_image'];
            }
            User::where(['id' => $id])->update(['name' => $data['name'], 'email' => $data['email'], 'department' => $data['department'], 'position' => $data['position'], 'phone' => $data['phone'], 'office_phone' => $data['office_phone'], 'permission' => $data['permission'], 'status' => $data['status'], 'leave_day' => $data['leave_day'], 'image' => $fileName]);
            return redirect()->back()->with('flash_edit_success', 'STAFF has been updated successfully');
        }
        $staffDetails = User::where(['id' => $id])->first();
        /*ค้นหาข้อมูลจาก id ในตาราง user */
        return view('leave.staff.edit-staff')->with(compact('staffDetails'));
    }

    public function delete($id)
    {
        User::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'STAFF has been deleted successfully');
    }

    //search function by name,department,email and position in staff table
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            $search_staff = $data['search'];

            if ($search_staff != "") {
                $searches = User::where('name', 'like', '%' . $search_staff . '%')
                    ->orwhere('department', 'like', '%' . $search_staff . '%')
                    ->orwhere('email', 'like', '%' . $search_staff . '%')
                    ->orwhere('position', 'like', '%' . $search_staff . '%')
                    ->paginate(5);
                if (count($searches) > 0) {
                    return view('leave.staff.search')->with(compact('searches', 'search_staff'));
                } else {
                    return view('leave.staff.search')->with('flash_message_search');
                }
            }
        }
    }
}
