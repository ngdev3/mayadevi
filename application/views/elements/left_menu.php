
		<?php
$uri1 = @uri_segment(1);
$uri2 = @uri_segment(2);
$uri3 = @uri_segment(3);

if(!empty($_SESSION['user_type'])){
	if($_SESSION['user_type'] == 1){
		
?>
<ul class="sidebar-menu scrollable pos-r">
<?php if(get_logical_data()->status){?>
<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'account_name'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">खाता नाम</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account_name'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/account_name/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account_name'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/account_name/add')?>">जोड़ें</a></li>
		</ul>
	</li>

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'driver_module'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">FCI ड्राइवर </span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'driver_module'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/driver_module/listing')?>">ड्राइवर लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'driver_module'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/driver_module/add')?>">ड्राइवर जोड़ें</a></li>
		</ul>
	</li>


	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'truck_module'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">FCI गाड़ी </span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'truck_module'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/truck_module/listing')?>">गाड़ी लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'truck_module'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/truck_module/add')?>">गाड़ी जोड़ें</a></li>
		</ul>
</li>

	<?php }?>
<li class="nav-item mT-30 hide"><a class="sidebar-link" href="<?= base_url('admin/dashboard')?>" default><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
	<li class="nav-item dropdown hide <?php if($uri1 == 'master'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Masters</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'state'){echo 'btn_active';} ?>" href="<?= base_url('master/state')?>">State Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'city'){echo 'btn_active';} ?>" href="<?= base_url('master/city')?>">City Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'quality'){echo 'btn_active';} ?>" href="<?= base_url('master/quality')?>">Quality Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'purchaser'){echo 'btn_active';} ?>" href="<?= base_url('master/purchaser')?>">Purchaser Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'site'){echo 'btn_active';} ?>" href="<?= base_url('master/site')?>">Site Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'seller'){echo 'btn_active';} ?>" href="<?= base_url('master/seller')?>">Seller Master</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'reason'){echo 'btn_active';} ?>" href="<?= base_url('master/reason')?>">Account Reason</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'master' && $uri2 == 'tax'){echo 'btn_active';} ?>" href="<?= base_url('master/tax')?>">Tax Setting</a></li>
		
		</ul>
	</li>
	<?php if(get_logical_data()->status){?>

	<li class="nav-item dropdown <?php if($uri1 == 'admin' && $uri2 == 'account'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">खर्च & जमा</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account'&& $uri3 == 'deposite'){echo 'btn_active';} ?>" href="<?= base_url('admin/account/deposite')?>">नाम</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account'&& $uri3 == 'expenditure'){echo 'btn_active';} ?>" href="<?= base_url('admin/account/expenditure')?>">जमा</a></li>
		
		</ul>
	</li>
	<li class="nav-item dropdown <?php if($uri1 == 'admin' && $uri2 == 'billing'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">बाजार खरीद</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'billing'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/billing/add')?>">बाजार खरीद पर्चा</a></li>
		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'billing'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/billing/listing')?>">List Billing</a></li> -->
		
		</ul>
	</li>
	<?php }?>

	</li>
	<li class="nav-item dropdown <?php if($uri1 == 'admin' && $uri2 == 'report'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">रिपोर्ट</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'search'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/search')?>">खाता नाम</a></li>
		<?php if(get_logical_data()->status){?>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'byaccount_name'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/byaccount_name')?>">खाता नाम सूची</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'rokad_parcha'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/rokad_parcha')?>">रोकड़ पर्चा</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'kishanVahi_parcha'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/kishanVahi_parcha')?>">किसान वही पर्चा</a></li>
		<?php } ?>
		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'searchbycondition'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/searchbycondition')?>">Search By Condition</a></li> -->
		
		</ul>
	</li>
	
	<?php if(get_logical_data()->status){?>
	<ul class="sidebar-menu scrollable pos-r">
	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">मैपिंग किसान बही</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'&& $uri3 == 'account_mapping'){echo 'btn_active';} ?>" href="<?= base_url('admin/accountMapping/account_mapping')?>">किसान खाता नक्शा</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'&& $uri3 == 'add_Kisan_Vahi'){echo 'btn_active';} ?>" href="<?= base_url('admin/accountMapping/add_Kisan_Vahi')?>">ऐड किसान वही</a></li>
		</ul>
	</li>
		<?php }?>
	

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'invoice'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">बिल ऑॅफ सप्लाई</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'invoice'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/invoice/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'invoice'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/invoice/add')?>">जोड़ें</a></li>
		</ul>
	</li>

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">टैक्स इनवॉइस</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/taxinvoice/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/taxinvoice/add')?>">जोड़ें</a></li>
		</ul>
	</li>
	
	<?php if(get_logical_data()->status){?>
	
	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-pencil-alt"></i> </span><span class="title">किसान वाही पंजीकरण</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/Kisanreg/listing')?>">किसान वाही लिस्टिंग</a></li>
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/Kisanreg/add')?>">किसान वाही जोड़ें</a></li>
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/Kisanreg/add')?>">किसान वाही रिपोर्ट</a></li>
		</ul>
	</li>

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'lot_system'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-pencil-alt"></i> </span><span class="title">लॉट सिस्टम( Lot System )</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'lot_system'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/lot_system/listing')?>">लॉट सिस्टम लिस्टिंग</a></li>
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'lot_system'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/lot_system/add')?>">लॉट सिस्टम जोड़ें</a></li>
		</ul>
	</li>

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'paddy_lot_system'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-pencil-alt"></i> </span><span class="title">धान प्रेषण सिस्टम</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'paddy_lot_system'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/paddy_lot_system/listing')?>">धान लॉट सिस्टम लिस्टिंग</a></li>
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'paddy_lot_system'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/paddy_lot_system/add')?>"> धान लॉट सिस्टम जोड़ें</a></li>
		</ul>
	</li>
	<?php }?>

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'setting'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-settings"></i> </span><span class="title">सेटिंग</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'setting'&& $uri3 == 'change_fy'){echo 'btn_active';} ?>" href="<?= base_url('admin/setting/change_fy')?>">वित्तीय वर्ष बदलें</a></li>
		</ul>
	</li>

	</ul>

	

	
	
	
	
