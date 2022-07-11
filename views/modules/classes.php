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
                                	<h4 class="header-title">List Of Class</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Class</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>No Students</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $item = null;
                                    $value = $_SESSION["departid"];
                                    $departmenlist = managedepartsctrl::filterclasslistctrlshow($item,$value);
                                    foreach ($departmenlist as $key => $value) {
                                    $datu = ($value["id"]*2234567879*5678)/956783;
                                    $info = urlencode(base64_encode($datu));
                                     $tem = "id";
                                    $alue = $value["coarse"];
                                    $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);
                                    $year = substr($value["yearof"], 2); 
                                 $classname = strtoupper($value["classtype"]).' '.$value["yearof"].'-'.$coarse["intial"];
                                            echo ' 
                                        <tr>                                         
                                        <td>'.($key+1).'</td>                                                                           
                                    <td>'. $classname.'</td>  
                                <td>'.$value["totalsdnts"].'</td>                                                                               
                                        <td>
                                        <button class = "btn btn-danger btn-sm btnclassdel" crsid="'.$info.'" ><i class="fa fa-trash"></i></button>
                                          <button class = "btn btn-warning btn-sm btneditclass" data-toggle="modal" data-target="#editnofstudents"  crsid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
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
    			<label for="exampleInputEmail1">Year Of Admision</label>
    		</div>
    		<div class="col-md-6">
    			 <select class="form-control" class="chosen-select" name="yearof" tabindex="-1" required="">
                <?php
                $currentYear = date('Y');
                $Intial = $currentYear - 2;
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
    			<label for="exampleInputEmail1">Class Type</label>
    		</div>
    		<div class="col-md-6">
    			   <select data-placeholder="Choose a Country..." class="form-control" name="classtype"  class="chosen-select" tabindex="-1" required="">
            <option value="">Select Class Type</option>
                <option value="OD">OD</option>
                 <option value="GC">GC</option>
                <option value="BEng">BENG</option>
                </select>
    		</div>
    	</div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Total Student </label>
            </div>
            <div class="col-md-6">
                   <input type="number" min="0" class="form-control" name="totalsdnts" placeholder="Enter Number of Students" required="">
            </div>
        </div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Select Coarse </label>
            </div>
            <div class="col-md-6">
                    <select class="form-control" class="chosen-select" name="coarse" tabindex="-1" required="">
                    <option value="">Select Coarse</option>
                    <?php
                   $item = null;
                    $value = $_SESSION["departid"];
                    $coarse = managedepartsctrl::filtercoarseslistctrlshow($item,$value); 
                       foreach ($coarse as $key => $value) {
                     echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                            }
                        ?>
                </select>
            </div>
        </div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Coarse Name Intial</label>
            </div>
            <div class="col-md-6">
            <select data-placeholder="Choose a Country..." class="form-control" name="stream"  class="chosen-select" tabindex="-1" required="">
            <option value="">Select Stream</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="None">None</option>
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
            $useradd ->addclasctrladd();
            ?>  
        </form>
    </div>
</div>
</div>
</div>

<?php
$useradd = new managedepartsctrl();
$useradd ->classlistctrldel();
?>  





<div class="modal fade" id="editnofstudents">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"> Edit Number Of Students In Class</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">


    

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Total Student </label>
            </div>
            <div class="col-md-6">
                   <input type="number" min="0" class="form-control" name="editotalsdnts"  id="editnostdnt" required="">
                   <input type="hidden" name="idi" id="edid">
            </div>
        </div>
     </div>

    

    

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->updateclasctrladd();
            ?>  
        </form>
    </div>
</div>
</div>
</div>