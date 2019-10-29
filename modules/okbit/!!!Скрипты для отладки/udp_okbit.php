<?php
 
/*
	UDP OkBit.ru
	
	C:\_majordomo\server\php\php.exe C:\_majordomo\htdocs\test_okbit\udp_okbit.php
	
	
	-------- Значение команд в десятичном/шестнадцатиричном формате ---------
   
	0010/A - ответ все хорошо
	0011/B - ответ ошибка (1 - колличество ошибок в ОЗУ, 2- код последней ошибки)
	
	0020/14 - Поиск всех онлайн устройств
	0021/15 - Считать/передать тип устройства, версию прошивки (1- тип устройства, 2 - версия)
	0022/16 - Считат/передать коментарий устройства(n-е количество буквенный коментарий)
	0023/17 - Считать/передать статус входа (1 - адрес входа, 2- значение)
	0024/18 - Считать/передать значение ячейки ОЗУ (1 - адрес ячейки, 2 - значение)
	0025/19 - Считать/передать все значения ячеек ОЗУ
	0026/1A - Считать/передать количество ошибок на шине ( 1- кол-воошибок)
	
	0030/1E - Присвоение значение ячейки ОЗУ (1 - адрес канал, 2 - значение)								
	0031/1F - Присвоение двух значений ОЗУ (1 - адрес канала, 2 - значение 1, 3 - значение 2)	
	
	0040/28 - Смена Sub ID (1 - новый адрес подсети)								
	0041/29 - Смена ID (1 - новый адрес устройства)	
	
	0055/37 - Запись текстового значения (примечание для модуля)
	
	0060/3C - Запись значения настройки в модуль (1 - адрес канала, 2 - значение )								
	0061/3D - Запись значений настройки в модуль (1 - адрес канала, 2 - значение 1, 3- значение 2)
	0062/3D - смена IP шлюза (1 - адрес, 2 - адрес, 3 - адрес, 4 - адрес)
	
	0070/46 - Запись значения сценария (1 - адрес канала,  2 - N -сценария, 3 - Sub ID получателя, 4 - id получателя , 5 - адрес канала ОЗУ,
				6 - значение 1, 7 - значение 2)			
	
	
*/

	Define('UDP_LOG', "C:\/_majordomo\/htdocs\/test_okbit\/udp_log.txt"); // Путь к файлу записи логов

	require_once "udp_okbit.class.php"; // Подключаем класс 
	require_once "udppacket.class.php";

	//Reduce errors
	error_reporting(~E_WARNING);

	$ip_server = getHostByName(getHostName());//локальный ip сервера мажордомо
	
	$ip_array = explode('.', $ip_server);//локальный ip сервера мажордомо
	
	$udppacket = new Udp_packet($ip_array, 4, 5, 6004, 13, 0, 0, 1, 4, 1910, 00006); // Данные для формирование пакета на отправку
	
	//$gate = new Udp_gate('192.168.88.252', 6400, '0.0.0.0', 6600, true); //задаем свойства класса адрес и порт шлюза и порт модуля udp_send
	$gate = new Udp_gate('10.30.6.100', 6500, '0.0.0.0', 6600, true); //задаем свойства класса адрес и порт шлюза и порт модуля udp_send




	$data_packet = $udppacket->udp_msg_packet(); //сборка UDP OkBit пакета

	$data_send = $data_packet;
	
	
	$gate->sock_create(); //Создание UDP сокета
	$gate->sockSetTimeout(); //Установка таймаута для получения ответа
	$gate->udp_send($data_send); // отправка пакета



	//функция записи в лог полученного сообщения
	function log_write($s_mess){ 
		$dt = date("d-m-Y H:i:s");
		$text = $dt . " - " . $s_mess.PHP_EOL;  
		$fp = fopen (UDP_LOG, "a+");
		fwrite($fp,$text);  
		fclose($fp);  
	}


?>