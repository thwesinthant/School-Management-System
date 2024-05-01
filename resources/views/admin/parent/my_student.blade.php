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
                         <h1>Parent Student List (Total : )</h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Parent Student Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Student</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-2">
                                     <label>Student ID</label>
                                     <input type="text" name="id" value="{{ Request::get('id') }}"
                                         class="form-control" placeholder="Student ID">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label>Name</label>
                                     <input type="text" name="name" value="{{ Request::get('name') }}"
                                         class="form-control" placeholder="Name">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label>Last Name</label>
                                     <input type="text" name="last_name" value="{{ Request::get('last_name') }}"
                                         class="form-control" placeholder="Last Name">
                                 </div>
                                 <div class="form-group col-md-2" style="margin-bottom:0px;">
                                     <label>Email </label>
                                     <input type="text" name="email" value="{{ Request::get('email') }}"
                                         class="form-control" placeholder="Email">
                                 </div>
                                 <div class="form-group col-md-2" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/parent/my_student/' . $parent_id) }}"
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

                         @if (!empty($getSearchStudent))
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Student List</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body p-0" style="overflow:auto;">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr style="text-align: center;">
                                                 <th>#</th>
                                                 <th>Profile Pic</th>
                                                 <th>Name</th>
                                                 <th>Email</th>
                                                 <th>Created Date</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($getSearchStudent as $value)
                                                 <tr style="text-align: center;">
                                                     <td>{{ $value->id }}</td>
                                                     <td>
                                                         @if (!empty($value->getProfile()))
                                                             <img src="{{ $value->getProfile() }}" alt="profile_pic"
                                                                 style="width: 50px ;height:50px; border-radius:50px;">
                                                         @endif
                                                     </td>
                                                     <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                     <td>{{ $value->email }}</td>
                                                     <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                                     </td>
                                                     <td style="text-align: center;min-width:140px">
                                                         <a href="{{ url('admin/student/edit', $value->id) }}"
                                                             class="btn btn-primary btn-sm">Edit</a>
                                                         <a href="{{ url('admin/student/delete', $value->id) }}"
                                                             class="btn btn-danger btn-sm">Delete</a>
                                                     </td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>

                                 </div>
                         @endif

                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title">Parent List</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body p-0" style="overflow: auto">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr style="text-align: center;">
                                             <th>#</th>
                                             <th>Profile Pic</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Gender</th>
                                             <th>Mobile Number</th>
                                             <th>Occupation</th>
                                             <th>Address</th>
                                             <th>Status</th>
                                             <th>Created Date</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr style="text-align: center;">

                                         </tr>

                                     </tbody>
                                 </table>
                                 <div style="float: right;padding:10px;">



                                 </div>
                                 <!-- /.card-body -->


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
