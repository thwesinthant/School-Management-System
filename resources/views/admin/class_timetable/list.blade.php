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
             </div>
             <!-- /.container-fluid -->
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
                                                 <option
                                                     {{ Request::get('subject_id') == $subject->subject_id ? 'selected' : '' }}
                                                     value="{{ $subject->subject_id }}">{{ $subject->subject_name }}
                                                 </option>
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

         {{-- TimeTable --}}
         @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Class Timetable</h3>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                     <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>Week</th>
                                 <th>Start Time</th>
                                 <th>End Time</th>
                                 <th>Room Number</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($week as $value)
                                 <tr>
                                     <td>{{ $value['week_name'] }}</td>
                                     <td>
                                         <input type="time" name="start_time" class="form-control">
                                     </td>
                                     <td>
                                         <input type="time" name="end_time" class="form-control">
                                     </td>
                                     <td>
                                         <input type="text" style="width: 200px" name="room_number" class="form-control">
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                     <div style="text-align: center;padding:20px;">
                         <button class="btn btn-primary">Submit</button>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </div>
         @endif
         {{-- TimeTable --}}

     </div>
     <!-- /.content-wrapper -->
 @endsection

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
