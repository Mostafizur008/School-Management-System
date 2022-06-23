
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="utf-8">
    <title>WEB BASED RESULT PUBLICATION SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" type="text/css" href="{{asset('backend/mrs-code/mrs/result/ajax/libs/twitter-bootstrap/3.4.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/mrs-code/mrs/result/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/mrs-code/mrs/result/app/style.min.css?t=1497976263')}}">

    <meta name="description" content="All Bangladesh Education Board Result Archive, with Detailed Marks if available, for JSC, JDC, SSC, DAKHIL, HSC, ALIM, VOCATIONAL exams">
    <meta name="keywords" content="education,board,result,jsc,jdc,ssc,hsc,dakhil,alim,vocational,marks">
  </head>

  <body>

  <div class="container">
    <div id="main_header2">
       <div class="fleft"><img align="left" src="{{asset('backend/all-images/web/default/logo.png')}}" class="header-brand-img light-logo1" width="100" height="85" style="width: 100px; padding: 5px 10px 0pt;"></div>
     <div>
      <h4><font color="white">Kaliapara Dakatia Mazeda Mazid High School</font></h4>
      <h5><font color="white">Araipara Bazar,Valuka Road,Sakhipur, Tangail</font></h5>
     </div>
    </div>


<div id="page-wrapper">
  <div class="row">
    <br/><br/>
  </div>

  <div class="row">
  
    <div class="col-md-12">
     

      <div class="panel panel-default">
        <div class="panel-heading">Please provide information for result</div>

        <div class="panel-body">
	  <div class="row">
	<div class="col-md-12">
        
<form action="{{route('admit.get')}}" method="GET" target="_blank">

    <div class="row" id="col_1"><div id="row_exam"><div class="form-group col-md-5">


        <label>Class</label></div><div class="form-group col-md-7">

            <select  name="class_id" id="class_id"  class="select form-control floating">
                <option value="" selected="" disabled="">Choose One</option>

                @foreach ($class as $cl)
                <option value="{{$cl->id}}" {{ (@$class_id == $cl->id)? "selected":"" }}>{{$cl->name}}</option>
                @endforeach
                

             </select>

            </div></div></div>
            
            
            
            
            
            <div class="row" id="col_2"><div id="row_year"><div class="form-group col-md-5">

                <label>Session</label></div><div class="form-group col-md-7">

                    <select  name="session_id" id="ss_id"  class="select form-control floating">
                        <option value="" selected="" disabled="">Choose One</option>
                        
                        
                        @foreach ($session as $ss)
                        <option value="{{$ss->id}}" {{ @($session_id == $ss->id)? "selected":"" }}>{{$ss->name}}</option>
                        @endforeach
                        
                        
                     </select>

                </div></div></div>
                
                <div class="row" id="col_3"><div id="row_board"><div class="form-group col-md-5">

                        <label>Shift</label></div><div class="form-group col-md-7">


                            <select  name="shift_id" id="shift_id"  class="select form-control floating">
                                <option value="" selected="" disabled="">Choose One</option>
                                
                                
                                @foreach ($shift as $ex)
                                <option value="{{$ex->id}}" {{ @($shift_id == $ex->id)? "selected":"" }}>{{$ex->name}}</option>
                                @endforeach
                                
        
                                
                             </select>
</div></div></div>

<div class="row" id="col_4"><div id="row_result_type"><div class="form-group col-md-5">

    <label><font color="red">Registration No</font></label></div><div class="form-group col-md-7">

        <input type="text" name="id_no" class="form-control">


</div></div></div>


<div class="form-group ">
    <input type="submit" value="Get Admit" class="btn btn-primary submit-btn center-block">
</div></div></div></form>
	  


</div>
	</div>
  
    </div>
    
    
    <div class="row buttons" id="buttons_down"><br></div>
    <br>
  </div>
</div>     
 <div id="dev_info">
	<p>Developed &amp; Maintained by Mrsbd</p>
    <p>©2022 Kapadamam | All rights reserved.</p>
      </div>		
    </div>

<script src="{{asset('backend/mrs-code/mrs/result/ajax/libs/jquery/3.4.0/jquery.min.js')}}"></script>
<script src="{{asset('backend/mrs-code/mrs/result/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/mrs-code/mrs/result/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.min.js')}}"></script>

    <script src="{{asset('backend/mrs-code/mrs/result/app/stud/ready-v2.min.js?t=1636551259')}}"></script>

  <div class="modal"></div>
  
<script type="text/javascript">$(window).scroll(function() {if ($(this).scrollTop() > 1) { if ($(".social").is(":visible")) $(".social").fadeOut(); }  else if (!$(".social").is(":visible")) $(".social").fadeIn(); });</script>

  </body>
</html>




