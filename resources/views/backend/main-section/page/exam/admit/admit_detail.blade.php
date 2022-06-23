<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <img style="position:absolute;top:0in;left:0in;width:7.32in;height:1.27in" src="{{('backend/mrs-code/mrs/gd/vi_1.jpg')}}"/>
    <img style="position:absolute;top:0.55in;left:0.55in;width:1.20in;height:1.20in" src="" />
    <img style="position:absolute;top:0.55in;left:0.55in;width:1.20in;height:1.20in" src="" />
    <img style="position:absolute;top:0.10in;left:0.62in;width:1.07in;height:1.07in" src="{{('backend/mrs-code/mrs/gd/mrs.jpg')}}"/>
    <img style="position:absolute;top:0.55in;left:1.78in;width:6.77in;height:1.20in;" src="{{('')}}"/>
    <img style="position:absolute;top:0.55in;left:1.78in;width:6.77in;height:1.20in"src=""/>
    <div style="position:absolute;top:0.21in;left:1.84in;width:5.22in;line-height:0.20in;">
      <span style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Helvetica;color:#000000">Kaliapara Dakatia Mazeda Mazid High School</span><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff"> </span><br/></SPAN><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff">Ministry of Fisheries and Livestock</span><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff"> </span><br/></SPAN></div>
    <div style="position:absolute;top:0.34in;left:1.84in;width:5.22in;line-height:0.33in;">
      <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#000000">Araipara Bazar, Valuka Road, Sakhipur, Tangail</span>
      <span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#070707"> </span><br/>Detail (Admit Copy)</SPAN></div>
    
<div style="position:absolute;top:0.80in;left:5.50in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Session : {{ $admit['0']['session_name']['name'] }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

    
<div style="position:absolute;top:1.53in;left:3.36in;width:4.03in;line-height:0.22in;"><span style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Helvetica;color:#000000">ADMIT CARD</span><span style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:2.0in;left:0in;width:7.33in;height:5.19in" src="{{('backend/mrs-code/mrs/gd/vi_11.jpg')}}" />


@foreach ($data as $id)    

<div style="position:absolute;top:2.35in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Registration No.</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.35in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.35in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id->id_no }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.67in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Student Name</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.67in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.67in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id->name }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.99in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Father's Name</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.99in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.99in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id->fathers_name }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.31in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Mother's Name</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.31in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.31in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id->mothers_name }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.63in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Bith Date</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.63in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.63in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id->dob }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<img style="position:absolute;top:2.31in;left:5.19in;width:1.70in;height:1.70in" src="{{public_path('backend/all-images/database/student/'.$id->image) }}" />


@endforeach


<div style="position:absolute;top:3.95in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Class</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.95in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.95in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000"> {{ $admit['0']['class_name']['name'] }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:4.27in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Shift</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.27in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.27in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000"> {{ $admit['0']['shift_name']['name'] }}</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:4.59in;left:0.63in;width:1.64in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Exam</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.59in;left:2.17in;width:0.08in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.59in;left:2.40in;width:4.49in;line-height:0.16in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000"> </span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>



<div style="position:absolute;top:5.65in;left:0.63in;width:6.48in;line-height:0.17in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#ff0000">Read instructions for candidates on the answer sheet first, then start answering after detaching carefully this answer sheet from the question paper at the very beginning of the exam.</span><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#ff0000"> </span><br/></SPAN></div>



<div style="position:absolute;top:6.70in;left:0.61in;width:1.31in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Signature of Candidate</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<img style="position:absolute;top:6.10in;left:5.40in;width:1.52in;height:0.57in" src="{{('backend/mrs-code/mrs/gd/signature.jpg')}}" />
<div style="position:absolute;top:6.70in;left:5.55in;width:2.31in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Signature of Authority</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<!------------------------------------------------------------------------------------------------------------------->


<div style="position:absolute;top:7.50in;left:0.53in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">1.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.50in;left:0.76in;width:7.88in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Please print bring this admit card during admission test and preserve it for further admission formalities.</span></SPAN><br/></div>

<div style="position:absolute;top:7.75in;left:0.53in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">2.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.75in;left:0.76in;width:6.20in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Candidate shall carry transparent black ink ball point pen so that refill can be seen easily. Carrying mobile phone, calculator, watch and any electronic devices are strictly prohibited in examination hall.</span></SPAN><br/></div>

<div style="position:absolute;top:8.15in;left:0.53in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">3.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:8.15in;left:0.76in;width:6.20in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Candidate shall report to the respective centre of examination at least one &amp; half hour prior to start time of written examination.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:8.55in;left:0.53in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">4.</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:8.55in;left:0.76in;width:4.16in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:Helvetica;color:#000000">Examinees must enter the exam hall before half hours.</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:8.95in;left:6.03in;width:1.39in;line-height:0.13in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Helvetica;color:#000000">Date: {{date('d-m-Y H:i:s')}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


</body>
</html>
