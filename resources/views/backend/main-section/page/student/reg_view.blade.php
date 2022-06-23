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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Student-add</a></li>
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
                    <div class="col-lg-12" align="right"> <a href="{{route('student.add')}}" class="btn btn-primary">Add Student</a> </div>
                </div>
                <div class="card-box">
            <form action="{{route('student.class.year')}}" method="GET">
               <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select  name="class_id" required="" class="form-control" data-toggle="select2">
                            <option  selected="" disabled="">Class Select</option>
                            @foreach ($class as $cl)
                            <option value="{{$cl->id}}" {{ (@$class_id == $cl->id)? "selected":"" }}>{{$cl->name}}</option>
                            @endforeach
                         </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <select  name="session_id" required="" class="form-control" data-toggle="select2">
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
                        <input type="submit"  value="search" class="btn btn-success btn-block" name="search">
                     </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="table-responsive">
                <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0" data-page-size="5">
                    <thead class="thead-light">  
                    <tr>
                        <th style="width: 8%;">SL</th>
                        <th class="wd-15p border-bottom-0">Name</th>
                        <th class="wd-15p border-bottom-0">Birth Date</th>
                        <th class="wd-15p border-bottom-0">Class</th>
                        <th class="wd-15p border-bottom-0">Session</th>
                        <th class="wd-15p border-bottom-0">Id No.</th>
                        <th class="wd-15p border-bottom-0">Roll</th>
                        <th class="wd-15p border-bottom-0">Mobile</th>
                        <th class="wd-15p border-bottom-0">Image</th>
                        <th style="width: 14%;">Action</th>
                    </tr>
                    </thead>
                    @foreach ($mrs as $key=>$reg)
                    <tbody>
                        <tr>
                            <td>#{{$key+1}}</td>
                            <td>{{$reg['st_name']['name']}}</td>
                            <td>{{$reg['st_name']['dob']}}</td>
                            <td>{{$reg['class_name']['name']}}</td>
                            <td>{{$reg['session_name']['name']}}</td>
                            <td>{{$reg['st_name']['id_no']}}</td>
                            <td>{{$reg->roll}}</td>
                            <td>{{$reg['st_name']['mobile']}}</td>
                            <td align="center"><img class="avatar avatar-md br-7" src="{{ (!empty($reg['st_name']['image'])) ? url('backend/all-images/database/student/'.$reg['st_name']['image']): url('backend/all-images/database/default/mps.png') }}" alt="" width="20px" height="10px"></td>
                            <td>
                                <a href="{{route('student.detail',$reg->student_id)}}" class="btn btn-xs btn-pink"><span class="fe-eye"></span></a>
                                <a href="{{route('student.promotion',$reg->student_id)}}" class="btn btn-xs btn-success"><span class="fa-bullhorn"></span></a>  
                                <a href="{{route('reg.edit',$reg->student_id)}}" class="btn btn-xs btn-primary"><span class="fe-edit"></span></a> 
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
                        <tr class="active">
                            <td colspan="10">
                                <div class="text-right">
                                    <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@include('backend.code-section.modal.student.student.delete')

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.student.st_remove')

@endsection

