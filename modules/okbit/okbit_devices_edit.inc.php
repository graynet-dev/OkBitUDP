<?php

/**
* OkBit (UDP-пакеты) 
* @package project
* @author Wizard <foxvlad@yandex.ru>
* @copyright http://okbit.ru (c)
* @version 0.1 (wizard, [Feb 04, 2018])
*/

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


		global $sub_id;
		$rec['SUB_ID'] = $sub_id;
		if ($rec['SUB_ID'] == '') {
			$out['ERR_SUB_ID'] = 1;
			$ok = 0;
		}
		
		global $device_id;
		$rec['DEVICE_ID'] = $device_id;
		if ($rec['DEVICE_ID'] == '') {
			$out['ERR_DEVICE_ID'] = 1;
			$ok = 0;
		}
		
		global $device;
		$rec['DEVICE'] = $device;
		if ($rec['DEVICE'] == '') {
			$out['ERR_DEVICE'] = 1;
			$ok = 0;
		}
				
		$rec['PARENT_ID'] = $out['PARENT_ID'];
	
	
	if ($rec['DEVICE'] =='6001'){
		$in_out = '';
		$in_out = explode(',',DATE_6001);
	}
	
	if ($rec['DEVICE'] =='6002'){
		$in_out = '';
		$in_out = explode(',',DATE_6002);
	}
	
	if ($rec['DEVICE'] =='6003'){
		$in_out = '';
		$in_out = explode(',',DATE_6003);
	}
	
	if ($rec['DEVICE'] =='6004'){
		$in_out = '';
		$in_out = explode(',',DATE_6004);
	}
	
	if ($rec['DEVICE'] =='8001'){
		$in_out = '';
		$in_out = explode(',',DATE_8001);
	}
	
	if ($rec['DEVICE'] =='8002'){
		$in_out = '';
		$in_out = explode(',',DATE_8002);
	}
	
	if ($rec['DEVICE'] =='8003'){
		$in_out = '';
		$in_out = explode(',',DATE_8003);
	}
	
	if ($rec['DEVICE'] =='8004'){
		$in_out = '';
		$in_out = explode(',',DATE_8004);
	}
	
	if ($rec['DEVICE'] =='8005'){
		$in_out = '';
		$in_out = explode(',',DATE_8005);
	}
	
	if ($rec['DEVICE'] =='8006'){
		$in_out = '';
		$in_out = explode(',',DATE_8006);
	}
	
	if ($rec['DEVICE'] =='8007'){
		$in_out = '';
		$in_out = explode(',',DATE_8007);
	}
	
	if ($rec['DEVICE'] =='8008'){
		$in_out = '';
		$in_out = explode(',',DATE_8008);
	}

	if ($rec['DEVICE'] =='8009'){
		$in_out = '';
		$in_out = explode(',',DATE_8009);
	}
	
	if ($rec['DEVICE'] =='8010'){
		$in_out = '';
		$in_out = explode(',',DATE_8010);
	}
	
	if ($rec['DEVICE'] =='8011'){
		$in_out = '';
		$in_out = explode(',',DATE_8011);
	}
	
	if ($rec['DEVICE'] =='8012'){
		$in_out = '';
		$in_out = explode(',',DATE_8012);
	}
	
	if ($rec['DEVICE'] =='8013'){
		$in_out = '';
		$in_out = explode(',',DATE_8013);
	}
	
	if ($rec['DEVICE'] =='8014'){
		$in_out = '';
		$in_out = explode(',',DATE_8014);
	}
	
	if ($rec['DEVICE'] =='8015'){
		$in_out = '';
		$in_out = explode(',',DATE_8015);
	}
	
	if ($rec['DEVICE'] =='8016'){
		$in_out = '';
		$in_out = explode(',',DATE_8016);
	}
	if ($rec['DEVICE'] =='8017'){
		$in_out = '';
		$in_out = explode(',',DATE_8017);
	}
	
	if ($rec['DEVICE'] =='8018'){
		$in_out = '';
		$in_out = explode(',',DATE_8018);
	}
	
	if ($rec['DEVICE'] =='8019'){
		$in_out = '';
		$in_out = explode(',',DATE_8019);
	}
	
	if ($rec['DEVICE'] =='8020'){
		$in_out = '';
		$in_out = explode(',',DATE_8020);
	}
	
	if ($rec['DEVICE'] =='8021'){
		$in_out = '';
		$in_out = explode(',',DATE_8021);
	}
	
	if ($rec['DEVICE'] =='8022'){
		$in_out = '';
		$in_out = explode(',',DATE_8022);
	}
	
	if ($rec['DEVICE'] =='8023'){
		$in_out = '';
		$in_out = explode(',',DATE_8023);
	}
	
	if ($rec['DEVICE'] =='8024'){
		$in_out = '';
		$in_out = explode(',',DATE_8024);
	}
	if ($rec['DEVICE'] =='8025'){
		$in_out = '';
		$in_out = explode(',',DATE_8025);
	}
	
	if ($rec['DEVICE'] =='8026'){
		$in_out = '';
		$in_out = explode(',',DATE_8026);
	}
	
	if ($rec['DEVICE'] =='8027'){
		$in_out = '';
		$in_out = explode(',',DATE_8027);
	}
	
	if ($rec['DEVICE'] =='8028'){
		$in_out = '';
		$in_out = explode(',',DATE_8028);
	}
	
	if ($rec['DEVICE'] =='8029'){
		$in_out = '';
		$in_out = explode(',',DATE_8029);
	}
	
	if ($rec['DEVICE'] =='8030'){
		$in_out = '';
		$in_out = explode(',',DATE_8030);
	}
	
	if ($rec['DEVICE'] =='8031'){
		$in_out = '';
		$in_out = explode(',',DATE_8031);
	}
	
	if ($rec['DEVICE'] =='8032'){
		$in_out = '';
		$in_out = explode(',',DATE_8032);
	}
	if ($rec['DEVICE'] =='8033'){
		$in_out = '';
		$in_out = explode(',',DATE_8033);
	}
	
	if ($rec['DEVICE'] =='8034'){
		$in_out = '';
		$in_out = explode(',',DATE_8034);
	}
	
	if ($rec['DEVICE'] =='8035'){
		$in_out = '';
		$in_out = explode(',',DATE_8035);
	}
	
	if ($rec['DEVICE'] =='8036'){
		$in_out = '';
		$in_out = explode(',',DATE_8036);
	}
	
	if ($rec['DEVICE'] =='8037'){
		$in_out = '';
		$in_out = explode(',',DATE_8037);
	}
	
	if ($rec['DEVICE'] =='8038'){
		$in_out = '';
		$in_out = explode(',',DATE_8038);
	}
	
	if ($rec['DEVICE'] =='8039'){
		$in_out = '';
		$in_out = explode(',',DATE_8039);
	}
	
	if ($rec['DEVICE'] =='8040'){
		$in_out = '';
		$in_out = explode(',',DATE_8040);
	}
	
	
	}

	if ($ok) {
		if ($rec['ID']) {
			if ($this->config['API_LOG_DEBMES']) DebMes('Save params for device ' . $rec['DEVICE'] . ' with Sub_id - ' . $rec['SUB_ID'] . ' with ID- ' . $rec['DEVICE_ID'] .PHP_EOL, 'okbit');
			SQLUpdate($table_name, $rec);
		} else {
			if ($this->config['API_LOG_DEBMES']) DebMes('Manual add new device ' . $rec['DEVICE'] . ' with Sub_id - ' . $rec['SUB_ID'] . ' with ID- ' . $rec['DEVICE_ID'] .PHP_EOL, 'okbit');
			$rec['ID'] = SQLInsert($table_name, $rec);
		}
		
		$out['OK'] = 1;
		
		if ($this->tab == '') {
			foreach($in_out as $cmd) {
				$cmd_rec = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID=" . $rec['ID'] . " AND TITLE = '" . $cmd . "'");
				if (!$cmd_rec['ID']) {
					$cmd_rec = array();
					$cmd_rec['TITLE'] = $cmd;
					$cmd_rec['DEVICE_ID'] = $rec['ID'];
					SQLInsert('okbit_data', $cmd_rec);
				}
			}
			
			// При сохранении настроек устройства выставим статус оффлайн
			//$this->processCommand($rec['ID'], 'online', 0);
			
			//if ($rec['DEVICE_TYPE'] == 'chuangmi.ir.v2') {
			//	//$this->processCommand($rec['ID'], 'freq', 38400);
			//}
			
			
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
	

	$properties = SQLSelect("SELECT * FROM `okbit_data` WHERE DEVICE_ID='" . $rec['ID'] . "' ORDER BY ID");

	
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
	
		
	}
	$out['PROPERTIES'] = $properties;   
}




outHash($rec, $out);
