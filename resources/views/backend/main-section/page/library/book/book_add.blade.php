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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Book-add</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Book</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="myCenterModalLabel">Create Book</h4>
                </div>
                <div class="card-box">
            <form action="{{route('book.store')}}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Book Name</label>
                               <input type="name" name="name" class="form-control" id="name" placeholder="Enter Book Name">
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Author</label>
                               <select name="author_id" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   @foreach ($author as $at)
                                   <option value="{{$at->id}}">{{$at->name}}</option>
                                   @endforeach 
                               </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Publisher</label>
                               <select name="publisher_id" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   @foreach ($publisher as $pc)
                                   <option value="{{$pc->id}}">{{$pc->name}}</option>                       
                                   @endforeach 
                               </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Book Category</label>
                               <select name="bookcategory_id" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   @foreach ($bookcategory as $bc)
                                   <option value="{{$bc->id}}">{{$bc->name}}</option>
                                   @endforeach 
                               </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Serial No</label>
                               <input type="number" name="isbn" class="form-control"  placeholder="Enter Serial No">
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Class</label>
                                <select name="class_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disable="">Choose one</option>
                                        @foreach ($class as $cl)
                                        <option value="{{$cl->id}}">{{$cl->name}}</option>
                                        @endforeach 
                                </select>
                            </div>
                         </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Price</label>
                               <input type="number" name="price" class="form-control" placeholder="Price">
                           </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                           </div>
                        </div>
                    </form>
                       </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>

@endsection
