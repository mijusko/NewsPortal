<?php

  require('../includes/functions.inc.php');
  require('../includes/database.inc.php');
  session_start();
  

  if(!isset($_SESSION['ADMIN_LOGGED_IN'])) {
    alert("Prijavi se da bi pristupio Urednickom Panelu");
    redirect('./login.php');
  }
  
  $admin_name = "Urednik";

  // Getting the URI From the Web
  $uri = $_SERVER['REQUEST_URI'];

  // Variable to store the page title used in title tag
  $page_title = "";

  // Flag variables to know which Page we are at
  $home = true; 
  $pass = false; 
  $category = false; 
  $article = false;
  
  // Strpos returns the position of the search string in the main string or returns 0 (false)
  // Checking if the page is Home Page
  if(strpos($uri,"/urednik.php") != false){
    $page_title = " Pocetni Panel";
  }

  if(strpos($uri,"/articles-urednik.php") != false){
    $page_title = " Vesti";
    $home = false;
    $article = true;
  }

  if(strpos($uri,"/categories.php") != false){
    $page_title = " Kategorije";
    $home = false;
    $category = true;
  }

  if(strpos($uri,"/add-category.php") != false){
    $page_title = "Dodaj Kategoriju";
    $category = true;
    $home = false;
  }
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>News Portal | Urednik Panel | <?php echo $page_title ?></title>

  <link href="../assets/css/partials/4-component.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" />
  <link href="../assets/css/admin/style.css" rel="stylesheet" />
  <link href="../assets/css/partials/1-variables.css" rel="stylesheet" />
</head>

<body>
  <nav style="margin-bottom:50px;" class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">News Portal </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php if($home) echo 'class="active"' ?>><a href="./urednik.php">Pocetni Panel</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a><?php echo $admin_name ?></a></li>
          <li><a href="./logout.php">Odjavi se</a></li>
        </ul>
      </div>
    </div>
  </nav>