<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'/>
<style type='text/css'>
		.container-b{
			color: black;
			max-width:900px;
			border: 1px solid black;
			padding-left: 5px;
			padding-right: 5px;
			margin-left: auto;
			margin-right: auto; 

		}
		.receipt-footer{
			max-width:900px;
			padding-left: 5px;
			padding-right: 5px;
			margin-left: auto;
			margin-right: auto; 
		}
		.title{
			text-align: center;
		}
		.left{
			text-align: left;
		}
		.right{
			text-align: right;
		}
		.sap-logo{
			height: 70%;
			width: 70%;
		}
		.dupli{
			color: white;
			background: black;
			border: 1px solid black;
		}
		.tab{
			border: 1px solid black;
		}
		.tab-cell{
			border-left: 1px solid black;
		}
		.rec-footer{
			font-size: 11px;
		}
	</style>
<div class='container-b'>
	<div class='row'>
		<div class='col-md-7 title'>
			<h4><strong>CENTRAL ELECTRICITY SUPPLY UTILITY OF ODISHA</strong></h4>
			<h6>Head Office : 2nd Floor, IDCO Towers, Bhubaneshwar - 751022, (Odisha)</h6>
		</div>
		<div class='col-md-2'>
			<img src='{{ URL::asset('images/logo_cesu.png') }}' class='sap-logo img-responsive'>
		</div>
		<div class='col-md-3 title'>
			<h5><strong>MONEY RECEIPT</strong></h5>
			<div class='dupli'>DUPLICATE</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-3'>
			Date: {{ $dat->pay_date }}
		</div>
		<div class='col-md-3'>
			Consumer No.: {{ $dat->CONS_ACC }}
		</div>
		<div class='col-md-3'>
			Category: 
		</div>
		<div class='col-md-3'>
			Month: {{ $dat->Billmonth }}
		</div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
			<div class='row'>
				<div class='col-md-6'>
					Book No.: {{ $dat->BookNo }} 
				</div>
				<div class='col-md-6'>
					Receipt No.: {{ $dat->ReceiptNo }}
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					Received from: Customer
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					Rupees: {{ $dat->RevenueAmt+$dat->CapitalAmt+$dat->MiscAmt }}
				</div>
			</div><br>
			<div class='row'>
				<div class='col-md-6'>
					By Cash/Cheque/Draft No.: {{ $dat->PayMode }}
				</div>
				<div class='col-md-6'>
					Date : {{ $dat->pay_date }}
				</div>
			</div><br>
			<div class='row'>
				<div class='col-md-6 left'>
					(Subject to realisation)
				</div>
				<div class='col-md-6 right'>
					{{ $dat->BillCollName }}<br>
					[Collecting Officer]
				</div>
			</div>
		</div>
		
		<div class='col-md-6'>
			<table style='width:100%' class='tab'>
				<tr>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td>MMFC</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td>Energy Charges</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td>Electricity Duty</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td>Meter Rent</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td>DPS</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td>Misc Receipt</td>
					<td class='tab-cell'>Rs. - </td>
				</tr>
				<tr>
					<td class='tab'>Total</td>
					<td class='tab'>Rs. <b>{{ $dat->RevenueAmt+$dat->CapitalAmt+$dat->MiscAmt }}</b></td>
				</tr>
			</table>
		</div>
	</div>
	<br>
</div>
<div class="receipt-footer">
<h6 class='rec-footer'>for any complaints attend grievance call on every working day from 10AM to 12 Noon at CESU HO Office, IDCO Towers, 2nd Floor, BBSR, Tel : 0674-2542829, Fax : 0674 2543125</h6>
</div>