<?php

/**
* OkBitUDP 
* @package project
* @author Wizard <foxvlad@yandex.ru>
* @copyright http://okbit.ru (c)
* @version 0.2 (wizard, 19:10:55 [Oct 11, 2018])
*/
	/**
	* udp_msg_packet(
	* 
	* @access public
	*
	* -------- Значение команд в десятичном/шестнадцатиричном формате ---------
	* 
	* 0010/A - считать SN шлюза, версию прощивки
	* 0011/B - ответ все хорошо
	* 0012/С - ответ ошибка (1 - колличество ошибок в ОЗУ, 2- код последней ошибки)
	* 0013/D - передать SN шлюза, версию прощивки (1 - Значение прошивки 1, 2 - значение прошивки 2, 3 - серийный номер 1, 4 - серийный номер 2)
	* 
	* 0020/14 - Поиск всех онлайн устройств
	* 0021/15 - Считать/передать тип устройства, версию прошивки (1- тип устройства, 2 - версия)
	* 0022/16 - Считат/передать коментарий устройства(n-е количество буквенный коментарий)
	* 0023/17 - Считать/передать статус входа (1 - адрес входа, 2- значение)
	* 0024/18 - Считать/передать значение ячейки ОЗУ (1 - адрес ячейки, 2 - значение)
	* 0025/19 - Считать/передать все значения ячеек ОЗУ
	* 0026/1A - Считать/передать количество ошибок на шине ( 1- кол-воошибок)
	* 
	* 0030/1E - Присвоение значения ОЗУ (1 - адрес канал, 2 - значение)
	* 0031/1F - Присвоение двух значений ОЗУ (1 - адрес канала, 2 - значение 1, 3 - значение 2)
	* 
	* 0040/28 - Смена Sub ID (1 - новый адрес подсети)
	* 0041/29 - Смена ID (1 - новый адрес устройства)
	* 
	* 0055/37 - Запись текстового значения (примечание для модуля)
	* 
	* 0060/3C - Запись значения настройки в модуль (1 - адрес канала, 2 - значение )
	* 0061/3D - Запись значений настройки в модуль (1 - адрес канала, 2 - значение 1, 3- значение 2)
	* 0062/3D - смена IP шлюза (1 - адрес, 2 - адрес, 3 - адрес, 4 - адрес)
	* 0063/3F - Работа шлюза по DHCP
	* 0064/40 - Привязать шлюз к серверу
	* 0065/41 - Считать IP Шлюза из памяти
	* 
	* 
	* 0070/46 - Запись значения сценария (1 - адрес канала,  2 - N -сценария, 3 - Sub ID получателя, 4 - id получателя , 5 - адрес канала ОЗУ,
	* 			6 - значение 1, 7 - значение 2)
	*255/FF - поиск всех Шлюзов и ethernet устройств по широковещательному запросу
	**/

define ('OKBIT_DEVICES_CODES', serialize (array('6001' =>	'МУС-8',
						'6002' => 	'МОС-6',
						'6003' => 	'УМА-8',
						'6004' => 	'МДВ-4',
						'6005' => 	'МДН-6',
						'6007' => 	'IRM',
						'6008' => 	'FAM-6'
						)));


define ('OKBIT_GATE_CODES', serialize (array(	'6000' =>	'GATE Ethernet-RS485',
						'7001' =>	'ESP Lamp',
						'7002' =>	'ESP Climatic',
						'7003' =>	'ESP Rele',
						'7004' =>	'ESP LED RGB',
						'7005' =>	'ESP Dimmer',
						'7006' =>	'ESP Sensor',
						'7007' =>	'ESP Thermostat',
						'8000' =>	'GATE Ethernet-aHomeBus',
						)));


define ('OKBIT_AHOMEBUS_CODES', serialize (array('8001' =>	'node_1_Net_center_PC',
						'8002' => 	'node_2_Net_center_oraPi1',
						'8003' => 	'node_3_Net_center_oraPi2',
						'8004' => 	'node_4_Net_center_Due1',
						'8005' => 	'node_5_Net_center_Due2',
						'8006' => 	'node_6_Hallway_net_center',
						'8007' => 	'node_7_Hallway_main',
						'8008' => 	'node_8_Hallway_light',
						'8009' => 	'node_9_Kitchen_net_center',
						'8010' => 	'node_10_Kitchen_main',
						'8011' => 	'node_11_Kitchen_light',
						'8012' => 	'node_12_WC_main',
						'8013' => 	'node_13_WC_waterleak',
						'8014' => 	'node_14_Bathroom_main',
						'8015' => 	'node_15_Boxroom_main',
						'8016' => 	'node_16_Balcony_meteo',
						'8017' => 	'node_17_Loggia_main',
						'8018' => 	'node_18_Loggia_recuperator',
						'8019' => 	'node_19_Livingroom_main',
						'8020' => 	'node_20_Bedroom_main',
						'8021' => 	'node_21_Cabinet_main',
						'8022' => 	'node_22',
						'8023' => 	'node_23',
						'8024' => 	'node_24',
						'8025' => 	'node_25',
						'8026' => 	'node_26',
						'8027' => 	'node_27',
						'8028' => 	'node_28',
						'8029' => 	'node_29',
						'8030' => 	'node_30',
						'8031' => 	'node_31',
						'8032' => 	'node_32',
						'8033' => 	'node_33',
						'8034' => 	'node_34',
						'8035' => 	'node_35',
						'8036' => 	'node_36',
						'8037' => 	'node_37',
						'8038' => 	'node_38',
						'8039' => 	'node_39',
						'8040' => 	'node_40'
						)));
												

												
define ('DATA_6001', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_6002', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_6003', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_6004', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_6005', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_6006', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_6007', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_6008', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');

define ('DATA_7001', 'Lamp1,Lamp2,Lamp3,Lamp4');
define ('DATA_7002', 'Temp,Humidity');
define ('DATA_7003', 'Reley');
define ('DATA_7004', 'Red,Green,Blue');
define ('DATA_7005', 'Lamp,Level');
define ('DATA_7006', 'Status1,Status1');
define ('DATA_7007', 'ST_Relay,Mode,Temp,SetTemp,Hysteresis,Set');

