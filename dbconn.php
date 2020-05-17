<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "finalproject";
	private $conn = "";
	function __construct() {
		$this->connectDB();
		//$conn = $this->connectDB();
		// if(!empty($conn)) {
		// 	$this->selectDB($conn);
		// }
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
	}
	
	// function selectDB($conn) {
	// 	mysqli_select_db($this->database,$conn);
	// }
	
	function runQuery($query) {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result = mysqli_query($conn, $query);
		return $result;
	}
	
	function runQuerys($query) {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result = mysqli_query($conn, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	function numRows($query) {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result  = mysqli_query($conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>
