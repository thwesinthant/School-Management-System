 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Admin</h1>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card card-primary">
                             <!-- form start -->
                             <form action="" method="post">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label>Name</label>
                                         <input type="text" name="name" class="form-control" placeholder="Enter name"
                                             value="{{ old('name', $getRecord->name) }}" required>
                                     </div>
                                     <div class="form-group" style="margin-bottom:0px;">
                                         <label>Email address</label>
                                         <input type="email" name="email" class="form-control" placeholder="Enter email"
                                             value="{{ old('email', $getRecord->email) }}" required>
                                     </div>
                                     <div style="color: red;">
                                         {{ $errors->first('email') }}
                                     </div>
                                     <div class="form-group" style="margin-top:1rem;">
                                         <label>Password</label>
                                         <input type="text" name="password" class="form-control" placeholder="Password">
                                         <p>Due you want to change password so Please add new password</p>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
     <!-- /.content-wrapper -->
 @endsection
