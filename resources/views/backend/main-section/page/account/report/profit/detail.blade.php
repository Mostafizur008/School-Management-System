<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <style>
    .invoice-box {
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
      padding-bottom: 20px;
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

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .invoice-box.rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
      text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
      text-align: left;
    }
    </style>
</head>
<body>

  @php
  $setting = DB::table('settings')->first();  
  @endphp
  

  <img style="position:absolute;top:0in;left:0in;width:7.32in;height:1.27in" src="{{('backend/mrs-code/mrs/gd/vi_1.jpg')}}"/>
  <img style="position:absolute;top:0.10in;left:0.62in;width:1.07in;height:1.07in" src="{{public_path('backend/all-images/web/logo/'.$setting->image)}}"/>
  <div style="position:absolute;top:0.21in;left:1.84in;width:5.22in;line-height:0.20in;">
  <span style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Helvetica;color:#000000">{{$setting->title}}</span></div>
  <div style="position:absolute;top:0.34in;left:1.84in;width:5.22in;line-height:0.33in;">
  <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Helvetica;color:#000000">{{$setting->address}}</span>
  <span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:Helvetica;color:#070707"> </span><br/>Detail (Monthly & Yaerly Profite)</SPAN></div>
  
    <br/><br/><br/><br/><br/><br/>

    @php 
 
      $student_fee = App\Models\Account\StudentFee\StudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $other_cost = App\Models\Account\OtherCost\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount'); 
      $emp_salary = App\Models\Account\Employee\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $th_salary = App\Models\Account\Teacher\AccountTeacherSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $total_cost = $other_cost+$emp_salary+$th_salary;
      $total_paid = $other_cost+$emp_salary+$th_salary;
      $profit = $student_fee-$total_cost; 
  
    @endphp 


    <div class="row"> <!-- 3td row start -->
    <div class="page-header text-center" align="center"><h3>Reporting Date : {{ date('d M Y', strtotime($sdate) ) }} - {{ date('d M Y', strtotime($edate) ) }}</h3></div>

    <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="heading">
          <td>Purpose</td>
          <td>(+) Amount</td>
				</tr>
        <tr class="item">
					<td>Teacher's Salary</td>
					<td>BDT. {{$th_salary}}</td>
				</tr>
        <tr class="item">
					<td>Employee's Salary</td>
					<td>BDT. {{$emp_salary}}</td>
				</tr>
        <tr class="item">
					<td>Other's Cost</td>
					<td>BDT. {{$other_cost}}</td>
				</tr>
				<tr class="total">
					<td></td>

					<td>Total Cost : <font color="green">BDT. {{$total_paid}}</font></td>
				</tr>
			</table>
      <br/>
      <table cellpadding="0" cellspacing="0">
				<tr class="heading">
          <td>Purpose</td>
          <td>(-) Amount</td>
				</tr>
        <tr class="item">
					<td>Student's Fee (Total Income)</td>
					<td>BDT. {{$student_fee}}</td>
				</tr>
        <tr class="item">
					<td>Total Cost</td>
					<td>BDT. {{$total_paid}}</td>
				</tr>
				<tr class="total">
					<td></td>

					<td>Total Profite : <font color="red">BDT. {{$profit}}</font></td>
				</tr>
			</table>

		</div>

    </div>

</body>
</html>