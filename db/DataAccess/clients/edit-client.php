<?php 

   require dirname( dirname(__FILE__) ) . '/class.database.php';

  $db = new class_db();
  $client = new Client($_POST['Name'], $_POST['DNI'], $_POST['Location']);
  $result = $db->Edit($_GET['id'], $client);

  echo json_encode($client);
 ?>