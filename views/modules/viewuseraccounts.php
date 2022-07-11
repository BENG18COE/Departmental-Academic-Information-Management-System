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
                                	<h4 class="header-title">List of User Accounts</h4>
                                </div>                   
                                <div class="col-md-3">
                                    <?php
                                        // if ($_SESSION["role"] == "System Admin") {
                                         echo '<button type="button" class="btn btn-primary btn-flat btn-sm mt-3" data-toggle="modal" data-target="#newadminstrationuser">New user</button>';
                                        // }
                                    ?>
                                </div>                        
                                </div>
                                <br>
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Full Name</th>                                          
                                                <th>Username</th>
                                                <th>User Role</th>
                                                <th>Job Type</th>
                                                <th>photo</th>
                                                <?php
                                                if ($_SESSION["role"] == "hod") {
                                                echo '<th>Department</th>
                                              	
                                                <th>Status</th>
                                                <th>Action</th>';
                                                }
                                                ?>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                       
                                        if ($_SESSION["role"] == "System Admin") {
                                        $item = null;
                                        $value = null;
                                        $departmenlist = manageuseraccountsctrl::showuseraccountctrl($item,$value); 
                                        } else{
                                        $item = null;
                                        $value = $_SESSION["departid"];
                                        $departmenlist = manageuseraccountsctrl::filtershowuseraccountctrl($item,$value); 
                                        }
                                        foreach ($departmenlist as $key => $value) { 
                                        $tem = "id";
                                        $vlue = $value["teacherid"];
                                        $tichas = managedepartsctrl::allteacherslistctrlshow($tem,$vlue); 

                                     	$itm = "id";
                                    	$valu = $value["departid"];
                                    	$department = managedepartsctrl::departmentctrlshow($itm,$valu); 
                                                 echo
                                                 '<tr>
                                                 <td>
                                                 '.($key+1).'</td>';
                                                 if ($value["fullname"] == null) {
                                                    echo '<td>'.$tichas["first"].' '.$tichas["secon"].' '.$tichas["third"].'</td>';
                                                 } else{
                                                    echo '<td>'.$value["fullname"].'</td>';
                                                 }                                         
                                                echo
                                                 '<td>'.$value["username"].'</td>                              
                                                <td>'.$value["role"].'</td>
                                                <td>'.$value["status"].'</td>';
                                                 if ($value["photo"] != ""){
                                                echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';
                                                }else{
                                                echo '<td><img src="views/assets/images/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                                }
                                                if ($_SESSION["role"] == "hod") {
                                                echo '<td>'.$department["name"].'</td>';
                                                                
                                                 if ($value["status"] == 1) {
                                                echo'<td><button class="btn btn-success btnActivate btn-xs" userId="'.$value["id"].'" userStatus="0">Activate</button></td>';
                    						}else{
                    						  echo'<td><button class="btn btn-danger btnActivate btn-xs" userId="'.$value["id"].'"userStatus="1">Deactivated</button></td>'; 
                                                }
                                               echo'
                                                <td>
                                           		<button class = "btn btn-danger btn-sm btnDebrn" tchid="'.$value["id"].'" ><i class="fa fa-trash"></i></button>
                                                  <button class = "btn btn-warning btn-sm btnedituser" data-toggle="modal" data-target="#edituserdetails"  tchid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
                                                </td>
                                                </tr>';
                                                     }  
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


<div class="modal fade" id="newadminstrationuser">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">New Adminstration User</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Full Name</label>
            </div>
            <div class="col-md-6">
                   <input type="text" min="0" class="form-control" name="fullnameadmin"  required="" placeholder="Ener Full Name">
                  
            </div>
        </div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Prefered Username</label>
            </div>
            <div class="col-md-6">
                   <input type="text" min="0" class="form-control" name="username"  required="" placeholder="Enter Prefered Username">
                  
            </div>
        </div>
     </div>
     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Email</label>
            </div>
            <div class="col-md-6">
                   <input type="email" min="0" class="form-control" name="useremail"  required="" placeholder="Enter email">
                  
            </div>
        </div>
     </div>

      <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">UserRole</label>
            </div>
            <div class="col-md-6">
                  <select class="form-control"  name="userole" >
                <option>Select UserRole</option>
                <option value="System Admin">System Administrator</option>
                <option value="Accounts">Accounts Section</option>
                 </select>   
            </div>
        </div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
        <input type="file" class="form-control photothree" id="photothree" name="photothree" >
        <img class="thumbnail previewthree" src="views/assets/anonymous.png" width="70px">

            </div>
        </div>
     </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
            $useradd = new managedepartsctrl();
            $useradd ->addadminstrationuserctrl();
            ?>  
        </form>
    </div>
</div>
</div>
</div>