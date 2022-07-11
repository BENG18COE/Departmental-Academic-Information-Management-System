<div class="main-content">
           
           <br>
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
                                    <a href="assiugnmodule">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#addmodule">Assign Module </button></a>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Module Name</th>
                                                <th>Module Code</th>
                                                <th>Duration</th>  
                                                <th>Teacher</th>                                                                       
                                                <th>Class</th>  
                                                <th>Action</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $item = null;
                                            $value = null;
                                            $modules = assignmodulesctrl::dprtassignmodulesctrlshow($item,$value); 

                                            foreach ($modules as $key => $value) {
                                                 $itemx = "id";
                                                 $valuex = $value["teacherid"];
                                                 $ticha = managedepartsctrl::allteacherslistctrlshow($itemx,$valuex); 

                                                $tem = "id";
                                                $alue = $value["moduleid"];
                                                $answer = managedepartsctrl::allmoduleslistctrlshow($tem,$alue);

                                                $itemy = "id";
                                                $valuey = $value["classid"];
                                                $classname = managedepartsctrl::allclasslistctrlshow($itemy,$valuey);  

                                                $tem = "id";
                                                $alue = $classname["coarse"];
                                                $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);
                                                $year = substr($classname["yearof"], 2); 
                                                $classname = strtoupper($classname["classtype"]).' '.$classname["yearof"].'-'.$coarse["intial"];
                                                $datu = ($value["id"]*2234567879*5678)/956783;
                                                $info = urlencode(base64_encode($datu));
                                                echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                               <td>'.$answer["name"].'</td>
                                               <td>'.$answer["code"].'</td>
                                               <td>'.$value["hrstght"].'hrs -'.$value["min"].'min</td>
                                              <td>'.$ticha["first"].' '.$ticha["secon"].' '.$ticha["third"].'</td>
                                              <td>'. $classname.'</td>';
                                              echo'
                                                <td>
                                                <button class = "btn btn-danger btn-sm btnassignedmdl" tchid="'.$info.'" ><i class="fa fa-trash"></i></button>
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


<?php
    $useradd = new assignmodulesctrl();
     $useradd ->assignmodulesctrldel();
    ?>