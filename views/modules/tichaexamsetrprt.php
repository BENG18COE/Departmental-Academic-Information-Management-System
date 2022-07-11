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
                                	<h4 class="header-title">Exam Settings Report</h4>
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
                                                <th>Module Name</th>
                                                <th>Module Code</th>                                         
                                                <th>Class</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $item = null;
                                            $value =  $_SESSION["idi"];
                                            $modules = ExaminationManageCtrl::ShowExamsSetByTichaCtrl($item,$value); 

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
                                               <td>'.strtoupper($answer["name"]).'</td>
                                               <td>'.$answer["code"].'</td>
                                              <td>'.$classname.'</td>';
                                              echo'</tr>';
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
    $useradd = new ExaminationManageCtrl();
     $useradd ->DelExamSettingsCtrl();
    ?>

