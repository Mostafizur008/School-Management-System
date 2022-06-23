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

                <form action="{{route('issue.store')}}" method="post" >
                        @csrf 

                    <div class="card-body">

                    <div class="mrs">
                        <div class="form-group col-md-12 mb-0" align="right">
                            <span class="btn btn-xs btn-primary addeventmore"><i class="fa fa-plus"></i> Add More</span>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12 mb-0">
                                <div class="form-group">
                                    <label class="form-label">User <span class="text-red">*</span></label>
                                    <select name="user_id" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($user as $us)
                                        <option value="{{$us->id}}">{{$us->name}}</option>
                                        @endforeach 
                                        </select>
                                </div>
                            </div>
                        </div>

                      
                        <div class="row">

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Class <span class="text-red">*</span></label>
                                    <select name="class_id[]" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($class as $cl)
                                        <option value="{{$cl->id}}">{{$cl->name}}</option>
                                        @endforeach 
                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Session <span class="text-red">*</span></label>
                                    <select name="session_id[]" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($session as $sb)
                                        <option value="{{$sb->id}}">{{$sb->name}}</option>
                                        @endforeach 
                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Id No <span class="text-red">*</span></label>
                                    <input type="text" name="id_no[]" class="form-control"  placeholder="Id No">
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Book <span class="text-red">*</span></label>
                                    <select name="book_id[]" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($book as $bc)
                                        <option value="{{$bc->id}}">{{$bc->name}}</option>
                                        @endforeach 
                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Author <span class="text-red">*</span></label>
                                    <select name="author_id[]" class="form-control" data-toggle="select2">
                                        <option value="" selected="" disabled="">Chose One</option>
                                        @foreach ($author as $at)
                                        <option value="{{$at->id}}">{{$at->name}}</option>
                                        @endforeach 
                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Issue Start Date <span class="text-red">*</span></label>
                                    <input type="text" name="start[]" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Issue End Date <span class="text-red">*</span></label>
                                    <input type="text" name="end[]" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Return Date <span class="text-red">*</span></label>
                                    <input type="text" name="return[]" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status[]" class="form-control" data-toggle="select2">
                                        <option disable="">Choose one</option>
                                        <option value="Active">Active</option>
                                        <option value="Returns">Returns</option>
                                        <option value="Cencel">Cencel</option>
                                    </select>
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
                                <label class="form-label">Class <span class="text-red">*</span></label>
                                <select name="class_id[]" class="form-control">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($class as $cl)
                                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                                    @endforeach 
                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Session <span class="text-red">*</span></label>
                                <select name="session_id[]" class="form-control">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($session as $sb)
                                    <option value="{{$sb->id}}">{{$sb->name}}</option>
                                    @endforeach 
                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Id No <span class="text-red">*</span></label>
                                <input type="text" name="id_no[]" class="form-control"  placeholder="Id No">
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Book <span class="text-red">*</span></label>
                                <select name="book_id[]" class="form-control">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($book as $bc)
                                    <option value="{{$bc->id}}">{{$bc->name}}</option>
                                    @endforeach 
                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Author <span class="text-red">*</span></label>
                                <select name="author_id[]" class="form-control">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($author as $at)
                                    <option value="{{$at->id}}">{{$at->name}}</option>
                                    @endforeach 
                                    </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Issue Start Date <span class="text-red">*</span></label>
                                <input type="text" name="start[]" class="form-control"  placeholder="Ex: Jun 1, 1999">
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Issue End Date <span class="text-red">*</span></label>
                                <input type="text" name="end[]" class="form-control"  placeholder="Ex: Jun 1, 1999">
                            </div>
                        </div>

                        <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">Return Date <span class="text-red">*</span></label>
                                <input type="text" name="return[]" class="form-control"  placeholder="Ex: Jun 1, 1999">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status[]" class="form-control">
                                    <option disable="">Choose one</option>
                                    <option value="Active">Active</option>
                                    <option value="Returns">Returns</option>
                                    <option value="Cencel">Cencel</option>
                                </select>
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
