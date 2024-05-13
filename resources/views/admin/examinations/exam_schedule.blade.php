 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Exam Schedule</h1>
                     </div>
                     <div class="col-sm-6" style="text-align: right">
                         <a class="btn btn-primary" href="{{ url('admin/examinations/exam/add') }}">Add New Exam Schedule</a>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Exam Schedule Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Exam Schedule</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label>Exam Name</label>
                                     <select name="exam_id" class="form-control" required>
                                         <option value="">Select</option>
                                         @foreach ($getExam as $exam)
                                             <option {{ Request::get('exam_id') == $exam->id ? 'selected' : '' }}
                                                 value="{{ $exam->id }}">{{ $exam->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>

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
                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/examinations/exam_schedule') }}"
                                         class="btn btn-success">Reset</a>
                                 </div>
                             </div>
                         </div>


                     </form>
                 </div>
             </div>
         </div>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         @include('message')

                         @if (!empty($getRecord))
                             <form action="{{ url('admin/examinations/exam_schedule_insert') }}" method="post">
                                 {{ csrf_field() }}
                                 <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                 <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">Exam Schedule</h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body p-0">
                                         <table class="table table-striped">
                                             <thead>
                                                 <tr style="text-align: center;">
                                                     <th>Subject Name</th>
                                                     <th>Exam Date</th>
                                                     <th>Start Time</th>
                                                     <th>End Time</th>
                                                     <th>Room Number</th>
                                                     <th>Full Marks</th>
                                                     <th>Passing Marks</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @php
                                                     $i = 1;
                                                 @endphp
                                                 @foreach ($getRecord as $value)
                                                     <tr>
                                                         <td>{{ $value['subject_name'] }}</td>
                                                         <td>
                                                             <input type="time" class="form-control"
                                                                 name="schedule[{{ $i }}][exam_date]">
                                                         </td>
                                                         <td>
                                                             <input type="time" class="form-control"
                                                                 name="schedule[{{ $i }}][start_time]">
                                                         </td>
                                                         <td>
                                                             <input type="text" class="form-control"
                                                                 name="schedule[{{ $i }}][end_time]">
                                                         </td>
                                                         <td>
                                                             <input type="text" class="form-control"
                                                                 name="schedule[{{ $i }}][room_number]">
                                                         </td>
                                                         <td>
                                                             <input type="text" class="form-control"
                                                                 name="schedule[{{ $i }}][full_marks]">
                                                         </td>
                                                         <td>
                                                             <input type="text" class="form-control"
                                                                 name="schedule[{{ $i }}][passing_marks]">
                                                         </td>
                                                     </tr>
                                                     @php
                                                         $i++;
                                                     @endphp
                                                 @endforeach

                                             </tbody>
                                         </table>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </form>
                         @endif

                         <!-- /.card -->
                     </div>
                 </div>
                 <!-- /.col -->
             </div>
     </div>
     <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
 @endsection
