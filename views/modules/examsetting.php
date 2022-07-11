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
                 		<h4>Examination Setting Section</h4>
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
                    <select class="form-control selectpicker"  name="stdteacherid" required="" data-live-search="true">
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


                 	<div class="form-group" >
    				<div class="row">
    					<div class="col-md-1"></div>
    				<div class="col-md-3">
    				  <label for="exampleInputEmail1">Module</label>  
    				</div>


    				<div class="col-md-6" >
    					<label for="exampleInputEmail1">Module</label>
    				<select class="form-control selectpicker" id="" name="stdmoduleid" required="" data-live-search="true">
        			 <option value=""> Select Module</option>
        			 	<?php
        			 	 $item = null;
                    	$value = $_SESSION["departid"];
                    	$module = managedepartsctrl::filtermoduleslistctrlshow($item,$value);
                        foreach ($module as $key => $value) {                        
                           echo '<option value="'.$value["id"].'">'.$value["name"].'-'.$value["code"].'</option>';
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
                      <label for="exampleInputEmail1">Class</label>  
                    </div>
                    <div class="col-md-6">
                        <select class="form-control selectpicker"  name="stdclassid"  data-live-search="true" required>
        			 <option value=""> Select Class</option>
        			 	<?php
		 	  			$item = null;
                        $value = $_SESSION["departid"];
                        $classlist = managedepartsctrl::filterclasslistctrlshow($item,$value);
                        foreach ($classlist as $key => $value) {   
            			$tem = "id";
                        $alue = $value["coarse"];
                        $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);  
                        $year = substr($value["yearof"], 2); 
                        $classname = strtoupper($value["classtype"]).' '.$value["yearof"].'-'.$coarse["intial"];                   
                           echo '<option value="'.$value["id"].'">'.$classname.'</option>';
            				  }
        			 	?>
        			</select>      
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
                        $useradd = new ExaminationManageCtrl();
                        $useradd ->AddExamSettingsCtrl();
                        ?>

					
				</form>
    	</div>
     </div>

                 </div>
               
        </div>
    </div>
</div>


