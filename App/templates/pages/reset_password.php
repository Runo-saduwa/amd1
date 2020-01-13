<div id="kudyApp">


    <section class="container">
     <a href="/">   <h2 class="logo text-center my-4"> <img src="https://res.cloudinary.com/huchus/image/upload/v1567249923/logobg.png" style="width:80px"></h2></a>
     
        <div class="sign-up-form">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <div class="form-body">
                        <div class="card-body">
                            <h5 class="text-center">Enter email to reset password</h5>
                         <span v-cloak>

   <span v-if="error">
                                <h5 class="alert alert-warning">{{message}}</h5>
                            </span>

                            <span v-if="success">
                                <h5 class="alert alert-success">{{message}}</h5>
                            </span>
</span>
                            <form @submit.prevent="resetPassword">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" v-model="email" aria-describedby="emailHelp" placeholder="Email Address">

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