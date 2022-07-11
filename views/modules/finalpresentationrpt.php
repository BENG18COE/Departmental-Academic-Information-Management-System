<div class="main-content">
           
           <br>
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                     <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title">List Of Teachers </h4>
                                </div>                   
                                <div class="col-md-3">
                                    
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Teacher</th>                                                                       
                                                <th>No Of Days</th>  
                                                <th>Action</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $item = null;
                                            $value = null;
                                            $modules = FinalpresentationCtrl::ShowPanelSittingCtrl($item,$value); 

                                            foreach ($modules as $key => $value) {
                                                 $itemx = "id";
                                                 $valuex = $value["teacherid"];
                                                 $ticha = managedepartsctrl::allteacherslistctrlshow($itemx,$valuex); 


                                               
                                                $datu = ($value["id"]*2234567879*5678)/956783;
                                                $info = urlencode(base64_encode($datu));
                                                echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                              <td>'.$ticha["first"].' '.$ticha["secon"].' '.$ticha["third"].'</td>
                                              <td>'. $value["nodays"].'</td>';
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
