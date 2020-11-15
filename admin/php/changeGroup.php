<?php
/*
    file: admin/php/updatepassword.php
    desc: Checks that current password matches and if new password is written
          similarly twice -> updates password
*/
if(empty($_POST)) header('location:../index.php?page=myprofile');
session_start();
include('../../php/dbConnect.php');


if(isset($_POST['mgroup'])){
    $sql = "DELETE from membergroups where membergroups.membergroupID=".$_POST['mgroup'];
}
if(isset($_POST['groupID']) && isset($_SESSION['userID']))
{
    
    $sql = "INSERT INTO membergroups (groupID, memberID) values ('".$_POST['groupID']."','".$_SESSION['userID']."')";
    
}
$result=$conn->query($sql);
header('location:../index.php?page=myprofile');
?>

