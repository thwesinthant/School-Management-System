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
                         <h1>Assign Class Teacher (Total : {{ $getRecord->total() }})</h1>
                     </div>
                     <div class="col-sm-6" style="text-align: right">
                         <a class="btn btn-primary" href="{{ url('admin/assign_class_teacher/add') }}">Add New Assign Class
                             Teacher </a>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Assign Class Teacher Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Assign Class Teacher</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-2">
                                     <label>Class Name</label>
                                     <input type="text" name="class_name" value="{{ Request::get('class_name') }}"
                                         class="form-control" placeholder="Class name">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label>Teacher Name</label>
                                     <input type="text" name="teacher_name" value="{{ Request::get('teacher_name') }}"
                                         class="form-control" placeholder="Teacher name">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label>Status</label>
                                     <select name="status" class="form-control">
                                         <option value="">Select Status</option>
                                         <option {{ Request::get('status') == 100 ? 'selected' : '' }} value="100">
                                             Active
                                         </option>
                                         <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">
                                             Inactive</option>
                                     </select>
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Date</label>
                                     <input type="date" name="date" value="{{ Request::get('date') }}"
                                         class="form-control">
                                 </div>
                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/assign_class_teacher/list') }}"
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
                                                     <a href="{{ url('admin/assign_class_teacher/delete', $value->id) }}"
                                                         class="btn btn-danger">Delete</a>
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
