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
                                	<h4 class="header-title">List Of Departments</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Department</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>Intial </th>
                                                <th>HOD</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $departmenlist = managedepartsctrl::departmentctrlshow($item,$value); 
                                        foreach ($departmenlist as $key => $value) { 
                                          
                                                 echo
                                                 '<tr>
                                                 <td>
                                                 '.($key+1).'</td>
                                                <td>'.$value["name"].'</td>                                           
                                                <td>'.$value["initial"].'</td>
                                                <td>'.$value["hod"].'</td>';
                                               echo'
                                                <td>
                                           		<button class = "btn btn-danger btn-sm btnDebrn" brid="'.$value["id"].'" ><i class="fa fa-trash"></i></button>
                                                  <button class = "btn btn-warning btn-sm btneditbran" data-toggle="modal" data-target="#editbranch"  brid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
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
        <h5 class="modal-title">Add New Department</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Department Name</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" class="form-control" name="departname" placeholder="Enter Department Name" required="">
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Department Intial</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" class="form-control" name="departinitial" placeholder="Enter Department Intial" required>
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Head Of Department</label>
    		</div>
    		<div class="col-md-6"> 
    			<input type="text" class="form-control" name="hod" placeholder="Enter HOD name"  required>
    		</div>
    	</div>
     </div>



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->adddepartmentctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="editbranch">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Department</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Department Name</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="editname" class="form-control" name="editdepartname" placeholder="Enter Department Name" required="">
    		</div>



    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Department Intial</label>
    		</div>
    		<div class="col-md-6">
    			<input type="text" id="editinit" class="form-control" name="editdepartinitial" placeholder="Enter Department Intial" required>
    		</div>
    	</div>
     </div>

     <div class="form-group">
    	<div class="row">
    		<div class="col-md-4">
    			<label for="exampleInputEmail1">Head Of Department</label>
    		</div>
    		<div class="col-md-6"> 
    			<input type="text" id="edithod" class="form-control" name="edithod" placeholder="Enter HOD name"  required>
    			<input type="hidden" name="eidiii" id="eidiii">
    		</div>
    	</div>
     </div>



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->editdepartmentctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>
<?php
            $useradd = new managedepartsctrl();
            $useradd ->departmentctrldel();
            ?>  
