<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = 'Teacher List';
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }


    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
        ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }


        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }

        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);

        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Successfully Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
        ]);

        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $parent->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->admission_date)) {
            $parent->admission_date = trim($request->admission_date);
        }

        if (!empty($request->file('profile_pic'))) {
            if (!empty($parent->getProfile())) {
                unlink('upload/profile/' . $parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }

        $parent->marital_status = trim($request->marital_status);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->address = trim($request->address);
        $parent->permanent_address = trim($request->permanent_address);
        $parent->qualification = trim($request->qualification);
        $parent->work_experience = trim($request->work_experience);
        $parent->note = trim($request->note);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);

        if (!empty($request->password)) {
            $parent->password = Hash::make($request->password);
        }
        $parent->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Successfully Updated');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', 'Teacher Successfully Deleted');
        } else {
            abort(404);
        }
    }
}
