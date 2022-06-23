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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Monthly-salary</a></li>
                        </ol>
                    </div>
                    <br/>
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
                            <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                            <input type="date" name="date" id="date" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                        </div>
                        </div>
                     </div>
                    
                     <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <a id="search" class="btn btn-success btn-block" name="search"> Search</a>
                         </div>
                      </div>

                    <div class="table-responsive">
                      <div class="col-lg-12">
                    
                        <div id="DocumentResults">
                    
                           <script id="document-template" type="text/x-handlebars-template">
                    
                            <table class="table table-bordered table-striped" style="width: 100%">
                    
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
                    
                            </table>
                                 </script>
                            </div>
                      </div>
                        </div>
                     </div>
                    </div><!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

<script type="text/javascript">
    $(document).on('click','#search',function(){
      var date = $('#date').val();
       $.ajax({
        url: "{{ route('employee.monthly.slary.get')}}",
        type: "get",
        data: {'date':date},
        beforeSend: function() {       
        },
        success: function (data) {
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });
  
  </script>

@endsection