<?php
session_start();
// echo $_SESSION['login'];
// echo $_SESSION['role'];

// if(!isset($_SESSION['login'])){
//   header('Location:index.php#');
// }

if($_SESSION['role'] == 'user'){
  header('Location:index.php#');
}
include ('model.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Radwa Ali</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- data table link -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <!-- slick link -->
        <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- My Style Sheet -->
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
      </head>
      <body>
        <div id="splashscreen">
          
          <img src="assets/coroed-logo.png" />
          <div class="loader">
            <div></div>
          </div>
    
        </div>
          <!-- Start Nav Bar -->
    
          <nav class="navbar navbar-expand-lg navbar-dark" style="background: #7792ff2c">
            <div class="container-fluid">
              <a class="navbar-brand col-4" href="#"><img src="assets/coroed-logo.png"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav col-12">
                  <?php if(header("") == header("index.php#")){ ?>
                  <li class="nav-item me-2">
                    <a class="home nav-link active" aria-current="page" href="index.php#">Home</a>
                  </li>
                  <?php }else{ ?>
                  <li class="nav-item me-2">
                    <a class="home nav-link" aria-current="page" href="index.php#">Home</a>
                  </li>
                  <?php } ?>
                  <li class="nav-item me-2">
                    <a class="clients nav-link" href="index.php#client">My Clients</a>
                  </li>
                  <li class="nav-item me-2">
                    <a class="works nav-link" href="index.php#works">My works</a>
                  </li>
                  <!-- <?php if(header("") == "priceTable.php#"){ ?> -->
                  <li class="nav-item me-2">
                    <a class="nav-link active" aria-current="page" href="priceTable.php#">Price Table</a>
                  </li>
                  <!-- <?php }else{ ?> -->
                  <li class="nav-item me-2">
                    <a class="nav-link" aria-current="page" href="priceTable.php#">Price Table</a>
                  </li>
                  <!-- <?php } ?> -->
                  <!-- <li class="nav-item">
                    <a class="works nav-link" href="#">Order Now</a>
                  </li> -->
                  <?php if(isset($_SESSION['login'])){ ?>
                  <li class="nav-item">
                    <a class="works nav-link" href="admin.php">Admin</a>
                  </li>
                  <?php }else{?>
                  <li class="nav-item">
                    <a class="works nav-link" href="login.php">Admin</a>
                  </li>
                  <?php } ?>
                  <?php if(isset($_SESSION['login'])){ ?>
                  <li class="nav-item">
                    <a class="works nav-link" style="display:block" href="logout.php">Log Out</a>
                  </li>
                  <?php }else{?>
                  <li class="nav-item">
                    <a class="works nav-link" style="display:none" href="logout.php">Log Out</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </nav>
    
        <!-- End Nav Bar -->