<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>

    .invoice {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box {
		
		
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
			
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

	


    #customers {
      font-family: ;
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
      text-align: center;
	  background-color: #ffffff;
      color: rgb(0, 0, 0);
    }

		</style>
	</head>

<body>

<div >


	
	

<div style="position:absolute;top:0.10in;left:2.10in;width:3.79in;line-height:0.33in;"><span style="font-style:normal;font-weight:normal;font-size:14pt;font-family:Segoe UI;color:#212529">Kaliapara Dakatia Mazeda Mazid High School</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:0.40in;left:2.30in;width:3.69in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Araipara Bazar, Kachua Road, Sakhipur, Tangail</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:0.65in;left:2.90in;width:3.69in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Examination Schedule - {{date('Y')}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<img style="position:absolute;top:0.18in;left:1.10in;width:0.83in;height:0.81in" src="backend/all-images/web/default/logo.png" />

<div style="position:absolute;top:1.30in;left:5.35in;width:3.36in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Publish Date : {{date('d M Y')}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
@foreach ($pdf as $key=>$pd)
<div style="position:absolute;top:1.30in;left:0.2in;width:3.60in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Class : {{$pd['class']['name']}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
@endforeach

<div class="invoice-box">

<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
        <table id="customers">
          <thead>
            <tr>
                <th>Subject</th>
                <th>Subject Code</th>
                <th>Group</th>
                <th>Exam Date</th>
                <th>Start End Time</th>
            </tr>
        </thead>
  

        <tbody>

            @foreach ($pdf as $key=>$pd)
            <tr>
                <td>{{$pd['subject']['name']}}</td>
                <td align="center">{{$pd['subject']['code']}}</td>
                <td align="center">{{$pd['group']['name']?? NULL}}</td>
                <td align="center">{{date('d-m-Y',strtotime($pd->date))}}</td>
                <td align="center">{{$pd->start}} - {{$pd->end}}</td>
            </tr>

           @endforeach

         
        </tbody>
  </table>

</div>

</body>

</html>

