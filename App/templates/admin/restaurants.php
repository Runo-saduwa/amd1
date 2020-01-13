<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Available Restaurants </li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Restaurant Name</th>
                                <th>Featured </th>
                                <th>Time</th>
                                <th>State</th>
                                <th>City </th>
                                <th>Current Location </th>
                                <th>Cover Image </th>
                                <th>Delete</th>
                                <th>Hide</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($restaurants as $list) {

                                ?>
                                <tr>
                                    <td><?php echo $list->restaurant; ?></td>
                                    <td><?php if ($list->featured == 1) {
                                                echo "Yes";
                                            } else {

                                                echo "No";
                                            } ?></td>
                                    <td><?php echo $list->time; ?></td>
                                    <td><?php echo $list->state; ?></td>
                                    <td><?php echo $list->city; ?></td>
                                    <td><?php echo $list->location; ?></td>
                                    <td><img src="../web/uploads/<?php echo $list->coverImage; ?>" class="img-fluid" style="width:200px; height:200px;"></td>

                                    <td><a href="/amd_admin/restaurants/<?php echo $list->item_id; ?>" class="btn btn-danger">Delete</td>
                                    <td><a href="?hide=<?php echo $list->item_id; ?>" class="btn btn-warning">Hide</td>

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>