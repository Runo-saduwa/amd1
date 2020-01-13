<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Customers</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Date Joined</th>

                                    <th>Suspend</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                if (!empty($customers)) {
                                    foreach ($customers as $customer) {


                                        ?>

                                        <tr>
                                            <td><?php echo $customer->full_name; ?></td>
                                            <td><?php echo $customer->email; ?></td>
                                            <td><?php echo $customer->created_at; ?></td>


                                            <td><?php if($customer->status=='suspended'){
                                                echo "<h6 class='alert alert-danger'>Suspended</h6>";
                                            }else{  ?>
                                                <a href="/amd_admin/customers?suspend=<?php echo $customer->id; ?>" class="btn btn-warning">Suspend</a> <?php }  ?></td>
                                            <td><a href="/amd_admin/delete_user/<?php echo $customer->id; ?>" class="btn btn-danger">Delete</a></td>

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