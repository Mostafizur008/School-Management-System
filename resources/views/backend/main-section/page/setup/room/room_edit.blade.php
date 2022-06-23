@extends('backend.admin.main')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
             
            </div>
            <!-- PAGE-HEADER END -->

            <!--Row -->
            <div class="row">

                <div class="col-md-12 col-xl-3">
                    <div class="card">
                       
                    </div>
                 
                    </div>


                <div class="col-md-12 col-xl-6">
                    <div class="card">

                    <form action="{{route('floor.update',$editData[0]->building_id)}}}" method="post" >
                            @csrf 

                        <div class="card-body">

                        <div class="mrs">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Building <span class="text-red">*</span></label>
                                        <select name="building_id" class="form-control select2">

                                            <option value="" selected="" disabled="">Chose One</option>

                                            @foreach ($building as $bl)
     
                                            <option  value="{{$bl->id}}" {{ ($editData['0']->building_id == $bl->id)? "selected":"" }}>{{$bl->name}}</option>
                                                
                                            @endforeach 

                                            </select>
                                    </div>
                                </div>
                            </div>
                        

                     @foreach ($editData as $mrs)
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                          
                            <div class="row">

                                <div class="form-group col-md-9 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Floor <span class="text-red">*</span></label>
                                        <input type="text" name="floor_name[]" value="{{$mrs->floor_name}}" class="form-control"  placeholder="Floor">
                                    </div>
                                </div>

                                

                        <div class="form-group col-md-3 mb-0" style="padding-top: 41px"> 
                            <div class="form-group">
                               <span class="btn btn-sm  btn-primary addeventmore"><i class="fa fa-plus"></i></span>
                               <span class="btn btn-sm btn-danger removeeventmore"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                            </div>
                          </div>

                               
                            </div>
                        </div>
                      @endforeach
                    </div>

                

                            <div class="form-footer mt-4" align="right">
                                <input class="btn btn-primary submit-btn" type="submit" value="UPDATE">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xl-3">
                    <div class="card">
                       
                    </div>
                 
                    </div>




                </div>
            </div>
            <!--End Row-->

       
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>

<!------------------------------------------------------Add More---------------------------------------------------->


<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">



               

                

                <div class="form-group col-md-10 mb-0">
                    <div class="form-group">
                        <label class="form-label">Floor <span class="text-red">*</span></label>
                        <input type="text" name="floor_name[]" class="form-control"  placeholder="Floor">
                    </div>
                </div>



                 <div class="form-group col-md-2 mb-0" style="padding-top: 41px">     
                                
                    <span class="btn btn-sm  btn-success addeventmore"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    <span class="btn btn-sm btn-danger removeeventmore"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
              
            </div>
                 

        </div>
    </div>
</div>




<script type="text/javascript">
    
    $(document).ready(function(){
        var count = 0;
        $(document).on("click",'.addeventmore',function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".mrs").append(whole_extra_item_add);
        counter ++;
        });
    
        $(document).on("click",'.removeeventmore',function(event){
        $(this).closest(".delete_whole_extra_item_add").remove();
        counter -=1
    
    });
    
    });
    
    
</script>


@endsection
