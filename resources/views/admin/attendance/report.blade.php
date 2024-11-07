 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Attendance Report <span style="color: blue">(Total : {{ $getRecord->total() }})</span></h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Student Attendance Form --}}
         <div class="row" style="margin:7.5px;overflow: auto ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Attendance Report</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Student ID</label>
                                     <input type="text" class="form-control" name="student_id" placeholder="Student ID"
                                         value="{{ Request::get('student_id') }}">
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Student Name</label>
                                     <input type="text" class="form-control" name="student_name"
                                         placeholder="Student Name" value="{{ Request::get('student_name') }}">
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Student Last Name</label>
                                     <input type="text" class="form-control" name="student_last_name"
                                         placeholder="Student Last Name" value="{{ Request::get('student_last_name') }}">
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Class</label>
                                     <select name="class_id" class="form-control" id="getClass">
                                         <option value="">Select</option>
                                         @foreach ($getClass as $class)
                                             <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                 value="{{ $class->id }}">{{ $class->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Attendance Date</label>
                                     <input type="date" class="form-control" id="getAttendanceDate"
                                         name="attendance_date" value="{{ Request::get('attendance_date') }}">
                                 </div>

                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Attendance Type</label>
                                     <select name="attendance_type" class="form-control">
                                         <option value="">Select</option>
                                         <option {{ Request::get('attendance_type') == 1 ? 'selected' : '' }}
                                             value="1">Present
                                         </option>
                                         <option {{ Request::get('attendance_type') == 2 ? 'selected' : '' }}
                                             value="2">Late</option>
                                         <option {{ Request::get('attendance_type') == 3 ? 'selected' : '' }}
                                             value="3">Absent</option>
                                         <option {{ Request::get('attendance_type') == 4 ? 'selected' : '' }}
                                             value="4">Half Day</option>
                                     </select>
                                 </div>

                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/attendance/student') }}" class="btn btn-success">Reset</a>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

                 <div class="card" style="overflow: auto;">
                     <div class="card-header">
                         <h3 class="card-title">Student List</h3>
                     </div>
                     <div class="card-body p-0" style="overflow: auto">
                         <table class="table table-striped">
                             <thead>
                                 <tr>
                                     <th>Student ID</th>
                                     <th>Student Name</th>
                                     <th>Class Name</th>
                                     <th>Attendance</th>
                                     <th>Attendance Date</th>
                                     <th>Created By</th>
                                     <th>Created Date</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($getRecord as $value)
                                     <tr>
                                         <td>{{ $value->student_id }}</td>
                                         <td>{{ $value->student_name }} {{ $value->student_last_name }}</td>
                                         <td>{{ $value->class_name }}</td>
                                         <td>
                                             @if ($value->attendance_type == 1)
                                                 Present
                                             @elseif ($value->attendance_type == 2)
                                                 Late
                                             @elseif ($value->attendance_type == 3)
                                                 Absent
                                             @elseif ($value->attendance_type == 4)
                                                 Half Day
                                             @endif
                                         </td>
                                         <td>{{ date('d-m-Y', strtotime($value->attendance_date)) }}</td>
                                         <td>{{ $value->created_name }}</td>
                                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>

                                     </tr>
                                 @empty
                                     <tr>
                                         <td colspan="100%">Record not found</td>
                                     </tr>
                                 @endforelse
                             </tbody>
                         </table>
                         <div style="float: right;padding:10px;">
                             {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
                     </div>
                 </div>

             </div>
         </div>


     </div>
     <!-- /.content-wrapper -->
 @endsection
