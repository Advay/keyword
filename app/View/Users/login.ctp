<div class="container">
<div class="col-lg-12 WelcomeUser">
<h1>Login</h1>
<div class="col-lg-8 DashboardProfile">
<div class="Heading LoginHead">
<h1>Login For Storage Centers (Businesses)</h1>
 <?php 
					 echo $this->Session->flash();
					 echo $this->Session->flash('auth');
				?>
</div>
<p style="text-align:right;">* = required field</p>
<?php echo($this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')))); ?>
<div class="col-xs-offset-3 col-lg-6">
<div class="form-group">
  <label for="textinput" class="control-label">Email address* :</label>  
  
  <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'form-control input-md','placeholder'=>'Enter Your Email address'));?>
</div>
<div class="form-group">
  <label for="textinput" class="control-label">Password*</label>  
 
   <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'form-control input-md','placeholder'=>'Enter Your Password','type'=>'password'));?>
</div>
<div class="Updatebttn">

<input type="image" src="<?php echo Configure::read('App.SiteUrl');?>/images/Login.png">
<div class="row">
<div class="col-lg-5 Forgetpass">
<a href="#">Forget Your Password</a>
</div>
<div class="col-lg-7 accountcreate">
<p>Dont Have Account ?<span><a href="#"> Create A New Account</a></span></p>
</div>
</div>
</div>
</div>
</form>
</div>
<div class="col-lg-4 DashboardMenu1">
<a href="#"><img src="<?php echo Configure::read('App.SiteUrl');?>/images/Banner.png" style="width:100%;"></a>

</div>



</div>
</div>