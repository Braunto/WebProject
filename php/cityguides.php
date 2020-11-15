<?php
/*
    file:   php/cityguides.php
    desc:   Shows the list of guides in a city  
*/
if(!isset($_GET['cityID'])) header('location:index.php?page=cities');
include('php/dbConnect.php');
$sql="SELECT cityname FROM cities WHERE cityID=".$_GET['cityID'];
$result=$conn->query($sql);
if($row=$result->fetch_assoc()){
	$cityname=$row['cityname'];
}else $cityname='';
?>
<br>
<br>
<h2 class="text-white mb-4">Nordic Guides - Guides in <?php echo $cityname ?></h2>
<table class="table table-hover table-dark" style='color:white;'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Languages</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT members.memberID, firstname, lastname FROM members INNER JOIN membergroups ON members.memberID=membergroups.memberID ";
		$sql.="INNER JOIN groups ON membergroups.groupID=groups.groupID INNER JOIN groupcities ";
		$sql.="ON groups.groupID=groupcities.groupID WHERE groupcities.cityID=".$_GET['cityID'];
		$result=$conn->query($sql); //run the query in $sql-variable with $conn-object created in dbConnect.php
        //display the rows -> records coming as result of the SQL-query
        while($row=$result->fetch_assoc()){
            echo '<tr>';
            echo '<td>';
            echo $row['firstname'].' '.$row['lastname'];
            echo ' <a href="index.php?page=showguide&memberID='.$row['memberID'].'">Contact guide</a>';
            echo '</td>';
			$sql1="SELECT language FROM memberlanguages INNER JOIN members ON memberlanguages.memberID=members.memberID ";
			$sql1.="WHERE memberlanguages.memberID=".$row['memberID'];
			$result1=$conn->query($sql1); //run the query in $sql-variable with $conn-object created in dbConnect.php
			//display the rows -> records coming as result of the SQL-query
			while($row1=$result1->fetch_assoc()){
				echo '<td>'.$row1['language'].'</td>';
			}
			echo '</tr>';
        }
        $conn->close(); //close the database connection, when it is not needed anymore in the script
      ?>
    </tbody>
</table>