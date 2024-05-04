<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Add Subject";
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;

        $save->save();

        return redirect('admin/subject/list')->with('success', 'Subject Successfully Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/subject/list')->with('success', 'Subject Successfully Updated ');
    }

    public function delete($id, Request $request)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', 'Subject Successfully Deleted ');
    }

    public function MySubject()
    {
        $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = 'My Subject';
        return view('student.my_subject', $data);
    }
    public function ParentStudentSubject($student_id)
    {
        // fetch/get student by its id
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;

        // find that student's subject by her/his's class_id
        $data['getRecord'] = ClassSubjectModel::MySubject($user->class_id);

        $data['header_title'] = 'Student Subject';
        return view('parent.my_student_subject', $data);
    }
}
