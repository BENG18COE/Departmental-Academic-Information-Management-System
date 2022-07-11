<?php 
$item = "id";
$value = "1";
$rates = ManagePaymentsCtrl::ShowPaymentratesCtrl($item,$value);


// prthours
// stdsuprvise
// fnlprese
// iptmark
// examseting
// scriptmaking
// finalyearmark


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
                 		 <h3>Set Payement Rates </h3>
                 	</div>
                 	<br>

                 	<div class="form-group" >
                        <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                             <label for="exampleInputEmail1">Extra Hours</label>
                         </div>
                        <div class="col-md-2" >
                         
                         <input type="number" min="10000" class="form-control" value="<?php echo $rates["extrhrs"]; ?>" name="extrhrs"  required="" >
                        </div>

                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Partime</label>
                        </div>
                        <div class="col-md-2" >
                         
                         <input type="number" min="10000" class="form-control" name="prthours"  value="<?php echo $rates["prthours"]; ?>" required="" >
                        </div>
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Student Supervision</label>
                        </div>
                        <div class="col-md-2" >
                         
                         <input type="number" min="10000" class="form-control" name="stdsuprvise" value="<?php echo $rates["stdsuprvise"]; ?>"  required="" >
                        </div>

                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                               <label for="exampleInputEmail1">Final Presentation</label>
                         </div>
                        <div class="col-md-2" >
                       
                         <input type="number" min="10000" class="form-control" name="fnlprese" value="<?php echo $rates["fnlprese"]; ?>"  required="" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Ipt Book Marking  </label>
                        </div>
                        <div class="col-md-2" >
                         
                         <input type="number" min="10000" value="<?php echo $rates["iptmark"]; ?>"   class="form-control" name="iptmark"  required="" >
                        </div>

                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                               <label for="exampleInputEmail1">Final Year Book Marking</label>
                         </div>
                        <div class="col-md-2" >
                       
                         <input type="number" min="10000" class="form-control" value="<?php echo $rates["finalyearmark"]; ?>" name="finalyearmark"  required="" >
                        </div>
                    </div>

                     <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Exam Setting  </label>
                        </div>
                        <div class="col-md-2" >
                         
                         <input type="number" value="<?php echo $rates["examseting"]; ?>" min="10000" class="form-control" name="examseting"  required="" >
                        </div>

                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                               <label for="exampleInputEmail1">Script Marking </label>
                         </div>
                        <div class="col-md-2" >
                       
                         <input type="number" value="<?php echo $rates["scriptmaking"]; ?>" min="1000" class="form-control" name="scriptmaking"  required="" >
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
			        $useradd = new ManagePaymentsCtrl();
			        $useradd ->AddPaymentratesCtrl();
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

