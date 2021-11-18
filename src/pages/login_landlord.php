<?php
include('../header.php');

?>
<?php
session_start();

if(isset($_SESSION['landlord_id']))
{
    header('Location: ../pages/register_flat.php');
}
else{
?>

<section class="section landlord_login" data-section="section3">

<?php
		if(isset($_GET['Login_failed'])){  ?>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"> <?php echo $language['login_failed'] ?> </h4> <hr>
  <p> <?php echo $language['login_failed_paragraph'] ?> </p>
</div>
		 <?php  }  ?>

    <div class="container">
      <div class="row"> 
      <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
            <h6> <?php echo $language['login_landlord_heading_1'] ?> </h6>
              <h6> <?php echo $language['login_landlord_heading_2'] ?> <em></em> </h6>
            </div>
            <form id="contact" action="../Backend/controller.php?action=login_landlord" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="col-md-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="email" placeholder="<?php echo $language['login_name'] ?>" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo $language['login_email'] ?>" required="">
                  </fieldset>
                </div> <hr style="color:white"></br>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button"> <?php echo $language['landlord_login_login_button'] ?> </button>
                  </fieldset>
                </div> 
               </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
<?php } ?>