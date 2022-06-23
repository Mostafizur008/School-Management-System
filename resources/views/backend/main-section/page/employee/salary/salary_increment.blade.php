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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Increment</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Salary Increment</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                    
                </div>
                <div class="card-box">
            <form action="{{route('ems.increment.store',$editData->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12" align="center">
                            <img id="showImage" src="{{ (!empty($editData->image)) ? url('backend/all-images/database/employee/'.$editData->image): url('backend/all-images/database/default/mps.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                        </div>

                        <div class="col-sm-12 col-md-12" align="center">
                            <h5 class="mb-1 text-dark fw-semibold">{{$editData->name}}</h5>
                            <p class="text-muted mt-0 mb-1 pt-0 fs-13">{{$editData->id_no}}</p>
                        </div>

                        <div class="table-responsive">
                        <table class="table table-bordered table-centered">
                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Birth Date</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->dob}}</td>

                                <td class="fw-bold"  style="width: 16%;">Gender</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->gender}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Mobile</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->mobile}}</td>

                                <td class="fw-bold"  style="width: 16%;">Email</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->email}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold"  style="width: 16%;">Salary</td>
                                <td style="width: 3%;">:</td>
                                <td>BDT. {{$editData->salary}}/-</td>

                                <td class="fw-bold"  style="width: 16%;">Effected Date</td>
                                <td style="width: 3%;">:</td>
                                <td>{{$editData->join_date}}</td>
                            </tr>

                        </table>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Increment Salary</label>
                            <input type="number" name="increment_salary" class="form-control" placeholder="Enter Salary">
                        </div>
                     </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Effected Salary</label>
                            <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                            <input type="text" name="effected_salary" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
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

        <script type="text/javascript">

            @include('backend.main-section.page.teacher.ajax.imageshow')
                
        </script>

@endsection
