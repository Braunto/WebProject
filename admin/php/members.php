<?php
/*
    file:   admin/php/members.php
    desc:   Display the members and admin features for that part.
*/
?>
<h3>Admin Members</h3>
<p><a href="php/membersListPDF.php">Members list as PDF</a></p>

<br>
<br>

<?php    
include('../php/dbConnect.php');
$sql="SELECT memberID,firstname,lastname,email,role,password FROM members ";
$sql.="WHERE memberID <> ".$_SESSION['userID'];
$result = $conn->query($sql);
?>
<div>
     <?php
        if(isset($_SESSION['infoMsg'])) echo $_SESSION['infoMsg'];
        $_SESSION['infoMsg']=''; //remove session variable msg
        ?>

<table class="table">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php while($row=$result->fetch_assoc()){?>
        <tr align="center" class="elements_row">
            <th scope="row"><?php echo $row["memberID"];?></th>
            <td><?php echo $row["firstname"];?></td>
            <td><?php echo $row["lastname"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["role"];?></td>
            <td><button type="button" class="btn btn-primary" style="width:45%;" data-toggle="modal" data-target="#edit_modal_<?php echo $row["memberID"];?>"> Edit profile</button></td>
        </tr>

        <div class="modal fade" id="edit_modal_<?php echo $row["memberID"];?>" tabindex="-1" role="dialog" aria-labelledby="edit_modal_<?php echo $row["memberID"];?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_modal_<?php echo $row["memberID"];?>">Updating profile of <?php echo $row["firstname"].' '.$row["lastname"];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm">
                            <form action="php/update_email_admin_user.php" method="POST" > 
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="newemail1" placeholder="name@example.com" value="<?php echo $row["email"];?>">
                                </div>
                                <div class="form-group">
                                <label for="email">Retype new email:</label>
                                <input type="email" class="form-control" id="email" name="newemail2">
                                </div> 
                                <input type="hidden" id="memberID" name="memberID" value="<?php echo $row["memberID"];?>">
                                <br/>
                                <button type="submit" class="btn btn-primary" style="width:100%;">Save changes</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form action="php/update_pass_admin_usr.php" method="POST" > 
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="retype">Retype Password</label>
                                    <input type="password" class="form-control" id="retype" name="retype">
                                </div>
                                <br/>
                                <input type="hidden" id="memberID" name="memberID" value="<?php echo $row["memberID"];?>">
                                <button type="submit" class="btn btn-primary" style="width:100%;">Save changes</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form action="php/updateRole.php" method="POST" > 
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role" value="<?php echo $row["role"];?>">
                                        <option <?php echo $selected=($row["role"] == "admin")?"selected":""; ?> value="admin">admin</option>
                                        <option <?php echo $selected=($row["role"] == "member")?"selected":""; ?> value="member">member</option>
                                    </select>
                                </div>
                                <input type="hidden" id="memberID" name="memberID" value="<?php echo $row["memberID"];?>">
                                <br/>
                                <button type="submit" class="btn btn-primary" style="width:100%;">Save changes</button>
                            </form>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
  <?php }?>
</table>