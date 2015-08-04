 <section class="content-header">
		<h1>
			<div class="total"><?php echo $this->element('Admin/admin_total', array("paging_model_name"=>"Bookmarklog", "total_title"=>"Bookmark")); ?>	</div>
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
												Url
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
												 <?php echo $this->Form->input('Bookmarklog.id'.$value['Bookmarklog']['id'],array('div'=>false,'label'=>false,'class'=>'checkbox1','type'=>'checkbox','value'=>$value['Bookmarklog']['id']));?>
												<input type="hidden" name="data[model]" value="Bookmarklog">
					 
											</td>
											<td>
												<?php echo $value['Bookmarklog']['TITLE']?>
											</td>
											<td>
												<?php echo $value['Bookmarklog']['URL']?>
											</td>
											<td>
												<?php echo $value['Bookmarklog']['DATETIME']?>
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
				<?php echo $this->element('Admin/admin_paging', array("paging_model_name"=>"Bookmarklog", "total_title"=>"Bookmarks")); ?>
                </section>	