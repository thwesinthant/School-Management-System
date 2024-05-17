<?php

namespace App\Http\Controllers;

use App\Models\WeekModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectTimetableModel;

class CalendarController extends Controller
{
    public function MyCalendar()
    {
        $result = array();
        $getRecord = ClassSubjectModel::MySubject(Auth::user()->class_id);

        foreach ($getRecord as $value) {
            $dataS['name'] = $value->subject_name;

            $getWeek = WeekModel::getRecord();
            $week = array();

            foreach ($getWeek as $valueW) {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                    $week[] = $dataW;
                }
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }
        $data['getMyTimetable'] = $result;
        $data['header_title'] = "My Calendar";
        return view('student.my_calendar', $data);
    }
}
