 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Student</h1>
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
                                             <input type="text" name="name"
                                                 value="{{ old('name', $getRecord->name) }}" class="form-control"
                                                 placeholder=" First Name" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('name') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6" style="margin-bottom:0px;">
                                             <label> Last Name <span style="color: red">*</span> </label>
                                             <input type="text" name="last_name"
                                                 value="{{ old('last_name', $getRecord->last_name) }}" class="form-control"
                                                 placeholder="Last Name" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('last_name') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Admission Number <span style="color: red">*</span> </label>
                                             <input type="text" name="admission_number"
                                                 value="{{ old('admission_number', $getRecord->admission_number) }}"
                                                 class="form-control" placeholder=" Admission Number " required>
                                             <div style="color: red;">
                                                 {{ $errors->first('admission_number') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Roll Number <span style="color: red">*</span> </label>
                                             <input type="text" name="roll_number"
                                                 value="{{ old('roll_number', $getRecord->roll_number) }}"
                                                 class="form-control" placeholder=" Roll Number " required>
                                             <div style="color: red;">
                                                 {{ $errors->first('roll_number') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Class <span style="color: red">*</span> </label>
                                             <select name="class_id" required class="form-control">
                                                 <option value="">Select Class</option>
                                                 @foreach ($getClass as $value)
                                                     <option
                                                         {{ old('class_id', $getRecord->class_id) == $value->id ? 'selected' : '' }}
                                                         value="{{ $value->id }}"> {{ $value->name }}</option>
                                                 @endforeach
                                             </select>
                                             <div style="color: red;">
                                                 {{ $errors->first('class_id') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Gender <span style="color: red">*</span> </label>
                                             <select name="gender" required class="form-control">
                                                 <option value="">Select Gender</option>
                                                 <option
                                                     {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                                     value="Male">
                                                     Male
                                                 </option>
                                                 <option
                                                     {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                                     value="Female">
                                                     Female</option>
                                                 <option value="Other">Other</option>
                                             </select>
                                             <div style="color: red;">
                                                 {{ $errors->first('gender') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Date of Birth <span style="color: red">*</span> </label>
                                             <input type="date" name="date_of_birth"
                                                 value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                                                 class="form-control" placeholder=" Date of Birth" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('date_of_birth') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Caste <span style="color: red">*</span> </label>
                                             <input type="text" name="caste"
                                                 value="{{ old('caste', $getRecord->caste) }}" class="form-control"
                                                 placeholder=" Caste" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('caste') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Religion <span style="color: red">*</span> </label>
                                             <input type="text" name="religion"
                                                 value="{{ old('religion', $getRecord->religion) }}" class="form-control"
                                                 placeholder=" Religion" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('religion') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Mobile Number <span style="color: red">*</span> </label>
                                             <input type="text" name="mobile_number"
                                                 value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                                                 class="form-control" placeholder="Mobile Number" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('mobile_number') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Admission Date <span style="color: red">*</span> </label>
                                             <input type="date" name="admission_date"
                                                 value="{{ old('admission_date', $getRecord->admission_date) }}"
                                                 class="form-control" placeholder=" Admission Date" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('admission_date') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Profile Pic <span style="color: red">*</span> </label>
                                             <input type="file" name="profile_pic" class="form-control">
                                             <div style="color: red;" {{ $errors->first('profile_pic') }}>
                                                 @if (!empty($getRecord->getProfile()))
                                                     <img src="{{ $getRecord->getProfile() }}" alt="profile_pic"
                                                         style="width: auto ;height:70px;">
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Blood Group <span style="color: red">*</span> </label>
                                             <input type="text" name="blood_group"
                                                 value="{{ old('blood_group', $getRecord->blood_group) }}"
                                                 class="form-control" placeholder="Blood Group" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('blood_group') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Height <span style="color: red">*</span> </label>
                                             <input type="text" name="height"
                                                 value="{{ old('height', $getRecord->height) }}" class="form-control"
                                                 placeholder="Height" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('height') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Weight <span style="color: red">*</span> </label>
                                             <input type="text" name="weight"
                                                 value="{{ old('weight', $getRecord->weight) }}" class="form-control"
                                                 placeholder="Weight" required>
                                             <div style="color: red;">
                                                 {{ $errors->first('weight') }}
                                             </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label> Status <span style="color: red">*</span> </label>
                                             <select name="status" required class="form-control">
                                                 <option value="">Select Status</option>
                                                 <option {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}
                                                     value="0">Active
                                                 </option>
                                                 <option {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}
                                                     value="1">
                                                     Inactive</option>
                                             </select>
                                             <div style="color: red;">
                                                 {{ $errors->first('status') }}
                                             </div>
                                         </div>
                                     </div>

                                     <div class="form-group ">
                                         <label> Email <span style="color: red">*</span> </label>
                                         <input type="email" name="email"
                                             value="{{ old('email', $getRecord->email) }}" class="form-control"
                                             placeholder="Email" required>
                                         <div style="color: red;">
                                             {{ $errors->first('email') }}
                                         </div>
                                     </div>
                                     <div class="form-group" style="margin-top:1rem;">
                                         <label>Password <span style="color: red">*</span> </label>
                                         <input type="password" name="password" class="form-control"
                                             placeholder="Password">
                                         <div>Due you want to change password so Please add new password</div>
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
