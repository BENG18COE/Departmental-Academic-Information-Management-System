<?php 
$item = "id";
$value = "1";
$rates = ManagePaymentsCtrl::ShowPaymentratesCtrl($item,$value);


$item = 'booksmarking';
$value = $_SESSION["idi"];
$booksfinal = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$value);

$countbooksfinal = count($booksfinal);
$totalfinal = $countbooksfinal*$rates["finalyearmark"];

$item = null;
$value = $_SESSION["idi"];
$extraHours = FinalpresentationCtrl::TeacherExtraHoursCtrl($item,$value);
$totalhrs = $extraHours["hrstght"]+($extraHours["min"]/60);

if ($totalhrs > 10) {
  $amountpaid = ($totalhrs-10);
  $amountpaid = $amountpaid*$rates["extrhrs"];
} else{
  $amountpaid  = 0;
}

$item = 'supervison';
$value =  $_SESSION["idi"];
$stdsuprvise = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$value); 
$countstdsupervise = count($stdsuprvise);
$totalstdsuprvsie = $countstdsupervise*$rates["stdsuprvise"];


$item = null;
$value =  $_SESSION["idi"];
$stdpanel = FinalpresentationCtrl::PanelAttendFinalCtrl($item,$value); 
$paneldays = $stdpanel["nodays"]*$rates["fnlprese"];


$item = 'iptbooksmarking';
$value = $_SESSION["idi"];
$iptstdnt = FinalpresentationCtrl::StudentAllocatedShowCtrl($item,$value);
$countiptstd =count($iptstdnt);
$countiptstd = $countiptstd*$rates["iptmark"];


$item = null;
$value =  $_SESSION["idi"];
$scriptmark = ExaminationManageCtrl::SumOfScriptSetCtrl($item,$value); 

$countscript = $scriptmark['sumstdnts']*$rates["scriptmaking"];


$item = null;
$value =  $_SESSION["idi"];
$examset = ExaminationManageCtrl::ShowExamsSetByTichaCtrl($item,$value); 
$countexamset = count($examset);
$countexamset = $countexamset*$rates["examseting"];


$totalamount = $countexamset+$countscript+$countiptstd+$paneldays+$totalstdsuprvsie+$amountpaid+$totalfinal;


 ?>
<div class="main-content">

        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                 <div class="col-md-2"></div>
                    <div class="col-md-8">
                    	<br>
                    	<form enctype="multipart/form-data" method="POST">
                    
                 <div class="card">
                 	<div class="card-header">
                 		 <h3>Personal Payement Summary </h3>
                 	</div>
                 	<br>

                 	<div class="form-group" >
                        <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-3">
                             <label for="exampleInputEmail1">Extra Hours</label>
                         </div>
                        <div class="col-md-3" >
                         
                         <input type="text" min="10000" class="form-control" value="<?php echo $amountpaid; ?>" name="extrhrs"  readonly="" >
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Partime</label>
                        </div>
                        <div class="col-md-3" >
                         
                         <input type="text" min="10000" class="form-control" name="prthours"  readonly="" >
                        </div>
                    </div>
                    <br>

                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-3">
                            <label for="exampleInputEmail1">Student Supervision</label>
                        </div>
                        <div class="col-md-3" >
                         
                         <input type="text" min="10000" class="form-control" name="stdsuprvise" value="<?php echo number_format($totalstdsuprvsie,2); ?>"  readonly="" >
                        </div>
                        </div>
                        <div class="row">

                        <div class="col-md-1"></div>
                         <div class="col-md-3">
                               <label for="exampleInputEmail1">Final Presentation</label>
                         </div>
                        <div class="col-md-3" >
                       
                         <input type="text" min="10000" class="form-control" name="fnlprese" value="<?php echo number_format($paneldays,2); ?>"  readonly="" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-3">
                            <label for="exampleInputEmail1">Ipt Book Marking  </label>
                        </div>
                        <div class="col-md-3" >
                         
                         <input type="text" min="10000" value="<?php echo number_format($countiptstd,2); ?>"   class="form-control" name="iptmark"  readonly="" >
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-3">
                               <label for="exampleInputEmail1">Final Year Book Marking</label>
                         </div>
                        <div class="col-md-3" >
                       
                         <input type="text" min="10000" class="form-control" 
                         value="<?php echo number_format($totalfinal,2); ?>" name="finalyearmark"  readonly="" >
                        </div>
                    </div>

                     <br>
                    <div class="form-group" >
                        <div class="row">
                        <div class="col-md-1">
                       
                        </div>
                         <div class="col-md-3">
                            <label for="exampleInputEmail1">Exam Setting  </label>
                        </div>
                        <div class="col-md-3" >
                         
                         <input type="text" value="<?php echo number_format($countexamset,2); ?>" min="10000" class="form-control" name="examseting"  readonly="" >
                        </div>
                        </div>
                        <div class="row">

                        <div class="col-md-1"></div>
                         <div class="col-md-3">
                               <label for="exampleInputEmail1">Script Marking </label>
                         </div>
                        <div class="col-md-3" >
                       
                         <input type="text" value="<?php echo number_format($countscript,2); ?>" min="1000" class="form-control" name="scriptmaking"  readonly="" >
                        </div>
                    </div>


                    <br>
                     <div class="row">
                        <div class="col-md-1"></div>
                         <div class="col-md-3">
                               <label for="exampleInputEmail1">Total Amount </label>
                         </div>
                        <div class="col-md-3" >
                         <input type="text" value="<?php echo number_format($totalamount,2); ?>" min="1000" class="form-control" name="scriptmaking"  readonly="" >
                        </div>
                    </div>
    				

    				</div>
    				
                   <!--  <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-md-4"></div>
					        
					</div> -->
					 <?php
			        $useradd = new ManagePaymentsCtrl();
			        $useradd ->AddPaymentratesCtrl();
			        ?>  
				</form>
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

