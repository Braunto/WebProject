<?php
if(empty($_POST)) header('location:../index.php?page=members');
session_start();
include('../../php/dbConnect.php');
if($_POST['password']==$_POST['retype']){
    $password = $_POST['password'];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $_SESSION['infoMsg']='<p class="alert alert-info">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
    }else{
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sql="UPDATE members SET password='$password' ";
        $sql.="WHERE memberID=".$_POST['memberID'];
        if($conn->query($sql)===TRUE){
           $_SESSION['infoMsg']='<p class="alert alert-success">Password updated!</p>';
        }else $_SESSION['infoMsg']='<p class="alert alert-danger">Update failed!</p>';
    }          
}else $_SESSION['infoMsg']='<p class="alert alert-danger">New passwords do not match!</p>';
header('location:../index.php?page=members');