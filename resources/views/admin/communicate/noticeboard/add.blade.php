 @extends('layouts.app')
 @section('content')
     <div class="content-wrapper">
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Add New Notice Board</h1>
                     </div>
                 </div>
             </div>
         </section>

         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card card-primary">
                             <form action="" method="post">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label>Title</label>
                                         <input type="text" name="title" value="{{ old('title') }}"
                                             class="form-control" placeholder="Enter title" required>
                                     </div>

                                     <div class="form-group">
                                         <label>Notice Date</label>
                                         <input type="date" name="notice_date" class="form-control" required>
                                     </div>

                                     <div class="form-group">
                                         <label>Publish Date</label>
                                         <input type="date" name="publish_date" class="form-control" required>
                                     </div>

                                     <div class="form-group">
                                         <label style="display: block">Message To</label>
                                         <label style="margin-right: 50px"><input style="margin-right: 5px"
                                                 style="margin-right: 50px" style="margin-right: 50px" name="message_to[]"
                                                 value="3" type="checkbox" name=""
                                                 id="">Student</label>
                                         <label style="margin-right: 50px"><input style="margin-right: 5px"
                                                 style="margin-right: 50px" style="margin-right: 50px" name="message_to[]"
                                                 value="4" type="checkbox" name="" id="">Parent</label>
                                         <label style="margin-right: 50px"><input style="margin-right: 5px"
                                                 style="margin-right: 50px" style="margin-right: 50px" name="message_to[]"
                                                 value="2" type="checkbox" name=""
                                                 id="">Teacher</label>
                                     </div>

                                     <div class="form-group">
                                         <label>Message</label>
                                         <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                                        </textarea>
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
 @endsection

 @section('script')
     <!-- Summernote -->
     <script src="{{ url('public/plugins/summernote/summernote-bs4.min.js') }}"></script>

     <script type="text/javascript">
         $(function() {
             $('#compose-textarea').summernote({
                 height: 200
             });
         });
     </script>
 @endsection
