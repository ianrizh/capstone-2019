<?php  

//select.php

include('includes/session.php');
$stmt=$conn->prepare("SELECT * from users order by id_cust DESC limit 1");
$stmt->execute();
$user = $stmt->fetch();
$id_cust=$user['id_cust'];

$query = "
	SELECT
		r.*,
		p.pet_name,
		(CASE 
	        WHEN r.type_id=1 THEN 'Boarding'
	        WHEN r.type_id=2 THEN 'Veterinary Health Care'
	        WHEN r.type_id=3 THEN 'Grooming'
	        ELSE 'Undefined'
    	END) AS service_type,
		IF(r.type_id=2,'',s.name) AS service_name
	FROM
		reservation r
	LEFT JOIN user_pets up
		ON r.user_pets_id = up.user_pets_id
	LEFT JOIN pets p
		ON up.id_pet = p.id_pet
	LEFT JOIN services s
		ON r.id_services = s.id_services
	WHERE
		r.id_cust = '$id_cust'
";
$statement = $conn->prepare($query);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {       
    $data[] = $row;
  }
  echo json_encode($data);

?>