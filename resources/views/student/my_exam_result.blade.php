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
                                                 <th>Subject Name</th>
                                                 <th>Class Work</th>
                                                 <th>Test Work</th>
                                                 <th>Home Work</th>
                                                 <th>Exam</th>
                                                 <th>Total Score</th>
                                                 <th>Passing Marks</th>
                                                 <th>Full Marks</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($value['subject'] as $exam)
                                                 <tr>
                                                     <td>{{ $exam['subject_name'] }}</td>
                                                     <td>{{ $exam['class_work'] }}</td>
                                                     <td>{{ $exam['test_work'] }}</td>
                                                     <td>{{ $exam['home_work'] }}</td>
                                                     <td>{{ $exam['exam'] }}</td>
                                                     <td>{{ $exam['total_score'] }}</td>
                                                     <td>{{ $exam['passing_mark'] }}</td>
                                                     <td>{{ $exam['full_marks'] }}</td>
                                                 </tr>
                                             @endforeach
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
