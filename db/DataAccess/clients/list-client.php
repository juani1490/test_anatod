<?php 

	 require dirname( dirname(__FILE__) ) . '/Entities/class.database.php';

	 $db = new class_db();
	 $clients = $db->GetAll();
	 $i = 0;

	foreach ($clients as $client){
		$array[$i]['id'] = $client->GetId();
		$array[$i]['nombre'] = $client->GetName();
		$array[$i]['dni'] = $client->GetDNI();
		$array[$i]['LocationName'] = $client->GetLocationId();

		$i++;
	}

	$result['Clients'] = $array;

	echo json_encode($result);