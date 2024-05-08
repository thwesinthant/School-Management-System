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
                         <h1>Class Timetable </h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         {{-- Search Assign Class Teacher Form --}}
         <div class="row" style="margin:7.5px ">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Search Class Timetable</h3>
                     </div>
                     <!-- form start -->
                     <form action="" method="get">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label>Class Name</label>
                                     <select class="form-control getClass" name="class_id" required>
                                         <option value="">Select</option>
                                         @foreach ($getClass as $class)
                                             <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                 value="{{ $class->id }}">{{ $class->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label>Subject Name</label>
                                     <select class="form-control getSubject" name="subject_id" required>
                                         <option value="">Select</option>
                                         @if (!empty($getSubject))
                                             @foreach ($getSubject as $subject)
                                                 <option {{ Request::get('subject_id') == $subject->id ? 'selected' : '' }}
                                                     value="{{ $subject->id }}">{{ $subject->name }}</option>
                                             @endforeach
                                         @endif
                                     </select>
                                 </div>
                                 <div class="form-group col-md-3" style="margin-top:30px;">
                                     <button type="submit" class="btn btn-primary">Search</button>
                                     <a href="{{ url('admin/class_timetable/list') }}" class="btn btn-success">Reset</a>
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


                     </div>
                     <!-- /.col -->
                 </div>
             </div>
             <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->

 @section('script')
     <script type="text/javascript">
         $('.getClass').change(function() {
             // getting selected option value
             var class_id = $(this).val();
             // console.log(value); // get class id like 1 , 2 ,3

             $.ajax({
                 type: "POST",
                 url: "{{ url('admin/class_timetable/get_subject') }}",
                 data: {
                     "_token": "{{ csrf_token() }}",
                     class_id: class_id,
                 },
                 dataType: "json",
                 success: function(response) {
                     $('.getSubject').html(response.html);
                 }
             });
         });
     </script>
 @endsection
