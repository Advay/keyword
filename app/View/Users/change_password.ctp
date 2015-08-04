<div class="container">
<div class="col-lg-12 WelcomeUser">
<h1>Welcome <?php echo $user_data['User']['first_name'].' '.$user_data['User']['last_name']?></h1>
<div class="col-lg-3 DashboardMenu">

<?php echo $this->element('left_navigation');?>
</div>

<div class="col-lg-9 DashboardProfile">
      <div class="Heading">
      	<h1>Change Password</h1>
		<?php echo $this->Session->flash();?>  
      </div>
          
      
	 <?php echo($this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'change_password')))); ?>
        <div class="col-xs-offset-3 col-lg-6">
          <div class="form-group">
            <label for="cur_pass" class="control-label">Current Password* :</label>
            
			<?php echo $this->Form->input('oldpassword',array('div'=>false,'label'=>false,'class'=>'form-control input-md','type'=>'password'));?>
          </div>
          <div class="form-group">
            <label for="new_pass" class="control-label">New Password* :</label>
           
			<?php echo $this->Form->input('password2',array('div'=>false,'label'=>false,'class'=>'form-control input-md','type'=>'password'));?>
          </div>
          <div class="form-group">
            <label for="c_pass" class="control-label">Re-enter Password* :</label>
          
			<?php echo $this->Form->input('password3',array('div'=>false,'label'=>false,'class'=>'form-control input-md','type'=>'password'));?>
          </div>
        </div>
        <div class="Updatebttn"> <input type="submit" value="Update" class="button update_bttn newbt" name="form-submit"> </div>
        <input type="hidden" value="true" name="submitted">
      </form>
    </div>

</div>
</div>