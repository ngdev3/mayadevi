<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <h4 class="c-grey-900 mT-10 mB-30">View List</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                <a href="<?=base_url()?>admin/account_name/listing" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                <?php //pr($users); die;?>
                                    <!--<h4 class="c-grey-900 mB-20">Simple Table</h4>-->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_bg" scope="col">AccountID</th>
                                                <th scope="col"><?php echo ucfirst($users->account_id);?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th  class="table_bg" scope="row">Account Name</th>
                                                <td><?php echo $users->name;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="row">Challan No</th>
                                                <td><?php echo $users->contact_person_name;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="row">Bill No</th>
                                                <td><?php echo $users->state_code;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="row">Product Quantity </th>
                                                <td><?php echo ($users->email_id);?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="table_bg" scope="row">Purchaser Rate</th>
                                                <td><?php echo $users->purchaser_account_no;?></td>
                                            </tr>
											<tr>
                                                <th class="table_bg" scope="row">Purchaser Amount</th>
                                                <td><?php echo $users->bank_name;?></td>
                                            </tr>
											<tr>
                                                <th class="table_bg" scope="row">Seller Rate </th>
                                                <td><?php echo $users->ifsc_code;?></td>
                                            </tr>
											<tr>
                                                <th class="table_bg" scope="row">Seller Amount</th>
                                                <td><?php echo $users->purchaser_address;?></td>
                                            </tr>
											<tr>
                                                <th class="table_bg" scope="row">Purchaser Amount</th>
                                                <td><?php echo $users->purchaser_gst_no;?></td>
                                            </tr>
                                            <tr>
											    <th class="table_bg" scope="row">Status</th>
                                                <td><?php echo $users->status;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
			