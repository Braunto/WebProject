<?php
/*
    file:   admin/index.php
    desc:   Displays the user interface in administration part of the app
            Checks that user is logged in - > if not, displays loginform
            Prevents the pages to be saved into any cachememory (no browser cache, no proxy cache etc)
*/
session_start();
if(!isset($_SESSION['userID'])) $page='login';
elseif(isset($_GET['page'])) $page=$_GET['page'];
else $page='';
header('Cache-control: no-cache, no-store, must-revalidate');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nordic Guides Admin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <?php if($page=='login')
            echo '<link rel="stylesheet" href="../css/signin.css">';
        ?>
    </head>
    <body>
        <div class="container">
        <?php
            if(isset($_SESSION['userID'])) include('php/session.php');
            if($page=='login') include('php/loginform.php');
            if($page=='' OR $page=='home') include('php/home.php');
            if($page=='myprofile') include('php/myprofile.php');
            if($page=='languages') include('php/languages.php');
            if($page=='members') include('php/members.php');
            if($page=='fees') include('php/fees.php');
        ?>        
        </div>
        
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
