<div class="form_container">
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4 push_down_new text-center">
      <h3 class="single-vendor"><?php echo ucfirst($shop->restaurant); ?></h3>
      </div>
    </div>
  </div>
</div>

<h5 class="my-5 text-center single-heading">Its an arsenal of delicacies! &#128523;, make your choice &#128525;</h5>

 <section class="featured-delicacies-section container mt-5">
    <div class="products-center row mx-auto align-items-center justify-content-center featured-delicacy-items" id="featured-delicacy-items">
      <!-- Products goes here -->
      <?php foreach ($foods as $food) {
        ?>

        <div class="col-md-4 max-auto my-1 store-item sweets" data-item="sweets">
         
          <div class="card single-item">
            <div class="img-container">
              <img src="../web/uploads/<?php echo $food->image; ?>" class="card-img-top store-img" alt="">

              <button onClick="AddToCart('<?php echo $food->food_id;?>')" title="Add to Cart" class="store-item-icon bag-btn fas fa-shopping-cart "  data-id="<?php echo $food->food_id; ?>"></button>

            </div>
            <div class="card-body">
              <div class="card-text text-capitalize">
                <h5 id="store-item-name"> <span class="restaurant"><?php echo $food->filter; ?></span></h5>
                <hr>
                <h5 class="store-item-value"><strong class="font-weight-bold" id="store-item-price">₦ <?php echo $food->price; ?></strong></h5>
                <hr>
              </div>
            </div>
          </div>
         
        </div>
      <?php } ?>
      <!-- Loader -->
      <!-- <div class="lds-dual-ring"></div> -->
      <!-- /Loader -->
    </div>
  </section>