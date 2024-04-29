 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add New Parent</h1>
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
                             <form action="" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="row">

                                         <div class="form-group col-md-6">
                                             <label>First Name <span style="color: red">*</span> </label>
                                             <input type="text" name="name" value="{{ old('name') }}"
                                                 class="form-control" placeholder=" First Name" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('name') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6" style="margin-bottom:0px;">
                                             <label> Last Name <span style="color: red">*</span> </label>
                                             <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                 class="form-control" placeholder="Last Name" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('last_name') }}
                                             </div>
                                         </div>

                                         <div class="form-group col-md-6">
                                             <label> Gender <span style="color: red">*</span> </label>
                                             <select name="gender" required class="form-control">
                                                 <option value="">Select Gender</option>
                                                 <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">
                                                     Male
                                                 </option>
                                                 <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="Female">
                                                     Female</option>
                                                 <option value="Other">Other</option>
                                             </select>
                                             <div style="color: red;">
                                                 {{ $errors->first('gender') }}
                                             </div>
                                         </div>

                                         <div class="form-group col-md-6">
                                             <label>Occupation<span style="color: red">*</span> </label>
                                             <input type="text" name="occupation" value="{{ old('occupation') }}"
                                                 class="form-control" placeholder="Occupation" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('occupation') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label>Address<span style="color: red">*</span> </label>
                                             <input type="text" name="address" value="{{ old('address') }}"
                                                 class="form-control" placeholder="Address" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('address') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Mobile Number <span style="color: red">*</span> </label>
                                             <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                                                 class="form-control" placeholder="Mobile Number" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('mobile_number') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Profile Pic <span style="color: red">*</span> </label>
                                             <input type="file" name="profile_pic" value="{{ old('profile_pic') }}"
                                                 class="form-control" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('profile_pic') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Status <span style="color: red">*</span> </label>
                                             <select name="status" required class="form-control">
                                                 <option value="">Select Status</option>
                                                 <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active
                                                 </option>
                                                 <option {{ old('status') == 1 ? 'selected' : '' }} value="1">
                                                     Inactive</option>
                                             </select>
                                             <div style="color: red;">
                                                 {{ $errors->first('status') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6" style="margin-bottom:0px;">
                                             <label> Email <span style="color: red">*</span> </label>
                                             <input type="email" name="email" value="{{ old('email') }}"
                                                 class="form-control" placeholder="Last Name" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('email') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6" style="margin-bottom:0px;">
                                             <label> Password <span style="color: red">*</span> </label>
                                             <input type="password" name="password" value="{{ old('password') }}"
                                                 class="form-control" placeholder="Password " required>
                                             <div style="color: red;">
                                                 {{ $errors->first('password') }}
                                             </div>
                                         </div>
                                     </div>
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
