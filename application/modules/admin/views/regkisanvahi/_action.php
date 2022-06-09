    <a style="margin:10px" target="_blank" href="<?php echo base_url();?>admin/Kisanreg/view/<?= ID_encode($row['Kisan_ID'])?>"><i class='fa fa-eye'> </i> </a> 
	<!-- <a style="margin:10px" class="" href="<?php echo base_url();?>admin/Kisanreg/edit/<?= ID_encode($row['Kisan_ID'])?>"><i class="fa fa-edit"></i></a> -->
	<a style="margin:10px" class="" href="<?php echo base_url();?>admin/Kisanreg/delete/<?= ID_encode($row['Kisan_ID'])?>"><i class="fa fa-trash"></i></a>
	

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