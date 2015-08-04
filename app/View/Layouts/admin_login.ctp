<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="bg-black">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('admin/css/bootstrap.min','admin/css/font-awesome.min','admin/css/AdminLTE','admin/css/admin'));
		
		
	?>
</head>
 <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Admin login</div>
            <?php 
				 echo $this->Session->flash();
				 echo $this->Session->flash('auth');
			?>
			<?php echo $content_for_layout;?>
            
        </div>

     
		<?php
		echo $this->Html->script(array('admin/jquery.min','admin/bootstrap.min'));
				
		?>
    </body>

</html>