 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Change Password</h1>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         @include('message');
                         <div class="card card-primary">
                             <!-- form start -->
                             <form action="" method="post">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label>Old Password</label>
                                         <input type="password" name="old_password" class="form-control"
                                             placeholder="Old Password" required>
                                     </div>
                                     <div class="form-group">
                                         <label>New Password</label>
                                         <input type="password" name="new_password" class="form-control"
                                             placeholder="New Password" required>
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
