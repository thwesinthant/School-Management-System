<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAttendanceModel;
use App\Models\AssignClassTeacherModel;

class AttendanceController extends Controller
{
    public function AttendanceStudent(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if (!empty($request->get('class_id')) && !empty($request->get('attendance_date'))) {
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = 'Student Attendance';
        return view('admin.attendance.student', $data);
    }

    public function AttendanceStudentSubmit(Request $request)
    {

        $check_attendance = StudentAttendanceModel::CheckAlreadyAttendance($request->student_id, $request->class_id, $request->attendance_date);

        if (!empty($check_attendance)) {
            $attendance = $check_attendance;
        } else {
            $attendance = new StudentAttendanceModel;
            $attendance->class_id = $request->class_id;
            $attendance->attendance_date = $request->attendance_date;
            $attendance->student_id = $request->student_id;
            $attendance->created_by = Auth::user()->id;
        }

        $attendance->attendance_type = $request->attendance_type;
        $attendance->save();


        $json['message'] = "Attendance Successfully Saved";
        echo json_encode($json);
    }

    public function AttendanceReport()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = StudentAttendanceModel::getRecord();
        $data['header_title'] = 'Attendance Report';
        return view('admin.attendance.report', $data);
    }

    // Teacher's side
    public function AttendanceStudentTeacher(Request $request)
    {
        // get log in teacher's assigned class and exam data
        $data['getClass']  = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);

        if (!empty($request->get('class_id')) && !empty($request->get('attendance_date'))) {
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = 'Student Attendance';
        return view('teacher.attendance.student', $data);
    }

    // teacher side
    public function AttendanceReportTeacher()
    {
        $getClass  = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);

        $classArray = array();
        foreach ($getClass as $value) {
            $classArray[] = $value->class_id;
        }

        $data['getClass']   = $getClass;
        $data['getRecord'] = StudentAttendanceModel::getRecordTeacher($classArray);
        $data['header_title'] = 'Attendance Report';
        return view('teacher.attendance.report', $data);
    }
}
