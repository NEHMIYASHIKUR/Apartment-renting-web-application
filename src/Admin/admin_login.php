<?php
include('../header.php');
?>

<section class="section admin_login" data-section="section3">
<div class="container">
      <div class="row"> 
      <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
            <h6> WELCOME ADMIN  &#128736;</h6>
              <h6> LOG IN TO MANAGE FLATS </h6>
            </div>
            <form id="contact" action="../Admin/Admin_backend/admin_controller.php?action=admin_login" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="col-md-12">
                  <fieldset>
                    <input name="username" type="text" class="form-control" id="email" placeholder="Username" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="password" type="password" class="form-control" id="email" placeholder="Password" required="">
                  </fieldset>
                </div> <hr style="color:white"></br>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button"> LOG IN </button>
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