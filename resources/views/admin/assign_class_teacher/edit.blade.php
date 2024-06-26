 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Assign Class Teacher</h1>
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
                                         <label>Select Class</label>
                                         <select name="class_id" class="form-control" required>
                                             <option value="">Select class</option>
                                             @foreach ($getClass as $class)
                                                 <option {{ $getRecord->class_id == $class->id ? 'selected' : '' }}
                                                     value="{{ $class->id }}">{{ $class->name }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label>Teacher Name</label>
                                         @foreach ($getTeacher as $teacher)
                                             <div>
                                                 <label style="font-weight:normal;">
                                                     @php
                                                         $checked = '';
                                                     @endphp

                                                     @foreach ($getAssignTeacherID as $teacherID)
                                                         @if ($teacherID->teacher_id == $teacher->id)
                                                             @php
                                                                 $checked = 'checked';
                                                             @endphp
                                                         @endif
                                                     @endforeach
                                                     <input {{ $checked }} type="checkbox" name="teacher_id[]"
                                                         value="{{ $teacher->id }}">
                                                     {{ $teacher->name }} {{ $teacher->last_name }}
                                                 </label>
                                             </div>
                                         @endforeach
                                     </div>
                                     <div class="form-group">
                                         <label>Status</label>
                                         <select name="status" class="form-control">
                                             <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">
                                                 Active</option>
                                             <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">
                                                 Inactive</option>
                                         </select>
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
