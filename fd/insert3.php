<?php  

//insert.php

include('includes/session.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':id_cust'  => $form_data->id_cust,
 ':pet_name'  => $form_data->pet_name,
 ':pet_type'  => $form_data->pet_type,
 ':pet_breed'  => $form_data->pet_breed,
 ':pet_gender'  => $form_data->pet_gender
);
$dataq = array(
 ':id_cust'  => $form_data->id_cust
);

$query = "
 INSERT INTO pets 
 (id_cust, pet_name, pet_type, pet_breed, pet_gender) VALUES 
 (:id_cust, :pet_name, :pet_type, :pet_breed, :pet_gender)
";
$statement = $conn->prepare($query);
$stmt=$conn->prepare("SELECT * FROM pets WHERE id_cust=:id_cust order by id_pet DESC LiMIT 1");
$stmt->execute($dataq);
$row=$stmt->fetch();
$id_pet = $row['id_pet'];
$q = "insert into user_pets (id_cust, id_pet) values (:id_cust, '$id_pet')";
$s = $conn->prepare($q);

if($statement->execute($data) && $s->execute($dataq))
{
 $_SESSION['success'] = 'Data Inserted';
}
echo json_encode($output);
 header('location: next1.php?id_cust='.$id_cust.'');

?>