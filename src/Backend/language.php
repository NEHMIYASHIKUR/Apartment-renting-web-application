<?php
session_start();
if(!isset($_SESSION['language']))
{
    $_SESSION['language'] = "english";
}
elseif(isset($_SESSION['language']) && $_SESSION['language'] != $_GET['language'] && !empty($_GET['language']))
{
    if($_GET['language'] == "english")  
       $_SESSION['language'] = "english";

    else if ($_GET['language'] == "polish")    
       $_SESSION['language'] = "polish";       
}

include("../languages/" . $_SESSION['language'] . ".php"); //for the other pages to access it
include("languages/" . $_SESSION['language'] . ".php"); //for index.php to access it
?>