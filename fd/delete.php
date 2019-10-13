<?php

//delete.php

include('includes/session.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM pets WHERE id_pet = '".$form_data->id_pet."'";

$statement = $conn->prepare($query);
if($statement->execute())
{
 $message = 'Data Deleted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>
