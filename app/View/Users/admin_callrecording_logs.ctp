 <section class="content-header">
		<h1>
			<div class="total"><?php echo $this->element('Admin/admin_total', array("paging_model_name"=>"Callrecordinglog", "total_title"=>"Callrecording")); ?>	</div>
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
											<th  >
												Date 
											</th>
											<th>
												File
											</th>
											<th>
												Number
											</th>
											<th>
												Direction
											</th>
											<th>
												Duration
											</th>
											
											
										</tr>
										<?php
											foreach($data as $value){
										?>
										<tr>
											<td>
												<?php echo $value['Callrecordinglog']['DATETIME']?>
											</td>
											<td>
												<a href="<?php echo Configure::read('App.Siteurl')?>/uploads/<?php echo $value['Callrecordinglog']['file']?>" target="_blank">
													<?php echo $value['Callrecordinglog']['file']?>
												</a>
											</td>
											<td>
												<?php echo $value['Callrecordinglog']['number']?>
											</td>
											<td>
												<?php echo $value['Callrecordinglog']['direction']?>
											</td>
											<td>
												<?php echo $value['Callrecordinglog']['duration']?>
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
				<?php echo $this->element('Admin/admin_paging', array("paging_model_name"=>"Callrecordinglog", "total_title"=>"Users")); ?>
                </section>	