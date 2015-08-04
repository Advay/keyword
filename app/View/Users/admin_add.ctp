<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo($title_for_layout);?></h3>
				</div><!-- /.box-header -->
				<?php
					  echo($this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'add'),'type'=>'file')));
					  echo($this->Form->hidden('token_key', array('value' => $this->params['_Token']['key'])));
				?>     
				<?php echo($this->element('Admin/User/form'));?>
				<?php echo($this->Form->end()); ?>
				
			</div>
		</div>
	</div>  
</section>
				




