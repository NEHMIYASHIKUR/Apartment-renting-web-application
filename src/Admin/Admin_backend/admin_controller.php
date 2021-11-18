<?php

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if(!empty($_GET['action']))
{
    switch($_GET['action'])
    {
        case 'admin_login':

            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = mysqli_query($connection , "select * from Admins where USERNAME = '$username' AND PASSWORD = '$password' ");
            
            if(mysqli_num_rows($data) !=0)
            {
                session_start();
                $_SESSION['admin_username'] = $username;
                $_SESSION['admin_login_time'] = time();
                header('Location : ../admin_list_of_landlords.php');
            }
            else
            {
                header('Location : ../../Admin/admin_login.php');
            }
            break;

        case 'search':

                if(empty($_POST['city']) && empty($_POST['type']) && empty($_POST['price-from']) && empty($_POST['price-upto']))
                {
                    header('location: ../admin_home.php');
                }
                else
                {
                session_start();
                $_SESSION['search_input_check'] = true; //checks if the search form is submitted or not 
                $_SESSION['search_input_city'] = $_POST['city'];
                $_SESSION['search_input_flat_type'] = $_POST['type'];
                $_SESSION['search_input_price_from'] = $_POST['price-from'];
                $_SESSION['search_input_price_upto'] = $_POST['price-upto'];
                header('location: ../admin_home.php');
                }
            break;
        
        case 'delete':

            $id = $_GET['id'];

            //first we have to delete the apartment images from the Apartment_images table
            mysqli_query($connection , "delete from Apartment_Images where APARTMENT_ID = '$id'");

            //then we remove the apartment from the Apartments table
            mysqli_query($connection , "delete from Apartments where ID = '$id'");

            header('Location : ../admin_home.php');
            break;
        
        case 'delete_landlord':

            $id = $_GET['id'];

            $data = mysqli_query($connection , "select * from Apartments where LANDLORD_ID = '$id'");

            for ($i=0; $i < mysqli_num_rows($data); $i++) 
            { 
            
            $apartment_id = mysqli_fetch_array($data)['ID'];

            mysqli_query($connection , "delete from Apartment_Images where APARTMENT_ID = '$apartment_id'");
            mysqli_query($connection , "delete from Apartments where LANDLORD_ID = '$id'");
            mysqli_query($connection , "delete from Landlords where ID = '$id'");

            }
            mysqli_query($connection , "delete from Landlords where ID = '$id'");

            header('Location : ../admin_list_of_landlords.php');
            break;


        



    }
}
?>