<!DOCTYPE html>
<html>
	<head>
   
    <link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

	<body>
    <img style="position:absolute;top:-01in;left:-1in;width:9.0in;height:7.4in" src="{{('backend/mrs-code/mrs/image/pdf/bgs.jpg')}}" />
  

    <div style="position:absolute;top:0.0in;left:1.34in;width:5.22in;line-height:0.20in;">
      <span style="font-style:normal;font-weight:normal;font-size:18pt;font-family:Georgia;color:#000000">Kaliapara Dakatia Mazeda Mazid High School</span><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff"> </span><br/></SPAN><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff"></span><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#ffffff"> </span><br/></SPAN></div>
    </div>
    <div style="position:absolute;top:0.24in;left:1.85in;width:5.22in;line-height:0.33in;">
      <span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Georgia;color:#000000">Araipara Bazar,Valuka Road,Sakhipur,Tangail</span>
    </div>
    <div style="position:absolute;top:0.54in;left:5.85in;width:5.22in;line-height:0.33in;">
      <span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Georgia;color:#000000">No: .......................</span>
    </div>
    <div style="position:absolute;top:0.74in;left:2.55in;width:5.22in;line-height:0.33in;">
      <span style="font-style:normal;font-weight:normal;font-size:18pt;font-family:Georgia;color:#000000"><u>Transfer Certificate</u></span>
    </div>

    <div style="position:absolute;top:3.0in;left:1.15in;width:8.22in;line-height:0.33in;">
      <span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Georgia;color:#000000">( The following additional information must be applied if the scholar left at the end of the school year. )</span>
    </div>

    <div style="position:absolute;top:1.2in;width:7.25in;">
    <table  width="100%">
      <thead>
          <tr style="text-align: justify; font-size:12pt; font-family:Georgia;">
            <span>
                  This is to certify <u> {{ $admit['0']['st_name']['name'] }} </u> Father <u> {{ $admit['0']['st_name']['fathers_name'] }} </u> Mother <u> {{ $admit['0']['st_name']['mothers_name'] }} </u> an inhabitant of <u> {{ $admit['0']['st_name']['address'] }} </u> was admited into Kaliapara Dakatia Mazeda Mazid High School on the <u> {{ $admit['0']['st_name']['created_at'] }} </u>on a Transfer Certificate form  ................................................................ School & left on the .............................. , with a ..................................... Character.He/She was then reading in the class <u> {{ $admit['0']['st_name']['id_no'] }}. </u><br/><br/>
                  All sums due to this School on her account have been paid, remitted, or satisfactorily arranged for.<br/><br/>
                  <u>{{ $admit['0']['st_name']['dob'] }}</u> date of birth, acording to the Admission Register, is........................... <br/><br/><br/>
                  Promotion has been class ....................................<br/><br/><br/><br/><br/>
                  Date : {{date('d M Y')}}
          </span> 
          </tr>
        </thead>
  </table>
  <div style="position:absolute;top:3.10in;left:3.50in;width:2in;line-height:0.14in;"><img src="data:image/png;base64, {!! base64_encode (QrCode::size(30)->generate('http://kapadamam.com/teacher/reg/detail')) !!}" height="45" width="45" /></div>
<div style="position:absolute;top:3.1in;left:6.350in;width:2.5in;line-height:0.54in;"><img src="backend/mrs-code/mrs/image/detail/signature1.png" height="30" width="90" /></div>
<div style="position:absolute;top:3.50in;left:6.45in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Helvetica;color:#000000">Signature</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

  </body>
        
       
          
 
        
        
  