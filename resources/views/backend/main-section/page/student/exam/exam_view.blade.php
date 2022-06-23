@extends('backend.main-section.body.main')
@section('main')

@php
$usr = Auth::guard()->user();
@endphp

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Exam-fee</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Student Portal</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                   
                </div>
                <div class="card-box">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select  name="class_id" id="class_id" required="" class="form-control" data-toggle="select2">
                            <option  selected="" disabled="">Class Select</option>
                            @foreach ($class as $cl)
                            <option value="{{$cl->id}}" {{ (@$class_id == $cl->id)? "selected":"" }}>{{$cl->name}}</option>
                            @endforeach
                         </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select  name="session_id" id="session_id" required="" class="form-control" data-toggle="select2">
                            <option value="" selected="" disabled="">Session Select</option>
                            @foreach ($session as $ss)
                            <option value="{{$ss->id}}" {{ (@$session_id == $ss->id)? "selected":"" }}>{{$ss->name}}</option>
                            @endforeach
                         </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select name="exam_id" id="exam_id" required="" class="form-control" data-toggle="select2">
                            <option value="" selected="" disabled="">Select Exam</option>
                            @foreach ($exam as $ex)
                            <option value="{{$ex->id}}">{{$ex->name}}</option>
                            @endforeach
                         </select>
                     </div>
                  </div>

                  <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <a id="search"  name="search"  class="btn btn-success btn-block"> Search</a>
                     </div>
                     </div>
                  </div>
               
           
            <div class="table-responsive">
                <div id="DocumentResults">
                    <script id="document-template" type="text/x-handlebars-template">
                    <div class="col-lg-12">
                        <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0" data-page-size="5">
                        <thead>
                            <tr>
                           @{{{thsource}}}
                            </tr>
                         </thead>
                         <tbody>
                             @{{#each this}}
                             <tr>
                                 @{{{tdsource}}}	
                             </tr>
                             @{{/each}}
                         </tbody>
                         <tfoot>
                            <tr class="active">
                                <td colspan="8">
                                    <div class="text-right">
                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                    </script>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@include('backend.code-section.ajax-script.student.examfee')

@endsection
