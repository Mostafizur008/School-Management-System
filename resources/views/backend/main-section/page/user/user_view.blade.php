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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User-view</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">User Table</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    @if ($usr->can('Admin.create')) <div class="col-lg-12" align="right"> <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add User</button> </div> @endif
                </div>
                <div class="card-box">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0" data-page-size="7">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Bith Of Date</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($allData as $key=>$user)
                            <tbody>
                                <tr>
                                    <td>#{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->code}}</td>
                                    <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-info mr-1">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                    </td>
                                    <td>
                                        @if ($usr->can('Admin.edit'))  <button type="button" value="{{$user->id}}" class="btn btn-xs btn-primary editbtn"><i class="fe-edit"></i></button> @endif
                                        @if ($usr->can('Admin.delete'))  <button type="button" value="{{$user->id}}" class="btn  btn-xs btn-danger deletebtn"><i class="fe-x"></i></button> @endif
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

    @include('backend.code-section.modal.user.add')
    @include('backend.code-section.modal.user.edit')
    @include('backend.code-section.modal.user.delete')
    @include('backend.code-section.jquery.scripts.dependence')

</div> 

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.user.all')

@endsection