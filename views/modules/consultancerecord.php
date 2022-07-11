

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
                         <h3>Record Consultance</h3>
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-2">
                             <label for="exampleInputEmail1">Enter Company Or Organization</label>
                         </div>
                        <div class="col-md-6" >
                         
                         <input type="text"  class="form-control" name="organizationname"  required="" >
                        </div>

                       
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Project Description</label> </label>
                        </div>
                        <div class="col-md-6" >
                         
                         <textarea class="form-control"  name="projectdexcription" ></textarea>
                        </div>

                       
                    </div>
                    <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-2">
                            <label for="exampleInputEmail1">Assigned Person</label>
                        </div>
                        <div class="col-md-6" >
                         
                         <select class="form-control selectpicker"  name="teacherid" required="" data-live-search="true">
                        <option value=""> Select Teacher</option>
                    <?php
        			 	 $item = null;
                        $value = $_SESSION["departid"];
                        $tichas = managedepartsctrl::filterteacherulltimestctrlshow($item,$value); 
                        foreach ($tichas as $key => $value) {                        
                           echo '<option value="'.$value["id"].'">'.$value["first"].' '.$value["secon"].' '.$value["third"].'</option>';
            				  }
        			 	?> 
                    </select>
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
                    $useradd = new ConsultancCtrl();
                    $useradd ->AddNewConsultancRecordCtrl();
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

