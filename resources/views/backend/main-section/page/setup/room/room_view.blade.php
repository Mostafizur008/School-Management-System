@extends('backend.admin.main')
@section('main')


<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
               
                

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-12" align="right"> <a href="{{route('room.add')}}" class="btn btn-primary">Add Room</a> </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Id</th>
                                            <th class="wd-15p border-bottom-0">Building Name</th>
                                            <th style="width: 5%;">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($allData as $key=>$rm)
                                    <tbody>
                                        <tr>
                                            <td>#{{$key+1}}</td>
                                            <td>{{$rm['building']['name']}}</td>
                                            <td>
                                                <a href="{{route('floor.detail',$rm->building_id)}}" class="btn btn-sm btn-azure"><span class="fe fe-eye fs-14"></span></a> 
                                                <a href="{{route('floor.edit',$rm->building_id)}}" class="btn btn-sm btn-primary"><span class="fe fe-edit fs-14"></span></a> 
                                               
                                            </td>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>




@endsection

