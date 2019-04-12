<?php 
   require dirname( dirname(__FILE__) ) . '/class.database.php';

  $db = new class_db();
  $client = new Client($_POST['Name'], $_POST['DNI'], $_POST['Location']);

  $results = $db->Add($client);
   
   echo json_encode($results);
 ?>