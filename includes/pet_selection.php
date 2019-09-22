
<!-- Transaction History -->
<div class="modal fade" id="pet">
<div class="modal-dialog" style="width:50%">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b style="text-transform:uppercase">SELECT PET</b></h4>
</div>
<div class="modal-body">
<table id="example1" class="table table-bordered">
                <thead>
                  <th>NAME</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM user_pets where id_cust=:id_cust");
                      $stmt->execute(['id_cust'=>$_SESSION['user']]);
                      foreach($stmt as $row){
					  	$pet=$row['id_pet'];
							$stmt=$conn->prepare("select * from pets where id_pet = '$pet'");
							$stmt->execute();
							foreach($stmt as $row1){
								$name = $row1['pet_name'];
                        echo "
                          <tr>
                            <td><a href='pet_profile1.php?pet=".$row['id_pet']."'>".$name."</a></td>
                          </tr>
                        ";
						}
                      }
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
</div>
</div>
