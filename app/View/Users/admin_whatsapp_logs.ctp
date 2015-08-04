
 <section class="content-header">
		<h1>
			<div class="total"><?php echo $this->element('Admin/admin_total', array("paging_model_name"=>"Whatsapplog", "total_title"=>"Whatsapp")); ?>	</div>
		</h1>
		
					
			
				
</section>
<div style="float:right;width:300px">
	<?php echo $this->element('Admin/device_select'); ?>
</div>
				<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                
                                <div class="box-body table-responsive">
									<table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
										<tr>
											<th  width="22%">
												Date 
											</th>
											<th width="40%">
												Content
											</th>
											<th width="18%">
												Sender
											</th>
											<th width="13%">	
												Receiver
											</th>
											<th >
												Direction
											</th>
										</tr>
										<?php
											foreach($data as $value){
										?>
										<tr>
											<td>
												<?php echo $value['Whatsapplog']['DATETIME']?>
											</td>
											<td>
												<?php echo urldecode($value['Whatsapplog']['Content'])?>
											</td>
											<td>
												<?php echo $value['Whatsapplog']['From']?>
											</td>
											<td>
												<?php echo $value['Whatsapplog']['To']?>
											</td>
											<td>
												<?php if($value['Whatsapplog']['Direction'] == 1){
													echo "Incoming";
												}else{
													echo "Outgoing";
												}?>
											</td>
											
										</tr>	
										<?php	
											}
										?>
										
									</table>
								</div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                           
                        </div>
                    </div>
				<?php echo $this->element('Admin/admin_paging', array("paging_model_name"=>"Whatsapplog", "total_title"=>"Users")); ?>
                </section>	