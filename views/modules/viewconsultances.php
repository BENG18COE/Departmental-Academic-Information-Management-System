<div class="main-content">
           
            <br>
           
           
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                     <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                <div class="col-md-9">
                                	<h4 class="header-title"></h4>
                                </div>                   
                                <div class="col-md-3">
                                    <a href="consultancerecord">
                                        <button type="button" class="btn btn-primary btn-flat btn-sm mt-3">New Consultance Record</button>
                                    </a>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Project Description</th>
                                                <th>Organization</th>
                                                <th>Assigned Personnel</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php

                                       		$item = null;
                                        	$value = null;
                                        	$departmenlist = ConsultancCtrl::ShowConsultancRecordCtrl($item,$value);
                                        	foreach ($departmenlist as $key => $value) {
                                        	  $itemx = "id";
                                              $valuex = $value["teacherid"];
                                              $ticha = managedepartsctrl::allteacherslistctrlshow($itemx,$valuex); 
                                        	echo ' 
                                               <tr>                                         
                                               <td>'.($key+1).'</td>                                                                           
                                               <td>'.$value["projectdexcription"].'</td>
                                               <td>'.$value["organizationname"].'</td>            
                                                <td>'.$ticha["first"].' '.$ticha["secon"].' '.$ticha["third"].'</td>                                                           
                                               
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