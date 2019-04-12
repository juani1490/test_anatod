<?php 

    require dirname( dirname(__FILE__) ) . '/class.database.php';

   $db = new class_db();
   $results = $db->GetById($_POST['Id']);

   $client[0]['id'] = $results->GetId();
   $client[0]['nombre'] = $results->GetName();
   $client[0]['dni'] = $results->GetDNI();
   $client[0]['localidad'] = $results->GetLocationId();
   
   $result['Data'] = $client;
   
  echo json_encode($result);
 ?>