<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <h4 class="c-grey-900 mT-10 mB-30">View List</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                <a href="<?=base_url()?>admin/KisanReg" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>

                                    <!--<h4 class="c-grey-900 mB-20">Simple Table</h4>-->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_bg" scope="col">Farmer ID</th>
                                                <th scope="col"><?php echo ucfirst($users->Farmer_ID);?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th  class="table_bg" scope="row">Farmer Name</th>
                                                <td><?php echo $users->Farmer_name;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="row">Quantity</th>
                                                <td><?php echo $users->Quantity;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="row">Aadhar Card</th>
                                                <td><?php echo $users->aadhar_card;?></td>
                                            </tr>

                                         
                                            <tr>
                                                <th class="table_bg" scope="row">Reg Date</th>
                                                <td><?php echo ($users->reg_date);?></td>
                                            </tr>
                                            <tr>
                                            
                                            <tr>
                                                <th class="table_bg" scope="row">Date Of Birth</th>
                                                <td><?php echo $users->dob;?></td>
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
			