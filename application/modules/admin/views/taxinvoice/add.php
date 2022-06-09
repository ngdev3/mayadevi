<style>
* {
	box-sizing: border-box;
}

body {
	font: 16px Arial;
}


/*the container must be positioned relative:*/

.autocomplete {
	position: relative;
	display: inline-block;
}

input {
	border: 1px solid transparent;
	background-color: #f1f1f1;
	padding: 10px;
	font-size: 16px;
}

input[type=text] {
	background-color: #f1f1f1;
	width: 100%;
}

input[type=submit] {
	background-color: DodgerBlue;
	color: #fff;
	cursor: pointer;
}

.autocomplete-items {
	position: absolute;
	border: 1px solid #d4d4d4;
	border-bottom: none;
	border-top: none;
	z-index: 99;
	/*position the autocomplete items to be the same width as the container:*/
	top: 100%;
	left: 0;
	right: 0;
	overflow-x: scroll;
	overflow-y: scroll;
	height: 200px;
	background: white
}

.autocomplete-items div {
	padding: 10px;
	cursor: pointer;
	background-color: #fff;
	border-bottom: 1px solid #d4d4d4;
}


/*when hovering an item:*/

.autocomplete-items div:hover {
	background-color: #e9e9e9;
}


/*when navigating through the items using the arrow keys:*/

