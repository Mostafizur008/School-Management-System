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
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
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
                    <h4 class="modal-title" id="myCenterModalLabel">Site Settings</h4>
                </div>
                <div class="card-box">
                <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>School Title</label>
                               <input type="text" name="title" value="{{$settings->title}}" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Description</label>
                               <input type="text" name="description" value="{{$settings->description}}" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Contract No</label>
                                <input type="text" name="contract" value="{{$settings->contract}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$settings->email}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                         </div>

                         <div class="col-sm-6 col-md-3">
                            <img id="showImage" src="{{ (!empty($settings->image)) ? url('backend/all-images/web/logo/'.$settings->image): url('backend/all-images/others/default/cost.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <img id="showImage" src="{{ (!empty($settings->photo)) ? url('backend/all-images/web/logo/icon/'.$settings->photo): url('backend/all-images/others/default/fb.png') }}" alt="image" width="10px" height="10px" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="photo" id="photo"> </span>
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
