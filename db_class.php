<?php

class DB {
	private $conn;

	public function dbc() {
		return $this->conn;
	}

	public function __construct() {
		$this->conn = new PDO('oci:dbname=FIT2076', 's26244608', 'monash00');
		$this->conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	}
}

?>
