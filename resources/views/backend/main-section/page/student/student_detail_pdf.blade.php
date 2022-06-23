<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

  @php
  $setting = DB::table('settings')->first();
  $head = DB::table('heads')->first();  
  @endphp
  

  <img style="position:absolute;top:0in;left:0in;width:7.32in;height:1.27in" src="{{('backend/mrs-code/mrs/gd/vi_1.jpg')}}"/>
  <img style="position:absolute;top:0.10in;left:0.62in;width:1.07in;height:1.07in" src="{{public_path('backend/all-images/web/logo/'.$setting->image)}}"/>
  <div style="position:absolute;top:0.21in;left:1.84in;width:5.22in;line-height:0.20in;">
  <span style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Helvetica;color:#000000">{{$setting->title}}</span></div>
  <div style="position:absolute;top:0.34in;left:1.84in;width:5.22in;line-height:0.33in;">
  <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#000000">{{$setting->address}}</span>
  <span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#070707"> </span><br/>Detail (Student&apos;s Copy)</SPAN></div>
<!--<div style="position:absolute;top:1.83in;left:3.37in;width:2.41in;line-height:0.17in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000"></span><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>-->


<img style="position:absolute;top:2.80in;left:0.55in;width:1.75in;height:1.75in" src="" />
<img style="position:absolute;top:2.10in;left:0.40in;width:1.73in;height:1.73in" src="{{public_path('backend/all-images/database/student/'.$detail['st_name']['image'])}}" />
<img style="position:absolute;top:1.70in;left:2.45in;width:4.85in;height:2.45in" src="{{('backend/mrs-code/mrs/gd/vi_11.jpg')}}" />

<div style="position:absolute;top:2.00in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">ID No.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['id_no']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.25in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">First Name</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.25in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['first_name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:2.50in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Last Name</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.50in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['last_name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.75in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Application&apos;s Name</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.75in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Sex</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['gender']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.25in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Birth Date</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.25in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['dob']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.50in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Religion</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.50in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['religion']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.75in;left:3in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Mobile No.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.75in;left:5in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['mobile']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:4.40in;left:0in;width:3.70in;height:1.70in" src="{{('backend/mrs-code/mrs/gd/vi_11.jpg')}}" />


<div style="position:absolute;top:4.65in;left:0.26in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Father's Name</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.65in;left:2in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['fathers_name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:4.90in;left:0.26in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Profession</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.90in;left:2in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['profession_1']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:5.15in;left:0.26in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Mother's Name</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.15in;left:2in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['mothers_name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:5.40in;left:0.26in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Profession</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.40in;left:2in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['profession_2']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:5.65in;left:0.26in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Guardian Mobile No</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.65in;left:2in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['mobile_1']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:4.40in;left:3.85in;width:3.45in;height:1.70in" src="{{('backend/mrs-code/mrs/gd/vi_11.jpg')}}" />

<div style="position:absolute;top:4.65in;left:4.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Address</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.65in;left:4.80in;width:2.4in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['address']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:5.00in;left:4.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Country</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.00in;left:4.80in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['country']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:5.25in;left:4.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">City</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.25in;left:4.80in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['city']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:5.53in;left:4.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Zip Code</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.53in;left:4.80in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['zip_code']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:6.30in;left:0in;width:7.30in;height:1in" src="{{('backend/mrs-code/mrs/gd/vi_11.jpg')}}" />

<div style="position:absolute;top:6.48in;left:0.90in;width:0.77in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Class</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.48in;left:2in;width:0.90in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Session</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.48in;left:3.30in;width:0.41in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Group</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.48in;left:4.50in;width:0.30in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Shift</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.48in;left:5.65in;width:0.90in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Class Roll</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.78in;left:0.90in;width:0.77in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['class_name']['name']}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.78in;left:2in;width:0.90in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['session_name']['name']}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.78in;left:3.30in;width:0.41in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['group_name']['name']?? NULL}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.78in;left:4.50in;width:1.30in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['shift_name']['name']}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:6.78in;left:5.75in;width:0.30in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail->roll}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:7.50in;left:0in;width:7.32in;height:0.75in" src="{{('backend/mrs-code/mrs/gd/vi_1.jpg')}}" />

<div style="position:absolute;top:7.64in;left:1.10in;width:0.90in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Discount</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:7.64in;left:3.40in;width:0.41in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Email</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:7.64in;left:5.70in;width:0.30in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Password</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:7.90in;left:1.10in;width:0.90in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['ds_name']['discount']?? NULL}}%</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.90in;left:3.40in;width:0.41in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['email']}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div align="center" style="position:absolute;top:7.90in;left:5.70in;width:0.54in;line-height:0.15in;"><span style="font-style:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$detail['st_name']['code']}}</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:9.66in;left:5.89in;width:1.52in;height:0.57in" src="{{public_path('backend/all-images/web/head/signature/'.$head->signature)}}" />
<div style="position:absolute;top:10.30in;left:5.99in;width:1.51in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Headmaster Signature</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

</body>
</html>
