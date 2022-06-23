@extends('backend.main-section.body.main')
@section('main')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"><br/></h4>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-lg-2">

            </div>

            <div class="col-lg-8">
                <div class="card">

                    <form action="{{route('district.store')}}" method="post" >
                        @csrf 

                    <div class="card-body">

                    <div class="mrs">
                        <div class="form-group col-md-12 mb-0" align="right">
                            <span class="btn btn-xs btn-primary addeventmore"><i class="fa fa-plus"></i> Add More</span>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Country <span class="text-red"> *</span></label>
                                    <select name="country_id" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($cnt as $cn)
                                        <option value="{{$cn->id}}">{{$cn->name}}</option>
                                        @endforeach 

                                        </select>
                                </div>
                            </div>
                        </div>
                    
                      
                        <div class="row">

                            <div class="form-group col-md-10 mb-0">
                                <div class="form-group">
                                    <label class="form-label">District Name<span class="text-red"> *</span></label>
                                    <input type="text" name="name[]" class="form-control"  placeholder="Enter District">
                                </div>
                            </div>

                            

                    <div class="form-group col-md-2 mb-0" style="padding-top: 34px"> 
                        <div class="form-group">
                           <span class="btn btn-xs btn-success addeventmore"><i class="fa fa-plus"></i></span>
                           <span class="btn btn-xs btn-danger removeeventmore"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                        </div>
                      </div>

                           
                        </div>
                </div>

            

                        <div class="form-footer mt-4" align="right">
                            <input class="btn btn-success waves-effect waves-light submit-btn" type="submit" value="Save">
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">

            </div>  <!-- end col -->

        </div>
        <!-- end row -->

        <div style="visibility: hidden;">
            <div class="whole_extra_item_add" id="whole_extra_item_add">
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="form-row">
        
                        <div class="col-sm-6 col-md-10">
                            <div class="form-group">
                                <label>District Name</label>
                                <input type="text" name="name[]" class="form-control"  placeholder="Enter District">
                            </div>
                         </div>
        
                         <div class="form-group col-md-2 mb-0" style="padding-top: 34px">     
                                        
                            <span class="btn btn-xs btn-success addeventmore"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            <span class="btn btn-xs btn-danger removeeventmore"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                      
                    </div>
                </div>
            </div>
        </div>

        @include('backend.code-section.jquery.scripts.add_more')

    </div>

@endsection
