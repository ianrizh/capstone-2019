<?php include 'includes/session.php'; ?>

<?php 
$output = '';
if(isset($_POST["category"])){
	$categ1=$_POST["category"];
echo '<table class="table table-bordered" >
  
  <tr align="center"><td bgcolor="bluegreen"><font color="black"><font size="-1">Product ID </font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Product Name</font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Category</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Expiration Date</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Price</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Stock Left</font></td></tr>';
 
	if($_POST["category"] != ''){
		

		  	$conn = $pdo->open();
		  	$stmt=$conn->prepare("select * from products where id_category = :categ");
		  	$stmt->execute(['categ'=>$categ1]);

	
		  	 ?>
<?php

	}
	else
	{

		  	$conn = $pdo->open();
		  	$stmt=$conn->prepare("select * from products");

		  	$stmt->execute();
	
	}

	foreach($stmt as $categories){

		$productid=$categories['id_products'];
		$categs=$categories['id_category'];
		$output .='<tr align="center"><td><font color="black"><font size="-1">'.$categories['id_products'].'</font></td>';
		$output .='<td><font color="black"><font size="-1">'.$categories['name'].'</font></td>';
		  	$stmt =$conn->prepare("select * from category where id_category ='$categs' ");
		  	$stmt->execute();
		  	foreach($stmt as $categ2){
		  
		$output .='<td><font color="black"><font size="-1">'.$categ2['category'].'</font></td>';		
		$output .='<td><font color="black"><font size="-1"></font></td>';
		$output .='<td><font color="black"><font size="-1">'.$categories['price'].'</font></td>';
		$output .='<td><font color="black"><font size="-1">'.$categories['total_stocks'].'</font></td></tr>';
		$stmt=$conn->prepare("select * from stocks_expired where id_products = :productid and expired_date >= CURRENT_DATE() or id_products = :productid and expired_date = 0000-00-00");
          $stmt->execute(['productid'=>$productid]);
          foreach($stmt as $exp)
          {
        $output .='<tr align="center"><td><font color="black"><font size="-1"></font></td>';
		$output .='<td><font color="black"><font size="-1"></font></td>';
		  	
		  
		$output .='<td><font color="black"><font size="-1">'.$categ2['category'].'</font></td>';		
		$output .='<td><font color="black"><font size="-1">'.$exp['expired_date'].'</font></td>';
		$output .='<td><font color="black"><font size="-1"></font></td>';
		$output .='<td><font color="black"><font size="-1">'.$exp['stocks'].'</font></td></tr>';
          }						
	}}
	echo "$output";
}
?>