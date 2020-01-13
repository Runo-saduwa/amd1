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
                        <div class="col-md-8">
                            <form class="form-control" method="post" action="?update=update">
                                <div class="form-group">
                                    <input type="text" name="full_name" class="form-control" value="<?php if (!empty($profile)) {
                                                                                                        echo $profile->full_name;
                                                                                                    }
                                                                                                    ?>" placeholder="Full name" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" readonly class="form-control" value="<?php if (!empty($profile)) {
                                                                                 echo $profile->email;
                                                                                 }
                                                                     ?>" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="password"/>
                                </div>
                                <div class="form-group">
                                    <!--<button type="submit" name="submit" class="btn btn-warning">Update</button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>