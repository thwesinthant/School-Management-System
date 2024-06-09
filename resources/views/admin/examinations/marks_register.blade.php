 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Marks Register</h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Exam Schedule Form --}}
         <div class="row" style="margin:7.5px;overflow: auto ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Marks Register</h3>
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
                                     <a href="{{ url('admin/examinations/marks_register') }}"
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

                         @if (!empty($getSubject) && !empty($getSubject->count()))
                             <div class="card" style="overflow: auto;">
                                 <div class="card-header">
                                     <h3 class="card-title">Mark Register</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body p-0">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th>STUDENT NAME</th>
                                                 @foreach ($getSubject as $subject)
                                                     <th>{{ $subject->subject_name }}
                                                         {{ $subject->subject_type }} : {{ $subject->passing_mark }} /
                                                         {{ $subject->full_marks }}
                                                     </th>
                                                 @endforeach
                                                 <th>ACTION</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @if (!empty($getStudent) && !empty($getStudent->count()))
                                                 @foreach ($getStudent as $student)
                                                     <form name="post" class="SubmitForm">
                                                         {{ csrf_field() }}
                                                         <input type="hidden" name="student_id"
                                                             value="{{ $student->id }}">
                                                         <input type="hidden" name="exam_id"
                                                             value="{{ Request::get('exam_id') }}">
                                                         <input type="hidden" name="class_id"
                                                             value="{{ Request::get('class_id') }}">
                                                         <tr>
                                                             <td>{{ $student->name }} {{ $student->last_name }}</td>
                                                             @php
                                                                 $i = 1;
                                                             @endphp
                                                             @foreach ($getSubject as $subject)
                                                                 @php
                                                                     $getMark = $subject->getMark(
                                                                         $student->id,
                                                                         Request::get('exam_id'),
                                                                         Request::get('class_id'),
                                                                         $subject->subject_id,
                                                                     );
                                                                 @endphp
                                                                 <td>
                                                                     <div style="margin-bottom: 10px">
                                                                         Class work
                                                                         <input type="hidden"
                                                                             name="mark[{{ $i }}][subject_id]"
                                                                             value="{{ $subject->subject_id }}">
                                                                         <input type="text"
                                                                             name="mark[{{ $i }}][class_work]"
                                                                             placeholder="Enter Marks" style="width: 200px"
                                                                             class="form-control"
                                                                             value="{{ !empty($getMark->class_work) ? $getMark->class_work : '' }}">
                                                                     </div>
                                                                     <div style="margin-bottom: 10px">
                                                                         Home work
                                                                         <input type="text"
                                                                             name="mark[{{ $i }}][home_work]"
                                                                             placeholder="Enter Marks" style="width: 200px"
                                                                             class="form-control"
                                                                             value="{{ !empty($getMark->home_work) ? $getMark->home_work : '' }}">
                                                                     </div>
                                                                     <div style="margin-bottom: 10px">
                                                                         Test work
                                                                         <input type="text"
                                                                             name="mark[{{ $i }}][test_work]"
                                                                             placeholder="Enter Marks" style="width: 200px"
                                                                             class="form-control"
                                                                             value="{{ !empty($getMark->test_work) ? $getMark->test_work : '' }}">
                                                                     </div>
                                                                     <div style="margin-bottom: 10px">
                                                                         Exam
                                                                         <input type="text"
                                                                             name="mark[{{ $i }}][exam]"
                                                                             placeholder="Enter Marks" style="width: 200px"
                                                                             class="form-control"
                                                                             value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}">
                                                                     </div>
                                                                     <div style="margin-bottom: 10px;">
                                                                         <button type="button"
                                                                             class="btn btn-primary SaveSingleSubject"
                                                                             id="{{ $student->id }}"
                                                                             data-val="{{ $subject->subject_id }}"
                                                                             data-exam="{{ Request::get('exam_id') }}"
                                                                             data-class="{{ Request::get('class_id') }}">Save</button>
                                                                     </div>
                                                                 </td>
                                                                 @php
                                                                     $i++;
                                                                 @endphp
                                                             @endforeach
                                                             <td>
                                                                 <button type="submit"
                                                                     class="btn btn-success mt-3">Save</button>
                                                             </td>
                                                         </tr>
                                                     </form>
                                                 @endforeach
                                             @endif
                                         </tbody>
                                     </table>
                                     <div style="text-align:center; padding:20px;"> <button
                                             type="submit"class="btn btn-primary">Submit</button>
                                     </div>
                                 </div>
                                 <!-- /.card-body -->
                             </div>
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

 @section('script')
     .
     <script type="text/javascript">
         $('.SubmitForm').submit(function(e) {
             e.preventDefault();
             $.ajax({
                 type: "POST",
                 url: "{{ url('admin/examinations/submit_marks_register') }}",
                 data: $(this).serialize(),
                 dataType: "json",
                 success: function(data) {
                     alert(data.message);
                 }
             });
         })

         $('.SaveSingleSubject').click(function(e) {
             var student_id = $(this).attr('id');
             var subject_id = $(this).attr('data-val');
             var exam_id = $(this).attr('data-exam');
             var class_id = $(this).attr('data-class');

             $.ajax({
                 type: "POST",
                 url: "{{ url('admin/examinations/single_submit_marks_register') }}",
                 data: {
                     '_token': "{{ csrf_token() }}",
                     student_id: student_id,
                     subject_id: subject_id,
                     exam_id: exam_id,
                     class_id: class_id,
                 },
                 dataType: "json",
                 success: function(data) {
                     alert(data.message);
                 }
             });
         })
     </script>
 @endsection
