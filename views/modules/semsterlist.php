<div class="main-content">
           <br>

           
        <div class="main-content-inner">
        	<div class="row">
        		<div class="col-md-2"></div>
        		<div class="col-md-8">
        			 <div class="card">
                            <div class="card-body">
                            	<div class="row">
                            		<div class="col-md-2"></div>
                            		<div class="col-md-8"><h5>Current Semester and Academic Year</h5></div>
                            	</div>
                            	<br>
                            	<div class="row">
                            		  <div class="col-md-1"></div>
                            	   <div class="col-md-10">
                            	  <?php
                                $item = null;
                                $value = null;
                                $settings = acyearctrl::acyearctrlshow($item,$value); 
                                foreach ($settings as $key => $value) {
                                if ($value["currentstatus"] == "1") {
                                $Year = $value["year"];
                                $smster = $value["smster"];
                                $authorise = $value["dataentryaccess"];  
                                $datavisibilty = $value["displaystatus"];  
                                    }
                                }
                                ?>
                                <?php
                                $item = null;
                                $value = null;
                                $settings = acyearctrl::acyearctrlshow($item,$value); 
                                if ($settings == false) {
                                 echo '<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#PrimaryModalalert">Set New Setings</button>';
                                }else{
                                 foreach ($settings as $key => $value) {
                                    if ($value["currentstatus"] == "1") {
                                        $id = $value["id"];
                                        }
                                    }

                                echo '<button type="submit" class="btn btn-warning editsettngs" setsid="'.$id.'" data-toggle="modal" data-target="#editsemster">Close Date Entry </button>
                                <button type="submit" class="btn btn-info " data-toggle="modal" data-target="#setviewsemster">Set Current Semster</button>
                              <button type="submit" class="btn btn-success showsettngs" data-toggle="modal" setsid="'.$id.'" data-target="#displaysettings">Set View Semster</button>'; 
                                }
                                ?>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class=" col-md-3">
                                        <label for="exampleInputEmail1"><b>Academic Year:</b></label></div>
                                                
                                    <div class="col-md-3">
                                       <label for="exampleInputEmail1"><b><?php echo $Year; ?></b></label>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-3">
                                        <label for="exampleInputEmail1"><b>Semester:</b></label></div>
                                                
                                    <div class="col-md-3">
                                       <label for="exampleInputEmail1"><b><?php echo $smster; ?></b></label>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-3">
                                        <label for="exampleInputEmail1"><b>Data Entry:</b></label></div>
                                                
                                    <div class="col-md-3">
                                       <label for="exampleInputEmail1"><b><?php echo $authorise; ?></b></label>            
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class=" col-md-3">
                                        <label for="exampleInputEmail1"><b>Data Visibility:</b></label></div>
                                                
                                    <div class="col-md-3">
                                       <label for="exampleInputEmail1"><b><?php echo $datavisibilty; ?></b></label>            
                                    </div>
                                </div>
                            </div>
                        </div>
        		</div>
        	</div>
        	<br>
            <div class="row">
                    <!-- data table start -->
                     <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title">Semesters with academic Years</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Semester</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Academic Year</th>
                                                <th>Semester</th>                                            
                                                <th>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                        $item = null;
                                        $value = null;
                                        $settings = acyearctrl::sortacyearctrlshow($item,$value); 
                                        foreach ($settings as $key => $value) {
                                         echo '<tr>
                                                <td>'.($key+1).'</td>
                                                <td>'.$value["year"].'</td>
                                                <td>'.$value["smster"].'</td>';
                                                if ($value["currentstatus"] == "1") {
                                                echo'<td><button  class="btn btn-success">Current Semster</button></td></tr>';  
                                                }else{
                                                 echo'<td><button type="submit" class="btn btn-warning">Not Current</button></td></tr>';  
                                                	}                              
		                                    	}
		                                    ?>
                                          
                                        </tbody>
                                    </table>
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



                            
<div class="modal fade" id="exampleModalLong">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Semester</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Year</label>
    		</div>
    		<div class="col-md-6">
    			 <select class="form-control"  name="yearof"  required="">
		             <option value="">Select  Year</option>
		            <?php
		            $currentYear = date('Y');
		            $Intial = $currentYear + 2;
		                foreach (range($currentYear,$Intial) as $value) {
		                 echo '<option value="'.$value .'">'.$value .'</option>';
		                     }
		                ?>
		        </select>
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Semester</label>
    		</div>
    		<div class="col-md-6">
    		<select data-placeholder="Choose a Country..." class="form-control" name="smster"  class="chosen-select" tabindex="-1" required="">
                <option value="">Select Semester </option>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
            </select>
    		</div>
    	</div>
     </div>

    

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
         <?php
	        $useradd = new acyearctrl();
	        $useradd ->acyearctrladd();
	    ?>
        </form>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="editsemster">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Data Entry Privilage</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Year</label>
    		</div>
    		<div class="col-md-6">
    				<input type="number" id="idyear" class="form-control" readonly="">
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Semester</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="edsemter" class="form-control" readonly="">
    			<input type="hidden" name="semsid" id="idi">
    		</div>
    	</div>
     </div>

      <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Data Entry Access</label>
    		</div>
    		<div class="col-md-6">
    			 <select  class="form-control" name="editdataentry"  required="">
                <option value="" id="eddatantry"></option>
                <option value="Allow">Allow</option>
                <option value="Not Allowed">Not Allowed</option>
                </select>
    		</div>
    	</div>
     </div>

    

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
         <?php
        $useradd = new acyearctrl();
        $useradd ->acyearctrledit();
    ?>
</form>
    </div>
</div>
</div>
</div>




<div class="modal fade" id="setviewsemster">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Set Current Semester and Academic Year</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

   
      <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Academic Year & Semster</label>
    		</div>
    		<div class="col-md-8">
    			 <select class="form-control"  name="semsteryr" required="">
                     <option value="">Select  Academic Year & Semster</option>
			        <?php
			        $item = null;
			        $value = null;
			        $settings = acyearctrl::acyearctrlshow($item,$value);
			        foreach ($settings as $key => $value) {
			          $semstelist = $value["smster"].'--'.$value["year"];
			          if ($value["currentstatus"] == "0") {
			             echo '<option value="'.$value["id"].'">'.$semstelist.'</option>';
			          }
			           
			        }
			       ?>
                </select>
    		</div>
    	</div>
     </div>

   
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
         <?php
	        $useradd = new acyearctrl();
	        $useradd ->acyearctrlsetcrnt();
	    ?> 
	</form>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="displaysettings">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Set Semster Data Display</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Year</label>
    		</div>
    		<div class="col-md-6">
    				<input type="number" id="idyrtwo" class="form-control" readonly="">
    		</div>
    	</div>

     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Semester</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="edsemter2" class="form-control" readonly="">
    			<input type="hidden" name="semsid" id="idsems">
    		</div>
    	</div>
     </div>

      <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Data Entry View</label>
    		</div>
    		<div class="col-md-6">
    			 <select  class="form-control" name="showinfostatus"  required="">
                <option value="" id="statuswitch"></option>
                <option value="SHOW">SHOW</option>
                <option value="DONT SHOW">DONT SHOW</option>
                </select>
    		</div>
    	</div>
     </div>

   
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
         <?php
	        $useradd = new acyearctrl();
	        $useradd ->acyearctrlsetcrntupdate();
	    ?> 
	</form>
    </div>
</div>
</div>
</div>