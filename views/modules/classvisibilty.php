<div class="main-content">
        <br>   
           
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                     <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title">Class Visibility</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Record</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                    $item = null;
                                    $value = $_SESSION["departid"];
                                    $departmenlist = managedepartsctrl::filtertwoshowclassvisibltyctrl($item,$value);
                                    foreach ($departmenlist as $key => $value) {

                                    $itm = "id";
                                    $vale = $value["departid"];
                                    $depart = managedepartsctrl::departmentctrlshow($itm,$vale);

                                    $itemy = "id";
									$valuey = $value["classid"];
									$answer = managedepartsctrl::allclasslistctrlshow($itemy,$valuey); 

                                    $datu = ($value["id"]*2234567879*5678)/956783;
                                    $info = urlencode(base64_encode($datu));

                                    $tem = "id";
                                    $alue = $answer["coarse"];
                                    $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);
                                    $year = substr($answer["yearof"], 2); 
                                 	$classname = strtoupper($answer["classtype"]).' '.$answer["yearof"].'-'.$coarse["intial"];
                                            echo ' 
                                        <tr>                                         
                                        <td>'.($key+1).'</td>                                                                           
                                    <td>'. $classname.'</td>                              
                                	<td>'.$depart["name"].'</td>                                                                               
                                        <td>
                                        <button class = "btn btn-danger btn-sm " crsid="'.$info.'" ><i class="fa fa-trash"></i></button>
                                          
                                      </td>
                                        </tr>';
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
        <h5 class="modal-title">New Coarse Visibility</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">
       	 <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">DEPARTMENT</label>
    		</div>
    		<div class="col-md-6">
    		 <select class="form-control " id="" name="slctdepartid" required="" >
		    			 <option value=""> Select Department</option>
		    			 	<?php
		    			 	 $item = null;
		                    $value = null;
		                    $clients = managedepartsctrl::departmentctrlshow($item,$value); 
		                    foreach ($clients as $key => $value) {     
		                    	if ($_SESSION["departid"] != $value["id"]) {
		                    	   echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
		                    	      }                   		                    
		        				  }
		    			 	?>
		    	   </select>
    		</div>
    	</div>
     </div>
					


     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">CLASS</label>
    		</div>
    		<div class="col-md-6">
    		 <select class="form-control " id="" name="slctclassid" required="" >
                     <option value="">Select Class </option>
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
                           echo '<option value="'.$value["id"].'">'.$classname .'</option>';
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
            $useradd = new managedepartsctrl();
            $useradd ->updateclassvisibltyctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>