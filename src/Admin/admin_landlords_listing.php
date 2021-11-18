<?php 
include('../header.php');

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

$landlords_name = $_GET['name'];

$apartments = mysqli_query($connection,"select * from Apartments_View where LANDLORD_NAME='$landlords_name'") or ("DB error: $dbname");

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

<section class="section check_also">
<h3> <?php echo $language['landlord_listing_heading'] ?> <?php echo $landlords_name ?></h3> <hr>
        <?php
            foreach($apartments as $apartment){
        ?>
        <div class="owl-carousel flats_container">
          <div class="item">
            <?php 
              $apartment_id = $apartment['ID'];
              $images = mysqli_query($connection,"select * from Apartment_Images where APARTMENT_ID='$apartment_id'") or ("DB error: $dbname");
              
              foreach($images as $image){
            ?>
          <a href="../pages/selected_flat.php?id=<?php echo $apartment_id; ?>"> <img src="<?php echo $image['IMAGE_DIR']; ?>" alt="check_also #1"> </a>
          <?php break; ?>
          <?php } ?>
        <div class="down-content">

            <li>
              <div class="flat_type">
                  <?php echo $language['flat_type'] ?>
                  <div>
                     <strong><?php echo $apartment['FLAT_TYPE']; ?></strong>
                  </div>
              </div>
            </li>

            <li>
              <div class="flat_type">
                 <?php echo $language['city'] ?>
                <div>
                   <strong><?php echo $apartment['CITY']; ?></strong>
                </div>
              </div>
            </li>

            <li>
              <div class="flat_type">
                <?php echo $language['price'] ?>
                <div>
                   <strong><?php echo $apartment['PRICE']?> PLN</strong>
                </div>
              </div>
            </li>

            <li>
               <a href="Admin_backend/admin_controller.php?action=delete&id=<?php echo $apartment['ID'] ?>" class="btn btn-outline-danger">DELETE</a>
            </li>

              <hr>
              <h4><?php echo $apartment['ADDRESS']; ?></h4>
              <hr>
              <p><?php
              $desc = $apartment['PROPERTY_DETAILS'];
              $desc_short = explode('.',$desc)[0];
            //  echo $desc_short;
              ?></p>
        </div>
          </div>       
        </div> 
        <?php }?>    
  </section>

  <?php
}
else
{
    header('Location : admin_login.php');
}
?>