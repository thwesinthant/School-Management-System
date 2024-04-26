 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add New Student</h1>
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
                                         </div>
                                         <div class="form-group col-md-6" style="margin-bottom:0px;">
                                             <label> Last Name <span style="color: red">*</span> </label>
                                             <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                 class="form-control" placeholder="Last Name" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Admission Number <span style="color: red">*</span> </label>
                                             <input type="text" name="admission_number"
                                                 value="{{ old('admission_number') }}" class="form-control"
                                                 placeholder=" Admission Number " required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Roll Number <span style="color: red">*</span> </label>
                                             <input type="text" name="roll_number" value="{{ old('roll_number') }}"
                                                 class="form-control" placeholder=" Roll Number " required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Class <span style="color: red">*</span> </label>
                                             <select name="class_id" required class="form-control">
                                                 <option value="">Select Class</option>
                                                 @foreach ($getClass as $value)
                                                     <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Gender <span style="color: red">*</span> </label>
                                             <select name="gender" required class="form-control">
                                                 <option value="">Select Gender</option>
                                                 <option value="Male">Male</option>
                                                 <option value="Female">Female</option>
                                                 <option value="Other">Other</option>
                                             </select>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Date of Birth <span style="color: red">*</span> </label>
                                             <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                                 class="form-control" placeholder=" Date of Birth" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Caste <span style="color: red">*</span> </label>
                                             <input type="type" name="caste" value="{{ old('caste') }}"
                                                 class="form-control" placeholder=" Caste" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Religon <span style="color: red">*</span> </label>
                                             <input type="text" name="religon" value="{{ old('religon') }}"
                                                 class="form-control" placeholder=" Religon" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Mobile Number <span style="color: red">*</span> </label>
                                             <input type="type" name="mobile_number" value="{{ old('mobile_number') }}"
                                                 class="form-control" placeholder="Mobile Number" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Admission Date <span style="color: red">*</span> </label>
                                             <input type="date" name="admission_date"
                                                 value="{{ old('admission_date') }}" class="form-control"
                                                 placeholder=" Admission Date" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Profile Pic <span style="color: red">*</span> </label>
                                             <input type="file" name="profile_pic" value="{{ old('profile_pic') }}"
                                                 class="form-control" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Blood Group <span style="color: red">*</span> </label>
                                             <input type="type" name="blood_group" value="{{ old('blood_group') }}"
                                                 class="form-control" placeholder="Blood Group" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Height <span style="color: red">*</span> </label>
                                             <input type="type" name="height" value="{{ old('height') }}"
                                                 class="form-control" placeholder="Height" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Weight <span style="color: red">*</span> </label>
                                             <input type="type" name="weight" value="{{ old('weight') }}"
                                                 class="form-control" placeholder="Weight" required>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Status <span style="color: red">*</span> </label>
                                             <select name="status" required class="form-control">
                                                 <option value="">Select Status</option>
                                                 <option value="0">Active</option>
                                                 <option value="1">Inactive</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group ">
                                         <label> Email <span style="color: red">*</span> </label>
                                         <input type="email" name="email" value="{{ old('email') }}"
                                             class="form-control" placeholder="Email" required>
                                         <div style="color: red;">
                                             {{ $errors->first('email') }}
                                         </div>
                                     </div>
                                     <div class="form-group" style="margin-top:1rem;">
                                         <label>Password <span style="color: red">*</span> </label>
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
