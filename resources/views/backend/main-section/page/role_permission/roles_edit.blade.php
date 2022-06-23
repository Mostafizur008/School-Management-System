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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Role-Create</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Role Manage</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="myCenterModalLabel">Role Create</h4>
                </div>
                <div class="card-box">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Role Name</label>
                               <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name" placeholder="Enter role name">
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-12">
                            <div class="form-group">
                                <label>All Permission (All Group)</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                           <hr/>
                            </div>
                         </div>

                         @php $i = 1; @endphp
                         @foreach ($permission_groups as $group)

                         @php
                         $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                         $j = 1;
                         @endphp
                         <div class="col-sm-6 col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                            </div>
                         </div>

                         <div class="col-sm-6 col-md-9 role-{{ $i }}-management-checkbox">
                          @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @php  $j++; @endphp
                          @endforeach
                        <br>
                         </div>

                         @php  $i++; @endphp
                         @endforeach


                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Update">
                           </div>
                        </div>
                    </form>
                       </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.role.script')

@endsection