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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Amount</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fee-View</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Fee Amount</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="col-lg-12" align="right"> <a href="{{route('amount.add')}}" class="btn btn-primary">Add Fee Amount</a> </div>
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
                                <th>Fee Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @foreach ($allData as $key=>$amount)
                                <tbody>
                                    <tr>
                                        <td style="width: 8%;">#{{$key+1}}</td>
                                        <td>{{$amount['category']['name']}}</td>
                                        <td style="width: 12%;">
                                            @if ($usr->can('Admin.edit'))  <a href="{{route('amount.detail',$amount->fee_category_id)}}" class="btn btn-xs btn-success"><i class="fe-eye"></i></a> @endif
                                            @if ($usr->can('Admin.edit'))  <a href="{{route('amount.edit',$amount->fee_category_id)}}" class="btn btn-xs btn-primary"><i class="fe-edit"></i></a> @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            <tfoot>
                                <tr class="active">
                                    <td colspan="3">
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
