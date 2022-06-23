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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Roll-add</a></li>
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
            <form action="{{route('roll.generate.store')}}" method="POST">
                @csrf
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

                  <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <a id="search"  name="search"  class="btn btn-success btn-block"> Search</a>
                     </div>
                     </div>
                  </div>
               </div>
           
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                    <thead class="thead-light">
                        <tr>
                            <th >Id No</th>
                            <th>Student Name</th>
                            <th>Father's Name</th>
                            <th>Gendar</th>
                            <th>Death Of Birth</th>
                            <th>Mobile</th>
                            <th width="10%">Roll</th>
                        </tr>
                    </thead>

                    <tbody id="roll-generate-tr">

                    </tbody>
                </table>
            </div><!-- end card-box -->
            <div class="col-sm-12 col-md-12">
                <div class="text-right">
                 <input type="submit" class="btn btn-success waves-effect waves-light" value="Roll Generate">
                </div>
            </div>
            </div>
        </form> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@include('backend.code-section.ajax-script.student.roll')

@endsection
