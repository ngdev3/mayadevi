<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<?php  //pr($invoice_data);?>
<?php if(!empty($invoice_data)){?>

<body style="border: 5px solid white; height: 150mm;">
	<div style="display: block; height:150mm">
		<table style="border: 2px solid #999999; padding:2px; height:auto" width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr style="font-size: 12px;font-weight: bold;">
				<td>All Subject Under Hardoi Jurisdiction</td>
				<td align="right">Mob. 7398703084, 9415777518</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td> GSTIN : 09AAPFC4401L1Z9</td>
				<td align="right">8800210190, 8887905070</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>FSSAI No. 12721069000154</td>
				<td align="right">Email: crindustries2020@gmail.com</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>Mandi Samiti License: L/2020/217/49146048</td>
				<td align="right">State Code : 09</td>
				
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>Rice Milling License: L/2020/217/77877834</td>
				<td align="right" style="text-decoration:underline; color:blue">Original for Receipient</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td></td>
				<td align="right"></td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td height="" style="font-size:25px; color:#4349c4 ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center">C. R. INDUSTRIES</td>
							</tr>
							<tr>
								<td align="center" style=" padding:2px; font-size:10px; color:#000;  font-weight:bold; font-family: 'Muli', sans-serif;">Moh. Mahamand Mahua Tola Chungi, Shahabad ( Hardoi ) Uttar Pradesh - 241124 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<?php if($invoice_data['type_of_invoice'] == 1 ){?>
									<td style="font-size:14px; color:#000 ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center"> <u>TAX INVOICE</u> </td>
									<?php }else{?>
										<td style="font-size:14px; color:#4349c4 ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center"> <u>BILL OF SUPPLY</u> </td>
								<?php }?>	
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left" style="font-size: 15px; font-weight:bold; border-bottom: 2px solid #000 !important;">Invoice No: <?php echo $invoice_data['invoice_id']?></td>
				<td align="right" style="font-size: 15px; font-weight:bold; border-bottom: 2px solid #000 !important;">FY:  <?php echo $invoice_data['FY']?></td>
			</tr>
			<tr>
				<td align="left" style="font-size: 15px; font-weight:bold; ">Invoice Date: <?php $invoice_data_date =  strtotime($invoice_data['isupdated_date']); echo date('d-m-Y', $invoice_data_date); ?></td>
				<td align="right" style="font-size: 15px; font-weight:bold; ">Date of Supply: <?php echo date('d-m-Y', $invoice_data_date); ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td>
								<table width="100%" border="1" cellspacing="0" cellpadding="3">
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Detail Of Receiver / Billed To :</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Name: <?php echo $invoice_data['contact_person_name']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Address: <?php echo $invoice_data['purchaser_address']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">GSTIN: <?php echo $invoice_data['purchaser_gst_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State: <?php echo $invoice_data['state']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State Code: <?php echo $invoice_data['state_code']?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td>
								<table width="100%" border="1" cellspacing="0" cellpadding="3">
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Details of Consignee/ Shipped To: </td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Name: <?php echo $invoice_data['contact_person_name']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Address: <?php echo $invoice_data['purchaser_address']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">GSTIN: <?php echo $invoice_data['purchaser_gst_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State: <?php echo $invoice_data['state']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State Code: <?php echo $invoice_data['state_code']?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="1" cellspacing="0" cellpadding="2">
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" height="32" align="center">S.No.</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Description of Goods</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">HSN CODE</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">UOM</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Qty.</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Rate</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Amount</td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " height="32" align="center">1</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['product_name']?></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['hsn_code']?></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['uom']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['quantity']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['rate']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['amount']?></td>
						</tr>
						<tr>
							<td height="20" align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" height="40" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center">Total</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['amount']?></td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Bank Detail</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Bank Detail</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">CGST @ <?php echo $invoice_data['cgst']?>%</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['cgst_amount']?></td>
						</tr>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Name: Axis Bank</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Name: BOB Bank</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">SGST @ <?php echo $invoice_data['sgst']?>%</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['sgst_amount']?></td>
			</tr>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">A/C No.: 921020002720562</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">A/C No.: 32140200000336</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">IGST @ <?php echo $invoice_data['igst']?>%</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['igst_amount']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">IFSC Code:- UTIB0002701</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">IFSC Code:- BARB0SHADOI</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Tax Amount : GST</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['tax_gst_amount']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:13px;border-top: 1px solid;" align="center">Remark: </td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Amount After Tax</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['total_invoice']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['invoice_remark']?></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Freight</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['freight']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Advance</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['others']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Total Invoice Amount</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['total_invoice']?></td>
			</tr>
			</table>
			</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px; text-decoration:underline" colspan="2">Total Amount in Words: <?php echo getIndianCurrency($invoice_data['total_invoice'])?></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center">
								<table width="100%" border="1" cellspacing="0" cellpadding="1">
									<tr>
										<td height="27" align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Detail of Vehicle: </td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Bill of Supply: ..................</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Truck No: <?php echo $invoice_data['truck_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Date: <?php echo date('d-m-Y', $invoice_data_date); ?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Transport Company: SAME</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Driver Name: <?php echo $invoice_data['driver_name']?></td>
									</tr>
								</table>
							</td>
							<td align="center">
								<table width="100%" border="1" cellspacing="0" cellpadding="1">
									<tr>
										<td height="27" align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px; border:0"> Certified that the particular given above true and correct</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px; border:0">&nbsp;</td>
									</tr>
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:5px;border:0"><img height="50" src="assets/images/sign_03.jpeg" alt=""></td>
									</tr>
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;border:0">( Partnership/Authorised Signatory | Stamp Not Required)</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</table>
	</div>
</body>
<body style="border: 5px solid white; height: 150mm;">
	<div style="display: block; height:150mm">
		<table style="border: 2px solid #999999; padding:2px; height:auto" width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr style="font-size: 12px;font-weight: bold;">
				<td>All Subject Under Hardoi Jurisdiction</td>
				<td align="right">Mob. 7398703084, 9415777518</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td> GSTIN : 09AAPFC4401L1Z9</td>
				<td align="right">8800210190, 8887905070</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>FSSAI No. 12721069000154</td>
				<td align="right">Email: crindustries2020@gmail.com</td>
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>Mandi Samiti License: L/2020/217/49146048</td>
				<td align="right">State Code : 09</td>
				
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td>Rice Milling License: L/2020/217/77877834</td>
				<td align="right" style="text-decoration:underline; color:red">Duplicate for Transporter/Supplier</td>
				
			</tr>
			<tr style="font-size: 12px;font-weight: bold;">
				<td></td>
				<td align="right"></td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td height="" style="font-size:25px; color:#4349c4 ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center">C. R. INDUSTRIES</td>
							</tr>
							<tr>
								<td align="center" style=" padding:2px; font-size:10px; color:#000;  font-weight:bold; font-family: 'Muli', sans-serif;">Moh. Mahamand Mahua Tola Chungi, Shahabad ( Hardoi ) Uttar Pradesh - 241124 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
								<?php if($invoice_data['type_of_invoice'] == 1 ){?>
									<td style="font-size:14px; color:#4349c4 ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center"> <u>TAX INVOICE</u> </td>
									<?php }else{?>
										<td style="font-size:14px; color:#4349c4  ; font-weight:bold; font-family: 'Muli', sans-serif;" align="center"> <u>BILL OF SUPPLY</u> </td>
								<?php }?>	
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left" style="font-size: 15px; font-weight:bold; border-bottom: 2px solid #000 !important;">Invoice No: <?php echo $invoice_data['invoice_id']?></td>
				<td align="right" style="font-size: 15px; font-weight:bold; border-bottom: 2px solid #000 !important;">FY:  <?php echo $invoice_data['FY']?></td>
			</tr>
			<tr>
				<td align="left" style="font-size: 15px; font-weight:bold; ">Invoice Date: <?php $invoice_data_date =  strtotime($invoice_data['isupdated_date']); echo date('d-m-Y', $invoice_data_date); ?></td>
				<td align="right" style="font-size: 15px; font-weight:bold; ">Date of Supply: <?php echo date('d-m-Y', $invoice_data_date); ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td>
								<table width="100%" border="1" cellspacing="0" cellpadding="3">
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Detail Of Receiver / Billed To :</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Name: <?php echo $invoice_data['contact_person_name']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Address: <?php echo $invoice_data['purchaser_address']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">GSTIN: <?php echo $invoice_data['purchaser_gst_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State: <?php echo $invoice_data['state']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State Code: <?php echo $invoice_data['state_code']?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="2">
						<tr>
							<td>
								<table width="100%" border="1" cellspacing="0" cellpadding="3">
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Details of Consignee/ Shipped To: </td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Name: <?php echo $invoice_data['contact_person_name']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Address: <?php echo $invoice_data['purchaser_address']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">GSTIN: <?php echo $invoice_data['purchaser_gst_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State: <?php echo $invoice_data['state']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">State Code: <?php echo $invoice_data['state_code']?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="1" cellspacing="0" cellpadding="2">
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" height="32" align="center">S.No.</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Description of Goods</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">HSN CODE</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">UOM</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Qty.</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Rate</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" align="center">Amount</td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " height="32" align="center">1</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['product_name']?></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['hsn_code']?></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['uom']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"><?php echo $invoice_data['quantity']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['rate']?></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['amount']?></td>
						</tr>
						<tr>
							<td height="20" align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
							<td align="center"></td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" height="40" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center">Total</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; " align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['amount']?></td>
						</tr>
						<tr>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Bank Detail</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Bank Detail</td>
							<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">CGST @ <?php echo $invoice_data['cgst']?>%</td>
							<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['cgst_amount']?></td>
						</tr>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Name: Axis Bank</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">Name: BOB Bank</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">SGST @ <?php echo $invoice_data['sgst']?>%</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['sgst_amount']?></td>
			</tr>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">A/C No.: 921020002720562</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">A/C No.: 32140200000336</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">IGST @ <?php echo $invoice_data['igst']?>%</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['igst_amount']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">IFSC Code:- UTIB0002701</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:10px;" align="center">IFSC Code:- BARB0SHADOI</td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Tax Amount : GST</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['tax_gst_amount']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:bold; font-size:13px;border-top: 1px solid;" align="center">Remark: </td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;border-top: 1px solid;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Amount After Tax</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['total_invoice']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"><?php echo $invoice_data['invoice_remark']?></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Freight</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['freight']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Advance</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['others']?></td>
			</tr>
			<tr>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border:0;font-weight:bold; font-size:13px;" align="center"></td>
				<td style="width: fit-content; font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px;" align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; border: 0;font-weight:300; font-size:13px; " align="center"></td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:BOLD; font-size:10px;" align="center">Total Invoice Amount</td>
				<td style="width: fit-content;font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:13px;" align="center"><?php echo $invoice_data['total_invoice']?></td>
			</tr>
			</table>
			</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px; text-decoration:underline" colspan="2">Total Amount in Words: <?php echo getIndianCurrency($invoice_data['total_invoice'])?></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center">
								<table width="100%" border="1" cellspacing="0" cellpadding="1">
									<tr>
										<td height="27" align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px;">Detail of Vehicle: </td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Bill of Supply: ..................</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Truck No: <?php echo $invoice_data['truck_no']?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Date: <?php echo date('d-m-Y', $invoice_data_date); ?></td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Transport Company: SAME</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;">Driver Name: <?php echo $invoice_data['driver_name']?></td>
									</tr>
								</table>
							</td>
							<td align="center">
								<table width="100%" border="1" cellspacing="0" cellpadding="1">
									<tr>
										<td height="27" align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:12px; border:0"> Certified that the particular given above true and correct</td>
									</tr>
									<tr>
										<td style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px; border:0">&nbsp;</td>
									</tr>
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:5px;border:0"><img height="50" src="assets/images/sign_03.jpeg" alt=""></td>
									</tr>
									<tr>
										<td align="center" style="font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:10px;border:0">( Partnership/Authorised Signatory | Stamp Not Required)</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</table>
	</div>
</body>
<?php }?>
</html>