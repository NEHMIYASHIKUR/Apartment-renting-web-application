<?php 
include('../header.php');

$dbhost="localhost"; $dbuser="u304253687_domufinder"; $dbpassword="Nehmiya1"; $dbname="u304253687_domufinder";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

/**when the search button is clicked the select statement of the apartmnent_view table query changes
so depending on the data the user inputs on the search boxes our conditions 
checks those to execute the correct equivalent sql query
then the returned query will be stored into the "$apartments" variable **/

session_start();
if(isset($_SESSION['search_input_check'] ))
{
  $city = $_SESSION['search_input_city'];
  $type = $_SESSION['search_input_flat_type'];
  $price_from = $_SESSION['search_input_price_from'];
  $price_upto = $_SESSION['search_input_price_upto'];

  $apartments = mysqli_query($connection,"select * from Apartments_View where 
  CITY = '$city' && FLAT_TYPE = '$type' && (PRICE >= '$price_from' && PRICE <= '$price_upto' )");
  if(mysqli_num_rows($apartments) == 0)
  {
    $apartments = mysqli_query($connection,"select * from Apartments_View where 
    CITY = '$city' && FLAT_TYPE = '$type' ");
    
    if(mysqli_num_rows($apartments) == 0)
    {
      $apartments = mysqli_query($connection,"select * from Apartments_View where 
      CITY = '$city' || FLAT_TYPE = '$type' || (PRICE >= '$price_from' && PRICE <= '$price_upto' )");
    }
  }
   session_destroy(); 
  // the search session will be destroyed once the player clicks the search button
}

else
{
  $apartments = mysqli_query($connection,"select * from Apartments_View") or ("DB error: $dbname");
}

?>

<!-- SEARCH INPUT FORM START -->
<form action="../Backend/controller.php?action=search" method="post" enctype="multipart/form-data">

<div class="search">
  <div class="form-group col-md-2">
    <select class="form-control" name="city">
      <option  value="" disabled selected hidden>&nbsp; <?php echo $language['city'] ?> </option> 
      <?php
      $cities = mysqli_query($connection,"select * from Cities");
      foreach($cities as $city)
      {
        echo '<option value="'.$city['NAME'].'">' . $city['NAME'] . '</option>';
      }
      ?>
    </select>
    </div>

  <div class="form-group col-md-2">
    <select class="form-control" name="type">
    <option  value="" disabled selected hidden>&nbsp; <?php echo $language['flat_type'] ?> </option> 
    <?php
      $flat_types = mysqli_query($connection,"select * from Flat_Type");
      foreach($flat_types as $flat_type)
      {
        echo '<option value="'.$flat_type['NAME'].'">' . $flat_type['NAME'] . '</option>';
      }
      ?>
    </select>
</div>

<div class="form-group col-md-2"> 
    <input name="price-from" type="text" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $language['price_from'] ?>">
  </div>

<div class="form-group col-md-2"> 
    <input name="price-upto" type="text" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $language['price_to'] ?>">
  </div>

<div>
    <button type="submit" id="form-submit" class="search_button"> <?php echo $language['search'] ?> </button>
</div>

<!-- <div class="form-group col-md-2">
<label for="customRange1"></label>
<input type="range" class="custom-range" min="0" max="10" id="customRange1">
  </div> -->

</div>
</form>
<!-- SEARCH INPUT FORM END -->

<section class="section flats" data-section="section3">
<table class="table table-hover">
  <tbody>
  <?php foreach($apartments as $apartment){ ?>
   <tr class="rows">
      <th scope="row"></th>
       <td>
      <a href="selected_flat.php?id=<?php echo $apartment['ID'] ?>">   <img src="<?php 
      // To slelect Apartment Images
      $ID = $apartment['ID'];
      $apartment_images_query = mysqli_query($connection,"select * from Apartment_Images WHERE APARTMENT_ID = '$ID'")or ("DB error: $dbname");
      $apartment_images = mysqli_fetch_array($apartment_images_query)['IMAGE_DIR'];
      echo $apartment_images;
      ?>"></a>
      </td>
      <td>
        <header class="apartment_location">
         <h5> <strong>&#128205;<?php echo $apartment['ADDRESS'] ?></strong></h5></a>
          <?php echo $apartment['CITY']?>
      </header> 
      </td>
      <td>
        <div class="flat_type">
        <?php echo $language['flat_type']; ?> 
          <div>
             <strong><?php echo $apartment['FLAT_TYPE'] ?></strong>
        </div>
        </div>
      </td>
      <td>
        <div class ="apartment_price">
          <dt class="price_text"> <?php echo $language['price']; ?> </dt>
          <dd>
            <strong><?php echo $apartment['PRICE'] ?> PLN </strong>
            <span>/ <?php echo $language['month']; ?></span><br>
            <small class="hidden-on-tiles"> <?php echo $language['contract'] ?> </small>
          </dd>  

          <br>

<!--           <dt class="price_text">UTILITIES PRICE</dt>
          <dd>
            <strong><?php echo $apartment['UTILITIES_PRICE'] ?> PLN </strong>
            <span>/ month</span><br>
            <small class="hidden-on-tiles">(INCLUDES WIFI)</small>
          </dd> 

          <dt class="price_text">RENT + UTILITIES</dt>
          <dd>
            <strong>
              <?php 
              $utilities =$apartment['UTILITIES_PRICE']; 
              $price = $apartment['PRICE'];
              $overall_price = $utilities + $price;
              echo $overall_price
              ?> PLN </strong>
            <span>/ month</span><br>
            <small class="hidden-on-tiles"></small>
          </dd>  -->

        </div>

      </td>

      <td>
        <div>
         <?php echo $language['posted_on'] ?> <br><br>
          <div>
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
        </div>
      </td>

    </tr>
    <?php }?>
  </tbody>
</table>

</section>

</body>
</html>
