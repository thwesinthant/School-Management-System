<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public static function AttendanceStudent()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Student Attendance';
        return view('admin.attendance.student', $data);
    }
}
