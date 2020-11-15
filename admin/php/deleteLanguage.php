<?php
/*
    file:   admin/php/deleteLanguage.php
    desc:   Removes language from table languages
*/
if(isset($_GET['language'])){
    include('../../php/dbConnect.php');
    $sql="DELETE FROM languages WHERE language='".$_GET['language']."'";
    $conn->query($sql);
}
header('location:../index.php?page=languages');
?>