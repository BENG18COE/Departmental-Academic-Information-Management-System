<body style="background: #0c7af5;">
 <div class="login-area login-s2"  style="background: #0c7af5;">
        <div class="container" style="background: #0c7af5;">
            <div class="login-box ptb--100" >
                <form method="POST">
                    <div class="login-form-head" style="background: #0c7af5;">
                        <h4 style="color: black;">
                            Departmental Academic Information Management System <br>
                        </h4>
                            Sign In
                    </div>
                    <div class="login-form-body" style="background: #0c7af5;">
                        <div class="form-gp">
                            <label for="exampleInputEmail1" style="color: black;"><b>Username</b></label>
                            <input type="text" name="username" required="">
                            <i class="ti-email" style="color: black;"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1" style="color: black;"><b>Password</b></label>
                            <input type="password" name="password" required="">
                            <i class="ti-lock" style="color: black;"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" style="color: black;"><b>Forgot Password?</b></a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                        <button id="form_submit" type="submit" style="background: black;">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <br>
                        <div class="submit-btn-area">
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#signup"  style="background: yellow;" role="button">
                          Dont Have An Account? Sign Up  
                        </a>
                        </div>
                          <?php
                        $useradd = new manageuseraccountsctrl();
                        $useradd ->userloginaccountctrl();
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- login area end -->



<div class="modal fade" id="signup">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">New User Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
        <div class="row">
            <div class="col-md-1"></div>
            <br>
            <div class="col-md-3">
                <label for="exampleInputEmail1">Sign Code</label>
            </div>
            <br>
            <div class="col-md-6">
                <input type="text" class="form-control" name="signuptoken" placeholder="Enter Sign Code" required="">
            </div>
        </div>
     </div>

    
     
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new manageuseraccountsctrl();
            $useradd ->userverifyctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>
