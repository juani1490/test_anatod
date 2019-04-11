<?php 

  require dirname( dirname(__FILE__) ) . '/Entities/class.database.php';

  $db = new class_db();
  $client = new Client($_POST['Name'], $_POST['DNI'], $_POST['Location']);
  $result = $db->Edit($_POST['Id'], $client);

  echo json_encode($client);
 ?>