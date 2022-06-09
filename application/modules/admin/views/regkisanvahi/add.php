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
                                                
												<div class="form-group col-md-2">
														<label for="inputEmail4">Account Name*</label>
														<?php 
															$name = @$result->account_name;
                                              				$postvalue = @$_POST['account_name'];
											   			?>
														<input type="text" name="account_name" id="myInput" value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>" class="form-control"  placeholder="Account Name">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('account_name'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Quantity*</label>
														<?php 
															$name = @$result->Quantity;
                                              				$postvalue = @$_POST['quantity'];
											   			?>
														<input type="text" name="quantity"  value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>" class="form-control"  placeholder="Quantity">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('quantity'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Origin Type*</label>
														<?php 
															$name = @$result->Quantity;
                                              				$postvalue = @$_POST['quantity'];
											   			?>
														<select class="form-control" name="origin_type">
                                                      <option value="" selected >Origin Type</option>
                                                      <?php if(!empty($center_list)){ foreach($center_list as $x => $y){?>
                                                        <option value="<?php echo $y->origin_id ; ?>" ><?php echo $y->name ; ?></option>
                                                        <?php }};?>
                                                  </select>                                         
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('origin_type'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Farmer Name*</label>
														<?php 
															$name = @$result->Farmer_name;
                                              				$postvalue = @$_POST['farmer_name'];
											   			?>
														<input type="text" name="farmer_name" value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>"  class="form-control" placeholder="Farmer Name">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('farmer_name'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Farmer Id*</label>
														<?php 
															$name = @$result->Farmer_ID;
                                              				$postvalue = @$_POST['farmer_id'];
											   			?>
														<input type="number" name="farmer_id"  value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>" class="form-control"  placeholder="Farmer Id">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('farmer_id'); ?></div></label>
	
													</div>
												
													<div class="form-group col-md-2">
														<label for="inputEmail4">
															Reg Date*</label>
															<?php 
															$name = @$result->reg_date;
                                              				$postvalue = @$_POST['reg_date'];
											   			?>
														<input type="text" name="reg_date" class="dob" value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>"  class="form-control"  placeholder="Reg Date">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('reg_date'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">
															Date of Birth*</label>
															<?php 
															$name = @$result->dob;
                                              				$postvalue = @$_POST['dob'];
											   			?>
														<input type="text" name="dob" class="dob"  value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>"  class="form-control"  placeholder="Reg Date">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('dob'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Aadhar Card*</label>
														<?php 
															$name = @$result->aadhar_card;
                                              				$postvalue = @$_POST['aadhar_card'];
											   			?>
														<input type="text" name="aadhar_card"  value="<?php echo (!empty($postvalue) ? $postvalue : $name) ?>"  class="form-control"  placeholder="Aadhar Card">
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('aadhar_card'); ?></div></label>
	
													</div>
													<div class="form-group col-md-2">
														<label for="inputEmail4">Status*</label>
														<select class="form-control" name="status">
                                                      		<option value="">Status</option>
                                                      		<option value="Unverified" selected >UnVerified</option>
                                                      		<option value="Verified"  >Verified</option>
                                                      		<option value="Mapped"  >Mapped</option>
                                                      		<option value="Dead"  >Dead</option>
                                                  		</select>     
														<label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('dob'); ?></div></label>
	
													</div>
												</div>
									<div class="form-row">
                                                
											
													
													
												</div>
											

									<div class="form-group">
										<div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
											<div class="peer">
												<button type="submit" class="btn btn-primary"> Submit </button>
												<a href="<?php echo base_url('admin/Kisanreg/listing/');?>">
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
    $( ".dob" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
        setDate:new Date()
        
        });
  } );

function calGST(){

}


$('#type_of_invoice').change((event)=>{
	var val = event.target.value;
	if(val == 1){
		$('#invoice_type').removeClass('hide');
	}else{

		$('#invoice_type').addClass('hide');
	}
})

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


function autoCompBOS(inp, arr) {
	var arr;
	/*the autocomplete function takes two arguments,
	the text field element and an array of possible autocompleted values:*/
	var currentFocus;
	/*execute a function when someone writes in the text field:*/
	inp.addEventListener("input", function(e) {
		$.ajax({
			url: "<?php echo base_url(); ?>admin/invoice/account_name",
			type: "POST",
			dataType: 'json',
			success: function(a) {
				arr = a
			},
			error: function() {
				alert("Error");
			}
		});
	//	console.log(arr)
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
			//console.log(arr[i])
			if(arr[i].account_name.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
			//	console.log(arr[i])
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				b.innerHTML = "<strong>" + arr[i].account_name.substr(0, val.length) + "</strong>";
				b.innerHTML += arr[i].account_name.substr(val.length);
				b.innerHTML += "_"+ arr[i].invoice_id;
				
				/*insert a input field that will hold the current array item's value:*/
				b.innerHTML += "<input type='hidden' value='" + arr[i].account_name + '_' + arr[i].invoice_id + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function(e) {
					$('#bos_date').val();
					var slice = (this.getElementsByTagName("input")[0].value).split("_");
					var op = (arr).find((item) => {return item.invoice_id = parseInt(slice[1])});
					var ik;
					for(var i = 0; i < arr.length ; i++){
							if(arr[i].invoice_id == parseInt(slice[1])){
								ik = arr[i];
							}
					}
					$('#bos_date').val(ik.upd);
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
		//console.log("Add Active")
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

autoCompBOS(document.getElementById("bos_no"));


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

$('#quantity, #rate, #amount, #cgst, #igst, #sgst, #cgst_amount, #sgst_amount, #igst_amount').keyup(()=>{
	var rate = $('#rate').val();
	var quantity = $('#quantity').val();
	var amount = $('#amount').val(quantity * rate );
	amount = $('#amount').val();
	var cgst = $('#cgst').val();
	var sgst = $('#sgst').val();
	var igst = $('#igst').val();

	var cgst_amount = $('#cgst_amount').val();
	cgst_amount = (amount) * (cgst) / 100 ;
	$('#cgst_amount').val(cgst_amount);

	var sgst_amount = $('#sgst_amount').val();
	sgst_amount = (amount) * (sgst) / 100 ;
	$('#sgst_amount').val(sgst_amount);

	var igst_amount = $('#igst_amount').val();
	igst_amount = (amount) * (igst) / 100 ;
	$('#igst_amount').val(igst_amount);

	var tax_gst_amount = $('#tax_gst_amount').val();
	tax_gst_amount = (igst_amount) + (cgst_amount) + sgst_amount ;
	$('#tax_gst_amount').val(tax_gst_amount);

	var total_invoice = $('#total_invoice').val();
	total_invoice = parseInt(tax_gst_amount) + parseInt(amount);
	$('#total_invoice').val(total_invoice);

})


function getSOBDate(){
	$.ajax({
	url: "<?php echo base_url(); ?>admin/invoice/getSOBDate",
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
}
</script>