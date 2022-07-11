<?php 




 ?>
<div class="main-content">
                
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                 <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <br>
                        <form enctype="multipart/form-data" method="POST">
                              <input type="hidden" name="rateid" value="<?php echo $rates["id"]; ?>"  required="" >
                 <div class="card">
                    <div class="card-header">
                         <h3>Chnage Password</h3>
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                             <label for="exampleInputEmail1">Current Password</label>
                         </div>
                        <div class="col-md-6" >
                         
                         <input type="password" min="10000" class="form-control"  name="oldpassword"  required="" >
                        </div>

                       
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">New Password</label> </label>
                        </div>
                        <div class="col-md-6" >
                         
                         <input type="password" min="10000" class="form-control" name="newpassword"   required="" >
                        </div>

                       
                    </div>
                    <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Confrim Password</label>
                        </div>
                        <div class="col-md-6" >
                         
                         <input type="password" min="10000"    class="form-control" name="confirmnewpass"  required="" >
                        </div>

                        
                    </div>

                    
                    

                    </div>
                    
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-md-4"></div>
                            
                    </div>
                     <?php
                    $useradd = new manageuseraccountsctrl();
                    $useradd ->UpdatePasswordCtrl();
                    ?>  
                </form>
        </div>
     </div>

                 </div>
               
        </div>
    </div>
</div>

<div class="main-content-inner">
            
               
        </div>
    </div>
</div>

