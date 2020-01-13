
  <div class="amd_bg">
    <div class="container">

    <div class="row justify-content-center">

  <div class="col-md-10 text-center push_down">
<h1 class="intro-text">Amd Food Deliveries</h1>

<p>sumptuous meals, swift delivery!</p>

<a class="btn-explore" href="#vendors">explore</a>

</div>
</div>
</div>

</div>
<div class="additional_info">
<div class="container">
  <div class="row">
<div class="col-md-4">
  <h4>Fresh Food</h4>

  <p>Amd food enures the food delivered are not left overs, no spoilt nor harmful.
    Enjoy the taste of freshly prepared food from us.</p>
</div>

<div class="col-md-4">
  <h4>Instant Payments</h4>

  <p>Pay for anyfood of your choice online through your card and get it delivered 
    to your hostel within the specifed time frame.
  </p>
</div>

<div class="col-md-4">
  <h4>Swift Delivery</h4>

  <p>Food delivery is as fast as when you place order, no barrier can stop us from 
    quenching your taste on time when we receive your order.
  </p>
</div>

</div>
</div>
</div>


  <section class="featured-delicacies-section container">
        <h2 class="text-center my-5" id="vendors">Food Vendors</h2>

</div>
    <div class="products-center row mx-auto align-items-center justify-content-center featured-delicacy-items" id="featured-delicacy-items">
      <!-- Products goes here -->
      <?php foreach ($foods as $food) {
        ?>

        <div class="col-10 col-sm-6 col-lg-3 max-auto my-1 store-item sweets" data-item="sweets">
            <a class="card-link" href="/single_view/<?php echo $food->rest_id; ?>">
          <div class="card single-item">
            <div class="img-container">
              <img src="../web/uploads/<?php  if(!empty($food->coverImage)){
              echo $food->coverImage;
              }else{
              
              echo "noimage.png";
              }?>" class="card-img-top store-img" alt="">

            

              <span class="item-price">
                <?php echo $food->time; ?>
              </span>
            </div>
            <div class="card-body">
              <div class="card-text text-capitalize">
                <h5 id="store-item-name"> <span class="restaurant"><?php echo ucfirst($food->restaurant); ?></span></h5>
              
                <hr>
              </div>
            </div>
          </div>
          </a>
        </div>
      <?php } ?>
      <!-- Loader -->
      <!-- <div class="lds-dual-ring"></div> -->
      <!-- /Loader -->
    </div>
  </section>
  <!-- /Section -->
</main>

<!-- /Main -->

<!-- Cart Overlay -->

<!-- cart -->
<div class="cart-overlay">
  <div class="cart">
    <span class="close-cart"><i class="far fa-window-close"></i></span>

    <div class="card bg-danger h-5 mb-3">
      <div class="d-flex justify-content-between">
        <span class="address m-3">24, Church road, Effurun</span>
        <a href="" class="edit m-3">Edit</a>
      </div>
      <div class="d-flex justify-content-between mt-5">
        <span class="time-circle m-3 d-flex justify-content-center align-items-center ">

          10mins

        </span>
        <a href="" class="edit-time mt-4 mx-3">Choose time</a>
      </div>
    </div>
    <h2>your cart</h2>
    <div class="cart-content">
  
    </div>
    <div class="cart-footer d-flex justify-content-between">
      <h3>Total :</h3>
      <h3 class="cart-total">0</h3>
    </div>


    <div class="cart-footer-2 row justify-content-center mb-5">
      <button class="clear-cart btn btn-lg mx-2 px-4">clear cart</button>
      <form>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <button class="btn btn-lg px-4" type="button" onclick="payWithPaystack()"> Check Out </button>
      </form>
      <!-- <button class="btn btn-lg px-4">Checkout</button> -->
    </div>
  </div>


</div>


<div class="opening_closing">
  <div class="container">
    <div class="row justify-content-center">
          <div class="col-md-4 text-center push_down">
          <h1>Opening Hours</h1>

          <p>Monday-Friday: 7:30am - 11pm</p>
          <p>Saturday - Sunday: 10am - 11pm 
          
      </div>

      </div>
   </div>
</div>

<div class="container">
  <div class="row">

  </div>
</div>


