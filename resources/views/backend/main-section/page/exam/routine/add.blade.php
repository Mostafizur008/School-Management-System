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

                <form action="{{route('routine.store')}}" method="post" >
                        @csrf 

                    <div class="card-body">

                    <div class="mrs">
                        <div class="form-group col-md-12 mb-0" align="right">
                            <span class="btn btn-xs btn-primary addeventmore"><i class="fa fa-plus"></i> Add More</span>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Class <span class="text-red">*</span></label>
                                    <select name="class_id" class="form-control" data-toggle="select2">

                                        <option value="" selected="" disabled="">Chose One</option>

                                        @foreach ($class as $cl)
 
                                        <option value="{{$cl->id}}">{{$cl->name}}</option>
                                            
                                        @endforeach 

                                        </select>
                                </div>
                            </div>
                        </div>

                      
                        <div class="row">

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Group <span class="text-red">*</span></label>
                                    <select name="group_id[]" class="form-control" data-toggle="select2">

                                        <option value="" selected="" disabled="">Chose One</option>

                                        @foreach ($group as $gp)
 
                                        <option value="{{$gp->id}}">{{$gp->name}}</option>
                                            
                                        @endforeach 

                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Subject <span class="text-red">*</span></label>
                                    <select name="subject_id[]" class="form-control" data-toggle="select2">

                                        <option value="" selected="" disabled="">Chose One</option>

                                        @foreach ($subject as $sb)
 
                                        <option value="{{$sb->id}}">{{$sb->name}}</option>
                                            
                                        @endforeach 

                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Shortcode <span class="text-red">*</span></label>
                                    <select name="shortcode_id[]" class="form-control" data-toggle="select2">

                                        <option value="" selected="" disabled="">Chose One</option>

                                        @foreach ($shortcode as $sc)
 
                                        <option value="{{$sc->id}}">{{$sc->name}}</option>
                                            
                                        @endforeach 

                                        </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>Exam Date</label>
                                    <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                    <input type="text" name="date[]" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                                </div>
                                </div>
                             </div>

                             <div class="form-group col-md-3 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Start Time <span class="text-red">*</span></label>
                                    <input type="text" name="start[]" class="form-control"  placeholder="Start time : 10:00 AM">
                                </div>
                            </div>
    
                            <div class="form-group col-md-3 mb-0">
                                <div class="form-group">
                                    <label class="form-label">End Time <span class="text-red">*</span></label>
                                    <input type="text" name="end[]" class="form-control"  placeholder="End time : 01:00 PM">
                                </div>
                            </div>

                           

                        </div>

                    </div>
            
                    
                        <div class="form-footer mt-4" align="right">
                            <input class="btn btn-primary submit-btn" type="submit" value="Save">
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
   
        
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Group <span class="text-red">*</span></label>
                                <select name="group_id[]" class="form-control">

                                    <option value="" selected="" disabled="">Chose One</option>

                                    @foreach ($group as $gp)

                                    <option value="{{$gp->id}}">{{$gp->name}}</option>
                                        
                                    @endforeach 

                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Subject <span class="text-red">*</span></label>
                                <select name="subject_id[]" class="form-control">

                                    <option value="" selected="" disabled="">Chose One</option>

                                    @foreach ($subject as $sb)

                                    <option value="{{$sb->id}}">{{$sb->name}}</option>
                                        
                                    @endforeach 

                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Shortcode <span class="text-red">*</span></label>
                                <select name="shortcode_id[]" class="form-control">

                                    <option value="" selected="" disabled="">Chose One</option>

                                    @foreach ($shortcode as $sc)

                                    <option value="{{$sc->id}}">{{$sc->name}}</option>
                                        
                                    @endforeach 

                                    </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Exam Date</label>
                                <div class="input-group clockpicker">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="text" name="date[]" class="form-control"  placeholder="March 9, 2020">
                            </div>
                            </div>
                         </div>

                         <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">Start Time <span class="text-red">*</span></label>
                                <input type="text" name="start[]" class="form-control"  placeholder="Start time : 10:00 AM">
                            </div>
                        </div>

                        <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">End Time <span class="text-red">*</span></label>
                                <input type="text" name="end[]" class="form-control"  placeholder="End time : 01:00 PM">
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
