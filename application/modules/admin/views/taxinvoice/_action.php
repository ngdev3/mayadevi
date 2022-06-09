    <a style="margin:10px" target="_blank" href="<?php echo base_url();?>admin/taxinvoice/GeneratePdf/<?= ID_encode($row['tax_invoice_id'])?>"><i class='fa fa-eye'> </i> </a> 
	<!-- <a style="margin:10px" class="" href="<?php echo base_url();?>admin/invoice/edit/<?= ID_encode($row['account_id'])?>"><i class="fa fa-edit"></i></a> -->
    <?php if(!empty($row['rokadh_jama_id'])){ ?>
	<a style="margin:10px" class="" href="<?php echo base_url();?>admin/taxinvoice/delete/<?= ID_encode($row['tax_invoice_fy_id'])?>"><i class="fa fa-trash"></i></a>
	<?php }?>

<?php
if(@$_GET['status'] == 'delete')
{
$restoreArr = array(
    'table'=>'fs_users',
    'col1'=> 'status',
    'col2'=> 'id',
    'value'=>'active',
    'id'=>ID_decode($row),    
    ); 
$resA = htmlspecialchars(json_encode($restoreArr));
?>

<?php } ?>

<script>
</script>