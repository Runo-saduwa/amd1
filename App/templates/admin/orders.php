<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Orders</li>
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


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (empty($orders)) {
                                    echo "<div class='alert alert-warning'>No pending orders</div>";
                                } else {
                                    foreach ($orderss as $order) {


                                        ?>
                                        <tr>
                                            <td> <?php echo $order->title; ?></td>
                                            <td> <?php echo $order->price; ?></td>
                                            <td> <?php echo $order->quantity; ?></td>
                                            <td> <?php echo $order->order_status; ?></td>
                                            <td> <?php echo $order->created; ?></td>
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