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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attendance</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Attendance</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    
                </div>

             <form action="{{route('em.attendance.leave.store')}}" method="post">
                @csrf
                
                <div class="card-box">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                            <input type="text" name="date" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                        </div>
                        </div>
                        </div>
                    <div class="col-sm-6 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="width: 100%">
                      
                      
                      
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                </tr>

                                <tr>
                                <th class="text-center btn present_all" style="display: table-cell;">Present</th>
                                <th class="text-center btn leave_all" style="display: table-cell;">leave</th>
                                <th class="text-center btn absent_all" style="display: table-cell;">Absent</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teacher as $key=>$th)
                                <tr id="div{{$th->id}}" class="text-center">

                                    <input type="hidden" name="employee_id[]" value="{{$th->id}}">

                                    <td>{{$key+1}}</td>
                                    <td>{{ $th->name }}</td>
                                    <td colspan="3"> 
    
                              
                                        <div class="switch-toggle switch-3 switch-candy">

                                    <input name="attend_status{{$key}}" type="radio" id="present{{$key}}" value="Present" checked="checked"> 
                                            <lavel for="present{{$key}}">Present </lavel>

                                            &nbsp; &nbsp; &nbsp; 

                                    <input name="attend_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave">
                                            <lavel for="leave{{$key}}"> Leave</lavel> 

                                          
                                            &nbsp;

                                    <input name="attend_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent">
                                            <lavel for="absent{{$key}}"> Absent</lavel>

                                        </div>

                                        </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="text-right">
                         <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                        </div>
                    </div> <!-- end .table-responsive-->
                </div>
             </form> <!-- end card-box -->
            </div>
          </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@endsection
