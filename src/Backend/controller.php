<?php

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if(!empty($_GET['action']))
{
    switch($_GET['action'])
    {
        case 'register_landlord':

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $role = $_POST['role'];

            $file=$_FILES['landlord_image'];
            

            $file_name = $_FILES['landlord_image']['name'];
            $file_tmpname = $_FILES['landlord_image']['tmp_name'];
            $file_size = $_FILES['landlord_image']['size'];
            $file_error = $_FILES['landlord_image']['error'];

            $file_divided = explode('.',$file_name);
            $file_extension = $file_divided[1];
            $allowed_images = array('jpg','jpeg','png','gif');
            if(in_array($file_extension,$allowed_images))
            {
                if($file_error ==0)
                {
                    $new_file_name = $name . '-' .$role.".".$file_extension;
                    $file_destination = '../images/Landlord_images/'.$new_file_name;
                    move_uploaded_file($file_tmpname,$file_destination);

                    mysqli_query($connection,"insert into Landlords (NAME,EMAIL,PHONE_NUMBER,ROLE,PROFILE_PICTURE) VALUES ('$name','$email','$phone_number','$role','$new_file_name')") 
                    or ("DB error: $dbname");
                    header('Location : ../pages/register_landlord.php?uploadsuccessfull');
                }
                else
                {
                    echo "OOPPS !! There was an error uploading your files !!";
                }
            }
            else
            {
                echo "You can not upload files of this type";
            }
           
            break;

        case 'login_landlord':
            
            $name = $_POST['name'];
            $email = $_POST['email'];

            $validate = mysqli_query($connection , "select * from Landlords where NAME = '$name' AND EMAIL = '$email' ");

            $landlord_id =mysqli_fetch_array($validate)['ID'];

            if(mysqli_num_rows($validate) !=0)
            {
                session_start();   
                $_SESSION['landlord_name'] = $name;
                $_SESSION['landlord_id'] = $landlord_id;
                $_SESSION['login_time'] = time();
                header('Location : ../pages/register_flat.php');
            }
            else
            {
                header('Location : ../pages/login_landlord.php?Login_failed');
            }
            
            break;

        case 'register_flat':

            $landlord_id = $_POST['landlord_id'];
            $flat_type_id = $_POST['flat_type'];    //The flat_type id is passed in the form
            $city_id = $_POST['property_city'];      // The cities id is passed in the form
            $address = $_POST['address'];
            $price = $_POST['price'];
            $utilities_price = $_POST['utilities_price'];
            $property_details = $_POST['property_details'];

                   // Adding data into the apartments table
            mysqli_query($connection,"insert into Apartments (LANDLORD_ID,FLAT_TYPE_ID,CITY_ID,ADDRESS,PRICE,UTILITIES_PRICE,PROPERTY_DETAILS)
            VALUES ('$landlord_id','$flat_type_id','$city_id','$address','$price','$utilities_price','$property_details')") or ("DB error: $dbname");

            $property_images =$_FILES['flat_images']['name'];
            $number_of_images=count($property_images);
           // echo $number_of_images;

            for($i=0;$i<$number_of_images;$i++)
            {
            $image_name = $_FILES['flat_images']['name'][$i];
            $image_tmpname = $_FILES['flat_images']['tmp_name'][$i];
            $image_error = $_FILES['flat_images']['error'][$i];
            $image_divide = explode('.',$property_images[$i]);
            $image_extension = $image_divide[1];
            $images_allowed = array('jpg','jpeg','png','gif','JPG','JPEG','PNG');

            if(in_array($image_extension,$images_allowed))
            {
                if($image_error == 0)
                {        
                    //To get flat_type and city name for the image name 
                    $query_flat_type =mysqli_query($connection,"select * from Flat_Type WHERE ID = '$flat_type_id'") or ("DB error: $dbname");
                    $query_cities =mysqli_query($connection,"select * from Cities WHERE ID = '$city_id'") or ("DB error: $dbname");
                    $flat_type_name = mysqli_fetch_array($query_flat_type)['NAME'];
                    $city_name = mysqli_fetch_array($query_cities)['NAME'];
                   
                    //giving the image a new name and destination 
                    $new_image_name = $flat_type_name."-".$city_name."-".$address."-"."image $i".".".$image_extension;
                    $image_destination = '../images/Apartment_images/'.$new_image_name;
                    move_uploaded_file($image_tmpname,$image_destination);

                    //getting the last added row in the apartment table
                    $query_apartment = mysqli_query($connection,"SELECT ID FROM Apartments ORDER BY ID DESC LIMIT 1") or ("DB error: $dbname");  //the id of the row we just added     
                    $last_added_row_id = mysqli_fetch_array($query_apartment)['ID'];     
          
                    mysqli_query($connection,"insert into Apartment_Images (IMAGE_DIR,APARTMENT_ID) VALUES ('$image_destination','$last_added_row_id')") 
                    or ("DB error: $dbname");
                    header('Location : ../pages/register_flat.php?new_apartment_uploaded');

                }
                else
                {
                    echo "An Error Occured While Uploading Your Image";
                }
               
    
            }
            else
            {
                echo "You can not upload files of this type";
            }
        }

            break;

        case 'search':
            if(empty($_POST['city']) && empty($_POST['type']) && empty($_POST['price-from']) && empty($_POST['price-upto']))
            {
                header('location: ../pages/flats.php');
            }
            else
            {
            session_start();
            $_SESSION['search_input_check'] = true; //checks if the search form is submitted or not 
            $_SESSION['search_input_city'] = $_POST['city'];
            $_SESSION['search_input_flat_type'] = $_POST['type'];
            $_SESSION['search_input_price_from'] = $_POST['price-from'];
            $_SESSION['search_input_price_upto'] = $_POST['price-upto'];
            header('location: ../pages/flats.php');
            }
    }   
}

?>