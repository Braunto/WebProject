<?php
/*
    file:   index.php
    desc:   This is the user interface layout. All the content is displayed through this layout. Each link
            must have the page to be displayed defined
*/
if(isset($_GET['page'])) $page=$_GET['page'];else $page='';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/starter-template.css">
      
      
      <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<link href="css/grayscale.css" rel="stylesheet">
<link href="css/Changes.css" rel="stylesheet">


    <title>Nordic Guides Application</title>
  </head>
         <style>
         /*footer{
        display: block;
        position: -webkit-sticky;
        position: absolute;
        bottom: 0;
        bottom: 0px;
        padding-top: 20px;
        padding-bottom: 20px;
        margin: 0;
        text-align: center;
        background-color: black;
        color: white;
        width: 100%;
      }
     </style> 
  <body>
      
    

  
    <div>  
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php"><img src="images/guiaTuristicaIcono-300x300.png" class="img-responsive" width="50px">
      Nordic Guides</a>
  
      
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          
        Menu
        <i class="fas fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li <?php if($page=='') echo 'class="nav-item active"';else echo 'class="nav-item"'?>>
        <a class="nav-link" href="index.php">Home</a>
      </li>
        <li <?php if($page=='lapland') echo 'class="nav-item active"';else echo 'class="nav-item"'?>>
        <a class="nav-link" href="index.php?page=lapland">Lapland</a>
      </li>
      <li <?php if($page=='about') echo 'class="nav-item active"';else echo 'class="nav-item"'?>>
        <a class="nav-link" href="index.php?page=about">About</a>
      </li>
      <li <?php if($page=='guides') echo 'class="nav-item active"';else echo 'class="nav-item"'?>>
        <a class="nav-link" href="index.php?page=guides">Guides</a>
      </li>
	  <li <?php if($page=='cities') echo 'class="nav-item active"';else echo 'class="nav-item"'?>>
        <a class="nav-link" href="index.php?page=cities">Cities</a>
      </li>
    </ul>
    <a href="admin" class="btn btn-primary js-scroll-trigger">login</a>
  </div>
    
</nav>

<main role="main" class="container">
    
    <?php
    //The selected pages are displayed here
    if($page=='') include('php/home.php');
    elseif($page=='homeSecondary') include('php/homeSecondary.php');
    elseif($page=='about') include('php/about.php');
    elseif($page=='lapland')include('php/lapland.php');
    elseif($page=='guides') include('php/guides.php');
    elseif($page=='showguide') include('php/showguide.php');
	elseif($page=='cities') include('php/cities.php');
	elseif($page=='cityguides') include('php/cityguides.php');
    elseif($page=='search') include('php/search.php');
    elseif($page=='search') include('php/showcountry.php');
    else echo '<p>Page not found!</p>';
    ?>
</main><!-- /.container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
         <!-- Custom scripts for this template -->
  <script src="js/grayscale.js"></script>
      </div>
  </body>
</html>