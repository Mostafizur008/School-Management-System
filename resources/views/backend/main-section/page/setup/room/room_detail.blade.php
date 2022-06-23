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
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Id</th>
                                            <th class="wd-15p border-bottom-0">Building Name</th>
                                            <th class="wd-15p border-bottom-0">Floor Name</th>
                                        </tr>
                                    </thead>
                                    @foreach ($detailData as $key=>$dl)
                                    <tbody>
                                        <tr>
                                            <td>#{{$key+1}}</td>
                                            <td>{{$dl['building']['name']}}</td>
                                            <td>{{$dl->floor_name}}</td>
                                         
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

