<?php
    //  session_start();
    //  if(!isset($_SESSION['language']))
    //  {
    //      $_SESSION['language'] = "english";
    //  }
    //  elseif(isset($_SESSION['language']) && $_SESSION['language'] != $_GET['language'] && !empty($_GET['language']))
    //  {
    //      if($_GET['language'] == "english")  
    //         $_SESSION['language'] = "english";
     
    //      else if ($_GET['language'] == "polish")    
    //         $_SESSION['language'] = "polish";       
    //  }
     
    //  include("languages/" . $_SESSION['language'] . ".php");
    include("Backend/language.php");
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Happy Renting</title>
    
    <!-- Bootstrap core CSS -->
    <link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">

    <!-- JavaScript code for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../css/register_flat.css">    
    <link rel="stylesheet" href="../css/register_landlord.css">
    <link rel="stylesheet" href="../css/header&home.css">       
    <link rel="stylesheet" href="../css/flats.css">
    <link rel="stylesheet" href="../css/selected_flat.css">
    <link rel="stylesheet" href="../css/login_landlord.css">
    <link rel="stylesheet" href="../css/landlords_listing.css">
    <link rel="stylesheet" href="../css/admin_login.css">
    <link rel="stylesheet" href="../Admin/Admin_css/admin_list_of_landlords.css">
  </head>

<body>
   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="../index.php"><em>Domu</em><img src="../images/HouseIcon.png"/>Finder</a>
    </div>

    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">

        <li><a href="../index.php"> <?php echo $language['home']; ?> </a></li>

        <li><a href="../pages/flats.php"> <?php echo $language['flats']; ?> </a></li>

        <li class="has-submenu"><a href="../pages/register_flat.php"> <?php echo $language['landlord_section']; ?> </a>
          <ul class="sub-menu">
            <li><a href="../pages/register_landlord.php"><STRONG> <?php echo $language['register_landlord']; ?> &#128272;</STRONG></a></li>
            <li><a href="../pages/login_landlord.php"><STRONG> <?php echo $language['register_flat']; ?>&nbsp;&nbsp;&nbsp;&nbsp; &#127968;</STRONG></a></li>
          </ul>
        </li>

        <li class="has-submenu"><a href="#"> <?php echo $language['language']; ?> </a>
          <ul class="sub-menu">
            <li><a href="../index.php?language=english"><img src="https://img.icons8.com/color/48/000000/great-britain.png"/></a></li>
            <li><a href="../index.php?language=polish"><img src="https://img.icons8.com/color/48/000000/poland.png"/></a></li>        
          </ul>
        </li>

        <!-- <li><a href="#" class="external">CONTACT US</a></li> -->
        
      </ul>
    </nav>
  </header>