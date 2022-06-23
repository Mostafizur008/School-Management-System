@extends('backend.main-section.body.main')
@section('main')

@php
$usr = Auth::guard()->user();
@endphp

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Library</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Book-issue</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Book Issue</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="col-lg-12" align="right"> <a href="{{route('issue.add')}}" class="btn btn-primary">Add Book Issue</a> </div>
                </div>
                <div class="card-box">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                        <option value="Active">Active</option>
                                        <option value="Returns">Returns</option>
                                        <option value="Cencel">Cencel</option>
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
                                <th>Id</th>
                                <th>Book Issue Person</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Class</th>
                                <th>Session</th>
                                <th>Id No</th>
                                <th>Issue Start Date</th>
                                <th>Issue End Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                                @foreach ($detailData as $key=>$bc)
                                <tbody>
                                    <tr>
                                        <td style="width: 8%;">#{{$key+1}}</td>
                                        <td>{{$bc['user']['name']}}</td>
                                        <td>{{$bc['book']['name']}}</td>
                                        <td>{{$bc['author']['name']}}</td>
                                        <td>{{$bc['classes']['name']}}</td>
                                        <td>{{$bc['session']['name']}}</td>
                                        <td>{{$bc->id_no}}</td>
                                        <td>{{$bc->start}}</td>
                                        <td>{{$bc->end}}</td>
                                        <td>{{$bc->return}}</td>
                                        <td><span class="badge badge-info mr-1">{{$bc->status}}</span></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            <tfoot>
                                <tr class="active">
                                    <td colspan="12">
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