<?php

class Property {
	// member variables
	private $street;
	private $suburb;
	private $state;
	private $type;
	private $postcode;
	private $price;
	private $desc;
	private $features;

	// constructor
	function __construct($query_res) {
		$this->street = $query_res["prop_street"];
		$this->suburb = $query_res["prop_suburb"];
		$this->state = $query_res["prop_state"];
		$this->type = $query_res["prop_type"];
		$this->postcode = $query_res["prop_pc"];
		$this->price = $query_res["price"];
		$this->desc = $query_res["prop_desc"];
		$this->features = array();
	}

	// retrieve/update methods
	public function get_street() {return $this->street;}
	public function set_street($_street) {$this->street = $_street;}

	public function get_suburb() {return $this->suburb;}
	public function set_suburb($_suburb) {$this->suburb = $_suburb;}

	public function get_state() {return $this->state;}
	public function set_state($_state) {$this->state = $_state;}

	public function get_type() {return $this->type;}
	public function set_type($_type) {$this->type = $_type;}

	public function get_postcode() {return $this->postcode;}
	public function set_postcode($_postcode) {$this->postcode = $_postcode;}

	public function get_price() {return $this->price;}
	public function set_price($_price) {$this->price = $_price;}

	public function get_features() {return $this->features;}
	public function set_features($_features) {$this->features = $_features;}
	public function add_feature($_feature) {$this->features[] = $_feature;}

	public function get_desc() {return $this->desc;}
	public function set_desc($_desc) {$this->desc = $_desc;}
}

?>
