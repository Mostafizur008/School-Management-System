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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Marks-entry</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Marks</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


            <div class="col-12">
                <div class="modal-header bg-success">
                </div>
                <div class="card-box">
              <form action="{{route('marks.entry.store')}}" method="POST">
                @csrf
                <div class="row">
                        <div class="col-sm-6 col-md-2">
                           <div class="form-group">
                               <label>Class</label>
                               <select name="class_id" id="class_id" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   @foreach ($class as $cl)
                                   <option value="{{$cl->id}}" {{ @($class_id == $cl->id)? "selected":"" }}>{{$cl->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-2">
                          <div class="form-group">
                              <label>Session</label>
                              <select name="session_id" id="session_id" class="form-control" data-toggle="select2">
                                  <option disable="">Choose one</option>
                                  @foreach ($session as $ss)
                                  <option value="{{$ss->id}}" {{ @($session_id == $ss->id)? "selected":"" }}>{{$ss->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                       </div>

                       <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="assign_subject_id" id="assign_subject_id" class="form-control" data-toggle="select2">
                                <option disable="">Choose one</option>
                                <option selected="">Select Subject</option>
                            </select>
                        </div>
                     </div>

                        <div class="col-sm-6 col-md-2">
                          <div class="form-group">
                              <label>Exam</label>
                              <select name="exam_id" id="exam_id" class="form-control" data-toggle="select2">
                                  <option disable="">Choose one</option>
                                  @foreach ($exam as $ex)
                                  <option value="{{$ex->id}}" {{ @($exam_id == $ex->id)? "selected":"" }}>{{$ex->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                       </div>

                       <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label><br/></label>
                            <a id="search"  name="search"  class="btn btn-success btn-block"> Search</a>
                        </div>
                     </div>
                     
                       <div class="table-responsive">
                        <div class="row d-none " id="marks-entry">
                            <div class="col-lg-12">
                              <table id="demo-foo-filtering" class="table table-bordered table-centered mb-0">
                                <thead class="thead-light">  
                                        <tr>
                                            <th >Id No</th>
                                            <th>Student Name</th>
                                            <th>Father's Name</th>
                                            <th>Gender</th>
                                            <th width="10%">Marks</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="marks-entry-tr">
                                    </tbody>
                            </table>
                        </div>
                        </div>
                       </div>
                    </div>

                       <br/>
                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                           </div>
                        </div>
                    </form>
                  </div><!-- end card-box -->
            </div> <!-- end col -->
        </div>
    </div>
        @include('backend.code-section.ajax-script.exam.marks_entry')

@endsection
