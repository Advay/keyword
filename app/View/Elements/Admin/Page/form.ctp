<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

				<div class="box-body"> 
				   
				  <div class="form-group ">
					  <label> Page Title </label>   
					  <div> 
					  <?php echo $this->Form->input('title',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  
					  
					  </div>
				  </div>
				   <div class="form-group ">
					  <label> Page Description </label>   
					  <div> 
					  <?php echo $this->Form->input('description',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'textarea'));?>
					  
					  
					  </div>
				  </div>
				 
				  
				  
				 <div class="form-group ">
					  <label> Status</label>   
					  <div> 
					  <?php echo $this->Form->input('status',array('div'=>false,'label'=>false,'class'=>'form-control','options'=>array(1=>'Yes',0=>'No')));?>
					  </div>
				   </div>
				  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				  
				 
