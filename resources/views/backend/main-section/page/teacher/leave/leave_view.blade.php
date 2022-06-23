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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Teacher</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Leave</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="col-lg-12" align="right"> <a href="{{route('leave.add')}}" class="btn btn-primary">Leave</a> </div>
                </div>
                <div class="card-box">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0" data-page-size="5">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:8%;">SL</th>
                                    <th>Name</th>
                                    <th>Id No.</th>
                                    <th>Leave Purpose</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th class="text-right" style="width:12%;">Action</th>
                                </tr>
                            </thead>
                            @foreach ($allData as $key=>$leave)
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $leave['user']['name']}}</td>
                                    <td>{{$leave['user']['th_id_no']}}</td>
                                    <td>{{$leave['purpose']['name']}}</td>
                                    <td>{{$leave->start_date}}</td>
                                    <td>{{$leave->end_date}}</td>
                                    <td> 
                                        <a href="{{route('leave.edit',$leave->id)}}" class="btn btn-xs btn-primary"><span class="fe-edit"></span></a>
                                        <button type="button" value="{{$leave->id}}" class="btn btn-xs btn-danger deletebtn"><span class="fe-x"></span></button> 
                                       
                                    </td>
                            </tbody>
                            @endforeach
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
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@include('backend.code-section.modal.teacher.leave.delete')
@include('backend.code-section.ajax-script.teacher.leave_delete')

@endsection
