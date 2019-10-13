<?php  

//select.php

include('includes/session.php');

if(empty($_GET)) {
	return false;
}
$id_cust = $_GET['id_cust'];

// $stmt=$conn->prepare("SELECT * from users order by id_cust DESC limit 1");
// $stmt->execute();
// $user = $stmt->fetch();
// $id_cust=$user['id_cust'];

$query = "SELECT * FROM pets WHERE id_cust = '$id_cust'";
$statement = $conn->prepare($query);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {				
    $data[] = $row;
  }
  echo json_encode($data);

?>