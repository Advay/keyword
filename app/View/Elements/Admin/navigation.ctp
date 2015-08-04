<ul class="sidebar-menu">
		<li class="active" style="height:52px">
			<?php echo($this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', array('plugin' => null, 'controller'=>'users', 'action'=>'dashboard'),array('escape'=>false)));?>
			
		</li>
		
		<li class="treeview">
			<a href="#">
				<i class="fa fa-bar-chart-o"></i>
				<span>View logs</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Sms logs', array('plugin' => null, 'controller'=>'users', 'action'=>'sms_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Call logs', array('plugin' => null, 'controller'=>'users', 'action'=>'call_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Contact logs', array('plugin' => null, 'controller'=>'users', 'action'=>'contact_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Gps logs', array('plugin' => null, 'controller'=>'users', 'action'=>'gps_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Photo logs', array('plugin' => null, 'controller'=>'users', 'action'=>'photo_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Video logs', array('plugin' => null, 'controller'=>'users', 'action'=>'video_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Bookmarks logs', array('plugin' => null, 'controller'=>'users', 'action'=>'bookmark_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Calendar logs', array('plugin' => null, 'controller'=>'users', 'action'=>'calendar_logs'),array('escape'=>false))); ?>
				</li>
				<li>
					<?php echo($this->Html->link('<i class="fa fa-angle-double-right"></i> Website logs', array('plugin' => null, 'controller'=>'users', 'action'=>'website_logs'),array('escape'=>false))); ?>
				</li>
			</ul>
		</li>
		
	</ul>
					
					
