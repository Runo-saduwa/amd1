<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <?php
                if (!empty($response)) {
                    foreach ($response as $key => $value) {
                        if ($key == 'failed') {
                            echo '<div class="alert alert-warning">' . $value . '</div>';
                        } else if ($key == 'success') {
                            echo '<div class="alert alert-success">' . $value . '</div>';
                        }
                    }
                }
                ?>
                <hr>
                <div class="col-md-8">
                    <form class="form-group" method="POST" enctype="multipart/form-data">
                        <label for="food_name">Restaurant</label>
                        <div class="form-group">
                            <input type="text" name="restaurant" class="form-control" placeholder="Restaurant">
                        </div>

                        <label for="food_name">Time</label>
                        <div class="form-group">
                            <input type="text" name="time" class="form-control" placeholder="Time">
                        </div>
                        <label for="food_name">State</label>
                        <div class="form-group">
                            <input type="text" name="state" class="form-control" placeholder="State">
                        </div>

                        <label for="food_name">City</label>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>

                        <label for="food_name">Location</label>
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>

                        <label for="food_name">Cover Image</label>
                        <div class="form-group">
                            <input type="file" name="food_image" class="form-control" placeholder="Choose an image file">
                        </div>


                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>