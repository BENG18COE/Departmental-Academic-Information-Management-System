  <?php
$item = "userid";
$value = $_SESSION['id'];
$settings = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);

$itemx = "id";
$valuex = $settings["classsup"];
$answer = managedepartsctrl::allclasslistctrlshow($itemx,$valuex);  

$tem = "id";
$alue = $answer["coarse"];
$coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);

$classname = strtoupper($answer["classtype"]).' '.$answer["yearof"].'-'.$coarse["intial"];

$item = "id";
$value = $settings["teacherid"];
$tichname = managedepartsctrl::allteacherslistctrlshow($item,$value); 
$full = $tichname["first"].' '.$tichname["secon"].' '.$tichname["third"];
   ?>

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
                                	<h4 class="header-title">Final Year Students Books Marking</h4>
                                </div>                   
                                <div class="col-md-3">
                                	<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#newstudentlist">Select Class && Teacher</button>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">
                                   <h5>Selected Teacher: <?php echo $full; ?></h5>
                                  <!--  <br> -->
                                   <h5>Selected Class:<?php echo $classname; ?></h5>
                                   <br>
                                    <form method="POST">
                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>FullName</th>
                                                <th>Registration No</th>
                                                <th>Phone</th>
                                                <th>Class</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                        $item = "userid";
                                        $value = $_SESSION['id'];
                                        $settings = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);

                                         $item = null;
							             $value = $settings["classsup"];
							             $studentlist = managedepartsctrl::studentsctrlinclass1show($item,$value); 

							            foreach ($studentlist as $key => $value) {
							            $itemx = "id";
										$valuex = $value["classid"];
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
                                    	<td>'. $value["fullname"].'</td>  
                                    	<td>'. $value["regno"].'</td>  
                                    	<td>'. $value["phone"].'</td>  
                                		<td>'.$classname.'</td>                                                                               
                                        <td>
                                        <input class="form-check-input" type="checkbox" name="brkstudentid[]" value="'.$value["id"].'">
                                        </td>
                                        </tr>';
							             }

                                        ?>
                                        	
                                           
                                        </tbody>

                                    </table>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                           <button type="submit" class="btn btn-primary">Approve </button> 
                                        </div>
                                    </div>
                                      <?php
                                      $ee = new FinalpresentationCtrl();
                                      $ee ->FinalBooksMarkingCtrl();
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





<div class="modal fade" id="newstudentlist">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Select Class && Teacher</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

              <div class="form-group">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                       <label for="exampleInputEmail1">Teacher</label> 
                    </div>
                    
                    <div class="col-md-8">
                        <label for="exampleInputEmail1">Teacher</label>
                    <select class="form-control selectpicker"  name="teacherid" required="" data-live-search="true">
                        <option value=""> Select Teacher</option>
                    <?php
                         $item = null;
                        $value = $_SESSION["departid"];
                        $tichas = managedepartsctrl::filterteacherslistctrlshow($item,$value); 
                        foreach ($tichas as $key => $value) {                        
                           echo '<option value="'.$value["id"].'">'.$value["first"].' '.$value["secon"].' '.$value["third"].'</option>';
                              }
                        ?> 
                    </select>
                    </div>
                    </div>
                    </div>
            <div class="form-group" >
                    <div class="row">
                        <div class="col-md-1"></div>
                    <div class="col-md-3">
                       <label for="exampleInputEmail1">Select Class </label> 
                    </div>

                    <div class="col-md-8" >
                        

                    <select class="form-control selectpicker" id="" name="slclassid" required="" data-live-search="true">
                     <option value=""> Select Class </option>
                        <?php
                         $item = null;
                         $value = $_SESSION["departid"];
                         $classlist = managedepartsctrl::filterclasslistctrlshow($item,$value);
                        foreach ($classlist as $key => $value) {  
                                 $tem = "id";
                                $alue = $value["coarse"];
                                $coarse = managedepartsctrl::allcoarseslistctrlshow($tem,$alue);
                                $year = substr($value["yearof"], 2);  
                                  $classname = strtoupper($value["classtype"]).' '.$value["yearof"].'-'.$coarse["intial"];                     
                                   echo '<option value="'.$value["id"].'">'.$classname .'</option>';
                                      }
                        ?>
                    </select>
                    </div>
                    </div>
                    </div>

   
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
          $uri = $_SERVER['REQUEST_URI'];
            $useradd = new SearchInfoCtrl();
            $useradd ->CheckInfoCtrl($uri);
            ?>  
        </form>
    </div>
</div>
</div>
</div>