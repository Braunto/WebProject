<?php 
include('../php/dbConnect.php');
$sql="SELECT * FROM fees;";
$result = $conn->query($sql);
?>
<div><?php echo (isset($_SESSION['infoMsg']))?$_SESSION['infoMsg']:"";?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Basic fee</th>
      <th scope="col">Due date</th>
      <th scope="col">Extra fee</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row=$result->fetch_assoc()){
       $sql_pay = "SELECT CONCAT(`firstname`,' ',`lastname`) as 'name', year, date, amount ";
       $sql_pay .= "FROM `annualfee` ";
       $sql_pay .= "JOIN members ON members.memberID=annualfee.memberID ";
       $sql_pay .= "WHERE year=".$row['year'];
       $result_pay = $conn->query($sql_pay);
  ?>
    <tr>
        <th scope="row"><?php echo $row["year"];?></th>
        <td><?php echo $row["basicfee"];?></td>
        <td><?php echo $row["duedate"];?></td>
        <td><?php echo $row["extrafee"];?></td>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_<?php echo $row["year"];?>">
                 Show payments & edit payments
            </button>
        </td>
    </tr>


    <div class="modal fade" id="edit_modal_<?php echo $row["year"];?>" tabindex="-1" role="dialog" aria-labelledby="edit_modal_<?php echo $row["year"];?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_modal_<?php echo $row["year"];?>">Updating fees for year <?php echo $row["year"];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm">
                            <form action="php/update_fees.php" method="POST" > 
                                <div class="form-group">
                                    <label for="basic_fee">Basic fee</label>
                                    <input type="number" class="form-control" id="basic_fee" name="basic_fee" placeholder="1" value="<?php echo $row["basicfee"];?>">
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Due date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" placeholder="1" value="<?php echo $row["duedate"];?>">
                                </div>
                                <div class="form-group">
                                    <label for="extra_fee">Extra fee</label>
                                    <input type="number" class="form-control" id="extra_fee" name="extra_fee" placeholder="1" value="<?php echo $row["extrafee"];?>">
                                </div>
                                <input type="hidden" id="year" name="year" value="<?php echo $row["year"];?>">
                                <br/>
                                <button type="submit" class="btn btn-primary" style="width:100%;">Save changes</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <h3>Payment for <?php echo $row["year"];?></h3>
                        <ul class="list-group">
                            <?php while($row_pay = $result_pay->fetch_assoc()){?>
                                <?php if(!mysqli_num_rows($result_pay)==0){?>
                                    <li class="list-group-item"><?php echo $row_pay["name"]. " - Payed : ". $row_pay["amount"]. "€ - On : ". $row_pay["date"]; ?></li>
                                <?php }
                                    ?>  

                            <?php }?>
                        </ul>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
                </div>
                </div>
            </div>
        </div>

  <?php 
  }
  $conn->close();
  $_SESSION['infoMsg']= '';?>
  </tbody>
</table>