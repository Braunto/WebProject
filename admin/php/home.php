<?php
/*
    file:   admin/php/home.php
    desc:   Start page of admin/index
*/
?>
<div class="jumbotron">
    <h1>Nordic Guides Administration view</h1>
    <p>Here you can update your own profile etc.</p>
</div>
<?php
include('../php/dbConnect.php');
//nr of members
$sql="SELECT count(*) as NrOfMmbrs FROM members";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$NrOfMmbrs=$row['NrOfMmbrs'];
echo '<h3>Nr of members in db <span class="badge badge-secondary">'.$NrOfMmbrs.'</span></h3>';
//nr of groups
$sql="SELECT count(*) as NrOfGrps FROM groups";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$NrOfGrps=$row['NrOfGrps'];
echo '<h3>Nr of Guide Clubs in db <span class="badge badge-secondary">'.$NrOfGrps.'</span></h3>';
//nr of languages spoken by members
$sql="SELECT COUNT(DISTINCT language) as NrOfLngs FROM memberlanguages";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$NrOfLngs=$row['NrOfLngs'];
echo '<h3>Nr of languages spoken by guides <span class="badge badge-secondary">'.$NrOfLngs.'</span></h3>';
?>