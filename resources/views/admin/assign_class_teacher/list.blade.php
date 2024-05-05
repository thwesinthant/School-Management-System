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
                         <h1>Assign Class Teacher</h1>
                     </div>
                     <div class="col-sm-6" style="text-align: right">
                         <a class="btn btn-primary" href="{{ url('admin/assign_class_teacher/add') }}">Add New Assign Class
                             Teacher</a>
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
                                 <h3 class="card-title">Assign Class Teacher</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body p-0">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Class Name</th>
                                             <th>Teacher Name</th>
                                             <th>Status</th>
                                             <th>Created By</th>
                                             <th>Created Date</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($getRecord as $value)
                                             <tr>
                                                 <td>{{ $value->id }}</td>
                                                 <td>{{ $value->class_name }}</td>
                                                 <td>{{ $value->teacher_name }}
                                                     {{ $value->teacher_lastName }}
                                                 </td>
                                                 <td>
                                                     @if ($value->status == 0)
                                                         Active
                                                     @else
                                                         Inactive
                                                     @endif
                                                 </td>
                                                 <td>{{ $value->created_by_name }}</td>
                                                 <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                                 </td>
                                                 <td>
                                                     <a href="{{ url('admin/assign_class_teacher/edit', $value->id) }}"
                                                         class="btn btn-primary">Edit</a>
                                                     <a href="{{ url('admin/assign_class_teacher/edit_single', $value->id) }}"
                                                         class="btn btn-primary">Edit Single</a>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <div style="float: right;padding:10px;">
                                     {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
                                 <!-- /.card-body -->
                             </div>
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