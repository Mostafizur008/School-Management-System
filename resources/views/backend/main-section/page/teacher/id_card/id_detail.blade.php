<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

  @foreach ($allData as $id)
<img style="position:absolute;top:0.30in;left:0.70in;width:2.80in;height:4.0in" src="{{('backend/mrs-code/mrs/image/id/bg.jpg')}}" />

<div style="position:absolute;top:0.55in;left:1.63in;width:2in;line-height:0.14in;"><img src="{{public_path('backend/all-images/database/teacher/'.$id->image) }}" height="100" width="90" /></div>

<div style="position:absolute;top:1.7in;left:0.95in;width:2.30in;line-height:0.14in;" align="center"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Helvetica;color:#000000">{{$id->name}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.90in;left:1.23in;width:1.75in;line-height:0.14in;" align="center"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">{{$id->th_id_no}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.30in;left:1.20in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Designation</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.30in;left:1.95in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.30in;left:2.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{ $id['desi']['name']}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.55in;left:1.20in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Birth Date</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.55in;left:1.95in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.55in;left:2.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$id->dob}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.80in;left:1.20in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Contract</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.80in;left:1.95in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">:</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.80in;left:2.10in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">{{$id->mobile}}</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<div style="position:absolute;top:3.70in;left:1.10in;width:2in;line-height:0.14in;"><img src="data:image/png;base64, {!! base64_encode (QrCode::size(30)->generate('http://kapadamam.com/teacher/reg/detail')) !!}" height="30" width="30" /></div>
<div style="position:absolute;top:3.68in;left:2.49in;width:2in;line-height:0.14in;"><img src="backend/mrs-code/mrs/image/detail/signature1.png" height="20" width="60" /></div>
<div style="position:absolute;top:3.90in;left:2.55in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#000000">Signature</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>


<img style="position:absolute;top:0.30in;left:3.85in;width:2.80in;height:4.0in" src="{{('backend/mrs-code/mrs/image/id/bg.jpg')}}" />

<div style="position:absolute;top:0.55in;left:4.75in;width:2in;line-height:0.14in;"><img src="backend/all-images/web/default/logo.png" height="100" width="100" /></div>

<div style="position:absolute;top:1.80in;left:4.30in;width:2.4in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Helvetica;color:#000000">If found, please return to:</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:2.02in;left:4.29in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Helvetica;color:#000000">Kapadamam High School</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:2.60in;left:4.15in;width:2.20in;line-height:0.14in;" align="center"><span style="font-style:normal;font-weight:normal;font-size:10.5pt;font-family:Helvetica;color:#000000">Araipara Bazar, Valuka Road, Shakhipur,Tangail</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

<div style="position:absolute;top:3.4in;left:4.53in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Phone : 015111-100752</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.60in;left:4.35in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Email : Info@kapadamam.com</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.80in;left:4.40in;width:2in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Helvetica;color:#000000">Web : www.kapadamam.com</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Helvetica;color:#000000"> </span><br/></SPAN></div>

@endforeach
</body>
</html>

