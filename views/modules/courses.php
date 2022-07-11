<div class="main-content">
           
           
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                     <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title">List Of Coarses</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Coarse</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Coarse Name</th>
                                                <th>Intial </th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php

                                       		$item = null;
                                        	$value = $_SESSION["departid"];
                                        	$departmenlist = managedepartsctrl::filtercoarseslistctrlshow($item,$value);
                                        	foreach ($departmenlist as $key => $value) {
                                        	$datu = ($value["id"]*2234567879*5678)/956783;
                							$info = urlencode(base64_encode($datu));
                                        	echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                               <td>'.$value["name"].'</td>
                                               <td>'.$value["intial"].'</td>                                                                               
                                                <td>
                                           		<button class = "btn btn-danger btn-sm btncoarse" crsid="'.$info.'" ><i class="fa fa-trash"></i></button>
                                                  <button class = "btn btn-warning btn-sm btneditcoarse" data-toggle="modal" data-target="#editcoarse"  mdlid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
                                                </td></td>
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
        <h5 class="modal-title">Add New Coarse</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Coarse Name</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" class="form-control" name="cname" placeholder="Enter Coarse Name" required="">
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Coarse Name Intial</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" class="form-control" name="coarseinitial" placeholder="Enter Coarse Name Intial" required>
    		</div>
    	</div>
     </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->addcoarsectrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editcoarse">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Coarse Details</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Coarse Name</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" class="form-control" id="editneim" name="editcorsename" placeholder="Enter Coarse Name" required="">
    			<input type="hidden" name="coarseid" id="eidi">
    		</div>
    	</div>
     </div>



     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Coarse Name Intial</label>
    		</div>
    		<div class="col-md-6">
    		<input type="text" id="editinti" class="form-control" name="editcoarseinitial" placeholder="Enter Coarse Name Intial" required>
    		</div>
    	</div>
     </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->editcoarsectrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>

<?php
$useradd = new managedepartsctrl();
$useradd ->coarsectrldel();
?>  
