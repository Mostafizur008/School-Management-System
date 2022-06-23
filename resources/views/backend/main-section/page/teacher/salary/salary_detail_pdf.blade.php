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
	  background-color: #ffffff;
      color: rgb(0, 0, 0);
    }

		</style>
	</head>

<body>

<div class="invoice">


	
	
<img style="position:absolute;top:0.40in;left:0.50in;width:0.73in;height:0.73in" src="{{public_path('backend/all-images/database//teacher/'.$detail->image)}}" />
<div style="position:absolute;top:0.40in;left:1.90in;width:3.79in;line-height:0.33in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529">Kaliapara Dakatia Mazeda Mazid High School</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:0.70in;left:2.20in;width:3.69in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:Segoe UI;color:#212529">Araipara Bazar, Kachua Road, Sakhipur, Tangail</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>

<div style="position:absolute;top:0.20in;left:6.00in;width:2.93in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Segoe UI;color:#212529">Te a c h e r&apos; s   C o p y</span><span style="font-style:normal;font-weight:normal;font-size:8pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<img style="position:absolute;top:0.40in;left:6.10in;width:0.73in;height:0.71in" src="backend/all-images/web/default/logo.png" />

<div style="position:absolute;top:1.30in;left:0.45in;width:3.57in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Teacher's Id: </span><span style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Segoe UI;color:#212529">{{$detail->th_id_no}}</span><span style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.30in;left:2.80in;width:0.53in;line-height:0.30in;"><span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Segoe UI;color:#ff0000">INCREMENT</span><span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.30in;left:4.20in;width:0.66in;line-height:0.30in;"><span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Segoe UI;color:#ff0000">SLIP</span><span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.30in;left:5.50in;width:3.36in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Date: {{date('d M Y')}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>

<div style="position:absolute;top:1.70in;left:0.85in;width:3.60in;line-height:0.25in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Name :</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.70in;left:0.85in;width:2.88in;line-height:0.23in;"><DIV style="position:relative; left:1.96in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">{{$detail->name}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></DIV><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Designation : </span></SPAN><br/></div>

<div style="position:absolute;top:1.92in;left:0.85in;width:2.88in;line-height:0.25in;"><DIV style="position:relative; left:1.96in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">{{$detail['desi']['name']}}</span><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.17in;left:0.85in;width:1.07in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529">Mobile :</span></div>
<div style="position:absolute;top:2.17in;left:2.82in;width:0.47in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#212529"> {{$detail->mobile}}</span></div>
		<div class="invoice-box">

   <!--   <table>
        <td  align="Center">
         <b>Kaliapara Dakatia Mazeda Mazid High School</b><br />
          Araipara Bazar, Sakhipur, Tangail<br />
          Email : info@kapadamam.com<br />
          Phone : 01511-100752
        </td>
    </table>-->




	<!--		<table cellpadding="0" cellspacing="0">
        <tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{public_path('backend/img/teacher/'.$detail->image)}}" style="width: 60%; max-width: 70px" />
								</td>

								<td>
									<b>{{$detail->name}}</b><br />
									{{$detail['desi']['name']}}<br />
                  {{date('d-m-Y',strtotime($detail->join_data))}}<br />
                  {{$detail->mobile}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
      </table>-->
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
        <table id="customers">
          <thead>
            <tr>
                <th align="center">SL</th>
                <th>Previous Salary</th>
                <th>Increment Salary</th>
                <th>Present Salary</th>
                <th align="center">Effected Date</th>
            </tr>
        </thead>
  

        <tbody>

            @foreach ($salary_id as $key=>$sl)
            <tr>
                <td align="center">{{$key+1}}</td>
                <td>BDT. {{$sl->previous_salary}}/-</td>
                <td>BDT. {{$sl->increment_salary}}/-</td>
                <td>BDT. {{$sl->present_salary}}/-</td>
                <td align="center">{{date('d-m-Y',strtotime($sl->effected_salary))}}</td>
            </tr>

           @endforeach

         
        </tbody>
  </table>

<br/>
<i style="font-size: 10px; float: right;">Print Date: {{date('d M Y')}} </i>

</div>

</body>

</html>

