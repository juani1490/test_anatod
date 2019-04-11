<?php 
    require dirname( dirname(__FILE__) ) . '/Entities/class.database.php';

   $db = new class_db();
   $locations = $db->GetAllLocations();
	 $i = 0;

	foreach ($locations as $location){
		$array[$i]['id'] = $location->GetId();
		$array[$i]['nombre'] = $location->GetName();

		$i++;
	}

	$result['Locations'] = $array;

	echo json_encode($result);