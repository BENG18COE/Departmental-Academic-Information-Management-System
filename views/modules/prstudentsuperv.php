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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                        var_dump($_SESSION["id"]);
                                         $item = 'supervison';
							             $value =  $_SESSION["idi"];
							             $studentlist = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$value); 
							             foreach ($studentlist as $key => $value) {
                                         $itemg = "id";
                                         $valueg = $value["studentid"];
                                         $studentlist = managedepartsctrl::AllstudentsctrlshowCtrl($itemg,$valueg); 

							             $itemx = "id";
										$valuex = $studentlist["classid"];
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
                                    	<td>'.$studentlist["fullname"].'</td>  
                                    	<td>'.$studentlist["regno"].'</td>  
                                    	<td>'.$studentlist["phone"].'</td>  
                                		<td>'.$classname.'</td></tr>';
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