.autocomplete-active {
	background-color: DodgerBlue !important;
	color: #ffffff;
}
</style>
<main id="myclsid" class="main-content bgc-grey-100">
	<div id="mainContent">
		<div class="container-fluid">
			<!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
			<div class="row">
				<div class="masonry-item col-md-12">
					<div class="bgc-white p-20 bd">
						<h6 class="c-grey-900">Add Billing Form</h6>
						<?=get_flashdata();
                                    // pr($result);
                                     ?>
							<div class="mT-30">
								<?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
									<div class="form-row">

									<div class="form-group col-md-6">
                                                    <label for="inputEmail4">Billing Date *</label>
                                                   <?php  
                                                        $name = @$result->billing_date;
                                                        $postvalue = @$_SESSION['billing_date'];
                                                        echo form_input(array('id'=>'datepicker','name' => 'billing_date', 'maxlength'=>'25', 'class' => 'form-control', 'placeholder' => 'Billing Date', 'value' => !empty($postvalue) ? $postvalue : $name )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('billing_date'); ?></div></label>
                                                </div>

												<div class="form-group col-md-6">
                                               <label for="inputState2">Account Name *</label>
                                               <?php  
											   if(!empty($result))   $name = @$result->name.'_'.@$result->account_id;
												// pr($name); die;
                                               $postvalue = @$_POST['account_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'account_name','maxlength'=>'100','id'=>'myInput', 'class' => 'form-control',  'placeholder' => 'Account Name', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
                                              <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('account_name'); ?></div></label>
                                                                                         
                                           </div>
									</div>
									<div class="form-row">

									<div class="form-group col-md-5">
											<label for="inputState2">Bill Of Supply Number *</label>
											<?php  
                                               $name = @$result->bos_number;
                                               $postvalue = @$_POST['bos_number'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'bos_number','maxlength'=>'100','id'=>'bos_number','class' => 'form-control', 'placeholder' => 'Bill Of Supply Number', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('bos_number'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-5 hide">
											<label for="inputState2">UNQUIE NUMBER *</label>
											<?php  
                                               $name = @$result->bos_id;
                                               $postvalue = @$_POST['bos_id'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'bos_id','maxlength'=>'100','id'=>'bos_id','class' => 'form-control', 'placeholder' => 'Bill Of Supply Number', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('bos_id'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-2" style="display: inline-grid;">
												<button type="button" id="get_invoice" class="btn btn-primary"> Get Invoice </button>
										</div>
										<div class="form-group col-md-5">
											<label for="type_of_invoice">Type of Invoice*</label>
											<select id="type_of_invoice" class="form-control" name="type_of_invoice">
												<option value="1" selected>Tax Invoice</option>
											</select>
										</div>
										
									
									</div>
									<label for="">Bill Of Supply Data</label>
									<hr>
									<div class="form-row">
									<div class="form-group col-md-6">
											<label for="enable_delivery">Quantity *</label>
											<?php  
											   if(!empty($result))   $name = @$result->quantity;
                                               $postvalue = @$_POST['quantity'];
                                               echo form_input(array('name' => 'quantity','maxlength'=>'100','id'=>'quantity', 'class' => 'form-control',  'placeholder' => 'Quantity', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
											
										</div>
										<div class="form-group col-md-6">
											<label for="enable_delivery">Rate *</label>
											<?php  
											   if(!empty($result))   $name = @$result->rate;
                                               $postvalue = @$_POST['rate'];
                                               echo form_input(array('name' => 'rate','maxlength'=>'100','id'=>'rate', 'class' => 'form-control',  'placeholder' => 'Rate', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('rate'); ?>
													</div>
												</label>
										</div>
									
									</div>
									<div class="form-row">
									<div class="form-group col-md-6">
											<label for="enable_delivery">SGST Amount *</label>
											<?php  
											   if(!empty($result))   $name = @$result->sgst_amount;
                                               $postvalue = @$_POST['sgst_amount'];
                                               echo form_input(array('name' => 'sgst_amount','maxlength'=>'100','id'=>'sgst_amount', 'class' => 'form-control',  'placeholder' => 'SGST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
											
										</div>
										<div class="form-group col-md-6">
										<label for="enable_delivery">CGST Amount *</label>
											<?php  
											   if(!empty($result))   $name = @$result->cgst_amount;
                                               $postvalue = @$_POST['cgst_amount'];
                                               echo form_input(array('name' => 'cgst_amount','maxlength'=>'100','id'=>'cgst_amount', 'class' => 'form-control',  'placeholder' => 'CGST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
											
										</div>
									
									</div>
									<div class="form-row">
									<div class="form-group col-md-6">
											<label for="enable_delivery">Tax GST Amount *</label>
											<?php  
											   if(!empty($result))   $name = @$result->tax_gst_amount;
                                               $postvalue = @$_POST['tax_gst_amount'];
                                               echo form_input(array('name' => 'tax_gst_amount','maxlength'=>'100','id'=>'tax_gst_amount', 'class' => 'form-control',  'placeholder' => 'Tax Gst Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
											
										</div>
										<div class="form-group col-md-6">
											<label for="enable_delivery">Total Invoice *</label>
											<?php  
											   if(!empty($result))   $name = @$result->total_invoice;
                                               $postvalue = @$_POST['total_invoice'];
                                               echo form_input(array('name' => 'total_invoice','maxlength'=>'100','id'=>'total_invoice', 'class' => 'form-control',  'placeholder' => 'Total Invoice', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('total_invoice'); ?>
													</div>
												</label>
										</div>
									
									</div>
									</div>
									
									<hr>
									<label for="">Shortage</label>
									<hr>
									<div id="tax_invoice_enable" class="form-row">
									<div class="form-group col-md-6">
											<label for="enable_delivery">Shortage Quantity *</label>
											<?php  
											   if(!empty($result))   $name = @$result->delivery_at_account;
                                               $postvalue = @$_POST['deduction_quantity'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'deduction_quantity','maxlength'=>'100','id'=>'deduction_quantity', 'class' => 'form-control',  'placeholder' => 'Shortage Quantity', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('deduction_quantity'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="enable_delivery">Net Weight *</label>
											<?php  
											   if(!empty($result))   $name = @$result->net_weight;
                                               $postvalue = @$_POST['net_weight'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'net_weight','maxlength'=>'100','id'=>'net_weight', 'class' => 'form-control',  'placeholder' => 'Net Weight', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('net_weight'); ?>
													</div>
												</label>
										</div>
									
									</div>
									
									<div class="form-row">
                 						 <div class="form-group col-md-6">
											<label for="inputState2">Less Rebate*</label>
											<?php  
                                               $name = @$result->less_rebate;
                                               $postvalue = @$_POST['sgst'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'less_rebate','name' => 'less_rebate','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Less Rebate', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('less_rebate'); ?>
													</div>
												</label>
										</div>
										
									</div>
									<hr>
									


									<div class="form-group">
										<div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
											<div class="peer">
												<button type="submit" class="btn btn-primary"> Submit </button>
												<a href="<?php echo base_url('admin/invoice/listing/');?>">
													<button type="button" class="btn btn-primary"> Cancel </button>
												</a>
											</div>
										</div>
									</div>
									</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</main>
<script>
	$( function() {
    $( "#datepicker" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
        setDate:new Date()
        
        });
  } );


  var data;
  $('#deduction_quantity').change((e) => {
	var total_invoice = parseFloat(e.target.value)*(parseFloat(data.rate));
	$('#total_invoice').val(total_invoice);
  });


  $('#net_weight, #less_rebate').change(() => {
	  var quantity = $('#quantity').val();
	  var deduction_quantity = $('#deduction_quantity').val();
	  var total_amount = parseFloat(quantity) - parseFloat(deduction_quantity);
	  $('#net_weight').val(total_amount.toFixed(2));
	  
	  var total_invoice = $('#total_invoice').val();
	  var less_rebate = $('#less_rebate').val();

	  total_invoice = parseFloat(total_invoice) - parseFloat(less_rebate);
	  console.log("total_invoice",total_invoice)
	//   console.log("total_invoice",total_invoice)
	  $('#total_invoice').val(total_invoice);
	  var sgst = ((total_invoice)*(data.sgst))/100;
	  var cgst = ((total_invoice)*(data.sgst))/100;
	  var sgst_amount = $('#sgst_amount').val(sgst.toFixed(2));
	  var cgst_amount = $('#cgst_amount').val(cgst.toFixed(2));
	//   console.log("total_amount",data)
})

$('#get_invoice').click(()=>{
	var acn_id = ($('#myInput').val()).split("_")[1];

	$.ajax({
	url: "<?php echo base_url(); ?>admin/billing/get_billofsupplyData",
	type: "POST",
	dataType: 'json',
	data:{"id":acn_id, bos_number:$('#bos_number').val(), doi:$( "#datepicker" ).val()},
	success: function(a) {
		if(a == null) alert("Invoice Not Found");
		data = a;
		$('#quantity').val(data.quantity)
		$('#rate').val(data.rate)
		$('#amount').val(data.amount)
		$('#tax_gst_amount').val(data.tax_gst_amount)
		$('#sgst_amount').val(data.sgst_amount)
		$('#cgst_amount').val(data.cgst_amount)
		$('#total_invoice').val(data.total_invoice)
		$('#bos_id').val(data.bos_id)
	},
	error: function() {
		alert("Error");
	}
});
})

function autocomplete(inp, arr) {
	var arr;
	console.log($("input[name='account_name']").val());
	/*the autocomplete function takes two arguments,
	the text field element and an array of possible autocompleted values:*/
	var currentFocus;
	/*execute a function when someone writes in the text field:*/
	inp.addEventListener("input", function(e) {
		$.ajax({
			url: "<?php echo base_url(); ?>admin/billing/account_name",
			type: "POST",
			dataType: 'json',
			success: function(a) {
				arr = a
			},
			error: function() {
				alert("Error");
			}
		});
		console.log(arr)
		var a, b, i, val = this.value;
		/*close any already open lists of autocompleted values*/
		closeAllLists();
		if(!val) {
			return false;
		}
		currentFocus = -1;
		/*create a DIV element that will contain the items (values):*/
		a = document.createElement("DIV");
		a.setAttribute("id", this.id + "autocomplete-list");
		a.setAttribute("class", "autocomplete-items");
		/*append the DIV element as a child of the autocomplete container:*/
		this.parentNode.appendChild(a);
		/*for each item in the array...*/
		for(i = 0; i < arr.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if(arr[i].name.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				b.innerHTML = "<strong>" + arr[i].name.substr(0, val.length) + "</strong>";
				b.innerHTML += arr[i].name.substr(val.length);
				/*insert a input field that will hold the current array item's value:*/
				b.innerHTML += "<input type='hidden' value='" + arr[i].name + '_' + arr[i].account_id + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function(e) {
					/*insert the value for the autocomplete text field:*/
					inp.value = this.getElementsByTagName("input")[0].value;
					/*close the list of autocompleted values,
					(or any other open lists of autocompleted values:*/
					closeAllLists();
				});
				a.appendChild(b);
			}
		}
	});
	/*execute a function presses a key on the keyboard:*/
	inp.addEventListener("keydown", function(e) {
		var x = document.getElementById(this.id + "autocomplete-list");
		if(x) x = x.getElementsByTagName("div");
		if(e.keyCode == 40) {
			/*If the arrow DOWN key is pressed,
			increase the currentFocus variable:*/
			currentFocus++;
			/*and and make the current item more visible:*/
			addActive(x);
		} else if(e.keyCode == 38) { //up
			/*If the arrow UP key is pressed,
			decrease the currentFocus variable:*/
			currentFocus--;
			/*and and make the current item more visible:*/
			addActive(x);
		} else if(e.keyCode == 13) {
			/*If the ENTER key is pressed, prevent the form from being submitted,*/
			e.preventDefault();
			if(currentFocus > -1) {
				/*and simulate a click on the "active" item:*/
				if(x) x[currentFocus].click();
			}
		}
	});

	function addActive(x) {
		/*a function to classify an item as "active":*/
		if(!x) return false;
		/*start by removing the "active" class on all items:*/
		removeActive(x);
		if(currentFocus >= x.length) currentFocus = 0;
		if(currentFocus < 0) currentFocus = (x.length - 1);
		/*add class "autocomplete-active":*/
		x[currentFocus].classList.add("autocomplete-active");
	}

	function removeActive(x) {
		/*a function to remove the "active" class from all autocomplete items:*/
		for(var i = 0; i < x.length; i++) {
			x[i].classList.remove("autocomplete-active");
		}
	}

	function closeAllLists(elmnt) {
		/*close all autocomplete lists in the document,
		except the one passed as an argument:*/
		var x = document.getElementsByClassName("autocomplete-items");
		for(var i = 0; i < x.length; i++) {
			if(elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
		}
	}
	/*execute a function when someone clicks in the document:*/
	document.addEventListener("keydown", function(e) {
		closeAllLists(e.target);
	});
}
/*An array containing all the country names in the world:*/
//var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"));
autocomplete(document.getElementById("naam"));
autocomplete(document.getElementById("delivery_at_account"));



</script>