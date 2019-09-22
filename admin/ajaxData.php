<?php 
Class Database{
 
	private $server = "mysql:host=localhost;dbname=capstone_fifth_year";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$pdo = new Database();
$conn = $pdo->open();
if(isset($_POST["id_type"]) && !empty($_POST["id_type"])){
    $stmt=$conn->prepare("SELECT * FROM schedule WHERE id_type = ".$_POST['id_type']."");
    $stmt->execute();
		echo '<option value="" disabled selected required>---Day---</option>';
	foreach($stmt as $row){
			echo '<option value="'.$row['schedule_id'].'">'.$row['day'].'</option>';
    }
}

if(isset($_POST["schedule_id"]) && !empty($_POST["schedule_id"])){
    $stmt=$conn->prepare("SELECT * FROM time WHERE schedule_id = ".$_POST['schedule_id']." and status = 'Available'");
    $stmt->execute();
	echo '<option value="" disabled selected required>---Time---</option>';
    foreach($stmt as $row){
            echo '<option value="'.$row['time_id'].'">'.$row['time_reservation'].'</option>';
    }
}
?>