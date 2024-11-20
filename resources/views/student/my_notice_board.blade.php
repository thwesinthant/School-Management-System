 @extends('layouts.app')
 @section('content')
     <div class="content-wrapper">

         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>My Notice Board</h1>
                     </div>
                 </div>
             </div>
         </section>

         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title">Search Notice
                                     Board</h3>
                             </div>
                             <form action="" method="get">
                                 <div class="card-body">
                                     <div class="row">
                                         <div class="form-group col-md-3">
                                             <label>Title</label>
                                             <input type="text" name="title" value="{{ Request::get('title') }}"
                                                 class="form-control" placeholder="Enter title">
                                         </div>

                                         <div class="form-group col-md-3">
                                             <label>Notice Date From</label>
                                             <input type="date" name="notice_date_from"
                                                 value="{{ Request::get('notice_date_from') }}" class="form-control">
                                         </div>

                                         <div class="form-group col-md-3">
                                             <label>Notice Date To</label>
                                             <input type="date" name="notice_date_to"
                                                 value="{{ Request::get('notice_date_to') }}" class="form-control">
                                         </div>

                                         <div class="form-group col-md-3" style="margin-top:30px;">
                                             <button type="submit" class="btn btn-primary">Search</button>
                                             <a href="{{ url('student/my_notice_board') }}"
                                                 class="btn btn-success">Reset</a>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>

                     @foreach ($getRecord as $value)
                         <div class="col-md-12">
                             <div class="card card-primary card-outline">
                                 <div class="card-header">
                                     <h3 class="card-title">Read Mail</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body p-0">
                                     <div class="mailbox-read-info">
                                         <h5>{{ $value->title }}</h5>
                                         <h6 style="margin-top:10px">
                                             {{ date('d-m-Y', strtotime($value->notice_date)) }}
                                         </h6>
                                     </div>

                                     <div class="mailbox-read-message">
                                         {!! $value->message !!}

                                     </div>

                                 </div>
                             </div>
                         </div>
                     @endforeach
                     <div class="col-md-12">
                         <div style="float: right;padding:10px;">
                             {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 @endsection
