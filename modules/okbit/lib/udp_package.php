<?php

	/**
	* OkBit (UDP-пакеты) 
	* @package project
	* @author Wizard <foxvlad@yandex.ru>
	* @copyright http://okbit.ru (c)
	* @version 0.1 (wizard, [Feb 04, 2018])
    */
	

		if ($this->config['API_LOG_DEBMES']) DebMes(date("H:i:s") . ' -  BUF- ' . $buf_cmd . ' | IP - ' .  $gate_ip  . PHP_EOL, 'okbit');
	    
	
		$arr = str_split($buf_cmd, 2);
		
		$arr_count = count($arr);
		 
		 $udp_package = array(// разбираем массив
			"mes" => chr(hexdec($arr[0])) . chr(hexdec($arr[1])) . chr(hexdec($arr[2])) . chr(hexdec($arr[3])) . chr(hexdec($arr[4])) . chr(hexdec($arr[5])) .
					chr(hexdec($arr[6])) . chr(hexdec($arr[7])) . chr(hexdec($arr[8])),
			"s_cod" => $arr[9] . $arr[10],
			"length" => hexdec($arr[11]),
			"sub_id" => hexdec($arr[12]),
			"id" => hexdec($arr[13]),
			"device"=> hexdec($arr[14] . $arr[15]),
			"cmd"=> hexdec($arr[16] . $arr[17]),
			"subto_id"=> hexdec($arr[18]),
			"to_id"=> hexdec($arr[19]),
		 );
		 
		if ($udp_package['length'] == 11 || $udp_package['length'] == 13 || $udp_package['length'] == 15 || $udp_package['length'] == 17) {
			$udp_package['vol_1'] = hexdec($arr[20] . $arr[21]);
		}
		
		if ($udp_package['length'] == 13 || $udp_package['length'] == 15 || $udp_package['length'] == 17) {
			$udp_package['vol_2'] = hexdec($arr[22] . $arr[23]);
		}
		
		if ($udp_package['length'] == 15 || $udp_package['length'] == 17) {
			$udp_package['vol_3'] = hexdec($arr[24] . $arr[25]);
		}
		
		if ($udp_package['length'] == 17) {
			$udp_package['vol_4'] = hexdec($arr[26] . $arr[27]);
		}
		
				
		$check_in = 0;
		
		for ($i = 0; $i < $arr_count - 2; $i++){ // считаем чек сум полученного пакета
			$check_in = $check_in + hexdec($arr[$i]);
		}
		
		
		
		
		if ($check_in == hexdec($arr[$arr_count - 2] . $arr[$arr_count - 1])){ //если чек сум правельный производим дальнейшию обработку
			

			
		//Дальнейшие действия в зависимости от пришедшей команды в запросе (см. список команд  в udp_send.php)
			
			if ($udp_package['cmd'] = 30){ //запуск функции присвоения значениея свойства объекта
				
			
				$cmd_gate = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE IP='".DBSafe($gate_ip)."'");
						
				$cmd_devices = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE PARENT_ID='".(int)$cmd_gate['ID']."' AND SUB_ID='".(int)$udp_package['subto_id']. "' AND DEVICE_ID='".(int)$udp_package['to_id']. "'");
				
				
				if ($cmd_devices['DEVICE'] == 6001){
					$cmd_dev = explode(',',DATE_6001);		
				}
				
				if ($cmd_devices['DEVICE'] == 6002){
					$cmd_dev = explode(',',DATE_6004);		
				}
				
				if ($cmd_devices['DEVICE'] == 6003){
					$cmd_dev = explode(',',DATE_6004);		
				}
				
				if ($cmd_devices['DEVICE'] == 6004){
					$cmd_dev = explode(',',DATE_6004);		
				}
				
				if ($cmd_devices['DEVICE'] == 8001){
					$cmd_dev = explode(',',DATE_8001);		
				}
				
				if ($cmd_devices['DEVICE'] == 8002){
					$cmd_dev = explode(',',DATE_8002);		
				}
				
				if ($cmd_devices['DEVICE'] == 8003){
					$cmd_dev = explode(',',DATE_8003);		
				}
				
				if ($cmd_devices['DEVICE'] == 8004){
					$cmd_dev = explode(',',DATE_8004);		
				}
				
				if ($cmd_devices['DEVICE'] == 8005){
					$cmd_dev = explode(',',DATE_8005);		
				}
				
				if ($cmd_devices['DEVICE'] == 8006){
					$cmd_dev = explode(',',DATE_8006);		
				}
				
				if ($cmd_devices['DEVICE'] == 8007){
					$cmd_dev = explode(',',DATE_8007);		
				}
				
				if ($cmd_devices['DEVICE'] == 8008){
					$cmd_dev = explode(',',DATE_8008);		
				}
				
				if ($cmd_devices['DEVICE'] == 8009){
					$cmd_dev = explode(',',DATE_8009);		
				}
				
				if ($cmd_devices['DEVICE'] == 8010){
					$cmd_dev = explode(',',DATE_8010);		
				}
				
				if ($cmd_devices['DEVICE'] == 8011){
					$cmd_dev = explode(',',DATE_8011);		
				}
				
				if ($cmd_devices['DEVICE'] == 8012){
					$cmd_dev = explode(',',DATE_8012);		
				}
				
				if ($cmd_devices['DEVICE'] == 8013){
					$cmd_dev = explode(',',DATE_8013);		
				}
				
				if ($cmd_devices['DEVICE'] == 8014){
					$cmd_dev = explode(',',DATE_8014);		
				}
				
				if ($cmd_devices['DEVICE'] == 8015){
					$cmd_dev = explode(',',DATE_8015);		
				}
				
				if ($cmd_devices['DEVICE'] == 8016){
					$cmd_dev = explode(',',DATE_8016);		
				}
				
				if ($cmd_devices['DEVICE'] == 8017){
					$cmd_dev = explode(',',DATE_8017);		
				}
				
				if ($cmd_devices['DEVICE'] == 8018){
					$cmd_dev = explode(',',DATE_8018);		
				}
				
				if ($cmd_devices['DEVICE'] == 8019){
					$cmd_dev = explode(',',DATE_8019);		
				}
				
				if ($cmd_devices['DEVICE'] == 8020){
					$cmd_dev = explode(',',DATE_8020);		
				}
				
				if ($cmd_devices['DEVICE'] == 8021){
					$cmd_dev = explode(',',DATE_8021);		
				}
				
				if ($cmd_devices['DEVICE'] == 8022){
					$cmd_dev = explode(',',DATE_8022);		
				}
				
				if ($cmd_devices['DEVICE'] == 8023){
					$cmd_dev = explode(',',DATE_8023);		
				}
				
				if ($cmd_devices['DEVICE'] == 8024){
					$cmd_dev = explode(',',DATE_8024);		
				}
				
				if ($cmd_devices['DEVICE'] == 8025){
					$cmd_dev = explode(',',DATE_8025);		
				}
				
				if ($cmd_devices['DEVICE'] == 8026){
					$cmd_dev = explode(',',DATE_8026);		
				}
				
				if ($cmd_devices['DEVICE'] == 8027){
					$cmd_dev = explode(',',DATE_8027);		
				}
				
				if ($cmd_devices['DEVICE'] == 8028){
					$cmd_dev = explode(',',DATE_8028);		
				}
				
				if ($cmd_devices['DEVICE'] == 8029){
					$cmd_dev = explode(',',DATE_8029);		
				}
				
				if ($cmd_devices['DEVICE'] == 8030){
					$cmd_dev = explode(',',DATE_8030);		
				}
				
				if ($cmd_devices['DEVICE'] == 8031){
					$cmd_dev = explode(',',DATE_8031);		
				}
				
				if ($cmd_devices['DEVICE'] == 8032){
					$cmd_dev = explode(',',DATE_8032);		
				}
				
				if ($cmd_devices['DEVICE'] == 8033){
					$cmd_dev = explode(',',DATE_8033);		
				}
				
				if ($cmd_devices['DEVICE'] == 8034){
					$cmd_dev = explode(',',DATE_8034);		
				}
				
				if ($cmd_devices['DEVICE'] == 8035){
					$cmd_dev = explode(',',DATE_8035);		
				}
				
				if ($cmd_devices['DEVICE'] == 8036){
					$cmd_dev = explode(',',DATE_8036);		
				}
				
				if ($cmd_devices['DEVICE'] == 8037){
					$cmd_dev = explode(',',DATE_8037);		
				}
				
				if ($cmd_devices['DEVICE'] == 8038){
					$cmd_dev = explode(',',DATE_8038);		
				}
				
				if ($cmd_devices['DEVICE'] == 8039){
					$cmd_dev = explode(',',DATE_8039);		
				}
				
				if ($cmd_devices['DEVICE'] == 8040){
					$cmd_dev = explode(',',DATE_8040);		
				}
				
				
				
				$com_reg = $cmd_dev[$udp_package['vol_1'] - 1]; //вычисляем топик okbit_date по номмеру регистра
								
				$this->processCommand($cmd_devices['ID'], $com_reg, $udp_package['vol_2']);	
				
			}
			
			if ($udp_package['cmd'] = 13){ // Получение серийного номера шлюза и версии прошивки
			
				if ($this->config['API_LOG_DEBMES']) {
					DebMes(date("H:i:s") . ' VER: ' . $udp_package['vol_1'] . '.' . $udp_package['vol_2'] . ' SN: ' . $udp_package['vol_3'] . '0000' . $udp_package['vol_4'] . PHP_EOL, 'okbit');
				}
				
				
				if ($this->owner->name == 'panel') {
					$out['CONTROLPANEL'] = 1;
				}

				$table_name = 'okbit_gate';
				
				

				$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']))."'");
				
								
				$rec['STATUS'] = 1;
				
				$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
				 
				
				if ($rec['SN']) {
					$rec['IP'] = $gate_ip;
					$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
					if ($this->config['API_LOG_DEBMES']) DebMes('Auto params for gate ' . $deb_title . ' with IP ' . $rec['IP'] .PHP_EOL, 'okbit');
					$rec['SN'] = SQLUpdate($table_name, $rec);
				} 
				
				else {
					
					$rec = SQLSelectOne("SELECT * FROM $table_name WHERE IP='".DBSafe($gate_ip)."'");
					
					$rec['STATUS'] = 1;
				
					$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
					
					if ($rec['IP'] && $rec['SN'] == '') {
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['IP'] = SQLUpdate($table_name, $rec);
					}
					
					else {
						
						$rec = null;
						
						$rec['STATUS'] = 1;
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						
						$rec['IP'] = $gate_ip;					
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						if ($this->config['API_LOG_DEBMES']) DebMes('Auto add new gate ' . $deb_title . ' with IP ' . $rec['IP'] .PHP_EOL, 'okbit');
						$rec['SN'] = SQLInsert($table_name, $rec);

					}
				}
				
			}
			

					
			return "UDP parsing OK, Count - " . $arr_count . " Checksum - " . $check_in . " Checksum  HEX - " . $arr[$arr_count - 2] . $arr[$arr_count - 1].  " Checksum flag - Yes" ;
			
		}
		
		else return "EROR"; //если чек сумм не соответсвует, пакет битый функция вернет ошибку


?>


