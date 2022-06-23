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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Assign-detail</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Assign Subject</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="col-lg-12" align="right"> <a href="{{route('assign.add')}}" class="btn btn-primary">Create Assign Subject</a> </div>
                </div>
                <div class="card-box">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0" data-page-size="5">
                            <thead class="thead-light">
                            <tr>
                                <th style="width: 8%;">Id</th>
                                <th class="wd-15p border-bottom-0">Class</th>
                                <th class="wd-15p border-bottom-0">Exam</th>
                                <th class="wd-15p border-bottom-0">Group</th>
                                <th class="wd-15p border-bottom-0">Subject</th>
                                <th class="wd-15p border-bottom-0">Pass Mark</th>
                                <th class="wd-15p border-bottom-0">Total Mark</th>
                            </tr>
                            </thead>
                            @foreach ($detailData as $key=>$dl)
                            <tbody>
                                <tr>
                                    <td>#{{$key+1}}</td>
                                    <td>{{$dl['class']['name']}}</td>
                                    <td>{{$dl['exam']['name']}}</td>
                                    <td>{{$dl['group']['name']??''}}</td>
                                    <td>{{$dl['subject']['name']}} <font color="red">({{$dl['shortcode']['name']??''}})</font></td>
                                    <td>{{$dl->pass_mark}}</td>
                                    <td>{{$dl->full_mark}}</td>
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


</div> 

@endsection