</ul>



<?php
	}
}
?>
<?php

if(!empty($_SESSION['user_type'])){
	
	if($_SESSION['user_type'] == 3){
		
?>
<ul class="sidebar-menu scrollable pos-r">
	

<?php if(get_logical_data()->status){?>
	

<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'account_name'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">खाता नाम</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account_name'&& $uri3 == 'account_mapping'){echo 'btn_active';} ?>" href="<?= base_url('admin/account_name/Add')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account_name'&& $uri3 == 'add_Kisan_Vahi'){echo 'btn_active';} ?>" href="<?= base_url('admin/account_name/listing')?>">जोड़ें</a></li>
		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account_name'&& $uri3 == 'account_mapping'){echo 'btn_active';} ?>" href="<?= base_url('admin/accountMapping/')?>">किसान खाता नक्शा</a></li> -->
		</ul>
	</li>
	<li class="nav-item dropdown <?php if($uri1 == 'admin' && $uri2 == 'account'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">खर्च & जमा</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account'&& $uri3 == 'deposite'){echo 'btn_active';} ?>" href="<?= base_url('admin/account/deposite')?>">नाम</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'account'&& $uri3 == 'expenditure'){echo 'btn_active';} ?>" href="<?= base_url('admin/account/expenditure')?>">जमा</a></li>
		
		</ul>
	</li>

<?php } ?>

<li class="nav-item dropdown <?php if($uri1 == 'admin' && $uri2 == 'report'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">रिपोर्ट</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'search'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/search')?>">खाता नाम</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'kishanVahi_parcha'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/kishanVahi_parcha')?>">किसान वही पर्चा</a></li>

		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'byaccount_name'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/byaccount_name')?>">खाता नाम सूची</a></li> -->
		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'rokad_parcha'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/rokad_parcha')?>">रोकड़ पर्चा</a></li> -->
		<!-- <li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'report'&& $uri3 == 'searchbycondition'){echo 'btn_active';} ?>" href="<?= base_url('admin/report/searchbycondition')?>">शर्त के आधार पर खोजें	</a></li> -->
		
		</ul>
	</li>
	
	<?php if(get_logical_data()->status){?>
		

	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">मैपिंग किसान बही</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'&& $uri3 == 'add_Kisan_Vahi'){echo 'btn_active';} ?>" href="<?= base_url('admin/accountMapping/add_Kisan_Vahi')?>">ऐड किसान वही</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'accountMapping'&& $uri3 == 'account_mapping'){echo 'btn_active';} ?>" href="<?= base_url('admin/accountMapping/account_mapping')?>">किसान खाता नक्शा</a></li>
		</ul>
	</li>
<?php } ?>
	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'invoice'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">बिल ऑॅफ सप्लाई</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'invoice'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/invoice/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'invoice'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/invoice/add')?>">जोड़ें</a></li>
		</ul>
	</li>

	
	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">टैक्स इनवॉइस</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/taxinvoice/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'taxinvoice'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/taxinvoice/add')?>">जोड़ें</a></li>
		</ul>
	</li>

	
	<?php if(get_logical_data()->status){?>
	
	<li class="nav-item dropdown  <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'){echo 'open';} ?>">
		<a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Farmer Reg</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
		<ul class="dropdown-menu">
			<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'&& $uri3 == 'listing'){echo 'btn_active';} ?>" href="<?= base_url('admin/Kisanreg/listing')?>">लिस्टिंग</a></li>
		<li><a class="sidebar-link <?php if($uri1 == 'admin' && $uri2 == 'Kisanreg'&& $uri3 == 'add'){echo 'btn_active';} ?>" href="<?= base_url('admin/Kisanreg/add')?>">जोड़ें</a></li>
		</ul>
	</li>
	<?php }?>
</ul>
<?php
	}
}
?>
