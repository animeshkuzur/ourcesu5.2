<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'/>
<style type='text/css'>
		.body{
			background: white;
		}
		.container-b{
			color: black;
			max-width: 900px;
			border: 1px solid black;
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
		.bor{
			border:1px solid black;
		}
		.sap-logo{
			height: 40%;
			width: 40%;
		}
	</style>
	<div class='container' style="max-width: 900px; margin-left: auto;margin-right: auto;">
		<div class='row'>
			<div class='col-xs-3 left'>
				<b>Activity Slip (FOC)</b>
			</div>
			<div class='col-xs-3 title'>
				<b>Service Utility Copy</b>
			</div>
			<div class='col-xs-3 right'>
				<b>Serial No. {{ $dat->REQ_NO }}</b>
			</div>
		</div>
	</div>
<div class='container-b'>
		<div class='row'>
			<div class='col-xs-6'>
				SU Code: {{ $dat->SU_ID }}
			</div>
			<div class='col-xs-6'>
				Request No.: {{ $dat->REQ_NO }}
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-6'>
				Request Date: {{ $dat->REQ_DATE }}
			</div>
			<div class='col-xs-6'>
				Time: {{ $dat->REQ_TIME }}
			</div>
		</div>
		
		<div class='row'>
			<div class='col-xs-6'>
				Resolved Date: {{ $dat->RESOLVE_DATE }}
			</div>
			<div class='col-xs-6'>
				Time: {{ $dat->RESOLVE_TIME }}
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-12'>
				Complaint Type: {{ $dat->COMPLAINT_TYPE }}
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-12'>
				Remarks: {{ $dat->REMARK }}
			</div>
		</div>
		<hr style='border-color:black; padding-top: 5px;'>
		<div class='row'>
			<div class='col-xs-12'>
				Consumer Name: {{ $dat->CONS_NAME }}
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-12'>
				Village Area: <i>null</i>
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-6'>
				Consumer No: {{ $dat->CONS_ACC }}
			</div>
			<div class='col-xs-6'>
				Mobile No.: <i>null</i>
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-6'>
				Meter No.: {{ $dat->METER_NO }}
			</div>
			<div class='col-xs-6'>
				Meter Reading: {{ $dat->METER_READING }}
			</div>
		</div>

		<div class='row'>
			<div class='col-xs-6'>
				SS Name: <i>null</i>
			</div>
			<div class='col-xs-6'>
				Consumer: {{ $dat->CONS_NAME }}
			</div>
		</div>
</div>