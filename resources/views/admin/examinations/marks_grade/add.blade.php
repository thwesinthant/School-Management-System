 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add New Marks Grade</h1>
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
                                         <label>Grade Name</label>
                                         <input type="text" name="name" value="{{ old('name') }}"
                                             class="form-control" placeholder="Grade Name" required>
                                     </div>
                                     <div class="form-group">
                                         <label>Percent From</label>
                                         <input type="text" name="percent_from" value="{{ old('percent_from') }}"
                                             class="form-control" placeholder="" required>
                                     </div>
                                     <div class="form-group">
                                         <label>Percent To</label>
                                         <input type="text" name="percent_to" value="{{ old('percent_to') }}"
                                             class="form-control" placeholder="" required>
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
