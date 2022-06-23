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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Salary-View</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Salary</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                   
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Id No</th>
                                <th>Effected Date</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @foreach ($allData as $key=>$salary)
                                <tbody>
                                    <tr>
                                        <td>#{{$key+1}}</td>
                                        <td>{{$salary->name}}</td>
                                        <td>{{$salary->gender}}</td>
                                        <td>{{$salary->mobile}}</td>
                                        <td>{{$salary->id_no}}</td>
                                        <td>{{date('d-m-Y',strtotime($salary->join_date))}}</td>
                                        <td>BDT. {{$salary->salary}}</td>
                                        <td style="width: 11%;">
                                            @if ($usr->can('Admin.edit'))  <a href="{{route('ems.detail',$salary->id)}}" class="btn btn-xs btn-pink"><i class="fe-eye"></i></a> @endif
                                            @if ($usr->can('Admin.edit'))  <a href="{{route('ems.increment',$salary->id)}}" class="btn btn-xs btn-primary"><i class="fe-plus"></i></a> @endif
                                        </td>
                                    </tr>
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


@endsection
