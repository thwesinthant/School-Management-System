 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add New Admin</h1>
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
                                         <input type="text" name="name" value="{{ old('name') }}"
                                             class="form-control" placeholder="Enter name" required>
                                     </div>
                                     <div class="form-group" style="margin-bottom:0px;">
                                         <label>Email address</label>
                                         <input type="email" name="email" value="{{ old('email') }}"
                                             class="form-control" placeholder="Enter email" required>
                                     </div>
                                     <div style="color: red;">
                                         {{ $errors->first('email') }}
                                     </div>
                                     <div class="form-group" style="margin-top:1rem;">
                                         <label>Password</label>
                                         <input type="password" name="password" value="{{ old('password') }}"
                                             class="form-control" placeholder="Password" required>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-primary">Submit</button>
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
