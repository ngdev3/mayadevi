
<div id="msgShow"></div>
 <main class="main-content bgc-grey-100">
	<div id="mainContent">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="bgc-white bd bdrs-3 p-20 mB-20">
					<?=get_flashdata();?>
						<div class="gap-10 peers">
							<div class="peer">
							<table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_bg" scope="col">Todays Renewable</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if(!empty($users)){?>
											<?php foreach($users as $x => $y){?>
												<tr>
													<th  class="table_bg" scope="row"><?php echo ($y->first_name.' '.$y->last_name); ?></th>
													<td><?php echo '<button><a href="./renewablebyId/'.ID_encode($y->approval_id) .'">Reneweable</a></button>'; ?></td>
												</tr>
											<?php }} ?>
                                        </tbody>
                                    </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

                                    