<div class="main-content">
           
           
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                     
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title">List Of Modules</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#addmodule">New Modules</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Duration</th>                                                                       
                                                <th>Action</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                       		<?php
                                       		$item = null;
                                        	$value = $_SESSION["departid"];
                                        	$departmenlist = managedepartsctrl::filtermoduleslistctrlshow($item,$value);
                                        	foreach ($departmenlist as $key => $value) {
                                                
                                        	echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                               <td>'.$value["name"].'</td>
                                               <td>'.$value["code"].'</td>                                       
                                               <td>'.$value["hrs"].'-'.$value["min"].'hrs</td>
                                                <td>
                                           		<button class = "btn btn-danger btn-sm btnmodule" mdlid="'.$value["id"].'" ><i class="fa fa-trash"></i></button>
                                                  <button class = "btn btn-warning btn-sm btneditmodule" data-toggle="modal" data-target="#editmodule"  mdlid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
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


<div class="modal fade" id="addmodule">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Modules(s)</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form enctype="multipart/form-data" method="POST" >

    <div class="form-group">
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">Select Entry</label>
                 <select class="form-control " id="entrytype1" name="entrytypetwo"  >
                        <option value=""> Select Entry Type</option>
                     <option value="Upload CSV"> Upload CSV</option>
                     <option value="Enter Single Info"> Enter Single Info</option>  
                  </select>
            </div>
        </div>
     </div>



	<div style="display: none;" id="single1mdl">
     <div class="form-group" >
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Module Code</label>
            </div>
            <div class="col-md-6">
                <input type="text" id="" class="form-control" name="modulecode"  placeholder="Enter Module Code">
            </div>
        </div>
     </div>
      <div class="form-group" >
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Module Name</label>
            </div>
            <div class="col-md-6">
                <input type="text" id="" class="form-control" name="modulename"  placeholder="Enter Module Name">
            </div>
        </div>
     </div>
      <div class="form-group" >
        <div class="row">
            <div class="col-md-3">
                <label for="exampleInputEmail1">Hours Taught(Duration)</label>
            </div>
            <div class="col-md-4">
                <input type="number" id="" class="form-control" name="hrs" placeholder="Enter Hours"  min="0">
            </div>
             <div class="col-md-4">
                <input type="number" id="" class="form-control" name="min" placeholder="Enter Minutes" min="0" > 

            </div>
        </div>
     </div>
     </div>

     <div class="form-group" style="display: none;" id="csvfileupload1mdls">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1"></label>
            </div>
            <div class="col-md-6"> 
               <label for="exampleInputEmail1">Upload CSV File</label>
    				<input type="file" class="form-control " name="csvfiletwo" >
                
            </div>
        </div>
     </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
                    $useradd = new managedepartsctrl();
                    $useradd ->addmoudelsctrl();
                    ?> 
        </form>
    </div>
</div>
</div>
</div>
<?php
$useradd = new managedepartsctrl();
$useradd ->modulesctrldel();
?>  



<div class="modal fade" id="editmodule">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Module</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Module Code</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="editcode" class="form-control" name="editcode"  required="">
    			<input type="hidden" name="moduleid" readonly="" id="eidiii"> 
    		</div>
    	</div>
     </div>





     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Module Name</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="editname" class="form-control" name="editname" required>
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Duration Hrs</label>
    		</div>
    		<div class="col-md-6"> 
    			<input type="text" id="edithrs" class="form-control" name="edithrs"  required>
    		</div>
    	</div>
     </div>

      <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Duration Min</label>
    		</div>
    		<div class="col-md-6"> 
    			<input type="text" id="editmin" class="form-control" name="editmin"   required>
    		</div>
    	</div>
     </div>

     




    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->editmodulesctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>
