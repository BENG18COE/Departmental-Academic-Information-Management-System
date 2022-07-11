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
                                	<h4 class="header-title">List of Teachers</h4>
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
                                                <th>Supervised Students</th> 
                                                <th>Project Books Marked</th>  
                                                <th>Action</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            $item = null;
                                            $value = null;
                                            $modules = FinalpresentationCtrl::ShowStudentsSupervsionCtrl($item,$value); 

                                            foreach ($modules as $key => $value) {
                                                $itemx = "id";
                                                $valuex = $value["teacherid"];
                                                $ticha = managedepartsctrl::allteacherslistctrlshow($itemx,$valuex); 

                                                echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                              <td>'.$ticha["first"].' '.$ticha["secon"].' '.$ticha["third"].'</td>
                                              <td>'. $value['nostudentsupervsion'].'</td>
                                              <td>'. $value['nostudentbooksmark'].'</td>';
                                              echo'
                                                <td>
                                                <button class = "btn btn-danger btn-sm btnassigndl"  ><i class="fa fa-trash"></i></button>
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