define ('DATA_8001', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_8002', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_8003', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8004', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_8005', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8006', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8007', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8008', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8009', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_8010', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_8011', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8012', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_8013', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8014', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8015', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8016', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8017', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_8018', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_8019', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8020', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_8021', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8022', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8023', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8024', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8025', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_8026', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_8027', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8028', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_8029', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8030', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8031', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8032', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8033', 'Lamp1,Lamp2,Lamp3,Lamp4,Lamp5,Lamp6,Lamp7,Lamp8');	
define ('DATA_8034', 'S1,S2,S3,S4,S5,S6');													
define ('DATA_8035', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8036', 'Lamp1,Level1,Lamp2,Level2,Lamp3,Level3,Lamp4,Level4');
define ('DATA_8037', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8038', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');	
define ('DATA_8039', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');
define ('DATA_8040', 'IND1,IND2,IND3,IND4,INA1,INA2,INA3,INA4');


class okbit extends module {
	
	public $sock;
	
	/**
	* okbit
	*
	* Module class constructor
	*
	* @access private
	*/
	function __construct() {
		$this->name="okbit";
		$this->title="OkBitUDP";
		$this->module_category="<#LANG_SECTION_DEVICES#>";
		$this->checkInstalled();
		//require_once(DIR_MODULES.$this->name . '/lib/build_package_okbit.class.php');		
		//require_once(DIR_MODULES.$this->name . '/lib/send_udp_okbit.class.php');	
	}
	
	
	/**
	* saveParams
	*
	* Saving module parameters
	*
	* @access public
	*/
	function saveParams($data=1) {
		$p=array();
		if (IsSet($this->id)) {
			$p["id"]=$this->id;
		}
		if (IsSet($this->view_mode)) {
			$p["view_mode"]=$this->view_mode;
		}
		if (IsSet($this->edit_mode)) {
			$p["edit_mode"]=$this->edit_mode;
		}
		if (IsSet($this->data_source)) {
			$p["data_source"]=$this->data_source;
		}
		if (IsSet($this->tab)) {
			$p["tab"]=$this->tab;
		}
		return parent::saveParams($p);
	}
	
	
	/**
	* getParams
	*
	* Getting module parameters from query string
	*
	* @access public
	*/
	function getParams() {
		global $id;
		global $mode;
		global $view_mode;
		global $edit_mode;
		global $data_source;
		global $tab;
		global $parent_title;
		global $parent_id;
		
		if (isset($id)) {
			$this->id=$id;
		}
		if (isset($mode)) {
			$this->mode=$mode;
		}
		if (isset($view_mode)) {
			$this->view_mode=$view_mode;
		}
		if (isset($edit_mode)) {
			$this->edit_mode=$edit_mode;
		}
		if (isset($data_source)) {
			$this->data_source=$data_source;
		}
		if (isset($tab)) {
			$this->tab=$tab;
		}		
		if (isset($parent_title)) {
			$this->parent_title=$parent_title;
		}	  
		if (isset($parent_id)) {
			$this->parent_id=$parent_id;
		}		
	}
	
	
	/**
	* Run
	*
	* Description
	*1
	* @access public
	*/
	function run() {
		global $session;
		$out=array();
		if ($this->action=='admin') {
			$this->admin($out);
		} else {
			$this->usual($out);
		}
		if (IsSet($this->owner->action)) {
			$out['PARENT_ACTION']=$this->owner->action;
		}
		if (IsSet($this->owner->name)) {
			$out['PARENT_NAME']=$this->owner->name;
		}
		$out['VIEW_MODE']=$this->view_mode;
		$out['EDIT_MODE']=$this->edit_mode;
		$out['MODE']=$this->mode;
		$out['ACTION']=$this->action;
		$out['DATA_SOURCE']=$this->data_source;
		$out['TAB']=$this->tab;
		$this->data=$out;
		$p=new parser(DIR_TEMPLATES.$this->name."/".$this->name.".html", $this->data, $this);
		$this->result=$p->result;
	}
	
	
	/**
	* BackEnd
	*
	* Module backend
	*
	* @access public
	*/
	function admin(&$out) {
		
		
		
		$this->getConfig();
		
		$out['API_IP']=$this->config['API_IP'];
		$out['API_DISC_PERIOD'] = $this->config['API_DISC_PERIOD'];
		$out['API_LOG_DEBMES'] = $this->config['API_LOG_DEBMES'];
		$out['API_LOG_CYCLE'] = $this->config['API_LOG_CYCLE'];
		
		
		if ((time() - (int)gg('cycle_okbitRun')) < 15 ) {
				$out['CYCLERUN'] = 1;
			} else {
				$out['CYCLERUN'] = 0;
			}
				
		if ($this->config['API_LOG_DEBMES']) DebMes("!!!GET!!!(): " . $_SERVER['REQUEST_URI'], 'okbit');
		
		
				
		if ($this->view_mode=='update_settings') {
			
			global $api_ip;
			$this->config['API_IP']=$api_ip;
			
			global $api_disc_period;
			$this->config['API_DISC_PERIOD'] = (int)$api_disc_period;
		   
			global $api_log_debmes;
			$this->config['API_LOG_DEBMES'] = (int)$api_log_debmes;
			
			global $api_log_cycle;
			$this->config['API_LOG_CYCLE'] = (int)$api_log_cycle;
			
						
			$this->saveConfig();
			
			setGlobal('cycle_okbitControl','restart');
			
			$this->redirect("?");
			

		}
		if (isset($this->data_source) && !$_GET['data_source'] && !$_POST['data_source']) {
			$out['SET_DATASOURCE']=1;
		}
		
		
		 
		if ($this->data_source=='okbit_gate' || $this->data_source=='') {
			if ($this->view_mode=='' || $this->view_mode=='search_okbit_gate') {//выыод имеющихся шлюзов
				$this->search_okbit_gate($out);
			}
			if ($this->view_mode=='discover_okbit_gate') {// автоматический поиск шлюзов
				$this->discover_okbit_gate($out, $this->id);
			}
			if ($this->view_mode=='edit_okbit_gate') {// редактирование/ручное добавление шлюза
				$this->edit_okbit_gate($out, $this->id);
				$json123 = json_encode($out);
				if ($this->config['API_LOG_DEBMES']) DebMes("!!!POST!!!(): " . $json123, 'okbit');
			}			
			if ($this->view_mode=='update_gate') {// Получение информации о шлюзе
				$this->okbit_update_gate($out, $this->id);
			}	
			if ($this->view_mode=='bind_gate') {// подвязка шлюза к серверу мажордомо
				$this->okbit_bind_gate($out, $this->id);
			}				
			if ($this->view_mode=='delete_okbit_gate') {//удаление шлюза
				$this->delete_okbit_gate($this->id);
				$this->redirect("?data_source=okbit_gate");
			}
			
			if ($this->view_mode=='discover_okbit_gate2') {// автоматический поиск шлюзов
				$this->discover_okbit_gate($out, $this->id);
			}
			if ($this->view_mode=='edit_okbit_gate2') {// редактирование/ручное добавление шлюза
				$this->edit_okbit_gate($out, $this->id);
				$json123 = json_encode($out);
				if ($this->config['API_LOG_DEBMES']) DebMes("!!!POST!!!(): " . $json123, 'okbit');
			}			
			if ($this->view_mode=='update_gate2') {// Получение информации о шлюзе
				$this->okbit_update_gate($out, $this->id);
			}	
			if ($this->view_mode=='bind_gate2') {// подвязка шлюза к серверу мажордомо
				$this->okbit_bind_gate($out, $this->id);
			}				
			if ($this->view_mode=='delete_okbit_gate2') {//удаление шлюза
				$this->delete_okbit_gate($this->id);
				$this->redirect("?data_source=okbit_gate");
			}
		}
		
		if ($this->data_source=='okbit_device') {
			if ($this->view_mode=='' || $this->view_mode=='search_okbit_devices') {//вывод списка устройств
				$this->search_okbit_devices($out, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='' || $this->view_mode=='search_okbit_devices2') {//вывод списка устройств
				$this->search_okbit_devices2($out, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='edit_okbit_device') {// Добавление/редактирование устройства вручную----><------><------>
				$this->edit_okbit_device($out, $this->id, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='edit_okbit_device2') {// Добавление/редактирование устройства вручную----><------><------>
				$this->edit_okbit_device($out, $this->id, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='okbit_devices_discover') {// автоматический поиск устройствnt_id);
				$this->okbit_devices_discover($out, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='okbit_devices_discover2') {// автоматический поиск устройствnt_id);
				$this->okbit_devices_discover2($out, $this->parent_title, $this->parent_id);
			}
			if ($this->view_mode=='okbit_devices_update') {// получение информации об устройстве
				$this->okbit_devices_update($out, $this->parent_title, $this->parent_id, $this->id);
			}
			if ($this->view_mode=='okbit_devices_update2') {// получение информации об устройстве
				$this->okbit_devices_update2($out, $this->parent_title, $this->parent_id, $this->id);
			}
			if ($this->view_mode == 'delete_okbit_device') { //Удаление устройства
				$this->delete_okbit_device($this->id);
				$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices&parent_title=$this->parent_title&parent_id=$this->parent_id");
			}
			if ($this->view_mode == 'delete_okbit_device2') { //Удаление устройства
				$this->delete_okbit_device($this->id);
				$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices2&parent_title=$this->parent_title&parent_id=$this->parent_id");
			}
		}
		
		
		if ($this->data_source=='okbit_service') {			
			if ($this->view_mode=='okbit_devices_discover') {// автоматический поиск устройств
				$this->okbit_devices_discover($out, $this->parent_title, $this->parent_id);
			}	
			if ($this->view_mode=='okbit_devices_discover2') {// автоматический поиск устройств
				$this->okbit_devices_discover2($out, $this->parent_title, $this->parent_id);
			}	
			
		}
	}


	/**
	* FrontEnd
	*
	* Module frontend
	*
	* @access public
	*/
	function usual(&$out) {
		$this->admin($out);
	}
	
	
	/**
	* okbit_gate search
	*
	* @access public
	*/
	function search_okbit_gate(&$out) {		
		global $session;
		if ($this->owner->name == 'panel') {
			$out['CONTROLPANEL'] = 1;		
		}		  
		
		$gate_code = unserialize(OKBIT_GATE_CODES);
		
		$res = SQLSelect("SELECT * FROM okbit_gate ORDER BY ID DESC");	


		if ($res[0]['ID']) {
			$total = count($res);
			for($i = 0; $i < $total; $i++) {
				$mod_code = $res[$i]['MOD'];
				$res[$i]['GATE_NAME'] = $gate_code["$mod_code"];
			}
			$out['RESULT'] = $res;
		}
	}
	
	
	/**
	* discover_okbit_gate
	*
	* @access public
	*/
	function discover_okbit_gate(&$out) {
	
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'] ,0, 0, 65534, 255, 0, 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(10); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->sockSetBroadcast();
		$this->udp_send('255.255.255.255', 6400, $data_send); // отправка пакета
				
		$this->redirect("?data_source=okbit_gate");		
	}
	
	
	/**
	* test_update_gate
	*
	* @access public
	*/
	function test_update_gate() {//!!!не удалять запуск из цикла
	
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'] ,0, 0, 65534, 255, 0, 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(1); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->sockSetBroadcast();
		$this->udp_send('255.255.255.255', 6400, $data_send); // отправка пакета	
	}
	
	
	
	/**
	* okbit_update_gate
	*
	* @access public
	*/
	
	function okbit_update_gate(&$out, $id) {

		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$id."'");//запрос для получения IP шлюза	
	
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 10, $gate_sh['SUB_ID'], 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(1); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
				
		$this->redirect("?data_source=okbit_gate");	
	}	
	
	
	
	
	
	/**
	* okbit_bind_gate
	*
	* @access public
	*/
	
	function okbit_bind_gate(&$out, $id) {
		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$id."'");//запрос для получения IP шлюза	
			
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 64, $gate_sh['SUB_ID'], 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(1); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
		
		$gate = NULL;
		
		$this->redirect("?data_source=okbit_gate");	
	}
	
	
	/**
	* okbit_gate edit/add
	*
	* @access public
	*/
	function edit_okbit_gate(&$out, $id) {
		require(DIR_MODULES.$this->name.'/okbit_gate_edit.inc.php');
	}
	
	
	/**
	* okbit_gate delete record
	*
	* @access public
	*/
	function delete_okbit_gate($id) {
		
		$rec = SQLSelectOne("SELECT * FROM okbit_gate WHERE ID='" . $id . "'");
		
		
		if($rec['MOD'] == '6000'){	
			$rec_d = SQLSelect("SELECT * FROM okbit_devices WHERE PARENT_ID ='" . $id . "'");		
			foreach($rec_d as $cmd) {
				SQLExec("DELETE FROM okbit_data WHERE DEVICE_ID='".$cmd['ID']."' AND ETHERNET='0'");
			}
			SQLExec("DELETE FROM okbit_devices WHERE PARENT_ID='".$rec['ID']."'");
		} else if($rec['MOD'] == '8000'){	
			$rec_d = SQLSelect("SELECT * FROM okbit_devices WHERE PARENT_ID ='" . $id . "'");		
			foreach($rec_d as $cmd) {
				SQLExec("DELETE FROM okbit_data WHERE DEVICE_ID='".$cmd['ID']."' AND ETHERNET='0'");
			}
			SQLExec("DELETE FROM okbit_devices WHERE PARENT_ID='".$rec['ID']."'");
		} else SQLExec("DELETE FROM okbit_data WHERE DEVICE_ID='".$id."' AND ETHERNET='1'");
				
		SQLExec("DELETE FROM okbit_gate WHERE ID='" . $id . "'");
		
		
		
	}
	
	/**
	* propertySetHandle
	*
	* Обработчик привязанных свойств и методов
	*
	* @access private
	*/
	
	function propertySetHandle($object, $property, $value) {
		
		$this->getConfig();		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		
		$properties = SQLSelectOne("SELECT * FROM `okbit_data` WHERE LINKED_OBJECT LIKE '".DBSafe($object)."' AND  LINKED_PROPERTY LIKE '".DBSafe($property)."'");
		$properties['VALUE'] = $value;
		$properties['UPDATED'] = date('Y-m-d H:i:s');
		SQLUpdate('okbit_data', $properties);
		
		if ($properties['ETHERNET'] == '1') {
			$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$properties['DEVICE_ID']."'");					
			
			if ($gate_sh['MOD'] == 7001){
				$cmd_out = explode(',',DATA_7001);
			}
			else if ($gate_sh['MOD'] == 7002){
				$cmd_out = explode(',',DATA_7002);
			}
			else if ($gate_sh['MOD'] == 7003){
				$cmd_out = explode(',',DATA_7003);
			}
			else if ($gate_sh['MOD'] == 7004){
				$cmd_out = explode(',',DATA_7004);
			}
			else if ($gate_sh['MOD'] == 7005){
				$cmd_out = explode(',',DATA_7005);
			}
			else if ($gate_sh['MOD'] == 7006){
				$cmd_out = explode(',',DATA_7006);
			}			
			else if ($gate_sh['MOD'] == 7007){
				$cmd_out = explode(',',DATA_7007);
			}
			
			$s = 1;
			foreach($cmd_out as $xxx) {
				if ($xxx == $properties['TITLE']) $dev_in = $s;
				$s++;
			}
			
			if ($gate_sh['MOD'] == 7007 && ($dev_in == 4 || $dev_in == 5) ) { // дополнение для предачи данных с запятой, путем умножения на 100
				$value = $value*100;
			}
				
			$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 30, 0, 0, $dev_in, $value); //сборка UDP OkBit пакета		
			$this->sock_create(); //Создание UDP сокета
			$this->sockSetTimeout(1); //Установка таймаута для получения ответа
			$this->sock_bind($ip_serv, 6600);
			$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
		}		
		
		else if ($properties['ETHERNET'] == '0') {
			
			$rs485 = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE ID='".$properties['DEVICE_ID']."'");			
			$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$rs485['PARENT_ID']."'");	
			
			if ($rs485['DEVICE'] == 6001){
				$cmd_out = explode(',',DATA_6001);
			}
			else if ($rs485['DEVICE'] == 6002){
				$cmd_out = explode(',',DATA_6002);
			}
			else if ($rs485['DEVICE'] == 6003){
				$cmd_out = explode(',',DATA_6003);
			}
			else if ($rs485['DEVICE'] == 6004){
				$cmd_out = explode(',',DATA_6004);
			}
			else if ($rs485['DEVICE'] == 6005){
				$cmd_out = explode(',',DATA_6005);
			}
			else if ($rs485['DEVICE'] == 6006){
				$cmd_out = explode(',',DATA_6006);
			}
			else if ($rs485['DEVICE'] == 6007){
				$cmd_out = explode(',',DATA_6007);
			}
			else if ($rs485['DEVICE'] == 6008){
				$cmd_out = explode(',',DATA_6008);
			}
			if ($rs485['DEVICE'] == 8001){
				$cmd_out = explode(',',DATA_8001);
			}
			else if ($rs485['DEVICE'] == 8002){
				$cmd_out = explode(',',DATA_8002);
			}
			else if ($rs485['DEVICE'] == 8003){
				$cmd_out = explode(',',DATA_8003);
			}
			else if ($rs485['DEVICE'] == 8004){
				$cmd_out = explode(',',DATA_8004);
			}
			else if ($rs485['DEVICE'] == 8005){
				$cmd_out = explode(',',DATA_8005);
			}
			else if ($rs485['DEVICE'] == 8006){
				$cmd_out = explode(',',DATA_8006);
			}
			else if ($rs485['DEVICE'] == 8007){
				$cmd_out = explode(',',DATA_8007);
			}
			else if ($rs485['DEVICE'] == 8008){
				$cmd_out = explode(',',DATA_8008);
			}
			else if ($rs485['DEVICE'] == 8009){
				$cmd_out = explode(',',DATA_8009);
			}
			else if ($rs485['DEVICE'] == 8010){
				$cmd_out = explode(',',DATA_8010);
			}
			else if ($rs485['DEVICE'] == 8011){
				$cmd_out = explode(',',DATA_8011);
			}
			else if ($rs485['DEVICE'] == 8012){
				$cmd_out = explode(',',DATA_8012);
			}
			else if ($rs485['DEVICE'] == 8013){
				$cmd_out = explode(',',DATA_8013);
			}
			else if ($rs485['DEVICE'] == 80014){
				$cmd_out = explode(',',DATA_8014);
			}
			else if ($rs485['DEVICE'] == 8015){
				$cmd_out = explode(',',DATA_8015);
			}
			else if ($rs485['DEVICE'] == 8016){
				$cmd_out = explode(',',DATA_8016);
			}
			else if ($rs485['DEVICE'] == 8017){
				$cmd_out = explode(',',DATA_8017);
			}
			else if ($rs485['DEVICE'] == 8018){
				$cmd_out = explode(',',DATA_8018);
			}
			else if ($rs485['DEVICE'] == 8019){
				$cmd_out = explode(',',DATA_8019);
			}
			else if ($rs485['DEVICE'] == 8020){
				$cmd_out = explode(',',DATA_8021);
			}
			else if ($rs485['DEVICE'] == 8022){
				$cmd_out = explode(',',DATA_8022);
			}
			else if ($rs485['DEVICE'] == 8023){
				$cmd_out = explode(',',DATA_8023);
			}
			else if ($rs485['DEVICE'] == 8024){
				$cmd_out = explode(',',DATA_8024);
			}
			else if ($rs485['DEVICE'] == 8025){
				$cmd_out = explode(',',DATA_8025);
			}
			else if ($rs485['DEVICE'] == 8026){
				$cmd_out = explode(',',DATA_8026);
			}
			else if ($rs485['DEVICE'] == 8027){
				$cmd_out = explode(',',DATA_8027);
			}
			else if ($rs485['DEVICE'] == 8028){
				$cmd_out = explode(',',DATA_8028);
			}
			else if ($rs485['DEVICE'] == 8029){
				$cmd_out = explode(',',DATA_8029);
			}
			else if ($rs485['DEVICE'] == 8030){
				$cmd_out = explode(',',DATA_8030);
			}
			else if ($rs485['DEVICE'] == 8031){
				$cmd_out = explode(',',DATA_8031);
			}
			else if ($rs485['DEVICE'] == 8032){
				$cmd_out = explode(',',DATA_8032);
			}
			else if ($rs485['DEVICE'] == 8033){
				$cmd_out = explode(',',DATA_8033);
			}
			else if ($rs485['DEVICE'] == 8034){
				$cmd_out = explode(',',DATA_8034);
			}
			else if ($rs485['DEVICE'] == 8035){
				$cmd_out = explode(',',DATA_8035);
			}
			else if ($rs485['DEVICE'] == 8036){
				$cmd_out = explode(',',DATA_8036);
			}
			else if ($rs485['DEVICE'] == 8037){
				$cmd_out = explode(',',DATA_8037);
			}
			else if ($rs485['DEVICE'] == 8038){
				$cmd_out = explode(',',DATA_8038);
			}
			else if ($rs485['DEVICE'] == 8039){
				$cmd_out = explode(',',DATA_8039);
			}
			else if ($rs485['DEVICE'] == 8040){
				$cmd_out = explode(',',DATA_8040);
			}

			$s = 1;
			foreach($cmd_out as $xxx) {
				if ($xxx == $properties['TITLE']) $dev_in = $s;
				$s++;
			}			
			
			$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 30, $rs485['SUB_ID'], $rs485['DEVICE_ID'], $dev_in, $value); //сборка UDP OkBit пакета	
			$this->sock_create(); //Создание UDP сокета
			$this->sockSetTimeout(1); //Установка таймаута для получения ответа
			$this->sock_bind($ip_serv, 6600);
			$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
		}
		
		
	}
	
	

	
	
	
	/**
	* okbit_devices search
	*
	* @access public
	*/	
	function search_okbit_devices(&$out, $parent_title, $parent_id){			
		global $session;
		if ($this->owner->name == 'panel') {
			$out['CONTROLPANEL'] = 1;		
		}
		$out['PARENT_TITLE'] =  $parent_title;
		$out['PARENT_ID'] =  $parent_id;		
		$device_code = unserialize(OKBIT_DEVICES_CODES);		
		$res = SQLSelect("SELECT * FROM `okbit_devices` WHERE `PARENT_ID` = '$parent_id' ORDER BY ID DESC");
		if ($res[0]['ID']) {
						$total = count($res);
			for($i = 0; $i < $total; $i++) {
				$dev_code = $res[$i]['DEVICE'];
				$res[$i]['DEVICE_NAME'] = $device_code["$dev_code"];
			}
			$out['RES_DEVICES'] = $res;
		}		
	}
	
	function search_okbit_devices2(&$out, $parent_title, $parent_id){			
		global $session;
		if ($this->owner->name == 'panel') {
			$out['CONTROLPANEL'] = 1;		
		}
		$out['PARENT_TITLE'] =  $parent_title;
		$out['PARENT_ID'] =  $parent_id;		
		$device_code = unserialize(OKBIT_AHOMEBUS_CODES);		
		$res = SQLSelect("SELECT * FROM `okbit_devices` WHERE `PARENT_ID` = '$parent_id' ORDER BY ID DESC");
		if ($res[0]['ID']) {
						$total = count($res);
			for($i = 0; $i < $total; $i++) {
				$dev_code = $res[$i]['DEVICE'];
				$res[$i]['DEVICE_NAME'] = $device_code["$dev_code"];
			}
			$out['RES_DEVICES'] = $res;
		}		
	}
	
		
	
	
	/**
	* okbit_device edit/add
	*
	* @access public
	*/
	function edit_okbit_device(&$out, $id, $parent_title, $parent_id) {
		require(DIR_MODULES.$this->name.'/okbit_device_edit.inc.php');
	}
	
	
	/**
	* okbit_devices_discover
	*
	* @access public
	*/
	function okbit_devices_discover(&$out, $parent_title, $parent_id) {
		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';		

		$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$parent_id."'");//запрос для получения IP шлюза	
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 20, 0, 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(10); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
	
		/** riv need add search_okbit_devices2*/
		$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices&parent_title=$parent_title&parent_id=$parent_id");	
	}
	
	function okbit_devices_discover2(&$out, $parent_title, $parent_id) {
		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';		

		$gate_sh = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID='".$parent_id."'");//запрос для получения IP шлюза	
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 20, 0, 0); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(10); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($gate_sh['IP'], 6400, $data_send); // отправка пакета
	
		/** riv need add search_okbit_devices2*/
		$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices2&parent_title=$parent_title&parent_id=$parent_id");	
	}
	
	
	
	/**
	* okbit_devices_update
	*
	* @access public
	*/
	
	function okbit_devices_update(&$out, $parent_title, $parent_id, $id) {
		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		
		$cmd_up = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE ID=".(int)$id);
		$cmd_up_gate = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID=".(int)$parent_id);		
		
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 21, $cmd_up_gate['SUB_ID'], $cmd_up['DEVICE_ID']); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(1); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($cmd_up_gate['IP'], 6400, $data_send); // отправка пакета
		/** riv need add search_okbit_devices2*/
		$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices&parent_title=$parent_title&parent_id=$parent_id");
	}
	
	function okbit_devices_update2(&$out, $parent_title, $parent_id, $id) {
		
		if($this->config['API_IP']) $ip_serv = $this->config['API_IP'];	
		else $ip_serv = '0.0.0.0';
		
		$cmd_up = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE ID=".(int)$id);
		$cmd_up_gate = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE ID=".(int)$parent_id);		
		
		$data_send = $this->udp_msg_packet($this->config['API_LOG_DEBMES'],0, 0, 65534, 21, $cmd_up_gate['SUB_ID'], $cmd_up['DEVICE_ID']); //сборка UDP OkBit пакета		
		$this->sock_create(); //Создание UDP сокета
		$this->sockSetTimeout(1); //Установка таймаута для получения ответа
		$this->sock_bind($ip_serv, 6600);
		$this->udp_send($cmd_up_gate['IP'], 6400, $data_send); // отправка пакета
		/** riv need add search_okbit_devices2*/
		$this->redirect("?data_source=okbit_device&view_mode=search_okbit_devices2&parent_title=$parent_title&parent_id=$parent_id");
	}
	
	
	
	/**
	* okbit_device delete record
	*
	* @access public
	*/
	
	function delete_okbit_device(&$id) {
		
		$rec = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE ID='".$id."'");
		
		SQLExec("DELETE FROM okbit_data WHERE DEVICE_ID='".$rec['ID']."' AND ETHERNET='0'");
		
		SQLExec("DELETE FROM `okbit_devices` WHERE ID='" .$rec['ID']."'");
		
	}
	
	
	
	
	


	function udp_msg_packet($debug=false, $sub_id = NULL, $id = NULL, $device = NULL, $cmd = NULL, $subto_id = NULL, $to_id = NULL, $value1 = NULL, $value2 = NULL, $value3 = NULL, $value4 = NULL) {  //Функция сборки пакета
		if ($cmd == 10 || $cmd == 20 || $cmd == 21 || $cmd == 22 || $cmd == 25 || $cmd == 26 || $cmd == 64 ||  $cmd == 255 ) { // Запрос без переменной только команда
			$length = 9;
		}
		else if ($cmd == 23 || $cmd == 24 ) { // Считать статус  - передается 1 парматр
			$length = 11;
		}
		else if ($cmd == 30){// Присвоение одного значение ОЗУ, передается два параметра:  адрес канала ОЗУ, значение)
			$length = 13;
		}
		else if ($cmd == 31) { // Присвоение двух значений ОЗУ, передается три параметра: адрес канала ОЗУ, значение 1, значение 2)
			$length = 15;
		}
		else if ($cmd == 13) { // Присвоение двух значений ОЗУ, передается три параметра: адрес канала ОЗУ, значение 1, значение 2)
			$length = 17;
		}
		
		//4F4B4249542D554450AAAA090000FFFE0014000005FD
		
		$date_array = array(// Собираем массив данных для строки UDP -запроса
			"title"=>$this->val_set_edit("OKBIT-UDP")[0], 			// Текствое собщение протокола
			"s_cod" => sprintf('%02X', 0xAAAA),            			// Стартовый ярлык
			"length" => sprintf('%02X', $length),				// Длины сообщения
			"sub_id" => sprintf('%02X', $sub_id),				// Sub ID отправителя
			"id" => sprintf('%02X', $id),					// ID отправителя
			"device_HI"=> sprintf('%02X', $device >> 8),			// Вырхний байт кода модуля
			"device_LOW"=> sprintf('%02X', $device & 0xFF),			// Нижний байт кода модуля
			"cmd_HI"=> sprintf('%02X', $cmd >> 8),				// Верхний байт команды
			"cmd_LOW"=> sprintf('%02X', $cmd & 0xFF),			// Нижний байт команды
			"subto_id"=> sprintf('%02X', $subto_id),			// Sub ID получателя
			"to_id"=> sprintf('%02X', $to_id),				// ID получателя
			"val_HI1"=> sprintf('%02X', $value1 >> 8),			// Верхний регистр первого значения
			"val_LOW1"=> sprintf('%02X', $value1 & 0xFF),			// Нижний регистр первого значения
			"val_HI2"=> sprintf('%02X', $value2 >> 8),			// Верхний регистр второго значения
			"val_LOW2"=> sprintf('%02X', $value2 & 0xFF),			// Нижний регистр второго значения
			"val_HI3"=> sprintf('%02X', $value3 >> 8),			// Верхний регистр третьего значения
			"val_LOW3"=> sprintf('%02X', $value3 & 0xFF),			// Нижний регистр третьего значения
			"val_HI4"=> sprintf('%02X', $value4 >> 8),			// Верхний регистр третьего значения
			"val_LOW4"=> sprintf('%02X', $value4 & 0xFF),			// Нижний регистр третьего значения
			);


		$checksum =  ($this->val_set_edit("OKBIT-UDP")[1]) + 340 +
							hexdec($date_array['length']) + hexdec($date_array['sub_id']) + hexdec($date_array['id']) +
							hexdec($date_array['device_HI']) + hexdec($date_array['device_LOW']) + hexdec($date_array['cmd_HI']) +
							hexdec($date_array['cmd_LOW']) + hexdec($date_array['subto_id']) + hexdec($date_array['to_id']);

		if ($cmd == 23 || $cmd == 24 ){
			$checksum = 	$checksum + hexdec($date_array['val_HI1']) + hexdec($date_array['val_LOW1']);
		}
		else if ($cmd == 30) {
			$checksum = 	$checksum + hexdec($date_array['val_HI1']) + hexdec($date_array['val_LOW1']) +
							hexdec($date_array['val_HI2']) + hexdec($date_array['val_LOW2']);
		}
		else if ($cmd == 31) {
			$checksum = 	$checksum + hexdec($date_array['val_HI1']) + hexdec($date_array['val_LOW1']) +
							hexdec($date_array['val_HI2']) + hexdec($date_array['val_LOW2']) +
							hexdec($date_array['val_HI3']) + hexdec($date_array['val_LOW3']);
		}
		else if ($cmd == 13) {
			$checksum = 	$hecksum + hexdec($date_array['val_HI1']) + hexdec($date_array['val_LOW1']) +
							hexdec($date_array['val_HI2']) + hexdec($date_array['val_LOW2']) +
							hexdec($date_array['val_HI3']) + hexdec($date_array['val_LOW3']) +
							hexdec($date_array['val_HI4']) + hexdec($date_array['val_LOW4']);
		}
		
		$date_array['checksum_HI'] = sprintf('%02X', $checksum >> 8);
		$date_array['checksum_LOW'] = sprintf('%02X', $checksum & 0xFF);
		
		$data_packet=NULL;
		//собираем пакет воедино
		$data_packet =  $date_array['title'] .
						$date_array['s_cod'] . $date_array['length'] . $date_array['sub_id'] . $date_array['id'] .
						$date_array['device_HI'] . $date_array['device_LOW'] . $date_array['cmd_HI'] . $date_array['cmd_LOW'] .
						$date_array['subto_id'] . $date_array['to_id'];

		if ($cmd == 23 || $cmd == 24 ){
			$data_packet = 	$data_packet . $date_array['val_HI1']  . $date_array['val_LOW1'];
		}
		else if ($cmd == 30) {
			$data_packet = 	$data_packet . $date_array['val_HI1']  . $date_array['val_LOW1'] .
							$date_array['val_HI2'] . $date_array['val_LOW2'];
		}
		else if ($cmd == 31) {
			$data_packet = 	$data_packet . $date_array['val_HI1']  . $date_array['val_LOW1'] . $date_array['val_HI2'] .
						$date_array['val_LOW2'] . $date_array['val_HI3'] . $date_array['val_LOW3'];
		}
		else if ($cmd == 13) {
			$data_packet = 	$data_packet . $date_array['val_HI1']  . $date_array['val_LOW1'] . $date_array['val_HI2'] .
							$date_array['val_LOW2'] . $date_array['val_HI3'] . $date_array['val_LOW3'] .
							$date_array['val_HI4'] . $date_array['val_LOW4'];
		}
		$data_packet = 	$data_packet . $date_array['checksum_HI'] . $date_array['checksum_LOW'];

		return ($data_packet);
	}

	public function val_set_edit($val_edit=NULL){//функция преобразования строки в hex - массив, для текстовых данных

		$crc = NULL;

		for ($i = 0; $i < strlen($val_edit); $i++) {
			$val_arr[$i]  = substr($val_edit, $i,1);
		}

		$data_pack = NULL;

		for ($i = 0; $i <  count($val_arr); $i++) {
			$temp = sprintf('%02X', (ord($val_arr[$i])));
			$crc = $crc + hexdec($temp);
			$data_pack  = $data_pack  . $temp;
		}


		return array($data_pack , $crc);
	}
	
	
	
	/**
	* okbit_sock_create 	
	* 
	* Создание UDP Сокета
	*
	* @access public
	*/	
	function sock_create() { //Создание udp сокета	  
		if(!($this->sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP))){
			$errorcode = socket_last_error();
			$errormsg = socket_strerror($errorcode);
			if ($this->config['API_LOG_DEBMES']) DebMes ("Couldn't create socket: [$errorcode] $errormsg", 'okbit');
		} 
		else if ($this->config['API_LOG_DEBMES']) DebMes ("Socket created", 'okbit');
	}
	
	
	
	/**
	* okbit_sock_bind 	
	* 
	* Привязка исходного адреса
	*
	* @access public
	*/
	function sock_bind($ip_send='0.0.0.0', $port_send) {
	
		if(!socket_bind($this->sock, $ip_sen, $port_send)){
		   $errorcode = socket_last_error();
		   $errormsg = socket_strerror($errorcode);
		   if ($this->config['API_LOG_DEBMES']) DebMes ("Could not bind socket : [$errorcode] $errormsg", 'okbit');
		}
		
		else if ($this->config['API_LOG_DEBMES']) DebMes ("Socket bind OK", 'okbit');
	}
	
	/**
	* okbit_sockSetTimeout
	* 
	* Установка тайм аута для отправке получения пакета, в случае если шлюз не доступен
	*
	* @access public
	*/
	function sockSetTimeout($timeout = 1) { // 
		if (!socket_set_option($this->sock, SOL_SOCKET, SO_RCVTIMEO, array("sec" => $timeout, "usec" => 0))) {
			$errorcode = socket_last_error();
			$errormsg = socket_strerror($errorcode);
			if ($this->config['API_LOG_DEBMES'])DebMes ("Error setting timeout SO_RCVTIMEO - [socket_create()] [$errorcode] $errormsg", 'okbit');
		}			
		else if ($this->config['API_LOG_DEBMES']) DebMes ('Timeout SO_RCVTIMEO successfully set', 'okbit');		
	}
	
	
	/**
	* okbit_sockSetBroadcast
	* 
	* Установка параметров сокета в броадкаст.
	*
	* @access public
	*/
	public function sockSetBroadcast() { 
		if (!socket_set_option($this->sock, SOL_SOCKET, SO_BROADCAST, 1)) {
			$errorcode = socket_last_error();
			$errormsg = socket_strerror($errorcode);
			if ($this->config['API_LOG_DEBMES']) DebMes ("Error setting broadcast SO_BROADCAST - [socket_create()] [$errorcode] $errormsg", 'okbit');
		} else if ($this->config['API_LOG_DEBMES']) DebMes ('Broadcast SO_BROADCAST successfully set', 'okbit');
	}
	
	
	
	/**
	* okbit_udp_send
	* 
	* Отправка сообщения на шлюз
	*
	* @access public
	*/
	function udp_send($ip_gate='255.255.255.255', $port_gate=6400, $udpPacket){				
				 

		if(!($bytes = socket_sendto($this->sock, $udpPacket, strlen($udpPacket) , 0 ,  $ip_gate,  $port_gate))){
			$errorcode = socket_last_error();
			$errormsg = socket_strerror($errorcode);
			if ($this->config['API_LOG_DEBMES']) DebMes ("Cannot send data to socket [$errorcode] $errormsg", 'okbit');
			
		} else if ($this->config['API_LOG_DEBMES']){	
			DebMes (">>>>> $udpPacket", 'okbit');
			DebMes (">>>>> Sent $bytes bytes to socket", 'okbit');
		}
		
			
	
		$buf = '';
		$count = 0;
	
		while ($bytes = @socket_recvfrom($this->sock, $buf, 4096, 0, $remote_ip, $remote_port)) {
			
			$count += 1;
			
			if ($buf != '') {
				if ($this->config['API_LOG_DEBMES']) {
					DebMes ("$count - <<<<< Reply received from IP $remote_ip , port $remote_port", 'okbit');
					DebMes ("<<<<< $bytes bytes received", 'okbit');
					DebMes ("<<<<< $buf", 'okbit');
				}
				
				$this->parsing_packege($buf, $remote_ip);

				
			} else {
				$errorcode = socket_last_error();
				$errormsg = socket_strerror($errorcode);
				if ($this->config['API_LOG_DEBMES']) 
				DebMes ("Error reading socket [$errorcode] $errormsg", 'okbit');
			}
		}
				
		
		socket_shutdown($this->sock, 2);
		socket_close($this->sock);		
	}
	
	
	/**
	* udp_send_no_remote
	* 
	* Отправка сообщения на шлюз без ожидания ответа
	*
	* @access public
	*/
	function udp_send_no_remote($ip_gate='255.255.255.255', $port_gate=6400, $udpPacket){				
				 

		if(!($bytes = socket_sendto($this->sock, $udpPacket, strlen($udpPacket) , 0 ,  $this->ip_gate,  $this->port_gate))){
			$errorcode = socket_last_error();
			$errormsg = socket_strerror($errorcode);
			if ($this->config['API_LOG_DEBMES']) DebMes ("Cannot send data to socket [$errorcode] $errormsg", 'okbit');
			
		} else if ($this->config['API_LOG_DEBMES']){	
			DebMes (">>>>> $udpPacket", 'okbit');
			DebMes (">>>>> Sent $bytes bytes to socket", 'okbit');
		}
	
		$buf = '';
		$count = 0;
	
		socket_shutdown($this->sock, 2);
		socket_close($this->sock);		
	}
	
	
	
	/**
	* parsing_packege
	*
	* разбор полученного пакета
	*
	* @access private
	*/	
	
	function parsing_packege($buf_cmd, $gate_ip){
		if ($this->config['API_LOG_DEBMES']) DebMes('<<<< ' . $buf_cmd . ' | IP - ' .  $gate_ip, 'okbit');

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

		if ($udp_package['length'] == 11 || $udp_package['length'] == 13 || $udp_package['length'] == 15 || $udp_package['length'] == 17 || $udp_package['length'] == 19) {
			$udp_package['vol_1'] = hexdec($arr[20] . $arr[21]);
		}
		if ($udp_package['length'] == 13 || $udp_package['length'] == 15 || $udp_package['length'] == 17 || $udp_package['length'] == 19) {
			$udp_package['vol_2'] = hexdec($arr[22] . $arr[23]);
		}
		if ($udp_package['length'] == 15 || $udp_package['length'] == 17 || $udp_package['length'] == 19) {
			$udp_package['vol_3'] = hexdec($arr[24] . $arr[25]);
		}
		if ($udp_package['length'] == 17 || $udp_package['length'] == 19) {
			$udp_package['vol_4'] = hexdec($arr[26] . $arr[27]);
		}
		if ($udp_package['length'] == 19) {
			$udp_package['vol_5'] = hexdec($arr[28] . $arr[29]);
		}
		
	
		$check_in = 0;
		for ($i = 0; $i < $arr_count - 2; $i++){ // считаем чек сум полученного пакета
			$check_in = $check_in + hexdec($arr[$i]);
		}
		if ($check_in == hexdec($arr[$arr_count - 2] . $arr[$arr_count - 1])){ //если чек сум �
											//�равельный производим дальнейшию обработку
			
			
			//Дальнейшие действия в зависимости �
			//�т пришедшей команды в запросе (см. список команд  в udp_send.php)
			
			if ($udp_package['cmd'] == 11){}
			if ($udp_package['cmd'] == 12){}
			if ($udp_package['cmd'] == 21){}
			
			if ($udp_package['cmd'] == 22){
				if ($this->config['API_LOG_DEBMES'])DebMes('COMMAND 22 BEGIN-------------------------------------, MOD - '.$udp_package['cmd'], 'okbit');
				if (in_array($udp_package['device'], array(8001,8002,8003,8004,8005,8006,8006,8007,8008,8009,8010,8011,8012,8013,8014,8015,8016,8017,8018,8019,8020,8021,8022,8023,8024,8025,8026,8027,8028,8029,8030,8031,8032,8033,8034,8035,8036,8037,8038,8039,8040))){
				//Обработчик девайса. При добавлении девайся, нужно указать сюда код модуля
					if ($this->config['API_LOG_DEBMES'])DebMes('!!!ЭтaHomeBus device!!!, MOD - '.$udp_package['device'], 'okbit');
					
					$table_name = 'okbit_devices';
					
					if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ИЩИМ СОВПАДЕНИЕ ПО СЕРИЙНИКУ>>> ', 'okbit');
					$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']))."'");
					if (!$rec['SN']) {
						if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ПОИСК ПО ID>>>> ', 'okbit');
						$rec = SQLSelectOne("SELECT * FROM $table_name WHERE DEVICE_ID='".$udp_package['id']."'");
						if ($this->config['API_LOG_DEBMES'])DebMes('ID'.' '.$rec['DEVICE_ID'], 'okbit');
					}
					
					$rec['STATUS'] = 1;
					$rec['UPDATED'] = date('Y-m-d H:i:s');
					$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
					
					$table_name_ip = 'okbit_gate';
					
					$rec_gate_ip = SQLSelectOne("SELECT * FROM $table_name_ip WHERE IP='".DBSafe($gate_ip)."'");
					if ($this->config['API_LOG_DEBMES'])DebMes('ID Шлюза в базе, для данного девайса - '.$rec_gate_ip['ID'], 'okbit');
					if ($rec['SN'] || $rec['DEVICE_ID'] == $udp_package['id']) {
						$rec['TITLE'] = $udp_package['mes'];
						//$rec['SUB_ID'] = $udp_package['sub_id'];
						//$rec['DEVICE_ID'] = $udp_package['id'];
						//$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						//$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						if ($this->config['API_LOG_DEBMES']) DebMes('TITLE add Auto params for device ' , 'okbit');
						$rec['SN'] = SQLUpdate($table_name, $rec);
					}
					else {
						$rec = null;
						$rec['TITLE'] = $udp_package['mes'];
						$rec['STATUS'] = 1;
						$rec['UPDATED'] = date('Y-m-d H:i:s');	
						$rec['PARENT_ID'] = $rec_gate_ip['ID'];
						$rec['SUB_ID'] = $udp_package['sub_id'];
						$rec['DEVICE_ID'] = $udp_package['id'];
						$rec['DEVICE'] = $udp_package['device'];
						//$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						//$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						//$rec['ID'] = SQLInsert($table_name, $rec);													
						if ($this->config['API_LOG_DEBMES']) DebMes('Add devices' , 'okbit');
						
						if ($udp_package['device'] == 8001){
							$cmd_dev = explode(',',DATA_8001);
						}
						else if ($udp_package['device'] == 8002){
							$cmd_dev = explode(',',DATA_8002);
						}
						else if ($udp_package['device'] == 8003){
							$cmd_dev = explode(',',DATA_8003);
						}
						else if ($udp_package['device'] == 8004){
							$cmd_dev = explode(',',DATA_8004);
						}
						else if ($udp_package['device'] == 8005){
							$cmd_dev = explode(',',DATA_8005);
						}
						else if ($udp_package['device'] == 8006){
							$cmd_dev = explode(',',DATA_8006);
						}
						else if ($udp_package['device'] == 8007){
							$cmd_dev = explode(',',DATA_8007);
						}
						else if ($udp_package['device'] == 8008){
							$cmd_dev = explode(',',DATA_8008);
						}
						else if ($udp_package['device'] == 8009){
							$cmd_dev = explode(',',DATA_8009);
						}
						else if ($udp_package['device'] == 8010){
							$cmd_dev = explode(',',DATA_8010);
						}
						else if ($udp_package['device'] == 8011){
							$cmd_dev = explode(',',DATA_8011);
						}
						else if ($udp_package['device'] == 8012){
							$cmd_dev = explode(',',DATA_8012);
						}
						else if ($udp_package['device'] == 8013){
							$cmd_dev = explode(',',DATA_8013);
						}
						else if ($udp_package['device'] == 8014){
							$cmd_dev = explode(',',DATA_8014);
						}
						else if ($udp_package['device'] == 8015){
							$cmd_dev = explode(',',DATA_8015);
						}
						else if ($udp_package['device'] == 8016){
							$cmd_dev = explode(',',DATA_8016);
						}
						else if ($udp_package['device'] == 8017){
							$cmd_dev = explode(',',DATA_8017);
						}
						else if ($udp_package['device'] == 8018){
							$cmd_dev = explode(',',DATA_8018);
						}
						else if ($udp_package['device'] == 8019){
							$cmd_dev = explode(',',DATA_8019);
						}
						else if ($udp_package['device'] == 8020){
							$cmd_dev = explode(',',DATA_8020);
						}
						else if ($udp_package['device'] == 8021){
							$cmd_dev = explode(',',DATA_8021);
						}
						else if ($udp_package['device'] == 8022){
							$cmd_dev = explode(',',DATA_8022);
						}
						else if ($udp_package['device'] == 8023){
							$cmd_dev = explode(',',DATA_8023);
						}
						else if ($udp_package['device'] == 8024){
							$cmd_dev = explode(',',DATA_8024);
						}
						else if ($udp_package['device'] == 8025){
							$cmd_dev = explode(',',DATA_8025);
						}
						else if ($udp_package['device'] == 8026){
							$cmd_dev = explode(',',DATA_8026);
						}
						else if ($udp_package['device'] == 8027){
							$cmd_dev = explode(',',DATA_8027);
						}
						else if ($udp_package['device'] == 8028){
							$cmd_dev = explode(',',DATA_8028);
						}
						else if ($udp_package['device'] == 8029){
							$cmd_dev = explode(',',DATA_8029);
						}
						else if ($udp_package['device'] == 8030){
							$cmd_dev = explode(',',DATA_8030);
						}
						else if ($udp_package['device'] == 8031){
							$cmd_dev = explode(',',DATA_8031);
						}
						else if ($udp_package['device'] == 8032){
							$cmd_dev = explode(',',DATA_8032);
						}
						else if ($udp_package['device'] == 8033){
							$cmd_dev = explode(',',DATA_8033);
						}
						else if ($udp_package['device'] == 8034){
							$cmd_dev = explode(',',DATA_8034);
						}
						else if ($udp_package['device'] == 8035){
							$cmd_dev = explode(',',DATA_8035);
						}
						else if ($udp_package['device'] == 8036){
							$cmd_dev = explode(',',DATA_8036);
						}
						else if ($udp_package['device'] == 8037){
							$cmd_dev = explode(',',DATA_8037);
						}
						else if ($udp_package['device'] == 8038){
							$cmd_dev = explode(',',DATA_8038);
						}
						else if ($udp_package['device'] == 8039){
							$cmd_dev = explode(',',DATA_8039);
						}
						else if ($udp_package['device'] == 8040){
							$cmd_dev = explode(',',DATA_8040);
						}
						foreach($cmd_dev as $cmd) {
							
									$cmd_rec = array();
									$cmd_rec['TITLE'] = $cmd;
									$cmd_rec['ETHERNET'] = 0;
									$cmd_rec['DEVICE_ID'] = $rec['ID'];
									SQLInsert('okbit_data', $cmd_rec);								
						}
						
						
					}
				}
				if ($this->config['API_LOG_DEBMES'])DebMes('COMMAND 22 END-------------------------------------, MOD - '.$udp_package['cmd'], 'okbit');
			
			}
			if ($udp_package['cmd'] == 23){}
			if ($udp_package['cmd'] == 24){}
			if ($udp_package['cmd'] == 25){}
			if ($udp_package['cmd'] == 26){}
			
			if ($udp_package['cmd'] == 30){ //запуск функции присвоения значениея свойства объекта
				
				$cmd_gate = SQLSelectOne("SELECT * FROM `okbit_gate` WHERE IP='".DBSafe($gate_ip)."'");
								
				$cmd_gate['STATUS'] = 1;
				$cmd_gate['UPDATED'] = date('Y-m-d H:i:s');
				SQLUpdate('okbit_gate', $cmd_gate);
				
				if($cmd_gate['MOD'] == '6000'){				
					$cmd_devices = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE PARENT_ID='".(int)$cmd_gate['ID']."' AND SUB_ID='".(int)$udp_package['subto_id']. "' AND DEVICE_ID='".(int)$udp_package['id']. "'");
					if ($cmd_devices){
						$cmd_devices['STATUS'] = 1;
						$cmd_devices['UPDATED'] = date('Y-m-d H:i:s');
						SQLUpdate('okbit_devices', $cmd_devices);
						if ($cmd_devices['DEVICE'] == 6001){
							$cmd_dev = explode(',',DATA_6001);
						}
						else if ($cmd_devices['DEVICE'] == 6002){
							$cmd_dev = explode(',',DATA_6002);
						}
						else if ($cmd_devices['DEVICE'] == 6003){
							$cmd_dev = explode(',',DATA_6003);
						}
						else if ($cmd_devices['DEVICE'] == 6004){
							$cmd_dev = explode(',',DATA_6004);
						}
						else if ($cmd_devices['DEVICE'] == 6005){
							$cmd_dev = explode(',',DATA_6005);
						}
						else if ($cmd_devices['DEVICE'] == 6006){
							$cmd_dev = explode(',',DATA_6006);
						}
						else if ($cmd_devices['DEVICE'] == 6007){
							$cmd_dev = explode(',',DATA_6007);
						}
						else if ($cmd_devices['DEVICE'] == 6008){
							$cmd_dev = explode(',',DATA_6008);
						}					
						$com_reg = $cmd_dev[$udp_package['vol_1'] - 1]; //вычисляем топик okbit_date по номмеру регистра
						
						$this->processCommand($cmd_gate['MOD'],$cmd_devices['ID'], $com_reg, $udp_package['vol_2']);//передаем данные на присвоение 
					}	
					if ($this->config['API_LOG_DEBMES'])DebMes('UDP parsing: GATE - '. $cmd_gate['MOD'] .'  DEVICE_ID - '. $cmd_devices['DEVICE_ID']. ' REG - ' .$com_reg. ' VOL - ' .$udp_package['vol_2'], 'okbit');
				}
				else if($cmd_gate['MOD'] == '8000'){				
					$cmd_devices = SQLSelectOne("SELECT * FROM `okbit_devices` WHERE PARENT_ID='".(int)$cmd_gate['ID']."' AND SUB_ID='".(int)$udp_package['subto_id']. "' AND DEVICE_ID='".(int)$udp_package['id']. "'");
					if ($cmd_devices){
						$cmd_devices['STATUS'] = 1;
						$cmd_devices['UPDATED'] = date('Y-m-d H:i:s');
						SQLUpdate('okbit_devices', $cmd_devices);
						if ($cmd_devices['DEVICE'] == 8001){
							$cmd_dev = explode(',',DATA_8001);
						}
						else if ($cmd_devices['DEVICE'] == 8002){
							$cmd_dev = explode(',',DATA_8002);
						}
						else if ($cmd_devices['DEVICE'] == 8003){
							$cmd_dev = explode(',',DATA_8003);
						}
						else if ($cmd_devices['DEVICE'] == 8004){
							$cmd_dev = explode(',',DATA_8004);
						}
						else if ($cmd_devices['DEVICE'] == 8005){
							$cmd_dev = explode(',',DATA_8005);
						}
						else if ($cmd_devices['DEVICE'] == 8006){
							$cmd_dev = explode(',',DATA_8006);
						}
						else if ($cmd_devices['DEVICE'] == 8007){
							$cmd_dev = explode(',',DATA_8007);
						}
						else if ($cmd_devices['DEVICE'] == 8008){
							$cmd_dev = explode(',',DATA_8008);
						}
						else if ($cmd_devices['DEVICE'] == 8009){
							$cmd_dev = explode(',',DATA_8009);
						}
						else if ($cmd_devices['DEVICE'] == 8010){
							$cmd_dev = explode(',',DATA_8010);
						}
						else if ($cmd_devices['DEVICE'] == 8011){
							$cmd_dev = explode(',',DATA_8011);
						}
						else if ($cmd_devices['DEVICE'] == 8012){
							$cmd_dev = explode(',',DATA_8012);
						}
						else if ($cmd_devices['DEVICE'] == 8013){
							$cmd_dev = explode(',',DATA_8013);
						}
						else if ($cmd_devices['DEVICE'] == 8014){
							$cmd_dev = explode(',',DATA_8014);
						}
						else if ($cmd_devices['DEVICE'] == 8015){
							$cmd_dev = explode(',',DATA_8015);
						}
						else if ($cmd_devices['DEVICE'] == 8016){
							$cmd_dev = explode(',',DATA_8016);
						}
						else if ($cmd_devices['DEVICE'] == 8016){
							$cmd_dev = explode(',',DATA_8016);
						}
						else if ($cmd_devices['DEVICE'] == 8017){
							$cmd_dev = explode(',',DATA_8017);
						}
						else if ($cmd_devices['DEVICE'] == 8018){
							$cmd_dev = explode(',',DATA_8018);
						}
						else if ($cmd_devices['DEVICE'] == 8019){
							$cmd_dev = explode(',',DATA_8019);
						}
						else if ($cmd_devices['DEVICE'] == 8020){
							$cmd_dev = explode(',',DATA_8020);
						}
						else if ($cmd_devices['DEVICE'] == 8021){
							$cmd_dev = explode(',',DATA_8021);
						}
						else if ($cmd_devices['DEVICE'] == 8022){
							$cmd_dev = explode(',',DATA_8022);
						}
						else if ($cmd_devices['DEVICE'] == 8023){
							$cmd_dev = explode(',',DATA_8023);
						}
						else if ($cmd_devices['DEVICE'] == 8024){
							$cmd_dev = explode(',',DATA_8024);
						}
						else if ($cmd_devices['DEVICE'] == 8025){
							$cmd_dev = explode(',',DATA_8026);
						}
						else if ($cmd_devices['DEVICE'] == 8027){
							$cmd_dev = explode(',',DATA_8027);
						}
						else if ($cmd_devices['DEVICE'] == 8028){
							$cmd_dev = explode(',',DATA_8028);
						}
						else if ($cmd_devices['DEVICE'] == 8029){
							$cmd_dev = explode(',',DATA_8029);
						}
						else if ($cmd_devices['DEVICE'] == 8030){
							$cmd_dev = explode(',',DATA_8030);
						}
						else if ($cmd_devices['DEVICE'] == 8031){
							$cmd_dev = explode(',',DATA_8031);
						}
						else if ($cmd_devices['DEVICE'] == 8032){
							$cmd_dev = explode(',',DATA_8032);
						}
						else if ($cmd_devices['DEVICE'] == 8033){
							$cmd_dev = explode(',',DATA_8033);
						}
						else if ($cmd_devices['DEVICE'] == 8034){
							$cmd_dev = explode(',',DATA_8034);
						}
						else if ($cmd_devices['DEVICE'] == 8035){
							$cmd_dev = explode(',',DATA_8035);
						}
						else if ($cmd_devices['DEVICE'] == 8036){
							$cmd_dev = explode(',',DATA_8036);
						}
						else if ($cmd_devices['DEVICE'] == 8037){
							$cmd_dev = explode(',',DATA_8037);
						}
						else if ($cmd_devices['DEVICE'] == 8038){
							$cmd_dev = explode(',',DATA_8038);
						}
						else if ($cmd_devices['DEVICE'] == 8039){
							$cmd_dev = explode(',',DATA_8039);
						}
						else if ($cmd_devices['DEVICE'] == 8040){
							$cmd_dev = explode(',',DATA_8040);
						}
						
						
						
						$com_reg = $cmd_dev[$udp_package['vol_1'] - 1]; //вычисляем топик okbit_date по номмеру регистра
						
						$this->processCommand($cmd_gate['MOD'],$cmd_devices['ID'], $com_reg, $udp_package['vol_2']);//передаем данные на присвоение 
					}	
					if ($this->config['API_LOG_DEBMES'])DebMes('UDP parsing: GATE - '. $cmd_gate['MOD'] .'  DEVICE_ID - '. $cmd_devices['DEVICE_ID']. ' REG - ' .$com_reg. ' VOL - ' .$udp_package['vol_2'], 'okbit');
				}
				
				else if ($udp_package['sub_id'] =='0' && $udp_package['id'] =='0' && $udp_package['subto_id'] =='0' && $udp_package['to_id'] =='0'){ 
				
					if ($cmd_gate['MOD'] == 7001){
						$cmd_dev = explode(',',DATA_7001);
					}
					else if ($cmd_gate['MOD'] == 7002){
						$cmd_dev = explode(',',DATA_7002);
					}
					else if ($cmd_gate['MOD'] == 7003){
						$cmd_dev = explode(',',DATA_7003);
					}
					else if ($cmd_gate['MOD'] == 7004){
						$cmd_dev = explode(',',DATA_7004);
					}
					else if ($cmd_gate['MOD'] == 7005){
						$cmd_dev = explode(',',DATA_7005);
					}
					else if ($cmd_gate['MOD'] == 7006){
						$cmd_dev = explode(',',DATA_7006);
					}
					else if ($cmd_gate['MOD'] == 7007){
						$cmd_dev = explode(',',DATA_7007);
					}
					else if ($cmd_gate['MOD'] == 7008){
						$cmd_dev = explode(',',DATA_7008);
					}					
					$com_reg = $cmd_dev[$udp_package['vol_1'] - 1]; //вычисляем топик okbit_date по номмеру регистра
					
					$this->processCommand($cmd_gate['MOD'], $cmd_gate['ID'], $com_reg, $udp_package['vol_2']);//передаем данные на присвоение 
					
					
					if ($this->config['API_LOG_DEBMES'])DebMes('UDP parsing: GATE - '. $cmd_gate['MOD'] . ' ID - '. $cmd_gate['ID'] . ' REG - ' .$com_reg. ' VOL - ' .$udp_package['vol_2'], 'okbit');
				}
			}

			else if ($udp_package['cmd'] == 13){ // Получение серийного номера шлюза или девайса и версии прошивки
				if ($this->config['API_LOG_DEBMES']) {
					if ($this->config['API_LOG_DEBMES'])DebMes(date("H:i:s") . " запуск функции обработки информации о шлюзе SUD id - ".$udp_package['sub_id'],'okbit');
				}
				if ($this->config['API_LOG_DEBMES']) {
					if ($this->config['API_LOG_DEBMES'])DebMes(date("H:i:s") . ' VER: ' . $udp_package['vol_1'] . '.' . $udp_package['vol_2'] . ' SN: ' . $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']), 'okbit');
				}
				
				if (in_array($udp_package['device'], array(6001, 6002, 6003, 6004, 6005, 6007, 6008))){//Обработчик девайса. При добавлении девайся, нужно указать сюда код модуля
					if ($this->config['API_LOG_DEBMES'])DebMes('!!!Это девайс RS485!!!, MOD - '.$udp_package['device'], 'okbit');
					
					$table_name = 'okbit_devices';
					
					if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ИЩИМ СОВПАДЕНИЕ ПО СЕРИЙНИКУ>>> ', 'okbit');
					$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']))."'");
					if (!$rec['SN']) {
						if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ПОИСК ПО ID>>>> ', 'okbit');
						$rec = SQLSelectOne("SELECT * FROM $table_name WHERE DEVICE_ID='".$udp_package['id']."'");
						if ($this->config['API_LOG_DEBMES'])DebMes('ID'.$rec['DEVICE_ID'], 'okbit');
					}
					
					
					$rec['STATUS'] = 1;
					$rec['UPDATED'] = date('Y-m-d H:i:s');
					$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
					
					$table_name_ip = 'okbit_gate';
					
					$rec_gate_ip = SQLSelectOne("SELECT * FROM $table_name_ip WHERE IP='".DBSafe($gate_ip)."'");
					
					if ($this->config['API_LOG_DEBMES'])DebMes('ID Шлюза в базе, для данного девайса - '.$rec_gate_ip['ID'], 'okbit');
					if ($rec['SN'] || $rec['DEVICE_ID'] == $udp_package['id']) {
						$rec['SUB_ID'] = $udp_package['sub_id'];
						$rec['DEVICE_ID'] = $udp_package['id'];
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						if ($this->config['API_LOG_DEBMES']) DebMes('Auto params for device ' , 'okbit');
						$rec['SN'] = SQLUpdate($table_name, $rec);
					}
					else {
						$rec = null;
						$rec['STATUS'] = 1;
						$rec['UPDATED'] = date('Y-m-d H:i:s');	
						$rec['PARENT_ID'] = $rec_gate_ip['ID'];
						$rec['SUB_ID'] = $udp_package['sub_id'];
						$rec['DEVICE_ID'] = $udp_package['id'];
						$rec['DEVICE'] = $udp_package['device'];
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['ID'] = SQLInsert($table_name, $rec);													
						if ($this->config['API_LOG_DEBMES']) DebMes('Add devices' , 'okbit');
						
						if ($udp_package['device'] == 6001){
							$cmd_dev = explode(',',DATA_6001);
						}
						else if ($udp_package['device'] == 6002){
							$cmd_dev = explode(',',DATA_6002);
						}
						else if ($udp_package['device'] == 6003){
							$cmd_dev = explode(',',DATA_6003);
						}
						else if ($udp_package['device'] == 6004){
							$cmd_dev = explode(',',DATA_6004);
						}
						else if ($udp_package['device'] == 6005){
							$cmd_dev = explode(',',DATA_6005);
						}
						else if ($udp_package['device'] == 6006){
							$cmd_dev = explode(',',DATA_6006);
						}
						else if ($udp_package['device'] == 6007){
							$cmd_dev = explode(',',DATA_6007);
						}
						else if ($udp_package['device'] == 6008){
							$cmd_dev = explode(',',DATA_6008);
						}
						foreach($cmd_dev as $cmd) {
							
									$cmd_rec = array();
									$cmd_rec['TITLE'] = $cmd;
									$cmd_rec['ETHERNET'] = 0;
									$cmd_rec['DEVICE_ID'] = $rec['ID'];
									SQLInsert('okbit_data', $cmd_rec);								
						}
						
						
					}
					
					
				}
				if (in_array($udp_package['device'], array(8001,8002,8003,8004,8005,8006,8006,8007,8008,8009,8010,8011,8012,8013,8014,8015,8016,8017,8018,8019,8020,8021,8022,8023,8024,8025,8026,8027,8028,8029,8030,8031,8032,8033,8034,8035,8036,8037,8038,8039,8040))){
				//Обработчик девайса. При добавлении девайся, нужно указать сюда код модуля
					if ($this->config['API_LOG_DEBMES'])DebMes('!!!ЭтaHomeBus device!!!, MOD - '.$udp_package['device'], 'okbit');
					
					$table_name = 'okbit_devices';
					
					if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ИЩИМ СОВПАДЕНИЕ ПО СЕРИЙНИКУ>>> ', 'okbit');
					$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']))."'");
					if (!$rec['SN']) {
						if ($this->config['API_LOG_DEBMES'])DebMes('<<<<ПОИСК ПО ID>>>> ', 'okbit');
						$rec = SQLSelectOne("SELECT * FROM $table_name WHERE DEVICE_ID='".$udp_package['id']."'");
						if ($this->config['API_LOG_DEBMES'])DebMes('ID'.$rec['DEVICE_ID'], 'okbit');
					}
					
					$rec['STATUS'] = 1;
					$rec['UPDATED'] = date('Y-m-d H:i:s');
					$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
					
					$table_name_ip = 'okbit_gate';
					
					$rec_gate_ip = SQLSelectOne("SELECT * FROM $table_name_ip WHERE IP='".DBSafe($gate_ip)."'");
					if ($this->config['API_LOG_DEBMES'])DebMes('ID Шлюза в базе, для данного девайса - '.$rec_gate_ip['ID'], 'okbit');
					if ($rec['SN'] || $rec['DEVICE_ID'] == $udp_package['id']) {
						$rec['SUB_ID'] = $udp_package['sub_id'];
						$rec['DEVICE_ID'] = $udp_package['id'];
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						if ($this->config['API_LOG_DEBMES']) DebMes('Auto params for device ' , 'okbit');
						$rec['SN'] = SQLUpdate($table_name, $rec);
					}
					else {
						$rec = null;
						$rec['STATUS'] = 1;
						$rec['UPDATED'] = date('Y-m-d H:i:s');	
						$rec['PARENT_ID'] = $rec_gate_ip['ID'];
						$rec['SUB_ID'] = $udp_package['sub_id'];
						$rec['DEVICE_ID'] = $udp_package['id'];
						$rec['DEVICE'] = $udp_package['device'];
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['ID'] = SQLInsert($table_name, $rec);													
						if ($this->config['API_LOG_DEBMES']) DebMes('Add devices' , 'okbit');
						
						if ($udp_package['device'] == 8001){
							$cmd_dev = explode(',',DATA_8001);
						}
						else if ($udp_package['device'] == 8002){
							$cmd_dev = explode(',',DATA_8002);
						}
						else if ($udp_package['device'] == 8003){
							$cmd_dev = explode(',',DATA_8003);
						}
						else if ($udp_package['device'] == 8004){
							$cmd_dev = explode(',',DATA_8004);
						}
						else if ($udp_package['device'] == 8005){
							$cmd_dev = explode(',',DATA_8005);
						}
						else if ($udp_package['device'] == 8006){
							$cmd_dev = explode(',',DATA_8006);
						}
						else if ($udp_package['device'] == 8007){
							$cmd_dev = explode(',',DATA_8007);
						}
						else if ($udp_package['device'] == 8008){
							$cmd_dev = explode(',',DATA_8008);
						}
						else if ($udp_package['device'] == 8009){
							$cmd_dev = explode(',',DATA_8009);
						}
						else if ($udp_package['device'] == 8010){
							$cmd_dev = explode(',',DATA_8010);
						}
						else if ($udp_package['device'] == 8011){
							$cmd_dev = explode(',',DATA_8011);
						}
						else if ($udp_package['device'] == 8012){
							$cmd_dev = explode(',',DATA_8012);
						}
						else if ($udp_package['device'] == 8013){
							$cmd_dev = explode(',',DATA_8013);
						}
						else if ($udp_package['device'] == 8014){
							$cmd_dev = explode(',',DATA_8014);
						}
						else if ($udp_package['device'] == 8015){
							$cmd_dev = explode(',',DATA_8015);
						}
						else if ($udp_package['device'] == 8016){
							$cmd_dev = explode(',',DATA_8016);
						}
						else if ($udp_package['device'] == 8017){
							$cmd_dev = explode(',',DATA_8017);
						}
						else if ($udp_package['device'] == 8018){
							$cmd_dev = explode(',',DATA_8018);
						}
						else if ($udp_package['device'] == 8019){
							$cmd_dev = explode(',',DATA_8019);
						}
						else if ($udp_package['device'] == 8020){
							$cmd_dev = explode(',',DATA_8020);
						}
						else if ($udp_package['device'] == 8021){
							$cmd_dev = explode(',',DATA_8021);
						}
						else if ($udp_package['device'] == 8022){
							$cmd_dev = explode(',',DATA_8022);
						}
						else if ($udp_package['device'] == 8023){
							$cmd_dev = explode(',',DATA_8023);
						}
						else if ($udp_package['device'] == 8024){
							$cmd_dev = explode(',',DATA_8024);
						}
						else if ($udp_package['device'] == 8025){
							$cmd_dev = explode(',',DATA_8025);
						}
						else if ($udp_package['device'] == 8026){
							$cmd_dev = explode(',',DATA_8026);
						}
						else if ($udp_package['device'] == 8027){
							$cmd_dev = explode(',',DATA_8027);
						}
						else if ($udp_package['device'] == 8028){
							$cmd_dev = explode(',',DATA_8028);
						}
						else if ($udp_package['device'] == 8029){
							$cmd_dev = explode(',',DATA_8029);
						}
						else if ($udp_package['device'] == 8030){
							$cmd_dev = explode(',',DATA_8030);
						}
						else if ($udp_package['device'] == 8031){
							$cmd_dev = explode(',',DATA_8031);
						}
						else if ($udp_package['device'] == 8032){
							$cmd_dev = explode(',',DATA_8032);
						}
						else if ($udp_package['device'] == 8033){
							$cmd_dev = explode(',',DATA_8033);
						}
						else if ($udp_package['device'] == 8034){
							$cmd_dev = explode(',',DATA_8034);
						}
						else if ($udp_package['device'] == 8035){
							$cmd_dev = explode(',',DATA_8035);
						}
						else if ($udp_package['device'] == 8036){
							$cmd_dev = explode(',',DATA_8036);
						}
						else if ($udp_package['device'] == 8037){
							$cmd_dev = explode(',',DATA_8037);
						}
						else if ($udp_package['device'] == 8038){
							$cmd_dev = explode(',',DATA_8038);
						}
						else if ($udp_package['device'] == 8039){
							$cmd_dev = explode(',',DATA_8039);
						}
						else if ($udp_package['device'] == 8040){
							$cmd_dev = explode(',',DATA_8040);
						}
						foreach($cmd_dev as $cmd) {
							
									$cmd_rec = array();
									$cmd_rec['TITLE'] = $cmd;
									$cmd_rec['ETHERNET'] = 0;
									$cmd_rec['DEVICE_ID'] = $rec['ID'];
									SQLInsert('okbit_data', $cmd_rec);								
						}
						
						
					}
					
					
				}
				
				else {//Обработчик Шлюзов.
					$table_name = 'okbit_gate';
					if ($this->config['API_LOG_DEBMES'])DebMes('!!!Это TCP/IP устройство!!!, MOD - '.$udp_package['device'], 'okbit');
					
					
					$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']))."'");
				
					$rec['STATUS'] = 1;
					$rec['UPDATED'] = date('Y-m-d H:i:s');
					$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
					
		
					
					if ($rec['SN']) {
						$rec['IP'] = $gate_ip;
						$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
						$rec['SUB_ID'] = $udp_package['sub_id'];
						if ($this->config['API_LOG_DEBMES']) DebMes('Auto params for gate ' . $deb_title . ' with IP ' . $rec['IP'], 'okbit');
						$rec['SN'] = SQLUpdate($table_name, $rec);
					}

					else {
						$rec = SQLSelectOne("SELECT * FROM $table_name WHERE IP='".DBSafe($gate_ip)."'");
						$rec['STATUS'] = 1;
						$rec['UPDATED'] = date('Y-m-d H:i:s');
						$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
						if ($rec['IP'] && $rec['SN'] == '' && $rec['MOD'] == $udp_package['device']) {
							$rec['SUB_ID'] = $udp_package['sub_id'];
							$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
							$rec['IP'] = SQLUpdate($table_name, $rec);
						}
						else {
							$rec = null;
							$rec['STATUS'] = 1;
							$rec['UPDATED'] = date('Y-m-d H:i:s');
							$rec['VER'] = $udp_package['vol_1'] . '.' . $udp_package['vol_2'];
							$rec['IP'] = $gate_ip;
							$rec['SUB_ID'] = $udp_package['sub_id'];
							$rec['MOD'] = $udp_package['device'];
							//$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
							//$rec['SN'] = sprintf("%04X", $udp_package['vol_3']) . sprintf("%04X", $udp_package['vol_4']);
							$rec['SN'] = $udp_package['vol_3'] . sprintf("%05d", $udp_package['vol_4']);
							SQLInsert($table_name, $rec);
							
							if ($rec['MOD'] =='6000'){						
								if ($this->config['API_LOG_DEBMES']) DebMes('Auto add new gate ' . $deb_title . ' with IP ' . $rec['IP'], 'okbit');
							}
							else if ($rec['MOD'] =='8000'){						
								if ($this->config['API_LOG_DEBMES']) DebMes('Auto add new gate ' . $deb_title . ' with IP ' . $rec['IP'], 'okbit');
							}
							else {
								
								$rec = SQLSelectOne("SELECT * FROM $table_name WHERE SN='".DBSafe($rec['SN'])."'");
								
								if ($rec['MOD'] == 7001){
									$cmd_dev = explode(',',DATA_7001);
								}
								else if ($rec['MOD'] == 7002){
									$cmd_dev = explode(',',DATA_7002);
								}
								else if ($rec['MOD'] == 7003){
									$cmd_dev = explode(',',DATA_7003);
								}
								else if ($rec['MOD'] == 7004){
									$cmd_dev = explode(',',DATA_7004);
								}
								else if ($rec['MOD'] == 7005){
									$cmd_dev = explode(',',DATA_7005);
								}
								else if ($rec['MOD'] == 7006){
									$cmd_dev = explode(',',DATA_7006);
								}
								else if ($rec['MOD'] == 7007){
									$cmd_dev = explode(',',DATA_7007);
								}
								else if ($rec['MOD'] == 7008){
									$cmd_dev = explode(',',DATA_7008);
								}	
								
								foreach($cmd_dev as $cmd) {
									$cmd_rec = array();
									$cmd_rec['TITLE'] = $cmd;
									$cmd_rec['ETHERNET'] = 1;
									$cmd_rec['DEVICE_ID'] = $rec['ID'];
									SQLInsert('okbit_data', $cmd_rec);								
								}	
								
								if ($this->config['API_LOG_DEBMES']) DebMes('Auto add new modul_'. $rec['MOD'].' DEVICE_ID '.$rec['ID'].' with IP ' . $rec['IP'], 'okbit');
							}
						}
					}
					
					
					
					
					
				}
				
				
			}
			return "UDP parsing OK, Count - " . $arr_count . " Checksum - " . $check_in . " Checksum  HEX - " . $arr[$arr_count - 2] . $arr[$arr_count - 1].  " Checksum flag - Yes" ;
		}
		else return "EROR"; //если чек сумм не соответсвует, пакет битый функция вернет ошибку
		
		
	}
	
	
	
	/**
	* processCommand
	*
	* Присвоение значения свойст в зависимости от полученного пакета от шлюза
	*
	* @access private
	*/
	
	function processCommand($mod, $device_id, $command, $value = 0, $params = 0) {
		
		if($mod == '6000'){
			$cmd_rec = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID=".(int)$device_id." AND TITLE LIKE '".DBSafe($command)."' AND ETHERNET='0'");
		}
		else if($mod == '8000'){
			$cmd_rec = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID=".(int)$device_id." AND TITLE LIKE '".DBSafe($command)."' AND ETHERNET='0'");
		}
		else $cmd_rec = SQLSelectOne("SELECT * FROM `okbit_data` WHERE DEVICE_ID=".(int)$device_id." AND TITLE LIKE '".DBSafe($command)."' AND ETHERNET='1'");
			
			
		if ($cmd_rec['ID']) {
			if ($mod == '7002') {
				$value = ($value / 100);				
			}
			
			if ($mod == '7007' && ($command == 'Temp' || $command == 'SetTemp' || $command == 'Hysteresis') ) {
				$value = ($value / 100);				
			}
							
			$cmd_rec['VALUE'] = $value;
			
			$cmd_rec['UPDATED'] = date('Y-m-d H:i:s');
			SQLUpdate('okbit_data', $cmd_rec);

			if ($cmd_rec['LINKED_OBJECT'] && $cmd_rec['LINKED_PROPERTY']) {
				
				setGlobal($cmd_rec['LINKED_OBJECT'] . '.' . $cmd_rec['LINKED_PROPERTY'], $value, array(okbit => '0'));
			}
				
			if ($cmd_rec['LINKED_OBJECT'] && $cmd_rec['LINKED_METHOD']) {
				if (!is_array($params)) {
					$params = array();
				}
				$params['VALUE'] = $value;
				callMethodSafe($cmd_rec['LINKED_OBJECT'] . '.' . $cmd_rec['LINKED_METHOD'], $params);
			}
		}

	}
	
	

	function processCycle() {
		$this->getConfig();
		//to-do
	}
	
	
	/**
	* Install
	*
	* Module installation routine
	*
	* @access private
	*/
	function install($data='') {
		parent::install();
	}
	
	
	/**
	* Uninstall
	*
	* Module uninstall routine
	*
	* @access public
	*/
	function uninstall() {
		SQLExec('DROP TABLE IF EXISTS okbit_gate');
		SQLExec('DROP TABLE IF EXISTS okbit_devices');
		SQLExec('DROP TABLE IF EXISTS okbit_data');
		parent::uninstall();
	}
	
	/**
	* dbInstall
	*
	* Database installation routine
	*
	* @access private
	*/
	function dbInstall($data) {

		$data = <<<EOD
			okbit_gate: ID int(10) unsigned NOT NULL auto_increment
			okbit_gate: TITLE varchar(255) NOT NULL DEFAULT ''
			okbit_gate: IP varchar(255) NOT NULL DEFAULT ''
			okbit_gate: SN varchar(255) NOT NULL DEFAULT ''
			okbit_gate: VER varchar(255) NOT NULL DEFAULT ''
			okbit_gate: MOD varchar(255) NOT NULL DEFAULT ''
			okbit_gate: STATUS int(2) unsigned NOT NULL DEFAULT 0
			okbit_gate: SUB_ID int(10) unsigned NOT NULL DEFAULT 0
			okbit_gate: IP_SERVER varchar(255) NOT NULL DEFAULT ''
			okbit_gate: UPDATED datetime			
			
			okbit_devices: ID int(10) unsigned NOT NULL auto_increment
			okbit_devices: TITLE varchar(255) NOT NULL DEFAULT ''
			okbit_devices: PARENT_ID int(10) unsigned NOT NULL DEFAULT 0
			okbit_devices: SUB_ID int(10) unsigned NOT NULL DEFAULT 0
			okbit_devices: DEVICE_ID int(10) unsigned NOT NULL DEFAULT 0
			okbit_devices: DEVICE int(10) unsigned NOT NULL DEFAULT 0
			okbit_devices: SN varchar(255) NOT NULL DEFAULT ''
			okbit_devices: VER varchar(255) NOT NULL DEFAULT ''
			okbit_devices: MOD varchar(255) NOT NULL DEFAULT ''
			okbit_devices: STATUS int(2) unsigned NOT NULL DEFAULT 0
			okbit_devices: UPDATED datetime

			okbit_data: ID int(10) unsigned NOT NULL auto_increment
			okbit_data: TITLE varchar(255) NOT NULL DEFAULT ''
			okbit_data: VALUE varchar(255) NOT NULL DEFAULT ''
			okbit_data: DEVICE_ID int(10) unsigned NOT NULL DEFAULT 0
			okbit_data: ETHERNET int(2) unsigned NOT NULL DEFAULT 0
			okbit_data: LINKED_OBJECT varchar(100) NOT NULL DEFAULT ''
			okbit_data: LINKED_PROPERTY varchar(100) NOT NULL DEFAULT ''
			okbit_data: LINKED_METHOD varchar(100) NOT NULL DEFAULT ''
			okbit_data: UPDATED datetime
EOD;
		parent::dbInstall($data);
	}
	
}