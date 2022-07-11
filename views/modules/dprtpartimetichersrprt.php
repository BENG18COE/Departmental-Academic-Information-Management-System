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
                                	<h4 class="header-title">List Of Partime Teachers</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#exampleModalLong">New Teacher</button>
                                </div>                        
                                </div>
                                <br>newuser
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Full Name</th>
                                                <th>Title </th>
                                                <th>Hours</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                       
// 
                                        $item = null;
                                        $value = $_SESSION["departid"];
                                        $departmenlist = managedepartsctrl::departfilterteacherslistctrlshow($item,$value); 
                                        
                                        foreach ($departmenlist as $key => $value) { 
                                        $itm = "teacherid";
                                        $valu = $value["id"];
                                        $extrahours = assignmodulesctrl::dprthrsmodulesctrlshow($itm,$valu); 
                                      
                                        $result = intdiv($extrahours["hrstght"], 60);
                                        $totalhrs = $extrahours["hrstght"]+$result;
                                        $totalmin = ($extrahours["min"])%60;
                                                 echo
                                                 '<tr>
                                                 <td>
                                                 '.($key+1).'</td>
                                         <td>'.$value["first"].' '.$value["secon"].' '.$value["third"].'</td>                                           
                                                <td>'.$value["title"].'</td>
                                                <td>'.number_format($totalhrs).' hrs -'.number_format($totalmin).' Min</td>';
                                               
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
