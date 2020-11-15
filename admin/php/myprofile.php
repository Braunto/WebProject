<?php
/*
    file:   admin/php/myprofile.php
    desc:   User can change password, add profile picture and edit all
            the personal information here
*/
include('../php/dbConnect.php');
$sql="SELECT * FROM members WHERE memberID=".$_SESSION['userID'];
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<div class="row">
  <div class="col-sm-8">
   <div class="row">
     <div class="col-sm-6">
	  <div class="card"><!--PASSWORD CHANGE STARTS-->
        <div class="card-header bg-info"><h4>Change password</h4></div>
		<div class="card-body">
        <?php
        if(isset($_SESSION['msg'])) echo $_SESSION['msg'];
        $_SESSION['msg']=''; //remove session variable msg
        ?>
        <form action='php/updatepassword.php' method='post'>
        <div class="form-group">
            <label for="pwd">Old password:</label>
            <input type="password" class="form-control" id="pwd" name="oldpwd">
        </div>
        <div class="form-group">
            <label for="pwd">New password:</label>
            <input type="password" class="form-control" id="pwd" name="newpwd1">
        </div>
        <div class="form-group">
            <label for="pwd">Retype new password:</label>
            <input type="password" class="form-control" id="pwd" name="newpwd2">
        </div> 
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
		</div>
	  </div><!--PASSWORD CHANGE ENDS-->
         
      <p></p>
         
     
        
         
      <div class="card"><!--LISTING OF GUIDE GROUPS JOINED STARTS-->
          <div class="card-header bg-info"><h4>My Guide Groups</h4></div>
          <div class="card-body">
          <table class="table table-hover">
                <thead>
          <tr>
                    <th>Group joined</th>
                    </tr>
          
          </thead>
          
              <tbody>
              
                <?php
                $sql="SELECT * FROM groups";
                $sql.=" INNER JOIN membergroups ON groups.groupID=membergroups.groupID";
                $sql.=" INNER JOIN members ON membergroups.memberID=members.memberID";
                $sql.=" WHERE members.memberID=".$_SESSION['userID'];
                $result3=$conn->query($sql);
                while($row3=$result3->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>';
                    echo '<form action="php/changeGroup.php" method="post">';
                    echo  '<input type="hidden" class="form-control" name="mgroup" value="'.$row3['membergroupID'].'">';
                    echo '<button type="submit" class="btn btn-info btn-lg">'.$row3['groupname'].' Leave</button>';
                    echo'</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
              </tbody>
              </table>
          
         
            <table class="table table-hover">
                <thead>
          <tr>
                    <th>Groups avalaibles</th>
                    </tr>
          
          </thead>
          
              <tbody>
              
                <?php
                $sql = "SELECT DISTINCT (membergroups.groupID)    ,groups.groupname FROM groups\n"

    . " INNER JOIN membergroups ON groups.groupID=membergroups.groupID\n"

    . "\n"

    . "where membergroups.groupID NOT in (SELECT membergroups.groupID from membergroups where membergroups.memberID=".$_SESSION['userID'].")";
                $result3=$conn->query($sql);
                while($row3=$result3->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>';
                    echo '<form action="php/changeGroup.php" method="post">';
                    echo  '<input type="hidden" class="form-control" name="groupID" value="'.$row3['groupID'].'">';
                    echo '<button type="submit" class="btn btn-info btn-lg">'.$row3['groupname'].' Join</button>';
                    echo'</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
              </table>
</div>
      </div><!--LISTING OF GUIDE GROUPS JOINED ENDS-->
         
         
         
             
	  <div class="card"><!--Email CHANGE STARTS-->
        <div class="card-header bg-info"><h4>Change email</h4></div>
		<div class="card-body">
        <?php
        if(isset($_SESSION['ema'])) echo $_SESSION['ema'];
        $_SESSION['ema']=''; //remove session variable msg
        ?>
        <form action='php/updateEmail.php' method='post'>
        
        <div class="form-group">
            <label for="email">New email:</label>
            <input type="email" class="form-control" id="email" name="newemail1">
        </div>
        <div class="form-group">
            <label for="email">Retype new email:</label>
            <input type="email" class="form-control" id="email" name="newemail2">
        </div> 
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
		</div>
	  </div><!--Email CHANGE ENDS-->
         
    
       </div>
       
     <div class="col-sm-6">
	    <div class="card"><!--PROFILE IMAGE STARTS-->
         <div class="card-header bg-info"><h4>Update profile image</h4></div>
         <div class="card-body"><?php
            if(isset($_SESSION['imgMsg'])) echo $_SESSION['imgMsg'];
            $_SESSION['imgMsg']='';
            if(!empty($row['profileimage'])){
                //display image
                echo '<img src="../images/members/'.$row['profileimage'].'" class="media-object" style="width:100px">';
            }else echo '<p>No image found in database</p>';
      
            echo '<form action="php/saveProfileImg.php" method="post" enctype="multipart/form-data">';
            echo '<input type="hidden" name="img" value="ok">';
            echo '<div class="form-group">';
            echo '<label for="imgFile">Select your profile image:</label>';
            echo '<input type="file" class="form-control" name="imgFile"></div>';
            echo '<button type="submit" class="btn btn-primary">Upload file</button>';
            echo '</form>';          
        ?>
		 </div>
	    </div><!--PROFILE IMAGE ENDS-->
		<p></p>
		
		<div class="card"><!--LANGUAGE SKILLS-->
			<div class="card-header bg-info"><h4>Your language skills</h4></div>
			<div class="card-body">
			 <ul class="list-group">
			 <?php
			 //code here for listing existing languages for current user
			 $sql="SELECT memberlanguageID,language,level FROM memberlanguages ";
             $sql.="WHERE memberID=".$_SESSION['userID'];
             $result1=$conn->query($sql);
             while($row1=$result1->fetch_assoc()){
                echo '<li class="list-group-item">';
                echo $row1['language'];
                echo ' - ';
                echo $row1['level'];
                echo ' - ';
                echo '<a href="php/removeLanguage.php?mrlngID='.$row1['memberlanguageID'].'">Remove</a>';
                echo '</li>';
             }
			 ?>
			 </ul>
             <?php
                if(isset($_SESSION['lngInfo'])) echo $_SESSION['lngInfo'];
                $_SESSION['lngInfo']='';
             ?>
			</div>
			<div class="card-footer">
				<h4>Add language</h4>
				<form action="php/addLanguage.php" method="post">
					<div class="form-group">
						<label for="language">Language:</label>
						<select name="language">
							<option value="">-Select language-</option>
							<?php
							//code here for selecting those languages, that current user does not have in previous list
							$sql="SELECT language FROM languages WHERE language NOT IN";
                            $sql.="(SELECT language FROM memberlanguages ";
                            $sql.=" WHERE memberID=".$_SESSION['userID'].")";
                            $result2=$conn->query($sql);
                            while($row2=$result2->fetch_assoc()){
                              echo '<option value="'.$row2['language'].'">'.$row2['language'].'</option>';
                            }
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="level">Level:</label>
						<select name="level">
							<option value="">-Select level-</option>
							<option value="Basic">Basic</option>
							<option value="Good">Good</option>
							<option value="Excellent">Excellent</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div><!--LANGUAGE SKILLS ENDS-->
		
		
    </div>
   </div>
  </div>
  <div class="col-sm-4">
	   <div class="card"><!--EDIT YOUR INFORMATION FORM STARTS-->
        <div class="card-header bg-info"><h4>Edit your information</h4></div>
		<div class="card-body">
		<?php if(isset($_SESSION['infoMsg'])) echo $_SESSION['infoMsg'];$_SESSION['infoMsg']='';?>
        <form action="php/updateMyInfo.php" method="post">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" class="form-control" name="firstname"
                value="<?php echo $row['firstname']?>">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" class="form-control" name="lastname"
                value="<?php echo $row['lastname']?>">
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" class="form-control" name="birthdate"
                value="<?php echo $row['birthdate']?>">
            </div>
            <div class="form-group">
                <label for="street">Street address:</label>
                <input type="text" class="form-control" name="street"
                value="<?php echo $row['street']?>">
            </div>
			<div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city"
                value="<?php echo $row['city']?>">
            </div>
			<div class="form-group">
                <label for="zip">Zip:</label>
                <input type="text" class="form-control" name="zip"
                value="<?php echo $row['zip']?>">
            </div>
			<div class="form-group">
                <label for="phone">Phone:</label>
                <input type="phone" class="form-control" name="phone"
                value="<?php echo $row['phone']?>">
            </div>
			<div class="form-group">
                <label for="drivesl">Driverslicense:</label>
                <input type="checkbox" class="form-control" name="driversl" value="ok"
				<?php if($row['driverslicense']=='ok') echo 'checked' ?>>       
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
      </form>
	  </div>
	 </div><!--EDIT YOUR INFORMATION FORM ENDS-->
  </div>
</div>