<?php

if ($this->owner->name == 'panel') {
	$out['CONTROLPANEL'] = 1;
}

global $session;
$out['PARENT_TITLE'] =  $parent_title;
$out['PARENT_ID'] =  $parent_id;

$table_name = 'okbit_devices';

$rec = SQLSelectOne("SELECT * FROM $table_name WHERE ID='$id'");



if ($this->mode == 'update') {

	$this->getConfig();
	$ok = 1;
	
	if ($this->tab == '') {

		global $title;
		$rec['TITLE'] = $title;


	$table_name_t = 'okbit_gate';
	$rec2 = SQLSelectOne("SELECT * FROM $table_name_t WHERE ID='$parent_id'");
	if ($rec2['SUB_ID'] == ''){
		$rec['SUB_ID'] = 0;
	}
	else $rec['SUB_ID'] = $rec2['SUB_ID'];


/*
		global $sub_id;
		$rec['SUB_ID'] = $sub_id;
		if ($rec['SUB_ID'] == '') {
			$rec['SUB_ID'] = 99;
		}
		
*/
		
		global $device_id;
		$rec['DEVICE_ID'] = $device_id;
		if ($rec['DEVICE_ID'] == '') {
			$out['ERR_DEVICE_ID'] = 1;
			$ok = 0;
		}
				
		$rec['PARENT_ID'] = $out['PARENT_ID'];
		
		global $device;			
		if ($device != $rec['DEVICE']) {
			$temp_sql = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID='$id'  AND ETHERNET='0'");
			if ($temp_sql)SQLExec("DELETE FROM `okbit_data`  WHERE DEVICE_ID='$id'  AND ETHERNET='0'");
		}			
		$rec['DEVICE'] = $device;
		if ($rec['DEVICE'] == '') {
			$out['ERR_DEVICE'] = 1;
			$ok = 0;
		}
		
		$in_out = '';
		
		if ($rec['DEVICE'] =='6001'){
			$in_out = explode(',',DATA_6001);
		}
	
		else if ($rec['DEVICE'] =='6002'){
			$in_out = explode(',',DATA_6002);
		}
		
		else if ($rec['DEVICE'] =='6003'){
			$in_out = explode(',',DATA_6003);
		}
		
		else if ($rec['DEVICE'] =='6004'){
			$in_out = explode(',',DATA_6004);
		}
		
		else if ($rec['DEVICE'] =='6005'){
			$in_out = explode(',',DATA_6005);
		}
		
		else if ($rec['DEVICE'] =='6006'){
			$in_out = explode(',',DATA_6006);
		}
		
		if ($rec['DEVICE'] =='8001'){
			$in_out = explode(',',DATA_8001);
		}
	
		else if ($rec['DEVICE'] =='8002'){
			$in_out = explode(',',DATA_8002);
		}
		
		else if ($rec['DEVICE'] =='8003'){
			$in_out = explode(',',DATA_8003);
		}
		
		else if ($rec['DEVICE'] =='8004'){
			$in_out = explode(',',DATA_8004);
		}
		
		else if ($rec['DEVICE'] =='8005'){
			$in_out = explode(',',DATA_8005);
		}
		
		else if ($rec['DEVICE'] =='8006'){
			$in_out = explode(',',DATA_8006);
		}
		
		if ($rec['DEVICE'] =='8007'){
			$in_out = explode(',',DATA_8007);
		}
	
		else if ($rec['DEVICE'] =='8008'){
			$in_out = explode(',',DATA_8008);
		}
		
		else if ($rec['DEVICE'] =='8009'){
			$in_out = explode(',',DATA_8009);
		}
		
		else if ($rec['DEVICE'] =='8010'){
			$in_out = explode(',',DATA_8010);
		}
		
		else if ($rec['DEVICE'] =='8011'){
			$in_out = explode(',',DATA_8011);
		}
		
		else if ($rec['DEVICE'] =='8012'){
			$in_out = explode(',',DATA_8012);
		}
		
		if ($rec['DEVICE'] =='8013'){
			$in_out = explode(',',DATA_8013);
		}
	
		else if ($rec['DEVICE'] =='8014'){
			$in_out = explode(',',DATA_8014);
		}
		
		else if ($rec['DEVICE'] =='8015'){
			$in_out = explode(',',DATA_8015);
		}
		
		else if ($rec['DEVICE'] =='8016'){
			$in_out = explode(',',DATA_8016);
		}
		
		else if ($rec['DEVICE'] =='8017'){
			$in_out = explode(',',DATA_8017);
		}
		
		else if ($rec['DEVICE'] =='8018'){
			$in_out = explode(',',DATA_8018);
		}
		
		if ($rec['DEVICE'] =='8019'){
			$in_out = explode(',',DATA_8019);
		}
	
		else if ($rec['DEVICE'] =='8020'){
			$in_out = explode(',',DATA_8020);
		}
		
		else if ($rec['DEVICE'] =='8021'){
			$in_out = explode(',',DATA_8021);
		}
		
		else if ($rec['DEVICE'] =='8022'){
			$in_out = explode(',',DATA_8022);
		}
		
		else if ($rec['DEVICE'] =='8023'){
			$in_out = explode(',',DATA_8023);
		}
		
		else if ($rec['DEVICE'] =='8024'){
			$in_out = explode(',',DATA_8024);
		}
		
		if ($rec['DEVICE'] =='8025'){
			$in_out = explode(',',DATA_8025);
		}
	
		else if ($rec['DEVICE'] =='8026'){
			$in_out = explode(',',DATA_8026);
		}
		
		else if ($rec['DEVICE'] =='8027'){
			$in_out = explode(',',DATA_8027);
		}
		
		else if ($rec['DEVICE'] =='8028'){
			$in_out = explode(',',DATA_8028);
		}
		
		else if ($rec['DEVICE'] =='8029'){
			$in_out = explode(',',DATA_8029);
		}
		
		else if ($rec['DEVICE'] =='8030'){
			$in_out = explode(',',DATA_8030);
		}
		
		if ($rec['DEVICE'] =='8031'){
			$in_out = explode(',',DATA_8031);
		}
	
		else if ($rec['DEVICE'] =='8032'){
			$in_out = explode(',',DATA_8032);
		}
		
		else if ($rec['DEVICE'] =='8033'){
			$in_out = explode(',',DATA_8033);
		}
		
		else if ($rec['DEVICE'] =='8034'){
			$in_out = explode(',',DATA_8034);
		}
		
		else if ($rec['DEVICE'] =='8035'){
			$in_out = explode(',',DATA_8035);
		}
		
		else if ($rec['DEVICE'] =='8036'){
			$in_out = explode(',',DATA_8036);
		}
		
		if ($rec['DEVICE'] =='8037'){
			$in_out = explode(',',DATA_8037);
		}
	
		else if ($rec['DEVICE'] =='8038'){
			$in_out = explode(',',DATA_8038);
		}
		
		else if ($rec['DEVICE'] =='8039'){
			$in_out = explode(',',DATA_8039);
		}
		
		else if ($rec['DEVICE'] =='8040'){
			$in_out = explode(',',DATA_8040);
		}
		
				
	}

	if ($ok) {
		if ($rec['ID']) {
			if ($this->config['API_LOG_DEBMES']) DebMes('Save params for device ' . $rec['DEVICE'] . ' with Sub_id - ' . $rec['SUB_ID'] . ' with ID- ' . $rec['DEVICE_ID']. 'PARENT_ID- ' . $rec['PARENT_ID'] .PHP_EOL, 'okbit');
			SQLUpdate($table_name, $rec);
		} else {
			if ($this->config['API_LOG_DEBMES']) DebMes('Manual add new device ' . $rec['DEVICE'] . ' with Sub_id - ' . $rec['SUB_ID'] . ' with ID- ' . $rec['DEVICE_ID']. ' PARENT_ID- ' . $rec['PARENT_ID'] .PHP_EOL, 'okbit');
			$rec['ID'] = SQLInsert($table_name, $rec);
		}
		
		$out['OK'] = 1;
		
		if ($this->tab == '' && $in_out != '') {
			foreach($in_out as $cmd) {
				$cmd_rec = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID=" . $rec['ID'] . " AND TITLE = '" . $cmd . "' AND ETHERNET='0'");
				if (!$cmd_rec['ID']) {
					$cmd_rec = array();
					$cmd_rec['TITLE'] = $cmd;
					$cmd_rec['ETHERNET'] = 0;
					$cmd_rec['DEVICE_ID'] = $rec['ID'];
					SQLInsert('okbit_data', $cmd_rec);
				}
			}			
		}

		
	} else {
		$out['ERR'] = 1;
	}
}


