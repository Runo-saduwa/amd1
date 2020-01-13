<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Orders</li>
            <?php if(empty($contact)){
                echo "<br><p class='alert alert-danger'>Delivery address not set,  <a class='btn btn-warning' href='/dashboard/address'>Add it now</a></p>";
            }?>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                
                                    <th>Food purchased</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Order Status</th>
                        
                        
                                    <th>Date</th>
                                            <th>Delivery Address</th>
                                            
                                                       <th>Phone Number</th>
                           

                                </tr>
                            </thead>

                            <tbody>
                               <?php 
if(empty($orders)){
    echo "<div class='alert alert-warning'>No pending orders</div>";
}else{
    foreach($orders as $order ){


        ?>
<tr>
        <td> <?php echo $order->title; ?></td>
        <td> <?php echo $order->price; ?></td>
        <td> <?php echo $order->quantity; ?></td>
        <td> <?php echo $order->order_status; ?></td>
        <td> <?php echo $order->created; ?></td>
        <td> <?php 
        if(!empty($order->address)){
            echo $order->address;
        }else{
            echo "No delivery address was set";
        }
         ?></td>
         
          <td> <?php 
        if(!empty($order->phone)){
            echo $order->phone;
        }else{
            echo "User phone number not available";
        }
         ?></td>
    </tr>

<?php 
    }
}


?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>