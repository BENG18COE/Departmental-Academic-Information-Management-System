<?php

$idlink = base64_decode(urldecode($_GET["userid"]));
$idtodb = ($_GET["userid"]);
$idlink =  ($idlink*956783/5678)/123456789;
$idlink = round($idlink);
$item = "id";
$value = $idlink;
$departmenlist = managedepartsctrl::allteacherslistctrlshow($item,$value);
?>
<body style="background: #0c7af5;;">
<div class="main-content" style="background: #0c7af5;;">
           
           
        <div class="main-content-inner">
            <div class="row">
                    <!-- data table start -->
                 <div class="col-md-3"></div>
                    <div class="col-md-6">
                    	<br>
                    	
                 <div class="card">
                 	<div class="card-header">
                 		<div class="row">
                 			<div class="col-md-8">
                 				Academic Department User Account Sign Up
                 			</div>
                 			<div class="col-md-1"></div>
                 			<div class="col-md-3">
                 				<a href="login">
                 					<button class="btn btn-primary">BACK lOGIN PAGE</button>
                 				</a>
                 				
                 			</div>
                 		</div>
                 	</div>
                 	<form enctype="multipart/form-data" method="POST">
                 	<br>
                 	<div class="form-group">
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1"><b>Title:</b></label>
                    </div>
                    
                    <div class="col-md-6">
                  
                    	
                     <b> <?php  
                      $title = $departmenlist["title"].' - '.$departmenlist["status"];
                      echo strtoupper($title);
                      ?></b>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1"><b>Full Name:</b></label>
                    </div>
                    
                    <div class="col-md-6">
                  
                    	
                     <b> <?php  
                      $fullname = $departmenlist["first"].' '.$departmenlist["secon"].' '.$departmenlist["third"];
                      echo strtoupper($fullname);
                      ?></b>
                    </div>
                    </div>
                    </div>

                 	<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Department:</b></label>
    				</div>

    				<div class="col-md-6" >
    				<b>	<?php 
    						$itm = "id";
                        $valu = $departmenlist["departid"];
                        $depart = managedepartsctrl::departmentctrlshow($itm,$valu); 
                        	echo strtoupper($depart["name"]);
    					?></b>
    				</div>
    				</div>
    				</div>

    				<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Role:</b></label>
    				</div>

    				<div class="col-md-6" >
    					<b><?php 
    					if ($departmenlist["role"] == "HOD" || $departmenlist["role"] == "Staff" ) {
    						$userole = $departmenlist["role"];
    					} else if ($departmenlist["role"] == "timetable" ||$departmenlist["role"] == "exam" || $departmenlist["role"] == "ipt" ||$departmenlist["role"] == "project" ) {
    						$userole = $departmenlist["role"].' - '.'coordinator';
    					} else{
    						$userole = 'Not Assigned';
    					}
    					echo strtoupper($userole);
    					?></b>
    				</div>
    				</div>
    				</div>

    				<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Username</b></label>
    				</div>

    				<div class="col-md-4" >
    				<input type="text" class="form-control" name="username" placeholder="Enter Suggested Username" required="">
    				<input type="hidden" name="userid"   value="<?php echo $idtodb; ?>"  >
    				</div>
    				</div>
    				</div>

    				<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Email</b></label>
    				</div>

    				<div class="col-md-4" >
    				<input type="email" class="form-control" name="emailaddress" placeholder="Enter user email address" required="">
    				</div>
    				</div>
    				</div>

    				<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Password</b></label>
    				</div>

    				<div class="col-md-3" >
    					<input type="password" class="form-control" name="initialPassword" placeholder="Enter Password" required="">
    				</div>
    				<div class="col-md-3" >
    					<input type="password" class="form-control" name="finalPassword" placeholder="Confirm Password" required="">
    				</div>
    				</div>
    				</div>

    				<div class="form-group" >
    				<div class="row">
    				<div class="col-md-2"></div>
    				<div class="col-md-3">
    				    <label for="exampleInputEmail1"><b>Upload Photo</b></label>
    				</div>

    				<div class="col-md-6" >
    				<input type="file" class="form-control phototwo" id="phototwo" name="phototwo" >
    				 <img class="thumbnail previewtwo" src="views/assets/anonymous.png" width="70px">
    				</div>
    				</div>
    				</div>
                 	

    				<div class="row">
    					<div class="col-md-4"></div>
    					<div class="col-md-4">
    						<button type="submit" class="btn btn-primary">Save </button>
    					</div>
    					
    				</div>
					
					<br>
					

					 <?php
			        $useradd = new manageuseraccountsctrl();
			        $useradd ->addnewuseraccountctrl();
			        ?>   -
				</form>
    	</div>
     </div>

                 </div>
               
        </div>
    </div>
</div>

</body>
