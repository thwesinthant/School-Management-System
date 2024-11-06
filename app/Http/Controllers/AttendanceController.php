<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentAttendanceModel;

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
}
