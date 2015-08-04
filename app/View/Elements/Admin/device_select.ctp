<?php
	$action	=	str_replace('admin_','',$this->request->params['action']);
	if(!isset($device_id)){
		$device_id = '';
	}
?>
<label>Please select your Device<select onchange="changeDevice(this.value,'<?php echo $action?>')">
				<option value="">All Devices</option>
			<?php
				foreach($user_devices as $devices){
					$select = '';
					if($devices['Device']['id'] == $device_id){
						$select = 'selected';
					}
				?>
					<option <?php echo $select;?> value="<?php echo $devices['Device']['id']?>"><?php echo $devices['Device']['modal_name']?></option>
				<?php
				}
			?>
		</select>
</label>