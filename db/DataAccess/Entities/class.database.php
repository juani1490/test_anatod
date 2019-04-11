<?php
require "class.client.php";
require "class.location.php";

/*
 * anatod ® - ©
 */
?>
<?php
class class_db {
    PUBLIC  $conn=NULL;

    CONST user      =   'test',
          pass      =   'test5678',
          db        =   'test_anatod',
          serverip  =   'consumos1.c75o4mima6rb.us-east-1.rds.amazonaws.com';
    
    public function __construct(){
        if(!$this->conn){
            try {
                $this->conn = new mysqli(SELF::serverip,SELF::user,SELF::pass,SELF::db); 
                $this->conn->set_charset("utf8");
                if (!$this->conn) {die('No se pudo conectar.');}
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }

    /**
     * Adds a client
     *
     * @param array $client
    */
    public function Add($client){
      $name = ucwords(strtolower($client->GetName()));
      $dni = $client->GetDNI();
      $locationId = $client->GetLocationId();

      $this->conn->query("INSERT INTO clientes (nombre, dni, localidad) VALUES('$name', '$dni', '$locationId')");
    }

    /**
     * Edit a client
     *
     * @param int $id
     * @param array $client
    */
    public function Edit($id, $client){
      $name = ucwords(strtolower($client->GetName()));
      $dni = $client->GetDNI();
      $locationId = $client->GetLocationId();

      $this->conn->query("UPDATE clientes SET nombre = '$name', dni = '$dni', localidad = '$locationId' WHERE id = $id");
    }

    /**
     * Gets a client by id
     *
     * @param int $id
     *
     * @return mixed (array or null)
    */
    public function GetById($id){
      $client = $this->conn->query("SELECT * FROM clientes WHERE Id = '$id'");

      if (!(empty($client) || (is_null($client)))){
        $row = $client->fetch_assoc();
        $result = Client::Get($row['id'], $row['nombre'], $row['dni'], $row['localidad']);

        return $result;
      } else {
        return null;
      }
    }

    /**
     * Gets all clients
     *
     * @return mixed (array or null)
    */
    public function GetAll(){
      $clients = $this->conn->query("SELECT c.id, 
                                            c.nombre, 
                                            c.dni, 
                                            l.nombre AS LocationName 
                                            FROM  clientes c JOIN localidades l ON c.localidad = l.id ORDER BY c.nombre");

      if (!(empty($clients) || (is_null($clients)))){
        
        foreach ($clients as $client){

          $result[] =  Client::Get($client['id'], $client['nombre'], $client['dni'], $client['LocationName']);
        }

        return $result;
      } else {
        return null;
      }
    }

    /**
     * Gets all locations
     *
     * @return mixed (array or null)
    */
    public function GetAllLocations(){
      $locations = $this->conn->query("SELECT * FROM  localidades");

      if (!(empty($locations) || (is_null($locations)))){

        foreach ($locations as $location){

          $result[] =  Location::Get($location['id'], $location['nombre']);
        }

        return $result;
      } else {
        return null;
      }
    }
}