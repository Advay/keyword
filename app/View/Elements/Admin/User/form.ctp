<?php

$loginUserData	=	$this->General->getUserInfo($this->Session->read('Auth.User.id'));

?>
 
				<div class="box-body">
				
				  
				  
				 
				  <div class="form-group ">
					  <label> Email </label>   
					  <div> 
					  <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  </div>
				  </div>
				  <div class="form-group ">
					  <label> First Name </label>   
					  <div> 
					  <?php echo $this->Form->input('first_name',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  </div>
				  </div>
				  <div class="form-group ">
					  <label> Last Name </label>   
					  <div> 
					  <?php echo $this->Form->input('last_name',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  </div>
				  </div>
				  
				  
				  
				  <div class="form-group ">
					  <label> Phone</label>   
					  <div> 
					  <?php echo $this->Form->input('phone',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  </div>
				  </div>
				    
				<div class="form-group ">
					  <label> Password</label>   
					  <div> 
					  <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
					  </div>
				  </div>	
				 
										
										
				</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
					</div>
			