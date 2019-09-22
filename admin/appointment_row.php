<?php 
	include 'includes/session.php';

	if(isset($_POST['id_services'])){
		$id_services = $_POST['id_services'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM services WHERE id_services=:id_services");
		$stmt->execute(['id_services'=>$id_services]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>

<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "capstone_fifth_year");  
 if(isset($_POST["id_services"]))  
 {  
      $query = "SELECT * FROM services WHERE id_services = '".$_POST["id_services"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 