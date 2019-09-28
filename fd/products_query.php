<?php 
include 'includes/session.php';

if(isset($_POST['id_category'])){
$id_category = $_POST['id_category']; 
$conn = $pdo->open();
if ($id_category == ''){
    $stmt = $conn->prepare("SELECT * FROM products order by name asc");
    $stmt->execute();    
}
else{
$stmt = $conn->prepare("SELECT * FROM products where id_category = '$id_category'");
}
$stmt->execute();
foreach($stmt as $row){
  $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
  echo "
    <tr>
      <td width='50'>
        <img src='".$image."' height='50px' width='50px'>
      </td>
      <td>".$row['name']."</td>
      <td>&#8369; ".number_format($row['price'], 2)."</td>
      <td>
        <button class='btn btn-info btn-sm edit btn-flat' data-id='".$row['id_products']."'><i class='fa fa-eye'></i> View Product</button>
      </td>
    </tr>
  ";
}
}


$pdo->close();

    
?>