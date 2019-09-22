<?php
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
	 	
		$stmt = $conn->prepare("SELECT * from order_main WHERE order_date BETWEEN '$from' AND '$to' ORDER BY order_date DESC");
		$stmt->execute();
		$total = 0;
		foreach($stmt as $row){
			$stmt = $conn->prepare("SELECT * FROM order_detail LEFT JOIN products ON products.id_products=order_detail.product_id WHERE order_id=:order_id");
			$stmt->execute(['order_id'=>$row['order_id']]);
			$amount = 0;
			foreach($stmt as $details){
				$subtotal = $details['price']*$details['quantity'];
				$amount += $subtotal;
			
			$total += $amount;
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['order_date'])).'</td>
				<td>ORDER_0'.$row['order_id'].'</td>
				<td>'.$details['name'].'</td>
				<td><b>P</b> '.number_format($details['price'], 2).'</td>
				<td>'.$details['quantity'].'</td>
				<td><b>P</b> '.number_format($subtotal, 2).'</td>
			</tr>
			';
		}
		}
		$contents .= '
			<tr>
				<td colspan="5" align="right"><b>Total</b></td>
				<td align="right"><b>P '.number_format($row['total'], 2).'</b></td>
			</tr>
		';
		return $contents;
	}

	if(isset($_POST['print'])){
		$ex = explode(' - ', $_POST['date_range']);
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$from_title = date('M d, Y', strtotime($ex[0]));
		$to_title = date('M d, Y', strtotime($ex[1]));

		$conn = $pdo->open();

		require_once('../tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Sales Report: '.$from_title.' - '.$to_title);  
	    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $pdf->SetDefaultMonospacedFont('helvetica');  
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 10);  
	    $pdf->SetFont('helvetica', '', 11);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
	      	<img src="STELLAS LOGO.jpg" width="150">
	      	<h4 align="left">SALES REPORT</h4>
	      	<h4 align="left">'.$from_title." - ".$to_title.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="3">  
	           <tr>  
	           		<th align="center"><b>Date</b></th>
					<th align="center"><b>Order ID</b></th>
	                <th align="center"><b>Product Name</b></th>
					<th align="center"><b>Price</b></th>
					<th align="center"><b>Quantity</b></th>
					<th align="center"><b>Subtotal</b></th>
	           </tr>  
	      ';  
	    $content .= generateRow($from, $to, $conn);  
	    $content .= '</table>';  
	    $pdf->writeHTML($content);  
	    $pdf->Output('sales.pdf', 'I');

	    $pdo->close();

	}
	else{
		$_SESSION['error'] = 'Need date range to provide sales print';
		header('location: sales.php');
	}
?>