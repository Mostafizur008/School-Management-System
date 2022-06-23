@extends('backend.main-section.body.main')
@section('main')

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Role-Permission</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Role & Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="col-lg-12" align="right"> <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">Create New Role</a> </div>
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
                        <table id="" class="table table-bordered table-centered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th style="width: 5%;" align="center">SL</th>
                                <th align="center">Name</th>
                                <th align="center">Permission</th>
                                <th align="center">Action</th>
                            </tr>
                            </thead>
                            @foreach ($roles as $key=>$role)
                            <tbody>
                                <tr>
                                    <td align="center">#{{$key+1}}</td>
                                    <td align="center">{{$role->name}}</td>
                                    <td align="center">
                                    @foreach ($role->permissions as $perm)
                                    <span class="badge badge-info mr-1">
                                    {{ $perm->name }}
                                    </span>
                                    @endforeach
                                    </td>
                                    <td style="width: 12%;" align="center">
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-xs btn-primary editbtn"><i class="fe-edit"></i></a> 
                                        <a href="{{ route('admin.roles.destroy', $role->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();" class="btn  btn-xs btn-danger deletebtn"><i class="fe-x"></i></a> 
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> 

@endsection
