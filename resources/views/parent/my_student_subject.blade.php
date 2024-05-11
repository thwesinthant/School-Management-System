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
                         <h1> Student Subject <span style="color: blue">({{ $getUser->name }}
                                 {{ $getUser->last_name }})</span>
                         </h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">

                         @include('message')

                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title">Student Subject</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body p-0">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th>Subject Name</th>
                                             <th>Subject Type</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($getRecord as $value)
                                             <tr>
                                                 <td style="font-weight: normal">{{ $value->subject_name }}</td>
                                                 <td style="font-weight: normal">{{ $value->subject_type }}</td>
                                                 <td>
                                                     <a href="{{ route('parent_class_timetable', ['class_id' => $value->class_id, 'subject_id' => $value->subject_id]) }}"
                                                         class="btn btn-primary">My Class Timetable</a>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
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
