<div class="main-content">
           
           <br>
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                 <div class="col-md-2"></div>
                    <div class="col-md-8">
                    	<br>
                    	<form enctype="multipart/form-data" method="POST">
                 <div class="card">
                 	<div class="card-header">
                 		 <h4>Final Presentation Panel Section</h4>
                 	</div>
                 	<br>

                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                       <label for="exampleInputEmail1">Teacher</label> 
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Teacher</label>
                    <select class="form-control selectpicker"  name="finlteacherid" required="" data-live-search="true">
                        <option value=""> Select Teacher</option>
                    <?php
        			 	 $item = null;
                        $value = $_SESSION["departid"];
                        $tichas = managedepartsctrl::filterteacherslistctrlshow($item,$value); 
                        foreach ($tichas as $key => $value) {                        
                           echo '<option value="'.$value["id"].'">'.$value["first"].' '.$value["secon"].' '.$value["third"].'</option>';
            				  }
        			 	?> 
                    </select>
                    </div>
                    </div>
                    </div>


                     <div class="form-group">
                    <div class="row">
                    	<div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label for="exampleInputEmail1">Number Of Days</label>  
                    </div>
                    
                    <div class="col-md-6">
                     <input type="number" min="1" class="form-control" name="noofdays"  required="" placeholder="Enter Number Of Students " required>        
                    </div>
                    </div>
                    </div>

    				

    				<div class="row">
    					<div class="col-md-4"></div>
    					<div class="col-md-4">
    						<button type="submit" class="btn btn-primary">Save </button>
    					</div>
    					
    				</div>
					
					<br>

					   <?php
                        $useradd = new FinalpresentationCtrl();
                        $useradd ->PanelSittingCtrl();
                        ?>

					
				</form>
    	</div>
     </div>

                 </div>
               
        </div>
    </div>
</div>


