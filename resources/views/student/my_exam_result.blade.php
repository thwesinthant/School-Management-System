 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         {{-- from message.blade.php --}}
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>My Exam Result</h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Subject Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">

             </div>
         </div>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     @foreach ($getRecord as $value)
                         <div class="col-md-12 ">
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">{{ $value['exam_name'] }}</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body p-0 overflow-auto">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th>Subject</th>
                                                 <th>Class Work</th>
                                                 <th>Test Work</th>
                                                 <th>Home Work</th>
                                                 <th>Exam</th>
                                                 <th>Total Score</th>
                                                 <th>Passing Marks</th>
                                                 <th>Full Marks</th>
                                                 <th>Result</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @php
                                                 $total_score = 0;
                                                 $full_marks = 0;
                                                 $result_validation = 0;
                                             @endphp
                                             @foreach ($value['subject'] as $exam)
                                                 @php
                                                     $total_score = $total_score + $exam['total_score'];
                                                     $full_marks = $full_marks + $exam['full_marks'];

                                                 @endphp
                                                 <tr>
                                                     <td style="width: 200px;">{{ $exam['subject_name'] }}</td>
                                                     <td>{{ $exam['class_work'] }}</td>
                                                     <td>{{ $exam['test_work'] }}</td>
                                                     <td>{{ $exam['home_work'] }}</td>
                                                     <td>{{ $exam['exam'] }}</td>
                                                     <td>{{ $exam['total_score'] }}</td>
                                                     <td>{{ $exam['passing_mark'] }}</td>
                                                     <td>{{ $exam['full_marks'] }}</td>
                                                     <td>

                                                         @if ($exam['total_score'] >= $exam['passing_mark'])
                                                             <span style="color:green ; font-weight:bold;">Pass</span>
                                                         @else
                                                             @php
                                                                 $result_validation = 1;
                                                             @endphp
                                                             <span style="color:red ; font-weight:bold;">False</span>
                                                         @endif
                                                     </td>
                                                 </tr>
                                             @endforeach
                                             <tr>
                                                 <td colspan="2">
                                                     <b>Grand Total : {{ $total_score }} / {{ $full_marks }} </b>
                                                 </td>
                                                 @php
                                                     $percentage = ($total_score * 100) / $full_marks;
                                                     $getGrade = App\Models\MarksGradeModel::getGrade($percentage);
                                                 @endphp
                                                 <td colspan="2">
                                                     <b>Percentage : {{ round($percentage, 2) }}%
                                                     </b>
                                                 </td>
                                                 <td colspan="2">
                                                     <b>Grade : {{ $getGrade }}
                                                     </b>
                                                 </td>
                                                 <td colspan="7">
                                                     <b>Result :
                                                         @if ($result_validation == 0)
                                                             <span style="color: green;">Pass</span>
                                                         @else
                                                             <span style="color: red;">Fail</span>
                                                         @endif
                                                     </b>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                                 <!-- /.card-body -->
                             </div>
                             <!-- /.card -->
                         </div>
                     @endforeach
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
