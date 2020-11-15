<?php
/*
    file:   php/guides.php
    desc:   Shows the list of guides in database. Uses dbConnect.php to connect to database.
            Perform a query with SQL and display the SQL-query results here.
            Use the database connection created for the application.
            Make a query and get resultlist.
            Loop through the resultlist with while()-loop and display results in a table.
            Add a link to display selected member in a separate page.
    18.11.  Pager added
*/
include('php/dbConnect.php');
//define the variables for limiting results
$howmany=3; //number of records displayed in one page
if(isset($_GET['start'])) $start=$_GET['start'];else $start=0; //set the start value for limit
if($start<0)$start=0;
$next=$start+$howmany;
$prev=$start-$howmany;
//calculate the total nr of rows in members
$sql="SELECT count(memberID) as Total FROM members";
$result=$conn->query($sql);
if($row=$result->fetch_assoc()) $total=$row['Total'];
$division=$total%$howmany; //counts the number of rows in last page
$pages=($total-$division)/$howmany; //number of whole page
?>

<br>
<br>

<h2 class="text-white mb-4">Nordic Guides - Guideslist</h2>
<table class="table table-hover table-dark" style='color:white;'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT memberID,firstname,lastname,email FROM members ORDER BY lastname LIMIT $start,$howmany";
        $result=$conn->query($sql); //run the query in $sql-variable with $conn-object created in dbConnect.php
        //display the rows -> records coming as result of the SQL-query
        while($row=$result->fetch_assoc()){
            echo '<tr>';
            echo '<td>';
            //create a link to current member by memberID
            echo "<a href='index.php?page=showguide&memberID=".$row['memberID']."'>";
            echo $row['firstname'].' '.$row['lastname'];
            echo '</a>'; //closes the memberlink
            echo '</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '</tr>';
        }
        $conn->close(); //close the database connection, when it is not needed anymore in the script
      ?>
    </tbody>
</table>

<ul class="pagination">
  <?php if($start<=0) echo '<li class="page-item disabled">';
    else echo '<li class="page-item">';
  ?>
      <a class="page-link" href="index.php?page=guides&start=<?php echo $prev?>">Previous</a>
   <li>
    <?php
    $pg=0;
    for($i=1;$i<=$pages;$i++){
        echo '<li class="page-item"><a class="page-link" href="index.php?page=guides&start='.$pg.'">'.$i.'</a></li>';
        $pg=$pg+$howmany;
    }
    if($division>0) echo '<li class="page-item"><a class="page-link" href="index.php?page=guides&start='.$pg.'">'.$i.'</a></li>';
    ?>
  <?php
    if($total-$division>=$next) echo '<li class="page-item">';
    else echo '<li class="page-item disabled">';
   ?>
    <a class="page-link" href="index.php?page=guides&start=<?php echo $next ?>">Next</a>
  </li>
</ul>









