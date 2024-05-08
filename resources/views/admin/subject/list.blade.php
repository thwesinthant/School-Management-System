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
                         <h1>Subject List (Total : {{ $getRecord->total() }})</h1>
                     </div>
                     <div class="col-sm-6" style="text-align: right">
                         <a class="btn btn-primary" href="{{ url('admin/subject/add') }}">Add New Subject</a>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Subject Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Subject</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label>Name</label>
                                     <input type="text" name="name" value="{{ Request::get('name') }}"
                                         class="form-control" placeholder="Enter name">
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label>Subject Type</label>
                                     <select name="type" class="form-control">
                                         <option value="">Select Type</option>
                                         <option value="Theory" {{ Request::get('type') == 'Theory' ? 'selected' : '' }}>
                                             Theory</option>
                                         <option value="Practical"
                                             {{ Request::get('type') == 'Practical' ? 'selected' : '' }}>
                                             Practical</option>
                                     </select>
                                 </div>
                                 <div class="form-group col-md-3" style="margin-bottom:0px;">
                                     <label>Date</label>
                                     <input type="date" name="date" value="{{ Request::get('date') }}"
                                         class="form-control">
                                 </div>
                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/subject/list') }}" class="btn btn-success">Reset</a>
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
                                 <h3 class="card-title">Subject List</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body p-0">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr style="text-align: center;">
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Subject Type</th>
                                             <th>Status</th>
                                             <th>Created By</th>
                                             <th>Created Date</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($getRecord as $value)
                                             <tr style="text-align: center;">
                                                 <td>{{ $value->id }}</td>
                                                 <td>{{ $value->name }}</td>
                                                 <td>{{ $value->type }}</td>
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
                                                 <td style="text-align: center; ">
                                                     <a href="{{ url('admin/subject/edit', $value->id) }}"
                                                         class="btn btn-primary">Edit</a>
                                                     <a href="{{ url('admin/subject/delete', $value->id) }}"
                                                         class="btn btn-danger">Delete</a>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <div style="float: right;padding:10px;">
                                     {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                 </div>
                 <!-- /.col -->
             </div>
         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
 @endsection
