<div class="modal fade" id="modal_reportpreview">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>REPORT PREVIEW</b></h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<img src="../images/STELLAS LOGO.jpg" width="30%"><br>
					<h3><b>INVENTORY REPORT</b></h3>
					<h4>for <?= date('M. d, Y') ?></h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>PRODUCT NAME</th>
								<th>CATEGORY</th>
								<th>PRICE</th>
								<th>STOCKS</th>
								<th>BATCH</th>
								<th>EXPIRATION DATE</th>
								<th>STOCK DATE</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$conn = $pdo->open();

								try{
									$stmt=$conn->prepare("
										SELECT
											p.name,
											c.category,
											p.price,
											se.stocks,
											se.batch_number,
											se.expired_date,
											se.date_added
										FROM
											stocks_expired se
										LEFT JOIN products p
											ON se.id_products = p.id_products
										LEFT JOIN category c
											ON p.id_category = c.id_category
										WHERE
											se.date_added = DATE_FORMAT(CURRENT_DATE(),'%Y-%m-%d')
									");

									$stmt->execute();
							?>
							<?php foreach($stmt as $row): ?>
								<tr>
									<td><?= $row['name'] ?></td>
									<td><?= $row['category'] ?></td>
									<td><?= $row['price'] ?></td>
									<td><?= $row['stocks'] ?></td>
									<td><?= $row['batch_number'] ?></td>
									<td><?php if($row['expired_date'] == '0000-00-00') { echo "No Expiration Date"; } else { echo $row['expired_date']; } ?></td>
									<td><?= $row['date_added'] ?></td>
								</tr>
							<?php endforeach; ?>
							<?php
								}
								catch(PDOException $e){
									echo $e->getMessage();
								}

								$pdo->close();
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
					<i class="fa fa-close"></i> Close
				</button>
				<button type="submit" class="btn btn-primary btn-flat" name="edit">
					<span class="glyphicon glyphicon-print"></span> PRINT REPORT
				</button>
			</div>
		</div>
	</div>
</div>