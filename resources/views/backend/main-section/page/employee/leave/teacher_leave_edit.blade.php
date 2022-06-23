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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave-edit</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Leave</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                </div>
                <div class="card-box">
             <form action="{{route('emp.leave.update',$editData->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">

                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                               <label>Employee</label>
                               <select name="employee_id" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   @foreach ($teachers as $th)           
                                   <option value="{{$th->id}}" {{ ($editData->employee_id == $th->id)? 'selected':'' }}>{{$th->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Leave Purpose</label>
                                <select name="employee_leave_purpose_id" id="leave" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($leave_purpose as $lp)  
                                    <option value="{{$lp->id}}" {{ ($editData->employee_leave_purpose_id == $lp->id)? 'selected':''}}>{{$lp->name}}</option>
                                    @endforeach
                                    <option value="0">New Purpose</option>
                                </select>
                            </div>
                            <input type="text" name="name" id="add_another" placeholder="Purpose Name" class="form-control" style="display: none">
                         </div>

                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                               <label>Start date</label>
                               <div class="input-group">
                               <div class="input-group-append">
                                   <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                               </div>
                               <input type="text" name="start_date" value="{{ $editData->start_date }}" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                           </div>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>End date</label>
                                <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="text" name="end_date" value="{{ $editData->end_date }}" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                            </div>
                            </div>
                         </div>

                    </div>

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

        @include('backend.code-section.ajax-script.teacher.leave_add')

@endsection
