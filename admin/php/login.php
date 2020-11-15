<?php
/*
    file:   admin/php/login.php
    desc:   Checks if the login (email and password) are correct by getting
            the member record from database table members by email. Checks that 
            passwords match. If they match, saves session-variables 'userID','name','starttime'.
*/
if(empty($_POST)) header('location:../index.php');
if(isset($_POST['email'])) $email=$_POST['email'];else $email='';
if(isset($_POST['password'])) $password=$_POST['password'];else $password='';
include('../../php/dbConnect.php'); //uses the dbConnect.php from 2 folders up
$sql="SELECT memberID,firstname,lastname,password,role FROM members ";
$sql.="WHERE email='$email'";
$result=$conn->query($sql);
if($result->num_rows > 0){
    //email is correct
    $password=$conn->real_escape_string($password);
    $row=$result->fetch_assoc(); //put the results into a row
    if(password_verify($password,$row['password'])){
        //passwords match
        session_start(); //login ok, start session and save session-variables
        $_SESSION['userID']=$row['memberID'];
        $_SESSION['name']=$row['firstname'].' '.$row['lastname'];
        $_SESSION['starttime']=date('H:i:s');
        $_SESSION['role']=$row['role'];
        header('location:../index.php'); //to index.php -> session isset now!
    }else header('location:../index.php'); //passwords do not match
}else header('location:../index.php'); //email was not found
?>