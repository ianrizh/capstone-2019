<?php include 'includes/session.php'; ?>

<?php 
$output = '';
if(isset($_POST["category"])){
	$categ1=$_POST["category"];
echo '<table width="100%"  border="3" cellpadding="0" cellspacing="0" style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:10px;"  >
  
  <tr align="center"><td bgcolor="bluegreen"><font color="black"><font size="-1">Product ID </font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Product Name</font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Category</font></td>
		  
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
 	$grand=0;
	foreach($stmt as $categories){

		$productid=$categories['id_products'];
		$categs=$categories['id_category'];
		$output .='<tr align="center"><td><font color="black"><font size="-1">'.$categories['id_products'].'</font></td>';
		$output .='<td><font color="black"><font size="-1">'.$categories['name'].'</font></td>';
		  	$stmt =$conn->prepare("select * from category where id_category ='$categs' ");
		  	$stmt->execute();
		  	foreach($stmt as $categ2){
		  	$total=0;
			 $total+=$categories['total_stocks']; 
			 $grand+=$total;
		$output .='<td><font color="black"><font size="-1">'.$categ2['category'].'</font></td>';		
		$output .='<td><font color="black"><font size="-1">'.$categories['price'].'</font></td>';
		$output .='<td><font color="black"><font size="-1">'.$categories['total_stocks'].'</font></td></tr>';
		
	}}

			
			 $s=number_format($grand);
	$output .='<tr align="center"><th colspan="4"><font size="-1">Total</font></th><th><div align="center">';
		$output .='<font size="-1">'.$s.'</div></font></th></tr>';
	echo "$output";
}
?>