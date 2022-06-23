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
                        </ol>
                    </div>
                    <h4 class="page-title"><br/></h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <div class="row">

            <div class="col-lg-2">
            </div>

            <div class="col-lg-8">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="myCenterModalLabel">Head Settings</h4>
                </div>
                <div class="card-box">
                <form action="{{route('head.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Headmaster Name</label>
                               <input type="text" name="name" value="{{$heads->name}}" class="form-control">
                           </div>
                        </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Designation</label>
                                <select id="designation" name="designation" name="designation" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Headmaster" {{ ($heads->designation == "Headmaster" )? "selected": ""}}>Headmaster</option>
                                    <option value="Asst. Headmaster" {{ ($heads->designation == "Asst. Headmaster" )? "selected": ""}}>Asst. Headmaster</option>
                                </select>
                            </div>
                         </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Description</label>
                               <input type="text" name="description" value="{{$heads->description}}" class="form-control">
                           </div>
                        </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Contract No</label>
                                <input type="text" name="contract" value="{{$heads->contract}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$heads->email}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                         </div>

                         <div class="col-sm-6 col-md-3">
                            <img id="showImage" src="{{ (!empty($heads->image)) ? url('backend/all-images/web/head/'.$heads->image): url('backend/all-images/web/default/logo.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <img id="showImage" src="{{ (!empty($heads->photo)) ? url('backend/all-images/web/head/signature/'.$heads->photo): url('backend/all-images/web/default/logo.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="signature" id="signature"> </span>
                        </div>


                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                           </div>
                        </div>
                    </form>
                       </div>
                </div> <!-- end card-box -->
                <div class="col-lg-2">
                </div>
            </div><!-- end col -->
        </div>
</div>
    <script type="text/javascript">

        @include('backend.main-section.page.employee.ajax.imageshow')
            
    </script>
@endsection
