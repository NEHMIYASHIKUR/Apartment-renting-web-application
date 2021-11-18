<?php
include('../header.php');
?>

<section class="section register_landlord" data-section="section3">
<?php
if(isset($_GET['uploadsuccessfull'])) {
?>
<div class="alert alert-success" role="alert">
<h4 class="alert-heading"> <?php echo $language['registration_successfull'] ?> </h4> <hr>
</div>
<?php } ?>

    <div class="container">
      <div class="row"> 
      <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
              <h6> <?php echo $language['form_header'] ?> <em></em> </h6>
            </div>

            <form action="../Backend/controller.php?action=register_landlord" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="<?php echo $language['name'] ?>" required>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo $language['email'] ?>" reuired>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="phone_number" type="text" class="form-control" id="phone-number" placeholder="<?php echo $language['phone_number'] ?>" required>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <select class="landlord_info" name="role">
                 <!--  <div class="landlord_role_dropdown"> -->
                  <option  value="" disabled selected hidden>&nbsp; <?php echo $language['role'] ?> </option> 
                  <option > <?php echo $language['apartment_owner'] ?> </option>
                  <option > <?php echo $language['real_estate_agent'] ?> </option> </div>
                  </select>
              <!--  </div> -->
                <div class="col-md-12">
                  <fieldset>
                  <br/>
                    <input name="landlord_image" type="file" class="form-control" placeholder="Landlord image">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button"> <?php echo $language['register_me'] ?> </button>
                  </fieldset>
                </div>

              </div>
            </form>
                <div>
                  <fieldset>
                    <a href="../pages/login_landlord.php" class="already_registered_button"> <?php echo $language['already_registered'] ?> </a>
                  </fieldset>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>