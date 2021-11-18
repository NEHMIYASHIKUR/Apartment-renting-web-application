<?php 
include('../header.php');

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

$id = $_GET['id'];

$apartments = mysqli_query($connection,"select * from Apartments_View where ID='$id'") or ("DB error: $dbname");
$images = mysqli_query($connection,"select * from Apartment_Images where APARTMENT_ID ='$id'") or ("DB error: $dbname");

$num_of_rows_returned = mysqli_num_rows($images);
?>

<section class="selected_flat">
    <div class="image-container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      <?php
      foreach($images as $image)
      { ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="$rides" style="background-image: url('<?php echo $image['IMAGE_DIR']; ?>')"></li>
     <?php } ?>
  </ol>
  <div class="carousel-inner">
       <?php
       $active_check =0;
        foreach($images as $image)
        {
            if($active_check == 0)
            {
              $active = 'active';
            }
            else 
            {
                $active='';
            }
            $active_check++;
        ?>

    <div class="carousel-item <?php echo $active; ?>">
      <img class="d-block " src="<?php echo $image['IMAGE_DIR']; ?>" alt="First slide">
    </div>
     <?php }?>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>
</div>

<div>
<?php
foreach($apartments as $apartment)
{ ?>
 <header class="apartment_location_header">
    <div>
     <h2>&#128205;<?php echo $apartment['ADDRESS']; ?></h2>
     <span> &nbsp;<?php echo $apartment['CITY'];?></span>
    </div>
    <div class="flat_type">
          <?php echo $language['posted_on'] ?> <br>
             <strong>&#128198; &nbsp;
               <?php
                $divide = explode(" ",$apartment['LISTING_TIME']);
                $Listing_Date = $divide[0];
                $Listing_Time = $divide[1];
                echo $Listing_Date;
                echo '<br>';
                echo '&#128351;&nbsp;&nbsp;'.$Listing_Time;
                ?>
              </strong>
        </div>
 </header>



 <ul class="flat_description_block">
    <li>
    <div class="flat_type">
         <?php echo $language['flat_type'] ?>
          <div>
             <strong><?php echo $apartment['FLAT_TYPE'] ?></strong>
          </div>
    </div>
    </li>
    <li>
        <div class ="apartment_price">
         <?php echo $language['price'] ?>
           <dd>
            <strong><?php echo $apartment['PRICE'] ?> PLN </strong>
            <span>/ <?php echo $language['month'] ?></span><br>
            <small class="hidden-on-tiles"> <?php echo $language['contract'] ?> </small>
          </dd>
        <div>
    </li>
    <li>
        <div class ="apartment_price">
           <?php echo $language['selected_flat_utilities_price'] ?>
           <dd>
            <strong><?php echo $apartment['UTILITIES_PRICE'] ?> PLN </strong>
            <span>/ <?php echo $language['month'] ?> </span><br>
            <small class="hidden-on-tiles"> <?php echo $language['selected_flat_flat_ammenities']; ?> 🔥</small>
          </dd>
        <div>
    </li>
    <li>
    <div class ="apartment_price">
    <?php echo $language['selected_flat_overall_price'] ?>  
        <dd>
            <strong>
              <?php 
              $utilities =$apartment['UTILITIES_PRICE']; 
              $price = $apartment['PRICE'];
              $overall_price = $utilities + $price;
              echo $overall_price
              ?> PLN </strong>
            <span>/ <?php echo $language['month'] ?> </span><br>
            <small class="hidden-on-tiles"></small>
        </dd>
    </div>
    </li>
</ul>
<ul>
  <?php
  $landlordname = $apartment['LANDLORD_NAME'];
  $landlords = mysqli_query($connection,"select * from Landlords where NAME='$landlordname'") or ("DB error: $dbname");
  foreach($landlords as $landlord){
  ?>
    <div class="Landlord">
         <h2> <?php echo $language['selected_flat_landlord_interested'] ?> </h2><br>
         <h2> <?php echo $language['selected_flat_landlord_contact_me'] ?> </h2><br> <br>
        <img src="<?php echo '../images/Landlord_images/'. $landlord['PROFILE_PICTURE']; ?>">
        <br><br>
        <P><strong><?php echo $landlord['NAME']; ?></a></strong><P>
        <P> <a href="mailto:<?php echo $landlord['EMAIL']; ?>"><strong><?php echo $landlord['EMAIL']; ?></strong></a><P>
        <P> <a href="tel:<?php echo $landlord['PHONE_NUMBER']; ?>"><strong><?php echo $landlord['PHONE_NUMBER']; ?></strong></a><P>
        <P>  <strong><?php echo $landlord['ROLE']; ?></strong><P> 
        <a href="landlords_listing.php?name=<?php echo $landlord['NAME']; ?>" class="more_flats_by_landlord"> <?php echo $language['selected_flat_landlord_more_flats'] ?> <?php echo $landlord['NAME']; ?></a>
    </div>
</ul>
<?php 
} 
?>  
<div class="boxed">
  <p style="font-weight:400">
  &nbsp;&nbsp; &nbsp;&nbsp;
  <?php echo $apartment['PROPERTY_DETAILS'];; 
  ?>
  </p>
</div>

<div class="map col-md-8">
  <h2 class="map_header"> <?php echo $language['selected_flat_location_on_map'] ?> </h2>
          <div id="map">
            <?php
            $location = $apartment['CITY'] ;
            ?>
            <iframe src="https://maps.google.com/maps?q=<?php echo ($apartment['ADDRESS'] . $apartment['CITY']); ?>&output=embed" width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>

        <hr>

        <?php
        $check_also_apartments_city = $apartment['CITY'];
        $check_also_apartments = mysqli_query($connection,"select * from Apartments_View where CITY='$check_also_apartments_city'") or ("DB error: $dbname");
        ?>

        <section class="section check_also" data-section="section4">
        <div class="col-md-12">
          <div class="section-heading">
            <h2> <?php echo $language['selected_flat_check_also'] ?> </h2>
          </div>
        </div>
        <?php
            foreach($check_also_apartments as $check_also_apartment){
              //The apartment the user is looking for should not come in the check also area
              if($check_also_apartment['ID'] != $apartment['ID']){
        ?>
        <div class="owl-carousel flats_container">
          <div class="item">
            <?php 
              $check_also_image_id = $check_also_apartment['ID'];
              $check_also_images = mysqli_query($connection,"select * from Apartment_Images where APARTMENT_ID='$check_also_image_id'") or ("DB error: $dbname");
              foreach($check_also_images as $check_also_image){
            ?>
          <a href="selected_flat.php?id=<?php echo $check_also_image_id; ?>"> <img src="<?php echo $check_also_image['IMAGE_DIR']; ?>" alt="check_also #1"> </a>
          <?php break; ?>
          <?php } ?>
            <div class="down-content">
              <li>
              <div class="flat_type">
         <?php echo $language['flat_type'] ?>
          <div>
             <strong><?php echo $check_also_apartment['FLAT_TYPE']; ?></strong>
          </div>
    </div>
              </li>
              <li>
              <div class="flat_type">
         <?php echo $language['city'] ?>
          <div>
             <strong><?php echo $check_also_apartment['CITY']; ?></strong>
          </div>
    </div>
              </li>
              <li>
              <div class="flat_type">
         <?php echo $language['price'] ?>
          <div>
             <strong><?php echo $check_also_apartment['PRICE']?> PLN</strong>
          </div>
    </div>
              </li>
              <hr>
              <h4><?php echo $check_also_apartment['ADDRESS']; ?></h4>
              <p><?php
              $desc = $check_also_apartment['PROPERTY_DETAILS'];
              $desc_short = explode('.',$desc)[0];
             // echo $desc_short;
              ?></p>
            </div>
          </div>       
        </div> 
        <?php }}?>    
  </section>

<?php }?>
</div>
</section>


