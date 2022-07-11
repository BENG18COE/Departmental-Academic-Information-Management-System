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
                                	<h4 class="header-title">Student List</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#newstudentlist">New Student List</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>FullName</th>
                                                <th>Registration No</th>
                                                <th>Phone</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                         $item = null;
							             $value = $_SESSION["departid"];
							             $studentlist = managedepartsctrl::filterstudentsctrlshow($item,$value); 
							             foreach ($studentlist as $key => $value) {
							             $itemx = "id";
										$valuex = $value["classid"];
	  									$answer = managedepartsctrl::allclasslistctrlshow($itemx,$valuex);  

	  									$tem = "id";
                                        $alue = $answer["coarse"];
                                        $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);
                                        $year = substr($answer["yearof"], 2); 
                                 		$classname = strtoupper($answer["classtype"]).' '.$answer["yearof"].'-'.$coarse["intial"];
                                 		  $datu = ($value["id"]*22345678709*567888)/956783;
                                    	  $info = urlencode(base64_encode($datu));
							            echo ' 
                                        <tr>                                         
                                        <td>'.($key+1).'</td>                                                                           
                                    	<td>'. $value["fullname"].'</td>  
                                    	<td>'. $value["regno"].'</td>  
                                    	<td>'. $value["phone"].'</td>  
                                		<td>'.$classname.'</td>                                                                               
                                        <td>
                                        <button class = "btn btn-danger btn-sm btndelstudent" stdid="'.$info.'" ><i class="fa fa-trash"></i></button>
                                          <button class = "btn btn-warning btn-sm btneditstudent" data-toggle="modal" data-target="#editnofstudents"  stdid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
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


<div class="modal fade" id="newstudentlist">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add Student(s) to their Respective Class</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form enctype="multipart/form-data" method="POST">

    <div class="card">
                   
                    <br>

                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-3">
                        
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Entry Type</label>
                    <select class="form-control " id="entrytype3" name="entrytype3" required="" >
                        <option value=""> Select Entry Type</option>
                     <option value="Upload CSV"> Upload CSV</option>
                     <option value="Enter Single Info"> Enter Single Info</option>  
                    </select>
                    </div>
                    </div>
                    </div>

                    <div class="form-group" >
                    <div class="row">
                    <div class="col-md-3">
                        
                    </div>

                    <div class="col-md-6" >
                        <label for="exampleInputEmail1">Select Class </label>
                    <select class="form-control " id="" name="classid" required="" >
                     <option value=""> Select Class </option>
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
                    <div class="form-group" style='display:none;' id="studentfullname">
                        

                    <div class="row">
                    
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Enter FullName" >
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Registration Number</label>
                    <input type="text" class="form-control" name="regno" placeholder="Enter Registration Number" >
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Phone </label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" >
                    </div>
                    </div>

                    </div>

                    
                    <div class="form-group" style='display:none;' id="csvfileupload3">
                    <div class="row">
                    <div class="col-md-3">
                    
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Upload CSV File</label>
                    <input type="file" class="form-control " name="csvfilethree" >
                    
                    </div>
                    </div>
                    </div>


    			</div>

				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save </button>
      
                     <?php
                    $useradd = new managedepartsctrl();
                    $useradd ->addstudentstoclassesctrl();
                    ?>  
        </form>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>







<div class="modal fade" id="editnofstudents">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"> Edit Student Details</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Fullname </label>
            </div>
            <div class="col-md-6">
                   <input type="text" min="0" class="form-control" name="editflnstudent"  id="editfullname" >
                   <input type="hidden" name="eidiii" id="edid" readonly="">
            </div>
        </div>
     </div>

      <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Registration </label>
            </div>
            <div class="col-md-6">
                   <input type="number" min="0" class="form-control" name="editregnostdnt"  id="editregno" >
                  
            </div>
        </div>
     </div>
      <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Phone</label>
            </div>
            <div class="col-md-6">
                   <input type="number" min="0" class="form-control" name="editphone"  id="editphone">
                   
            </div>
        </div>
     </div>

    

    

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->updatestudentdetailsctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>

<?php
$useradd = new managedepartsctrl();
$useradd ->studentctrldel();
?>  


