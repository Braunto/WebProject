<?php
/*
    file:   php/cities.php
    desc:   Shows the list of cities in database. 
*/
?>






<body>
<div class="container"></div>
    <br>
    <br>
<h2 class="text-white mb-4">Cities</h2>
    <br>
    <br>
<table class="table table-hover table-dark" style='color:white;'>
    <thead>
      <tr>
        <th>City</th>
        <th>Country</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        include('php/dbConnect.php');
        if(isset($_GET['country'])){
          $sql="SELECT cityID,cityname,country FROM cities WHERE country='".$_GET["country"]."' ORDER BY cityname";
        }
          
        else{
          $sql="SELECT cityID,cityname,country FROM cities ORDER BY cityname";
        }
        $result=$conn->query($sql); //run the query in $sql-variable with $conn-object created in dbConnect.php
        //display the rows -> records coming as result of the SQL-query
        while($row=$result->fetch_assoc()){
            echo '<tr>';
            echo '<td>';
            echo $row['cityname'];
            echo '</td>';
            echo '<td><a href="index.php?page=cities&country='.$row['country'].'">'.$row['country'].'</a></td>';
			      echo '<td><a href="index.php?page=cityguides&cityID='.$row['cityID'].'">Show guides</a></td>';
            echo '</tr>';
        }
        $conn->close(); //close the database connection, when it is not needed anymore in the script
      ?>
    </tbody>
</table>
</div>
</body>