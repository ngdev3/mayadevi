<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
 </head>
 <body>

   <?php 
   // Message
   if(isset($response)){
     echo $response;
   }
   ?>
   <h1>Upload Custom CSV Formate</h1>

   <form method='post' action='' enctype="multipart/form-data">
    <select name="centerType" id="" required>
    <option value="">Select Center</option>
    <?php if(!empty($center_list)){ foreach($center_list as $x => $y){?>
    <option value="<?php echo $y->center_id; ?>" ><?php echo $y->name; ?></option>
    <?php }};?>
    </select>
     <input type='file' name='file' >
     <input type='submit' value='Upload' name='upload'>
    </form>
    
    <button type="button" value="">
    <a href="<?= base_url() ?>admin/dashboard">Dasboard</a>
    </button>
  </body>
</html>