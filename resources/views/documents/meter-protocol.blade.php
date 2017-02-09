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
			height: 45%;
			width: 45%;
		}
		.blc-bar{
			color: white;
			background: black;
			border: 1px solid black;
		}
		.tab-bor{
			margin-top: 3px;
			border: 1px solid black;	
		}
	</style>
<div class='container-b'>
	<div class='row'>
		<div class='col-xs-3'>
			<img src='{{ URL::asset('images/logo_cesu.png') }}' class='sap-logo img-responsive'>
		</div>
		<div class='col-xs-9 left'>
			<h3><strong>CENTRAL ELECTRICITY SUPPLY UTILITY OF ODISHA</strong></h3>
			<h6>Head Office : 2nd Floor, IDCO Towers, Bhubaneshwar - 751022, (Odisha)</h6>
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-4 title'>
			SU Code: {{ $dat->SU_Id }}
		</div>
		<div class='col-xs-4 title'>
			<h4><strong>Meter Protocol Sheet</strong></h4>
		</div>
		<div class='col-xs-4 title'>
			PS No.: {{ $dat->CP_ProtocolSheetNo }}
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='blc-bar'>
				&nbsp;Consumer Particulars	
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-6'>
			Reference No.: {{ $dat->CP_ReferenceNo }}
		</div>
		<div class='col-sm-6'>
			Connection No.: {{ $dat->CP_ConnectionNo }}
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-12'>
			Name: {{ $dat->CP_Name }}
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-12'>
			Address: {{ $dat->CP_Address }}<br>

		</div>
	</div>
	<div class='row'>
		<div class='col-sm-8'>
			Landmark: {{ $dat->CP_Landmark }}
		</div>
		<div class='col-sm-4'>
			Date: {{ $dat->CP_Date }}
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-8'>
			Contact No.: {{ $dat->CP_ContactNo }}
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='blc-bar'>
				&nbsp;Connection Details
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-6'>
			Transformer Name: {{ $conn->DT_NAME }}
		</div>
		<div class='col-sm-6'>
			Connection Name: {{ $conn->EST_TYPE_DESC }}
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-6'>
			Transformer No.: {{ $conn->DT_NO }}
		</div>
		<div class='col-sm-6'>
			Connection Category: {{ $conn->CATEGORY }}
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			Pole No.: {{ $conn->POLE_NO }}
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='blc-bar'>
				&nbsp;Replacement Particulars
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-4'>
			Meter Location: {{ $rp->Location_Detail }}
		</div>
		<div class='col-sm-4'>
			Installation Type: {{ $rp->Connection_Detail }}
		</div>
		<div class='col-sm-4'>
			BOX: {{ $rp->Box_Detail }}
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-4'>
			Service Line: {{ $rp->SrvLineDetail }}
		</div>
		<div class='col-sm-4'>
			Payment Details: {{ $dat->AMOUNT }}
		</div>
		<div class='col-sm-4'>
			Meter Height:
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-4'>
			Bus Bar: 
		</div>
		<div class='col-sm-4'>
			Material Used: 
		</div>
		<div class='col-sm-4'>
			Owner: {{ $conn->MTR_OWN }}
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='blc-bar'>
				&nbsp;Meter Installation Particulars
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-6'>
			<div class='row'>
				<div class='col-xs-4'></div>
				<div class='col-xs-4'>
					<div class='tab-bor title'>Meter Removed</div>
				</div>
				<div class='col-xs-4'>
					<div class='tab-bor title'>Meter Installed</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Meter No.: 
				</div>
				<div class='col-xs-4'>@if($mr) {{ $mr->MR_MeterNo }} @endif</div>
				<div class='col-xs-4'>{{ $mi->MI_MeterNo }}</div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Meter Make:
				</div>
				<div class='col-xs-4'>@if($mr) {{ $mr->Make_Detail }} @endif</div>
				<div class='col-xs-4'> {{ $mi->Make_Detail }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Meter Type:
				</div>
				<div class='col-xs-4'>@if($mr) {{ $mr->Type_Detail }} @endif</div>
				<div class='col-xs-4'> {{ $mi->Type_Detail }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Meter Phase: 
				</div>
				<div class='col-xs-4'>@if($mr) {{ $mr->Phase_Detail }} @endif</div>
				<div class='col-xs-4'> {{ $mi->Phase_Detail }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					KHW Reading: 
				</div>
				<div class='col-xs-4'> {{ $dat->MR_KWHReading }} </div>
				<div class='col-xs-4'> {{ $dat->MI_KWHReading }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					KVAH Reading:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_KVAHReading }} </div>
				<div class='col-xs-4'> {{ $dat->MI_KVAHReading }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					MDI KW:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_MDIkw }} </div>
				<div class='col-xs-4'> {{ $dat->MI_MDIkw }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					MDI KVA:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_MDIkva }} </div>
				<div class='col-xs-4'> {{ $dat->MI_MDIkva }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Current Reading:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_CurrentReading }} </div>
				<div class='col-xs-4'> {{ $dat->MI_CurrentReading }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					MF:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_MF }} </div>
				<div class='col-xs-4'> {{ $dat->MI_MF }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Condition:
				</div>
				<div class='col-xs-4'> {{ $dat->MR_Condition }} </div>
				<div class='col-xs-4'> {{ $dat->MI_Condition }} </div>
			</div>
		</div>
		<div class='col-sm-6'>
			<div class='row'>
				<div class='col-xs-4'></div>
				<div class='col-xs-4'>
					<div class='tab-bor title'>Seal Removed</div>
				</div>
				<div class='col-xs-4'>
					<div class='tab-bor title'>Seal Installed</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Meter Seals: 
				</div>
				<div class='col-xs-4'> {{ $dat->SR_MeterSeal1 }}</div>
				<div class='col-xs-4'> {{ $dat->SI_MeterSeal1 }}</div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'> {{ $dat->SR_MeterSeal2 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_MeterSeal2 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Box Seals:
				</div>
				<div class='col-xs-4'> {{ $dat->SR_BoxSeal1 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_BoxSeal1 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'> {{ $dat->SR_BoxSeal2 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_BoxSeal2 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Busbar Seal:
				</div>
				<div class='col-xs-4'> {{ $dat->SR_BusbarSeal1 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_BusbarSeal1 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'> {{ $dat->SR_BusbarSeal2 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_BusbarSeal2 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					Terminal Seal:
				</div>
				<div class='col-xs-4'> {{ $dat->SR_TerminalSeal1 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_TerminalSeal1 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'> {{ $dat->SR_TerminalSeal2 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_TerminalSeal2 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'> {{ $dat->SR_TerminalSeal3 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_TerminalSeal3 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					OPTICAL Seal
				</div>
				<div class='col-xs-4'> {{ $dat->SR_OpticalSeal1 }} </div>
				<div class='col-xs-4'> {{ $dat->SI_OpticalSeal1 }} </div>
			</div>
			<div class='row'>
				<div class='col-xs-4'>
					&nbsp;
				</div>
				<div class='col-xs-4'></div>
				<div class='col-xs-4'></div>
			</div>
		</div>
	</div><br>
	<div class='row'>
		<div class='col-xs-12'>
			<strong>Remarks: {{ $dat->Remarks }}</strong>
		</div>
	</div><br>
	<div class='row'>
		<div class='col-xs-12'>
			<h6>This is certify that work of meter replacement carried out at the above premise has been done satisfactory and no payment has been made to meter installation team. Seal fixed working of new Meter checked and results are within premissible limits</h6>
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<hr>
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12 title'>
			<h4><strong>Riverside Utilities Private Limited</strong></h4>
		</div>
	</div>
</div>