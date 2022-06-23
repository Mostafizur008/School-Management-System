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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Promotion</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Promotion</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                    
                </div>
                <div class="card-box">
              <form action="{{route('student.promotion.update',$editData->student_id)}}" method="post" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="id"  value="{{$editData->id}}"  class="form-control">
                    <div class="row">
                        <div class="col-sm-12 col-md-12" align="center">
                            <img id="showImage" src="{{ (!empty($editData['st_name']['image'])) ? url('backend/all-images/database/student/'.$editData['st_name']['image']): url('backend/all-images/database/default/mps.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                        </div>

                        <div class="col-sm-12 col-md-12" align="center">
                            <h5 class="mb-1 text-dark fw-semibold">{{$editData['st_name']['name']}}</h5>
                            <p class="text-muted mt-0 mb-1 pt-0 fs-13">{{$editData['st_name']['id_no']}}</p>
                        </div>

                        <div class="table-responsive">
                        <table class="table table-bordered table-centered">
                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Birth Date</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData['st_name']['dob']}}</td>

                                <td class="fw-bold"  style="width: 16%;">Gender</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData['st_name']['gender']}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Mobile</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData['st_name']['mobile']}}</td>

                                <td class="fw-bold"  style="width: 16%;">Email</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData['st_name']['email']}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Class</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData['class_name']['name']}}</td>

                                <td class="fw-bold"  style="width: 16%;">Roll</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->roll}}</td>
                            </tr>

                        </table>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Class <span class="text-red">*</span></label>
                            <select name="class_id" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                <option disable="">Choose one</option>
                                @foreach ($class as $cl)
                                <option value="{{$cl->id}}" {{ ($editData->class_id == $cl->id )? "selected":""}}>{{$cl->name}}</option>
                                @endforeach
                             </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Session <span class="text-red">*</span></label>
                            <select name="session_id" class="form-control" data-toggle="select2">
                                <option value="" selected="" disable="">Choose one</option>
                                @foreach ($session as $ss)
                                <option value="{{$ss->id}}" {{ ($editData->session_id == $ss->id )? "selected":""}}>{{$ss->name}}</option>
                                @endforeach
                             </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Group <span class="text-red"></span></label>
                            <select name="group_id" class="form-control" data-toggle="select2">
                                <option value="" selected="" disabled="">Chose One</option>
                                @foreach ($group as $gp)
                                <option value="{{$gp->id}}" {{ ($editData->group_id == $gp->id )? "selected":""}}>{{$gp->name}}</option>
                                @endforeach
                             </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Shift <span class="text-red"></span></label>
                            <select name="shift_id" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                <option disable="">Choose one</option>
                                @foreach ($shift as $sf)
                                <option value="{{$sf->id}}" {{ ($editData->shift_id == $sf->id )? "selected":""}}>{{$sf->name}}</option>
                                @endforeach
                             </select>
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

        <script type="text/javascript">

            @include('backend.main-section.page.teacher.ajax.imageshow')
                
        </script>

@endsection
