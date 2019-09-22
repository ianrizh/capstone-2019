<?php 
include 'includes/session.php';

if(isset($_POST['status'])){
$status = $_POST['status']; 
$conn = $pdo->open();
if ($status == ''){
    $stmt = $conn->prepare("SELECT * FROM reservation where id_services !='0'");
    $stmt->execute();    
}
else{
$stmt = $conn->prepare("SELECT * FROM reservation where id_services !='0' AND status = '$status'");
}
$stmt->execute();

foreach($stmt as $row3){
    $reservation_id = $row3['reservation_id'];
    $date = $row3['thedate'];
    $time = $row3['time_reservation'];
    $s_id = $row3['id_services'];
    
    $user_pets_id = $row3['user_pets_id'];
            $stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
            $stmt->execute();
            foreach($stmt as $row4){
            $id_cust = $row4['id_cust'];
            $id_pet = $row4['id_pet'];
                $stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
                $stmt->execute();
                foreach($stmt as $pet1){
                $pet_name = $pet1['pet_name'];
                    $stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
                    $stmt->execute();
                    foreach($stmt as $rowsss){
                    $fullname = $rowsss['firstname']. ' ' .$rowsss['lastname'];
                        $stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'");
                        $stmt->execute();
                        foreach($stmt as $row5){
                        }
                        if($s_id == "0"){
                            $name = ' Veterinary Health Care';
                        }
                        else{
                            $name = $row5['name'];
                        }
    echo "
    <tr>";
    if(strstr($name, "Boarding") !== FALSE){
    echo "<td>BRDNG_0".$reservation_id."</td>";
    }
    else{
    echo "<td>GRMMNG_0".$reservation_id."</td>";
    }
    echo "
    <td>".$fullname."</td>
    <td>".$pet_name."</td>
    <td>".$name."</td>
    <td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
    
    <td>".$row3['status']."</td>
    <td> ";?>
    <?php
    if($row3['status'] != 'Decline' && $row3['status'] != 'Confirm' && $row3['status'] != 'On Process'){
    echo "<button class='btn btn-success btn-sm edit1 btn-flat' data-id='".$row3['reservation_id']."'><i class='fa fa-edit'></i> Edit</button> ";
    }
    else{
    echo "<button class='btn btn-success btn-sm edit4 btn-flat' data-id='".$row3['reservation_id']."'><i class='fa fa-edit'></i> Edit</button> ";
    }
    ?>
    <?php echo "
    </td>
    </tr>
    ";
    }
    }
    }
    }
    }
    
    $pdo->close();

    
?>