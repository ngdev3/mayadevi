<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>

<?php echo get_flashdata(); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<?php
$QUERY_STRING = $_SERVER['QUERY_STRING'];

?>

<div id="msgShow"></div>
 <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                <?=get_flashdata();?>
                                    <div class="gap-10 peers"><div class="peer">
                                    
									<h4 class="c-grey-900 mB-20 pull-left"> List </h4>
                                    
									<a href="<?php echo base_url('admin/Kisanreg/add');?>" id="back-btn" class="btn cur-p btn-primary pull-right">ADD</a>
                                    
                                    </div>
                                   
                                    <form method="get"  id="filter_id" class="pull-right" >
                                    <select class="form-control custom_filter " name="status"  >
                                        <option value="none"> All </option>                                                                                                
                                        <option value="Unverified" <?php echo @$_GET['status'] == 'Unverified' ? "selected" : ""; ?>> Unverified  </option>                                                                                                
                                        <option value="Verified" <?php echo @$_GET['status'] == 'Verified' ? "selected" : ""; ?>> Verified  </option> 
                                        <option value="Mapped" <?php echo @$_GET['status'] == 'Mapped' ? "selected" : ""; ?>> Mapped   </option>                                                                                                
                                    </select>
                                </form>

                                    </div>
                                   
                    <table class="table table-striped table-bordered"  id="employee-grid-buyer">
                        <thead>

                             <tr>
                            <!-- <th width="1%"> </th>                                -->
                            <th>S.No.</th>
                            <th>Farmer Id</th>
                            <th>Farmer Name</th>
                            <th>Quantity</th>
                            <th>Left Quantity</th>
                            <th>Center Name</th>
                            <th>Status</th>
                            <th>Account Name</th>
                            <th>Aadhar Card</th>
                            <th>Nominee Name</th>
                            <th>Action</th>
                            </tr>
                        
                        </thead>
                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
			
       
                    
<script type="text/javascript" src="<?= base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script src="<?= base_url(); ?>assets/admin/pages/scripts/table-managed.js"></script>


<script>


    //  



    $(document).on('click', '.group-checkable', function () {
        if ($(this).is(':checked')) {
            $('.checkboxes').prop('checked', true);
            $('.checkboxes').parent().addClass("checked");
        } else {
            $('.checkboxes').prop('checked', false);
            $('.checkboxes').parent().removeClass("checked");
        }
    })

    var table = $('#employee-grid-buyer');
    // begin first table
    // begin first table
    table.dataTable({
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n     
        "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
        "processing": true,
        "serverSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'csv'
        ],
        "columns": [{
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            }
            ],
        "lengthMenu": [
                [25, 35, -1],
                [25, 35,"All"],
 // change per page values here
            ],
                "iDisplayLength": 25,
        // set the initial value
        "pageLength": 35,
        "pagingType": "bootstrap_full_number",
        "language": {"search": "My search: ", "lengthMenu": "_MENU_ Records", "paginate": {"previous": "Prev", "next": "Next", "last": "Last", "first": "First"}},
        "columnDefs": [{'className': 'control', 'orderable': false, 'targets': 0},
            {'orderable': false, 'targets': [-1]},
            {"targets": [0], "orderable": false, "searchable": false},
            {"targets": [1], "orderable": true, "searchable": true},
            {"targets": [2], "orderable": false, "searchable": false},
            {"targets": [3], "orderable": false, "searchable": false},
            {"targets": [4], "orderable": false, "searchable": false},
            {"targets": [5], "orderable": false, "searchable": false},
            {"targets": [6], "orderable": false, "searchable": false},
            {"targets": [7], "orderable": false, "searchable": false},
            {"targets": [8], "orderable": false, "searchable": false},
            {"targets": [9], "orderable": false, "searchable": false},
            {"targets": [10], "orderable": false, "searchable": false},
        ],
        "ajax": {
            url: "<?php echo base_url(); ?>admin/kisanreg/view_all?<?php echo $QUERY_STRING; ?>", // json datasource
            type: "post",

            error: function (data) {
                $("#employee-grid_processing").css("display", "none");
            }
            
        },

        "columnDefs": [ {

"targets": [], // column or columns numbers

"orderable": false,  // set orderable for selected columns

}],
		
        "order": [] // set first column as a default sort by desc// set first column as a default sort by desc
    });

    $(document).ready(function() {  
        setTimeout(function(){
		    TableManaged.init();
		    $(".form-group-custom").removeClass('hide');
        },1000);
	});

     $(".custom_filter").on("change",function(){ 
        var status = $(this).val();
        if(status == 'none')
        {
           window.location.href= "<?php echo base_url('admin/kisanreg/listing'); ?>" ;
        }
        else{$("#filter_id").submit();}
         
    });
</script> 		