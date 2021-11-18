<?php
include('../header.php');

session_start();
$landlord_name = $_SESSION['landlord_name'];
$landlord_id = $_SESSION['landlord_id'];

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
?>


<section class="section register_flat" data-section="section3">

<?php
//checks if one landlord have been logged in for more than 10 minute
if((time() - $_SESSION['login_time']) > 600)
{
    session_destroy();
    header('location:login_landlord.php');
}

//checks if the session have been started before going into the register flat page
if(isset($landlord_name)){

		if(isset($_GET['new_apartment_uploaded'])){
			?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">&#129321; <?php echo $language['register_flat_adding_successfull'] ?> &#128512;</h4> <hr>
  <p><?php echo $language['register_flat_adding_successfull_paragraph']?></p>
</div>
		 <?php
		    }
			?>
    <div class="container">
      <div class="row"> 
      <div class="col-md-5">
          <div class="right-content">
          <div class="top-content">
              <h6><?php echo $language['register_flat_heading_1'] ?> <?php echo $landlord_name ?><em></em> </h6>
            </div>
            <div class="top-content">
              <h6><?php echo $language['register_flat_heading_2']?> <em></em> </h6>
            </div>
            <form id="contact" action="../Backend/controller.php?action=register_flat" method="post" enctype="multipart/form-data">
              <div class="row">
                <input name="landlord_id" type="hidden" value="<?php echo $landlord_id ?>">

                <div class="col-md-12">
                <select class="landlord_info" name="property_city" placeholder="City">
                  <option value="" disabled selected hidden>&nbsp; <?php echo $language['register_flat_city']?>  </option>
                  <?php
                        $cities = mysqli_query($connection,"select * from Cities");
	                    foreach($cities as $city)
                        {
		                echo '<option
		                value="'.$city['ID'].'">'.'&nbsp;'.$city['NAME'].'</option>';
	                    }      ?>
                  </select>
                </div>

                <div class="col-md-12">
                  <select class="landlord_info" name="flat_type" placeholder="flat_type">
                  <option value="" disabled selected hidden>&nbsp; <?php echo $language['register_flat_flat_type']?> </option>
                  <?php
                        $flat_types = mysqli_query($connection,"select * from Flat_Type");
	                    foreach($flat_types as $flat_type)
                        {
		                echo '<option
		                value="'.$flat_type['ID'].'">'.'&nbsp;'.$flat_type['NAME'].'</option>';
	                    }    ?>
                  </select>
                </div>

                <div class="col-md-12">
                  <fieldset>
                    <input name="address" type="text" class="form-control" id="email" placeholder="<?php echo $language['register_flat_address']?>" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="price" type="text" class="form-control" id="email" placeholder="<?php echo $language['register_flat_price']?>" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="utilities_price" type="text" class="form-control" id="email" placeholder="<?php echo $language['register_flat_utilities_price']?>" required="">
                  </fieldset>
                </div>
                <div class="property details">
                  <fieldset>
                    <textarea name="property_details" type="text" rows ="6" class="form-control" id="email" placeholder="<?php echo $language['register_flat_property_details'] ?>" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                  <br/>
                    <input name="flat_images[]" type="file" class="form-control-file" id="flat_images" placeholder="Apartment images"  multiple="" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button"><?php echo $language['register_flat_register_property_button'] ?></button>
                  </fieldset>
                </div> 
               </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
   }
 
 else
 {
    header('Location : ../pages/register_landlord.php');
 }
 ?>

</body>
</html>




            <!--    <div class="col-md-12">
                  <select class="landlord_info" name="landlord_name&role">
                  <option  value="" disabled selected hidden>&nbsp; Select Your Name</option> 
               /    <?php
                       /**  $landlords = mysqli_query($connection,"select * from Landlords");
	                    foreach($landlords as $landlord)
                        {
		                echo '<option
		                value="'.$landlord['ID'].'">'.'&nbsp;'.$landlord['NAME'].' ('.$landlord['ROLE'].' )'.'</option>';
	                    }     **/       ?> 
                  </select>
                </div>  -->