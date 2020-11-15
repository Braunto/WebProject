<?php
if(empty($_POST)) header('location:../index.php?page=members');
session_start();
$_SESSION['infoMsg']='';
    include('../../php/dbConnect.php');
    $sql="UPDATE members set ";
	$sql.="role='".$_POST["role"]."'";
    $sql.=" WHERE memberID=".$_POST['memberID'];
    if($conn->query($sql)===TRUE){
        $_SESSION['infoMsg']='<p class="alert alert-success">Updated!</p>';
    }
header('location:../index.php?page=members');