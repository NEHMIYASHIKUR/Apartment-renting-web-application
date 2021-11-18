<?php 
include('../header.php');

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

$landlords = mysqli_query($connection ,"select * from Landlords");
 ?>

 <?php
 session_start();
 $admin_username = $_SESSION['admin_username'];
 if(isset($admin_username))
 {
   if( time() - $_SESSION['admin_login_time'] > 600)
   {
      session_destroy();
      header('Location : admin_login.php');
   }
 ?>

<div class="upper_button">
    &nbsp; <a href="admin_home.php" class="btn btn-outline-success btn-lg btn-block">CLICK HERE TO MANAGE FLATS </a>
</div>

<section class="section list_of_landlords">
<table class="table table-hover">
    <thead>  
        <th></th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE NUMBER</th>
        <th>ROLE</th>
        <th>NUMBER OF FLATS</th>
        <th>ACTIONS</th>
    </thead>
    <tbody>
        <?php foreach($landlords as $landlord){ ?>
        <tr>           
            <td>
            <a href="admin_landlords_listing.php?name=<?php echo $landlord['NAME']; ?>"> <img src="<?php echo '../images/Landlord_images/'. $landlord['PROFILE_PICTURE']; ?>"> </a>
            </td>
            <td>
                <?php echo $landlord['NAME']; ?>
            </td>
            <td>
                <?php echo $landlord['EMAIL']; ?> 
            </td>
            <td>
                <?php echo $landlord['PHONE_NUMBER']; ?> 
            </td>
            <td>
                <?php echo $landlord['ROLE']; ?> 
            </td>
            <td>
                <?php 
                $id = $landlord['ID'];
                $apartments = mysqli_query($connection , "select * from Apartments where LANDLORD_ID = '$id'");
                echo mysqli_num_rows($apartments);
                ?>
            </td>
            <td>
               <a class="btn btn-warning" href="admin_landlords_listing.php?name=<?php echo $landlord['NAME']; ?>">View Flats</a> <br>
               <a class="btn btn-danger" href="Admin_backend/admin_controller.php?action=delete_landlord&id=<?php echo $landlord['ID'] ?>" role="button">Remove Landlord</a>
               <br><br><br>
            </td> 
        </tr> 
        <?php } ?>
    </tbody>
</table>
</section>
<?php
 }
else
{
    header('Location : admin_login.php');
}
?>
