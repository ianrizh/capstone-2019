<?php 
include 'includes/session.php';

if(isset($_POST['status'])){
$status = $_POST['status']; 
$conn = $pdo->open();
if ($status == ''){
    $stmt = $conn->prepare("SELECT * FROM reservation where id_services = '0'");    
}
else{
$stmt = $conn->prepare("SELECT * FROM reservation where id_services = '0' AND status = '$status'");
}
$stmt->execute();

foreach($stmt as $row){
    $reservation_id = $row['reservation_id'];
    $date = $row['thedate'];
    $time = $row['time_reservation'];
    $s_id = $row['id_services'];
    $user_pets_id = $row['user_pets_id'];
    $r_type = $row['r_type'];
            $stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
            $stmt->execute();
            foreach($stmt as $row1){
            $id_cust = $row1['id_cust'];
            $id_pet = $row1['id_pet'];
                $stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
                $stmt->execute();
                foreach($stmt as $pet){
                $pet_name = $pet['pet_name'];
                    $stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
                    $stmt->execute();
                    foreach($stmt as $rowss){
                    $fullname = $rowss['firstname']. ' ' .$rowss['lastname'];
                        $stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'");
                        $stmt->execute();
                        foreach($stmt as $row2){
                        }
                        if($s_id == "0"){
                            $name = ' Veterinary Health Care';
                        }
                        else{
                            $name = $row2['name'];
                        }
    echo "
    <tr>
    <td>VHC_0".$reservation_id."</td>
    <td>".$fullname."</td>
    <td>".$pet_name."</td>
    <td>".$name."</td>
    <td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
    <td>".$r_type."</td>
    <td>".$row['status']."</td>
    <td> ";?>
    <?php
    if($row['status'] == 'Pending'){
    echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-edit'></i> Confirmation</button> ";
    }
    elseif($row['status'] == 'Waiting' &&  $r_type == 'Walkin'){
    echo "<button class='btn btn-success btn-sm edit1 btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-edit'></i> Change Status</button> ";
    }
    else{
    }
    ?>
    <?php 
    if($row['status'] == 'Confirm' || $row['status'] == 'On Process'){
    echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-clipboard'></i> Findings</button> ";
    }
    else {
    echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."' disabled><i class='fa fa-clipboard'></i> Findings</button> "; }?>
    <?php echo "<a href='history1.php?user=".$row['user_pets_id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> History</a>
    </td>
    </tr>
    ";
    }
    }
    }
    }
}
?>