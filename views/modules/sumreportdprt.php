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
                                	<h4 class="header-title">List Of Teachers</h4>
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
                                                <th>Extra Hours </th>
                                                <th>Student Supervision</th>
                                                <th>Final Presentation</th>
                                                <th>Ipt Book Marking</th>
                                                <th>Project Book Marking</th>
                                                <th>Exam Setting </th>
                                                <th>Script Marking</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $item = "id";
                                        $value = "1";
                                        $rates = ManagePaymentsCtrl::ShowPaymentratesCtrl($item,$value);
                                       

                                      
                                        $item = null;
                                        $value = $_SESSION["departid"];
                                        $departmenlist = managedepartsctrl::filterteacherslistctrlshow($item,$value); 
                                        foreach ($departmenlist as $key => $value) { 
                                        

                                        $item = 'booksmarking';
                                        $valuet = $value['id'];
                                        $booksfinal = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$valuet);

                                        $countbooksfinal = count($booksfinal);
                                        $totalfinal = $countbooksfinal*$rates["finalyearmark"];

                                        $item = null;
                                        $valuez = $value['id'];
                                        $extraHours = FinalpresentationCtrl::TeacherExtraHoursCtrl($item,$valuez);
                                        $totalhrs = $extraHours["hrstght"]+($extraHours["min"]/60);

                                        if ($totalhrs > 10) {
                                          $amountpaid = ($totalhrs-10);
                                          $amountpaid = $amountpaid*$rates["extrhrs"];
                                        } else{
                                          $amountpaid  = 0;
                                        }

                                        $items = 'supervison';
                                        $valuex =  $value['id'];
                                        $stdsuprvise = FinalpresentationCtrl::StudentAllocatedShowCtrl($items,$valuex); 
                                        $countstdsupervise = count($stdsuprvise);
                                        $totalstdsuprvsie = $countstdsupervise*$rates["stdsuprvise"];


                                        $item = null;
                                        $valueg =  $value['id'];
                                        $stdpanel = FinalpresentationCtrl::PanelAttendFinalCtrl($item,$valueg); 
                                        $paneldays = $stdpanel["nodays"]*$rates["fnlprese"];


                                        $item = 'iptbooksmarking';
                                        $valueh = $value['id'];
                                        $iptstdnt = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$valueh);
                                        $countiptstd =count($iptstdnt);
                                        $countiptstd = $countiptstd*$rates["iptmark"];


                                        $item = null;
                                        $valuek =  $value['id'];
                                        $scriptmark = ExaminationManageCtrl::SumOfScriptSetCtrl($item,$valuek); 

                                        $countscript = $scriptmark['sumstdnts']*$rates["scriptmaking"];


                                        $item = null;
                                        $valuey =  $value['id'];
                                        $examset = ExaminationManageCtrl::ShowExamsSetByTichaCtrl($item,$valuey); 
                                        $countexamset = count($examset);
                                        $countexamset = $countexamset*$rates["examseting"];

                                        $totalamount = $countexamset+$countscript+$countiptstd+$paneldays+$totalstdsuprvsie+$amountpaid+$totalfinal;

                                                 echo
                                                 '<tr>
                                                 <td>
                                                 '.($key+1).'</td>
                                         <td>'.$value["first"].' '.$value["secon"].' '.$value["third"].'</td>                                           
                                            <td>'.number_format($amountpaid,2).'</td>
                                            <td>'.number_format($totalstdsuprvsie,2).'</td>
                                            <td>'.number_format($paneldays,2).'</td>
                                            <td>'.number_format($totalfinal,2).'</td>
                                            <td>'.number_format($countiptstd,2).'</td>
                                            <td>'.number_format($countscript,2).'</td>
                                            <td>'.number_format($countexamset,2).'</td>
                                            <td>'.number_format($totalamount,2).'</td>
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