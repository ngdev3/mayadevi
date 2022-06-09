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
										<div class="form-group col-md-6">
											<label for="type_of_invoice">Type of Invoice*</label>
											<select id="type_of_invoice" class="form-control" name="type_of_invoice">
												<option value="1">Tax Invoice</option>
												<option value="2" selected>Bill of Supply</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Product Name *</label>
											<?php  
                                               $name = @$result->product_name;
                                               $postvalue = @$_POST['product_name'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'product_name','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Product Name', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('product_name'); ?>
													</div>
												</label>
										</div>
									
									</div>
									<div id="tax_invoice_enable" class="form-row">
										<div class="form-group col-md-6">
											<label>Enable Delivery At*</label><br>
											<input type="radio" id="enable_delivery_yes" name="enable_delivery" value="yes">
											<label for="enable_delivery_yes">Yes</label>
											<input type="radio" id="enable_delivery_no" name="enable_delivery" value="no" checked>
											<label for="enable_delivery_no">No</label>
										</div>
										<div class="form-group col-md-6">
											<label for="enable_delivery">Delivery At *</label>
											<?php  
											   if(!empty($result))   $name = @$result->delivery_at_account;
                                               $postvalue = @$_POST['delivery_at_account'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'delivery_at_account','maxlength'=>'100','id'=>'delivery_at_account', 'class' => 'form-control',  'placeholder' => 'Delivery At', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('delivery_at_account'); ?>
													</div>
												</label>
										</div>
									
									</div>
									<div class="form-row">
                  						<div class="form-group col-md-6">
											<label for="inputState2">HSN  Code*</label>
											<?php  
                                               $name = @$result->hsn_code;
                                               $postvalue = @$_POST['hsn_code'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'hsn_code','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'HSN Code', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('hsn_code'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">UOM *</label>
											<?php  
                                               $name = @$result->uom;
                                               $postvalue = @$_POST['uom'];
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'uom','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'UOM', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('uom'); ?>
													</div>
												</label>
										</div>
									</div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">Quantity*</label>
											<?php  
                                               $name = @$result->quantity;
                                               $postvalue = @$_POST['quantity'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'quantity','name' => 'quantity','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Quantity', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('quantity'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Rate *</label>
											<?php  
                                               $name = @$result->rate;
                                               $postvalue = @$_POST['rate'];
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'rate','name' => 'rate','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Rate', 'value' => !empty($postvalue) ? $postvalue : $name ));
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
											<label for="inputState2">Amount*</label>
											<?php  
                                               $name = @$result->amount;
                                               $postvalue = @$_POST['amount'];
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'amount','name' => 'amount','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('amount'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">CGST *</label>
											<?php  
                                               $name = @$result->cgst;
                                               $postvalue = @$_POST['cgst'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'cgst','name' => 'cgst','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'CGST', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('cgst'); ?>
													</div>
												</label>
										</div>
									</div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">SGST*</label>
											<?php  
                                               $name = @$result->sgst;
                                               $postvalue = @$_POST['sgst'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'sgst','name' => 'sgst','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'SGST', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('sgst'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">IGST *</label>
											<?php  
                                               $name = @$result->igst;
                                               $postvalue = @$_POST['igst'];
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'igst','name' => 'igst','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'IGST', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('igst'); ?>
													</div>
												</label>
										</div>
									</div>
									<div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">SGST Amount*</label>
											<?php  
                                               $name = @$result->sgst_amount;
                                               $postvalue = @$_POST['sgst_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'sgst_amount','name' => 'sgst_amount','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'SGST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('sgst_amount'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">IGST Amount*</label>
											<?php  
                                               $name = @$result->igst_amount;
                                               $postvalue = @$_POST['igst_amount'];
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'igst_amount','name' => 'igst_amount','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'IGST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('igst_amount'); ?>
													</div>
												</label>
										</div>
									</div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">Tax GST Amount*</label>
											<?php  
                                               $name = @$result->tax_gst_amount;
                                               $postvalue = @$_POST['tax_gst_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'tax_gst_amount','name' => 'tax_gst_amount','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Tax GST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('tax_gst_amount'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Freight *</label>
											<?php  
                                               $name = @$result->freight;
                                               $postvalue = @$_POST['freight'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'freight','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Freight', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('freight'); ?>
													</div>
												</label>
										</div>
									</div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">Advance*</label>
											<?php  
                                               $name = @$result->others;
                                               $postvalue = @$_POST['others'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'others','maxlength'=>'100','id'=>'others','class' => 'form-control',  'placeholder' => 'Advance', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('others'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Total Invoice *</label>
											<?php  
                                               $name = @$result->total_invoice;
                                               $postvalue = @$_POST['total_invoice'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'total_invoice','name' => 'total_invoice','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Total Invoice', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('total_invoice'); ?>
													</div>
												</label>
										</div>
									</div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
											<label for="inputState2">Truck No.*</label>
											<?php  
                                               $name = @$result->truck_no;
                                               $postvalue = @$_POST['truck_no'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'truck_no','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Truck No', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('truck_no'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Driver Name *</label>
											<?php  
                                               $name = @$result->driver_name;
                                               $postvalue = @$_POST['driver_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','name' => 'driver_name','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Driver Name', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('driver_name'); ?>
													</div>
												</label>
										</div>
									</div>

									<div class="form-row">
									<div class="form-group col-md-6">
											<label for="inputState2">CGST Amount*</label>
											<?php  
                                               $name = @$result->cgst_amount;
                                               $postvalue = @$_POST['cgst_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'cgst_amount','name' => 'cgst_amount','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'CGST Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('cgst_amount'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Naam *</label>
											<?php  
                                               $name = @$result->naam;
                                               $postvalue = @$_POST['naam'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('autofocus'=>'autofocus','id'=>'naam','name' => 'naam','maxlength'=>'100','class' => 'form-control',  'placeholder' => 'Naam', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('naam'); ?>
													</div>
												</label>
										</div>
									</div>


									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputState2">Remark *</label>
											<?php  
                                               $name = @$result->remark;
                                               $postvalue = @$_POST['remark'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_textarea(array('rows'=>'4','name' => 'remark','maxlength'=>'1000','class' => 'form-control',  'placeholder' => 'Remark', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
												<label class="error">
													<div class="help-block" style="color:red">
														<?php echo form_error('remark'); ?>
													</div>
												</label>
										</div>
										<div class="form-group col-md-6">
											<label for="inputState2">Status*</label>
											<select id="inputState2" class="form-control" name="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										</div>
									</div>

									


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

function calGST(){

}


function autocomplete(inp, arr) {
	var arr;
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


$('#total_weight, #rate_val').keyup(() => {
	var total_weight = $('#total_weight').val();
	var rate = $('#rate_val').val();
	var total_amount = total_weight * rate;
	$('#final_amount').val(total_amount);
	var total_katti = ((total_weight * 100) / 40).toFixed(2)
	$('#total_katti').val(total_katti);
	console.log(total_katti)
})
$.ajax({
	url: "<?php echo base_url(); ?>admin/billing/billingCyle",
	type: "POST",
	dataType: 'json',
	success: function(a) {
		let khata_id = $('#khata_entry_id').val();
		$('#bill_no').val(khata_id + "/" + a)
	},
	error: function() {
		alert("Error");
	}
});

$('#quantity, #rate, #amount, #cgst, #igst, #sgst, #cgst_amount, #sgst_amount, #igst_amount, #others').keyup(()=>{
	var rate = $('#rate').val();
	var quantity = $('#quantity').val();
	var others = $('#others').val();
	var amount = $('#amount').val((quantity * rate).toFixed(2) );
	amount = $('#amount').val();
	var cgst = $('#cgst').val();
	var sgst = $('#sgst').val();
	var igst = $('#igst').val();

	var cgst_amount = $('#cgst_amount').val();
	cgst_amount = (amount) * (cgst) / 100 ;
	$('#cgst_amount').val(cgst_amount.toFixed(2));

	var sgst_amount = $('#sgst_amount').val();
	sgst_amount = (amount) * (sgst) / 100 ;
	$('#sgst_amount').val(sgst_amount.toFixed(2));

	var igst_amount = $('#igst_amount').val();
	igst_amount = (amount) * (igst) / 100 ;
	$('#igst_amount').val(igst_amount.toFixed(2));

	var tax_gst_amount = $('#tax_gst_amount').val();
	tax_gst_amount = (igst_amount) + (cgst_amount) + sgst_amount ;
	$('#tax_gst_amount').val(tax_gst_amount.toFixed(2));

	var total_invoice = $('#total_invoice').val();
	total_invoice = parseInt(tax_gst_amount) + parseInt(amount);
	total_invoice = parseInt(total_invoice) + parseInt(others);
	$('#total_invoice').val(total_invoice.toFixed(2));

})

$('#type_of_invoice').change((res)=>{
	var total_invoice = $('#type_of_invoice option:selected').val();
	if(total_invoice == 1){
		$('#tax_invoice_enable').removeClass('show').addClass('hide');
	}else{
		$('#tax_invoice_enable').removeClass('hide').addClass('show');
	}
});
</script>