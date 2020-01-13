<div id="kudyApp">
    <section class="container">
       <a href="/">   <h2 class="logo text-center my-4"> <img src="https://res.cloudinary.com/huchus/image/upload/v1567249923/logobg.png" style="width:80px"></h2></a>
        <div class="sign-up-form">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <div class="form-body">
                        <div class="card-body">
                            <h5 class="text-center">New Password</h5>
                           <span v-cloak>

 <span v-if="error">
                                <h5 class="alert alert-warning">{{message}}</h5>
                            </span>

                            <span v-if="success">
                                <h5 class="alert alert-success">{{message}}</h5>
                            </span>
</span>
                            <form @submit.prevent="newPassword">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" v-model="password" placeholder="Enter new password">

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" v-model="new_password" placeholder="Confirm new password">

                                </div>

                                <button type="submit" class="btn  btn-block btn-primary">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>