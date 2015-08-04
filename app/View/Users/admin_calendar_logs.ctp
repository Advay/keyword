 <section class="content-header">
		<h1>
			<div class="total"><?php echo $this->element('Admin/admin_total', array("paging_model_name"=>"Calendarlog", "total_title"=>"Calendar")); ?>	</div>
		</h1>
		
					
			
				
</section>
<div style="float:right;width:300px">
	<?php echo $this->element('Admin/device_select'); ?>
</div>
				<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <form id="delete_all_from" accept-charset="utf-8" method="post" action="<?php echo Configure::read('App.SiteUrl')?>/admin/users/delete_all">
								
                                <div class="box-body table-responsive">
									<table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
										<tr>
											<th width="5%">
												<input type="checkbox" id="selecctall"/>
											</th>
											<th  >
												Title 
											</th>
											<th >
												Description
											</th>
											<th >
												Location
											</th>
											<th >
												Start time
											</th>
											<th >
												End time
											</th>
											<th >
												Date
											</th>
										</tr>
										<?php
											foreach($data as $value){
										?>
										<tr>
											<td>
												 <?php echo $this->Form->input('Calendarlog.id'.$value['Calendarlog']['id'],array('div'=>false,'label'=>false,'class'=>'checkbox1','type'=>'checkbox','value'=>$value['Calendarlog']['id']));?>
												<input type="hidden" name="data[model]" value="Calendarlog">
					 
											</td>
											<td>
												<?php echo $value['Calendarlog']['TITLE']?>
											</td>
											<td>
												<?php echo $value['Calendarlog']['DESCRIPTION']?>
											</td>
											<td>
												<?php echo $value['Calendarlog']['LOCATION']?>
											</td>
											<td>
												<?php echo $value['Calendarlog']['STARTTIME']?>
											</td>
											<td>
												<?php echo $value['Calendarlog']['ENDTIME']?>
											</td>
											<td>
												<?php echo $value['Calendarlog']['DATETIME']?>
											</td>
											
										</tr>	
										<?php	
											}
										?>
										
									</table>
								</div>
								<div class="box-body table-responsive">
									<?php
										echo $this->Html->link('Delete','javascript:void(0)',array('escape'=>false,'class'=>'btn btn-danger','onclick'=>"delete_all()"));
									?>
								</div>
								</form>
                            </div><!-- /.box -->
                            
                           
                        </div>
                    </div>
				<?php echo $this->element('Admin/admin_paging', array("paging_model_name"=>"Calendarlog", "total_title"=>"Calendars")); ?>
                </section>	