if ($this->tab == 'data') {

	$new_id = 0;
	global $delete_id;
	
	if ($delete_id) {
		SQLExec("DELETE FROM `okbit_data`  WHERE ID='" . (int)$delete_id . "'");
	}
	

	$properties = SQLSelect("SELECT * FROM `okbit_data` WHERE DEVICE_ID='" . $rec['ID'] . "'  AND ETHERNET='0' ORDER BY ID");

	
	$total = count($properties);
	
	for($i = 0; $i < $total; $i++) {
		if ($properties[$i]['ID'] == $new_id) continue;
		
		if ($this->mode == 'update') {
			
			global ${'linked_object'.$properties[$i]['ID']};
			$properties[$i]['LINKED_OBJECT'] = trim(${'linked_object'.$properties[$i]['ID']});
			
			global ${'linked_property'.$properties[$i]['ID']};
			$properties[$i]['LINKED_PROPERTY'] = trim(${'linked_property'.$properties[$i]['ID']});
			
			global ${'linked_method'.$properties[$i]['ID']};
			$properties[$i]['LINKED_METHOD'] = trim(${'linked_method'.$properties[$i]['ID']});
			
			SQLUpdate('okbit_data', $properties[$i]);
			
			$old_linked_object = $properties[$i]['LINKED_OBJECT'];
			$old_linked_property = $properties[$i]['LINKED_PROPERTY'];
			
			if ($old_linked_object && $old_linked_object != $properties[$i]['LINKED_OBJECT'] && $old_linked_property && $old_linked_property != $properties[$i]['LINKED_PROPERTY']) {
				removeLinkedProperty($old_linked_object, $old_linked_property, $this->name);
			}
			
			
		}
		
		$properties[$i]['VALUE'] = str_replace('",','", ',$properties[$i]['VALUE']);

		if ($properties[$i]['LINKED_OBJECT'] && $properties[$i]['LINKED_PROPERTY']) {
			addLinkedProperty($properties[$i]['LINKED_OBJECT'], $properties[$i]['LINKED_PROPERTY'], $this->name);
		}
		
		if (file_exists(DIR_MODULES . 'devices/devices.class.php')) {
			if ($properties[$i]['TITLE'] == 'power') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp1') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp2') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp3') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp4') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp5') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp6') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp7') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'Lamp8') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'usb_on') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'led') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'child_lock') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'bright') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'Level1') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'Level2') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'Level3') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'Level4') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'cct') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'ct') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'nl_br') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'rgb') $properties[$i]['SDEVICE_TYPE'] = 'rgb';
			elseif ($properties[$i]['TITLE'] == 'temperature') $properties[$i]['SDEVICE_TYPE'] = 'sensor_temp';
			elseif ($properties[$i]['TITLE'] == 'humidity') $properties[$i]['SDEVICE_TYPE'] = 'sensor_humidity';
			elseif ($properties[$i]['TITLE'] == 'illumination') $properties[$i]['SDEVICE_TYPE'] = 'sensor_light';
			elseif ($properties[$i]['TITLE'] == 'current') $properties[$i]['SDEVICE_TYPE'] = 'sensor_current';
			elseif ($properties[$i]['TITLE'] == 'power_consume_rate') $properties[$i]['SDEVICE_TYPE'] = 'sensor_power';
			elseif ($properties[$i]['TITLE'] == 'load_power') $properties[$i]['SDEVICE_TYPE'] = 'sensor_power';
			elseif ($properties[$i]['TITLE'] == 'S1') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'S2') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'S3') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'S4') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'S5') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'S6') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'aqi') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'average_aqi') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'favorite_level') $properties[$i]['SDEVICE_TYPE'] = 'dimmer';
			elseif ($properties[$i]['TITLE'] == 'filter1_life') $properties[$i]['SDEVICE_TYPE'] = 'sensor_percentage';
			elseif ($properties[$i]['TITLE'] == 'f1_hour_used') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'use_time') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'motor1_speed') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'purify_volume') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'f1_hour') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'dry') $properties[$i]['SDEVICE_TYPE'] = 'relay';
			elseif ($properties[$i]['TITLE'] == 'depth') $properties[$i]['SDEVICE_TYPE'] = 'sensor_percentage';
			elseif ($properties[$i]['TITLE'] == 'speed') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'flow') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'flowing') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'hue') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'sat') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'color_mode') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'snm') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'dv') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'bl') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'ac') $properties[$i]['SDEVICE_TYPE'] = 'sensor_state';
			elseif ($properties[$i]['TITLE'] == 'limit_hum') $properties[$i]['SDEVICE_TYPE'] = 'sensor_humidity';
		}
	
		
	}
	$out['PROPERTIES'] = $properties;   
}

else {
	$table_name_t = 'okbit_gate';
	$rec2 = SQLSelectOne("SELECT * FROM $table_name_t WHERE ID='$parent_id'");
	if ($rec2['SUB_ID'] == ''){
		$rec['SUB_ID'] = 0;
	}
	else $rec['SUB_ID'] = $rec2['SUB_ID'];
	
}


outHash($rec, $out);
