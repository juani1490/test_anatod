<?php 

/**
 * Location class
*/
class Location {

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
   * Location class constructor
  */
	public function __construct($name){
		$this->SetName($name);
	}

    public static function Get($id, $name) {
        $instance = new self($name);
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
}