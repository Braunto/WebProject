<?php
/*
    file: admin/php/updatepassword.php
    desc: Checks that current password matches and if new password is written
          similarly twice -> updates password
*/
if(empty($_POST)) header('location:../index.php?page=members');
session_start();
$sql="SELECT email FROM members WHERE memberID=".$_POST['memberID'];
include('../../php/dbConnect.php');
$result=$conn->query($sql);
include ('checkEmail.php');

if($result->num_rows > 0){
    //user password found in db
    $row=$result->fetch_assoc();
    
        if($_POST['newemail1']==$_POST['newemail2']){
            //new pwds match -> update if strong enough
            
            
            $email = $_POST['newemail1'];

            $checkemail="SELECT email FROM members WHERE email LIKE '".$email."'";
            $result2=$conn->query($checkemail);

            if(!validEmail($email)) {
            $_SESSION['infoMsg']='<p class="alert alert-info">Error Email.</p>';
                
            }else if($result2->num_rows > 0){
                
                
                $_SESSION['infoMsg']='<p class="alert alert-danger">Email already exist!</p>';
                
            }
                else{
                //password strong -> update
                
                $sql="UPDATE members SET email='$email' ";
                $sql.="WHERE memberID=".$_POST['memberID'];
                if($conn->query($sql)===TRUE){
                   $_SESSION['infoMsg']='<p class="alert alert-success">Email updated!</p>';
                }else $_SESSION['infoMsg']='<p class="alert alert-danger">Update failed!</p>';
            }          
        }else $_SESSION['infoMsg']='<p class="alert alert-danger">New emails do not match!</p>';
    
}else $_SESSION['infoMsg']='<p class="alert alert-danger">Could not retrieve user data!</p>';
//go back to profilepage
header('location:../index.php?page=members');
?>