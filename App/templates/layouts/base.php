
  <?php
$template = new \Codefii\Controller\Template;

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../web/css/bootstrap.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="../web/css/main.css">
   <script src="https://js.paystack.co/v1/inline.js"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="../web/css/all.css">

  <link rel="stylesheet" href="../web/dropdown/animate.min.css">

  <link rel="stylesheet" href="../web/dropdown/animate.min.css">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

  <title>AMDfooddeliveries - Welcome</title>
</head>

<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.megamenu {
  position: static;
}

.megamenu .dropdown-menu {
  background: none;
  border: none;
  width: 100%;
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/


.quantity {
    float: left;
    margin-right: 15px;
    background-color: #eee;
    position: relative;
    width: 80px;
    overflow: hidden
}

.quantity input {
    margin: 0;
    text-align: center;
    width: 15px;
    height: 15px;
    padding: 0;
    float: right;
    color: #000;
    font-size: 20px;
    border: 0;
    outline: 0;
    background-color: #F6F6F6
}

.quantity input.qty {
    position: relative;
    border: 0;
    width: 100%;
    height: 40px;
    padding: 10px 25px 10px 10px;
    text-align: center;
    font-weight: 400;
    font-size: 15px;
    border-radius: 0;
    background-clip: padding-box
}

.quantity .minus, .quantity .plus {
    line-height: 0;
    background-clip: padding-box;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-background-size: 6px 30px;
    -moz-background-size: 6px 30px;
    color: #bbb;
    font-size: 20px;
    position: absolute;
    height: 50%;
    border: 0;
    right: 0;
    padding: 0;
    width: 25px;
    z-index: 3
}

.quantity .minus:hover, .quantity .plus:hover {
    background-color: #dad8da
}

.quantity .minus {
    bottom: 0
}
.shopping-cart {
    margin-top: 20px;
}


</style>

<body>


  <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="main-nav">
    <div class="container">
      <section>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand logo" href="/">AMD Food Deliveries</a>
      </section>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact Us</a>
</li>
          
        </ul>
        <ul class="mr-auto"></ul>
        <ul class="navbar-nav mr-auto">
            <?php if(isset($log) && $log == true) {
             ?>
                   <li class="nav-item">
 <a href="/dashboard/home" class="btn btn-primary">
              Dashboard
            </a>

</li>
        <?php     
            }else{
            ?>
          <li class="nav-item">
 <a href="/signin" class="nav-link">
              Login
            </a>

</li>

   <li class="nav-item">
 <a href="/signup" class="btn btn-primary">
             Sign Up
            </a>

</li>
<?php } ?>
</ul>
      </div>
      <div class="">
        <div class="cart-btn mr-4 my-1" data-toggle="modal" data-target="#exampleModal">
          <span class="nav-icon">
            <i class="fas fa-cart-plus"></i>
          </span>
          <div class="cart-items" id="item_count">0</div>

        </div>
      </div>

    </div>
  </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                       <!-- Shopping cart table -->
                       <div class="table-responsive">
                      <table class="table" id="order_table" style="display:none">
                        <thead>
                          <tr>
                            <th scope="col" class="border-0 bg-light">
                              <div class="p-2 px-3 text-uppercase">Dish</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Quantity</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">(&#8358;)Subtotal</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Remove</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody id="food_cart">
                         
                        
                        </tbody>
                        <tfoot>
                          <tr>
                            <td></td>
                            <td style="font-weight:bold; font-size:20px">TOTAL:</td>
                            <td style="font-weight:bold; font-size:20px" id="total">(&#8358;)180</td>
                            <td></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- End -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onClick="payWithPaystack()" id="check_out" class="btn btn-outline-primary">Checkout</button>
        
        <button type="button" onClick="payOnDelivery()" id="check_out" class="btn btn-outline-primary">Pay on Delivery</button>
      </div>
    </div>
  </div>
</div>
  <!-- End of Navigation -->

  <!-- Header -->

  <?php $template->getTemp(); ?>


  <!-- Footer -->


<footer class="page-footer font-small unique-color-dark">

   

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Amd food deliveries</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <!-- <p>At Kudysave, we help people save,manage their finances and also invest with a huge return on investment every two weeks.</p> -->

            </div>
            <!-- Grid column -->

        
         

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Resources</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="/about">About us</a>
                </p>
                  <p>
                    <a href="/contact">Contact Us</a>
                </p>
              

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home mr-3"></i>Uniben, Edo state. 
                    
                    </p>
                    <p>
                        for reservations and customized orders contact +234 903 138 4962
                    </p>
              

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
 

</footer>

  <!-- /Footer -->

  <!-- jquery -->
  <script src="../web/js/axios.min.js"></script>
  <script src="../web/js/jquery-3.3.1.min.js"></script>


  <!-- bootstrap js -->
  <script src="../web/js/bootstrap.bundle.min.js"></script>
  <!-- script js -->
  <script src="../web/js/app.js"></script>
  <script src="../web/js/notify.js"></script>

  <!-- <script src="../web/js/restaurant.js"></script> -->
  <script src="../web/dropdown/bootstrap-dropdownhover.min.js"></script>
  <script>
    var item_array = []
    function AddToCart(id) {
      var data = new FormData()
      data.append('id', id);
      axios.post('/fetch_food', data).then(function(response) {
       // console.log(response.data[0])
        var food = response.data[0]
          var item = ' <tr id="row_' + id + '" class="order_to_send">\
                            <th scope="row" class="border-0">\
                              <div class="p-2">\
                                <img src="../web/uploads/'+food.image+'" alt="" width="70" class="img-fluid rounded shadow-sm">\
                                <div class="ml-3 d-inline-block align-middle">\
                                  <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle order_name">'+food.filter+'</a></h5><span class="text-muted font-weight-normal font-italic d-block">(&#8358;)Price: '+food.price+'.00</span>\
                                  <h5 class="order_id" style="display:none">'+id+'</h5>\
                                </div>\
                              </div>\
                            </th>\
                            <td class="border-0 align-middle"> <div class="col-4 col-sm-4 col-md-4">\
                                <div class="quantity">\
                                    <input type="button" value="+" class="plus" data_to_use="' + id + '">\
                                    <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"size="4" id="' + id + '">\
                                    <input type="button" value="-" class="minus" data_to_use="' + id + '">\
                                </div>\
                            </div></td>\
                            <td id="total_' + id + '" class="border-0 align-middle sub_total" style="font-weight:bold">'+food.price+'.00</td>\
                            <td id="price_' + id + '" style="display:none">'+food.price+'</td>\
                            <td class="border-0 align-middle"><a onClick="return trash(1)" id_to_send="' + id + '" class="text-dark trash"><i class="fa fa-trash"></i></a></td>\
                          </tr>'
                // console.log($("#total").text())
                          // console.log(item)
                          $('.table').show()
              if($("#row_" + id).length == 0) {
                item_array.push(item)
              $('#item_count').text(item_array.length)
                $('#food_cart').append(item)
                set_all_total()
                $.notify(food.filter+" has been Added to Cart", "success");
              }else{
                $.notify(food.filter+" has been Added already", "warning");
              }
              
              
      })
    }


    $(document).on("click",".plus",function(){
        var data_to_use = $(this).attr("data_to_use");
        increase(data_to_use);
    });

    $(document).on("click",".minus",function(){
      // alert('here')
      var data_to_use = $(this).attr("data_to_use");
      decrease(data_to_use);
    });

  function trash(id){
    $("#row_"+id).remove()
    set_all_total();
  }

  function increase(id) {
        var $input_val = Number($("#" + id).val()),value_to_set = 0, stock_count = 100;
        // alert($input_val);
        if($input_val == 0){
            value_to_set = 1;
        }else if($input_val > 0){
            if($input_val < stock_count){
                value_to_set = $input_val + 1;
            }else{
                value_to_set = $input_val;
            }
        }
        $("#" + id).val(value_to_set);
        set_price("#price_"+id,value_to_set,"#total_"+id);
    }

    function set_price(price_class,quantity,total_class){
      //console.log(quantity)
      var price = Number($(price_class).text());
      var total_price = quantity * price;
      // console.log(price)
      $(total_class).html(total_price.toFixed(2));
      set_all_total()
    }

    function set_all_total() {
          var total_p = $(".sub_total"), sum_total = 0;
          $.each(total_p, function(){
              sum_total += Number($(this).text());
          });
          $(".cart_total_amount").text(sum_total);
      }

    function decrease(id) {
        var $input_val = Number($("#" + id).val()),value_to_set = 0;

        if($input_val <= 1){
            value_to_set = 1;
        }else if($input_val > 1){
            value_to_set = $input_val - 1;
        }
        $("#" + id).val(value_to_set);
        set_price("#price_"+id,value_to_set,"#total_"+id);
    }

    function set_all_total() {
          var total_p = $(".sub_total"), sum_total = 0;
          
          $.each(total_p, function(){
              sum_total += Number($(this).text());
          });
          $("#total").text(sum_total);
      }


  </script>
 
  <script>
    
  var email="";
  var fillName="";
  var phone="";
  $(document).ready(function(){
      axios.post('/showdetails')
        .then(function (response) {
          for (let element in response.data) {
            email = response.data.email
             fullName = response.data.full_name
             phone  = response.data.phone
            
          }
        });
  })
  function payOnDelivery(){
        var all_orders = $("#order_table").find("tbody").find("tr");
                var data = [];
                $.each(all_orders, function () {
                    var id = $(this).find(".order_id")
                    var name = $(this).find(".order_name")
                    var quantity = $(this).find(".qty")
                    var total = $(this).find(".sub_total");
                    if(name.length > 0 && quantity.length > 0 && total.length > 0){
                        var obj_to_add = {
                            order_id: id.text(),
                            name: name.text(),
                            quantity: quantity.val(),
                            price: total.text()
                        };
                      }
                        data.push(obj_to_add)
                });
              if(email == "" ){
                  alert('You need to login to continue');
                  window.location='/signin';
              }else{
                  
                var formData = new FormData()
         
    let jsonData=JSON.stringify(data);
    // console.log(jsonData);
                formData.append('order',jsonData);
                formData.append('total', $("#total").text())
                axios.post('/orders/payondelivery',formData).then(function(response) {
                  var resp = response.data;
             alert('Request successful')
                window.location= '/dashboard/home';
                })
              }
  }
    function payWithPaystack() {
                if(email.length == 0){
                  alert('You need to login to continue');
                  window.location='/signin';
              }else{
                        
      var handler = PaystackPop.setup({
        key: 'pk_live_767cf0bc3481e8c63c27d22a1b1a2e5011acd9aa',
        email: email,
        amount: $("#total").text()+'00',
        currency: "NGN",
        ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        firstname: fullName,
        lastname: fullName,
        // label: "Optional string that replaces customer email"
        metadata: {
          custom_fields: [{
            display_name: fullName,
            variable_name: fullName,
            value: phone
          }]
        },
        callback: function(response) {
          if(response.status == 'success'){
            var all_orders = $("#order_table").find("tbody").find("tr");
                var data = [];
                $.each(all_orders, function () {
                    var id = $(this).find(".order_id")
                    var name = $(this).find(".order_name")
                    var quantity = $(this).find(".qty")
                    var total = $(this).find(".sub_total");
                    if(name.length > 0 && quantity.length > 0 && total.length > 0){
                        var obj_to_add = {
                            order_id: id.text(),
                            name: name.text(),
                            quantity: quantity.val(),
                            price: total.text()
                        };
                      }
                        data.push(obj_to_add)
                });
                
                             var formData = new FormData()
         
let jsonData=JSON.stringify(data);
// console.log(jsonData);
                formData.append('order',jsonData);
                formData.append('total', $("#total").text())
                axios.post('/orders',formData).then(function(response) {
                  var resp = response.data;
                alert('Payment successful')
             window.location= '/dashboard/home';
                })
              
          
          }
         
        },
        onClose: function() {
          alert('window closed');
        }
      });
      handler.openIframe();
   
              }
    
        
    }
  </script>

  <!-- <script src="../web/js/signup.js"></script> -->
</body>

</html>