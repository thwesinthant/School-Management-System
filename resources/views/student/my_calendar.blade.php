 @extends('layouts.app')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>My Calendar</h1>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div id="calendar">

                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
     <!-- /.content-wrapper -->
 @endsection

 @section('script')
     <script src="{{ url('public/dist/fullcalendar/index.global.js') }}"></script>
     <script type="text/javascript">
         var calendarID = document.getElementById('calendar');

         var calendar = new FullCalendar.Calendar(calendarID, {
             headerToolbar: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
             },
         });

         calendar.render();
     </script>
 @endsection
