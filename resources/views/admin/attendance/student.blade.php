 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Student Attendance</h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Student Attendance Form --}}
         <div class="row" style="margin:7.5px;overflow: auto ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Student Attendance</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-3" style="margin-bottom:0px;">
                                     <label>Class</label>
                                     <select name="class_id" class="form-control" required>
                                         <option value="">Select</option>
                                         @foreach ($getClass as $class)
                                             <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                 value="{{ $class->id }}">{{ $class->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-3" style="margin-bottom:0px;">
                                     <label>Attendance Date</label>
                                     <input type="date" class="form-control" name="attendance_date"
                                         value="{{ Request::get('attendance_date') }}" required>
                                 </div>
                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/attendance/student') }}" class="btn btn-success">Reset</a>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

                 @if (!empty(Request::get('class_id')) && !empty(Request::get('attendance_date')))
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
                                         <th>Attendance</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if (!empty($getStudent) && !empty($getStudent->count()))
                                         @foreach ($getStudent as $value)
                                             <tr>
                                                 <td>{{ $value->id }}</td>
                                                 <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                 <td>
                                                     <label style="margin-right: 10px">
                                                         <input style="margin-right: 3px" type="radio"
                                                             name="attendance{{ $value->id }}">Present</label>
                                                     <label style="margin-right: 10px"><input style="margin-right: 3px"
                                                             type="radio"
                                                             name="attendance{{ $value->id }}">Late</label>
                                                     <label style="margin-right: 10px"><input style="margin-right: 3px"
                                                             type="radio"
                                                             name="attendance{{ $value->id }}">Absent</label>
                                                     <label style="margin-right: 10px"><input style="margin-right: 3px"
                                                             type="radio" name="attendance{{ $value->id }}">Half
                                                         Day</label>

                                                 </td>
                                             </tr>
                                         @endforeach
                                     @endif
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 @endif

             </div>
         </div>


     </div>
     <!-- /.content-wrapper -->
 @endsection