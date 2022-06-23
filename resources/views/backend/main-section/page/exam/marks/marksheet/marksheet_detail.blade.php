<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>

#customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #ffffff;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
   
      color: rgb(0, 0, 0);
    }

      #main_header2 {
       margin-top: 0!important;
      }

    #main_header2 {
    height: auto;
    background-color: #00909b;
    text-align: center;
    }

    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
     }

   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
   }
   .btn-success {
    color: #fff;
    background-color: #00909b;
    border-color: #00909b;
     }
   table {
    border-collapse: collapse;
    }

		</style>


	</head>

	<body>

<div class="invoice">

  @php
  $setting = DB::table('settings')->first();  
  @endphp
  

  <img style="position:absolute;top:0in;left:0in;width:7.32in;height:1.27in" src="{{('backend/mrs-code/mrs/gd/vi_1.jpg')}}"/>
  <img style="position:absolute;top:0.10in;left:0.62in;width:1.07in;height:1.07in" src="{{public_path('backend/all-images/web/logo/'.$setting->image)}}"/>
  <div style="position:absolute;top:0.21in;left:1.84in;width:5.22in;line-height:0.20in;">
  <span style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Helvetica;color:#000000">{{$setting->title}}</span></div>
  <div style="position:absolute;top:0.34in;left:1.84in;width:5.22in;line-height:0.33in;">
  <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#000000">{{$setting->address}}</span>
  <span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#070707"> </span><br/>Marksheet (School Copy)</SPAN></div>
<!--<div style="position:absolute;top:1.83in;left:3.37in;width:2.41in;line-height:0.17in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000"></span><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>-->




        <br/><br/><br/><br/><br/><br/>
      <div class="row"> <!-- 3td row start -->
        <div class="page-header text-center" align="center"><h3>Result Equivalent Examination - {{date('Y')}}</h3></div>
        <div class="col-md-12">
          <div id="result_display">
            <div class="table-responsive">
              
              <table id="customers" width="100%">
                <tbody>
                  <tr>
                    <td>Roll No</td><td>[ NOT SHOW ]</td>
                    <td>Registration No</td><td>{{ $allMarks['0']['st_name']['id_no'] }}</td>
                  </tr>
                  <tr>
                    <td>Name of Student</td><td colspan="3">{{ $allMarks['0']['st_name']['name'] }}</td>
                  </tr>
                  <tr>
                    <td>Father's Name</td><td>{{ $allMarks['0']['st_name']['fathers_name'] }}</td>
                    <td>Mother's Name</td><td>{{ $allMarks['0']['st_name']['mothers_name'] }}</td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td><td>{{ $allMarks['0']['st_name']['dob'] }}</td>
                    <td>Gender</td><td>{{ $allMarks['0']['st_name']['gender'] }}</td>
                  </tr>
                  <tr>
                    <td>Class</td><td>{{ $allMarks['0']['student_class']['name'] }}</td>
                    <td>Session</td><td>{{ $allMarks['0']['session']['name'] }}</td>
                  </tr>
                  <tr>
                    <td>Exam</td><td>{{ $allMarks['0']['exam']['name'] }}</td>
                    <td>Religion</td><td>{{ $allMarks['0']['st_name']['religion'] }}</td>

                  </tr>
                </tbody>
              </table><div class="alert alert-info text-center" id="err_msg" style="display:none"></div>


<br/>

<table class="table table-striped table-bordered" width="100%">
<thead class="">
  <tr>
    <th class="text-center">Name</th>
    <th class="text-center">Subject Code</th>
    <th class="text-center">Subject Marks</th>
    <th class="text-center">Letter Grade</th>
    <th class="text-center">Grade Point</th>    
  </tr>
</thead>

<tbody>
  @php
      $total_marks = 0;
      $total_point = 0;
  @endphp

@foreach($allMarks as $key => $mark)
@php
  $get_mark = $mark->marks;
  $total_marks = (float)$total_marks+(float)$get_mark;
  $total_subject = App\Models\Exam\StudentMarks\StudentMarks::where('session_id',$mark->session_id)->where('class_id',$mark->class_id)->where('exam_id',$mark->exam_id)->where('student_id',$mark->student_id)->get()->count();
@endphp

@php
 $g_mark = $mark->mark;
  $add = App\Models\Exam\StudentMarks\StudentMarks::where('assign_subject_id',$mark->assign_subject_id)->where('student_id',$mark->student_id)->get();
@endphp

<tr>
 
  <td>{{$mark['st_sub']['name']}}</td>
  <td align="center">{{$mark['st_sub']['code']}}</td>

  <td align="center">{{ $get_mark }}</td>

@php
  $grade_marks = App\Models\Exam\MarksGradePoint\MarksGradePoint::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
  $grade_name = $grade_marks->grade_name;
  $grade_point = number_format((float)$grade_marks->grade_point,2);
  $total_point = (float)$total_point+(float)$grade_point;
@endphp
<td align="center">{{ $grade_name }}</td>
<td align="center">{{ $grade_point }}</td>
@endforeach

</tr>
</tbody>
</table>


          <br>

          <div class="row">

         


   <div class="col-md-12">
  
  <table align="right">
  @php
  $total_grade = 0;
  $point_for_letter_grade = (float)$total_point/(float)$total_subject;
  $total_grade = App\Models\Exam\MarksGradePoint\MarksGradePoint::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
  $grade_point_avg = (float)$total_point/(float)$total_subject;
  @endphp
  <tr>
    <td width="50%"><strong>Total Marks</strong></td>
    <td width="50%" align="right">{{ $total_marks }}</td>
  </tr>
  <tr>
    <td width="50%"><strong>Grade Point</strong></td>
    <td width="50%" align="right"> 
     GPA-@if($count_fail > 0)
      0.00
      @else
      {{number_format((float)$grade_point_avg,2)}}
      @endif
    </td>
  </tr>
  
  <tr>
    <td width="50%"><strong>Letter Grade </strong></td>
    <td width="50%" align="right"> 
      @if($count_fail > 0)
      F
      @else
      {{ $total_grade->grade_name }}
      @endif
    </td>
  </tr>
  <tr>
    <td width="50%"><strong>Remrks</strong></td>
    <td width="50%" align="right"> 
    @if($count_fail > 0)
    Fail
    @else
    {{ $total_grade->remarks }}
    @endif
    </td>
    </tr>
    </table>        
          </div>        
        </div>
</div>
</div>

<br/><br/><br/>
<table width="100%">
<thead>
  <tr>
    <th width="5%"></th>
    <th width="25%"><hr>Student Signature</th>
    <th width="5%"></th>
    <th width="25%"><hr>Guardian Signature</th>
    <th width="5%"></th>
    <th width="25%"><hr>Headmaster Signature</th>  
    <th width="5%"></th> 
  </tr>
</thead>
</table>

        </div> 
        
       
          
 
        
        
  