<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add meals</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="col-md-8">
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                        <label>Choose Restaurant</label>
                        <div class="form-group">
                            <select class="form-control" name="restaurant">
                                <?php foreach($lists as $list){

                                ?>

                                    <option value="<?php echo $list->item_id;?>"> <?php echo $list->restaurant; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <label for="food_name">Food Name</label>
                        <div class="form-group">
                            <input type="text" name="food_name" class="form-control" placeholder="Food name" required>
                        </div>

                        <label for="food_name">Price</label>
                        <div class="form-group">
                            <input type="text" name="price" class="form-control" placeholder="Food price" required>
                        </div>
                        <label for="food_name">Description</label>
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="Description" type="text" required></textarea>
                        </div>
                        <label for="food_name">Food image</label>
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