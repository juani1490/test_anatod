<?php 

/**
 * Client class
*/
class Client {

	/**
	 * Id
	 *
	 * @access private
	 * @var int
	*/
	private $id;

	/**
	 * Name
	 *
	 * @access private
	 * @var string
	*/
	private $name;

	/**
	 * DNI
	 *
	 * @access private
	 * @var string
	*/
	private $dni;

	/**
	 * LocationId
	 *
	 * @access private
	 * @var int
	*/
	private $locationId;

  /**
   * Client class constructor
  */
	public function __construct($name, $dni, $locationId){
        $this->SetName($name);
        $this->SetDNI($dni);
        $this->SetLocationId($locationId);
	}

    public static function Get($id, $name, $dni, $locationId) {
        $instance = new self($name, $dni, $locationId);
        $instance->SetId($id);

        return $instance;
    }

	/**
	 * Sets the id
	 *
	 * @param int $id
	 *
	 * @return void
	*/
	public function SetId($id){
		$this->id = $id;
	}   

	/**
	 * Sets the name
	 *
	 * @param string $name
	 *
	 * @return void
	*/
	public function SetName($name){
		$this->name = $name;
	}

	/**
	 * Sets the dni
	 *
	 * @param string $dni
	 *
	 * @return void
	*/
	public function SetDNI($dni){
		$this->dni = $dni;
	}

	/**
	 * Sets the locationId
	 *
	 * @param int $locationId
	 *
	 * @return void
	*/
	public function SetLocationId($locationId){
		$this->locationId = $locationId;
	}

	/**
	 * Gets the id
	 *
	 * @return int
	*/
	public function GetId(){
		return $this->id;
	}

	/**
	 * Gets the name
	 *
	 * @return string
	*/
	public function GetName(){
		return $this->name;
	}

	/**
	 * Gets the dni
	 *
	 * @return string
	*/
	public function GetDNI(){
		return $this->dni;
	}

	/**
	 * Gets the locationId
	 *
	 * @return int
	*/
	public function GetLocationId(){
		return $this->locationId;
	}
}