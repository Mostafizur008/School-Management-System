<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice | Registration Fee</title>

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
      
    $registrationfee = App\Models\Category\FeeAmount\FeeAmount::where('fee_category_id','1')->where('class_id',$detail->class_id)->first();
    $originalfee = $registrationfee->amount;
          $discount = $detail['ds_name']['discount'];
          $discounttablefee = $discount/100*$originalfee;
          $finalfee = (float)$originalfee-(float)$discounttablefee;

    @endphp

    @php
    $setting = DB::table('settings')->first();  
    @endphp

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{public_path('backend/all-images/database/student/'.$detail['st_name']['image']) }}" style="width: 30%; max-width: 130px" />
								</td>

								<td>
									<b>Students Copy</b><br />
									Created: {{date('d M Y')}}<br />
									Session: {{$detail['session_name']['name']}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									{{$setting->title}}<br />
									{{$setting->address}}<br />
                            Email : {{$setting->email}}<br />
                            Phone : {{$setting->contract}}
								</td>

								<td>
									{{$detail['st_name']['name']}}<br />
									{{$detail['st_name']['id_no']}}<br />
                                    {{$detail['class_name']['name']}}<br />
									{{$detail['shift_name']['name']}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

		

				<tr class="heading">
					<td>List</td>

					<td>Payment</td>
				</tr>

				<tr class="item">
					<td>Registation Fee</td>

					<td>BDT.{{$originalfee}}</td>
				</tr>

				<tr class="item last">
					<td>Discount</td>

					<td>{{$detail['ds_name']['discount']}}%</td>
				</tr>

        

				<tr class="total">
					<td></td>

					<td>Total: BDT.{{$finalfee}}</td>
				</tr>
			</table>
		</div>

    <br/>

    <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                  <img src="{{public_path('backend/all-images/database/student/'.$detail['st_name']['image']) }}" style="width: 30%; max-width: 130px" />
								</td>

								<td>
									<b>Office Copy</b><br />
									Created: {{date('d M Y')}}<br />
									Session: {{$detail['session_name']['name']}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									{{$setting->title}}<br />
									{{$setting->address}}<br />
                            Email : {{$setting->email}}<br />
                            Phone : {{$setting->contract}}
								</td>

								<td>
									{{$detail['st_name']['name']}}<br />
									{{$detail['st_name']['id_no']}}<br />
                                    {{$detail['class_name']['name']}}<br />
									{{$detail['shift_name']['name']}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

		

				<tr class="heading">
					<td>List</td>

					<td>Payment</td>
				</tr>

				<tr class="item">
					<td>Registation Fee</td>

					<td>BDT.{{$originalfee}}</td>
				</tr>

				<tr class="item last">
					<td>Discount</td>

					<td>{{$detail['ds_name']['discount']}}%</td>
				</tr>

        

				<tr class="total">
					<td></td>

					<td>Total: BDT.{{$finalfee}}</td>
				</tr>
			</table>


	</body>
</html>
