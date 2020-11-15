<?php
if(empty($_POST)) header('location:../index.php?page=fees');
session_start();
$_SESSION['infoMsg']='';
include('../../php/dbConnect.php');

$sql="UPDATE fees SET basicfee=".$_POST["basic_fee"].",";
$sql.="duedate='".$_POST["due_date"]."',";
$sql.="extrafee=".$_POST["extra_fee"]."";
$sql.=" WHERE year=".$_POST['year'];

if($conn->query($sql)===TRUE){
    $_SESSION['infoMsg']='<p class="alert alert-success">Updated!</p>';
}

header('location:../index.php?page=fees');