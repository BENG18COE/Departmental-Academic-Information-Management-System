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
                                 <?php
?>
                                <br>newuser
                                <div class="data-tables">

                                    <table id="dataTable"  width="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>Full Name</th>
                                                <th>Title </th>
                                                <th>User Role</th>
                                                <th>Job Type</th>
                                                <th>Department</th>
                                                <th>Sign Up Token</th>
                                                <th>Account Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                       

                                        if ($_SESSION["role"] == "System Admin") {
                                        $item = null;
                                        $value = null;
                                        $departmenlist = managedepartsctrl::allteacherslistctrlshow($item,$value); 
                                        } else{
                                        $item = null;
                                        $value = $_SESSION["departid"];
                                        $departmenlist = managedepartsctrl::filterteacherslistctrlshow($item,$value); 
                                    }
                                    foreach ($departmenlist as $key => $value) { 
                                        // echo '<pre>';
                                        // print_r($value);
                                        // echo '</pre>';
                                         $itm = "id";
                                        $valu = $value["departid"];
                                        $departmenlist = managedepartsctrl::departmentctrlshow($itm,$valu); 
                                                 echo
                                                 '<tr>
                                                    <td>'.($key+1).'</td>
                                                    <td> 
                                                    <a href="/DAIMS/viewTeacher?teacher_id='.$value["id"].'">'
                                                        .$value["first"].' '.$value["secon"].' '.$value["third"].
                                                    '</a></td>                                           
                                                    <td>'.$value["title"].'</td>
                                                    <td>'.$value["role"].'</td>
                                                    <td>'.$value["status"].'</td>
                                                    <td>'.$departmenlist["name"].'</td>
                                                    <td>'.$value["signuptoken"].'</td>';
                                                if ($value["acccountstatus"]  == 0) {
                                                    echo '<td>
                                                    <button class = "btn btn-danger btn-sm ">Not Signed Up</button></td>';
                                                } else{
                                                    echo '<td>
                                                    <button class = "btn btn-success btn-sm ">Signed</button></td>';	
                                                }

                                               echo'
                                                <td>
                                           		<button class = "btn btn-danger btn-sm btnDebrn" tchid="'.$value["id"].'" ><i class="fa fa-trash"></i></button>
                                                  <button class = "btn btn-warning btn-sm btnedituser" data-toggle="modal" data-target="#editteacher"  tchid="'.$value["id"].'" ><i class="fa fa-edit"></i> </button>
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


<div class="modal fade" id="editteacher">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Department</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
       <form method="POST">

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Department Name</label>
            </div>
            <div class="col-md-6">
                <select class="form-control" name="editdepartid">
                     <option  id="departname" value=""></option>
                        <?php
                         $item = null;
                        $value = null;
                        $clients = managedepartsctrl::departmentctrlshow($item,$value); 
                        foreach ($clients as $key => $value) {                        
                           echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                              }
                        ?>
                    </select>
            </div>

        </div>
     </div>

     <div class="form-group">

        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">First Name</label>
            </div>
            <div class="col-md-6">
                <input type="text" id="edfirst" class="form-control" name="editfirstname"  >
            </div>
        </div>
     </div>

     <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Second Name</label>
            </div>
            <div class="col-md-6"> 
                <input type="text" id="edsnd" class="form-control" name="editsecond"  required>
                
            </div>
        </div>
     </div>

       <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Third Name</label>
            </div>
            <div class="col-md-6"> 
                <input type="text" id="edthird" class="form-control" name="editthird"  required>
                
            </div>
        </div>
     </div>
     
       <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Title</label>
            </div>
            <div class="col-md-6"> 
                 <select class="form-control"  name="editposition" >
                <option id="edtitle" value=""></option>
                <option value="Senior Lecturer">Senior Lecturer</option>
                <option value="Lecturer">Lecturer</option>
                <option value="Assistant Lecturer">Assistant Lecturer</option>
                <option value="Tutorial Assistant">Tutorial Assistant</option>
                <option value="Senior Instructor">Senior Instructor </option>
                <option value="Instructor"> Instructor</option>
                <option value="Technician"> Technician</option>
                 </select> 
                
            </div>



        </div>
     </div>
      <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Role</label>
            </div>
            <div class="col-md-6"> 
                 <select class="form-control"  name="edituserrole" >
                        <option id="edrole"  value=""></option>
                        <option value="hod">HOD</option>
                        <option value="timetable">Timetable</option>
                        <option value="xxam">Exam</option>
                        <option value="ipt">IPT</option>
                        <option value="project">Project</option>
                        <option value="staff">Staff </option>
                        </select> 
            </div>
        </div>
     </div>
       <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Status</label>
            </div>
            <div class="col-md-6"> 
                 <select class="form-control"  name="editjobtype" >
                <option id="edstatus" value=""></option>
                <option value="partime">Part-Time</option>
                <option value="fulltime">Full-time</option>
                </select>
                <input type="hidden" name="recordid" id="tchidi" readonly="">
            </div>
        </div>
     </div>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        <?php
                    $useradd = new managedepartsctrl();
                    $useradd ->editacademicuserctrl();
                    ?> 
        </form>
    </div>
</div>
</div>
</div>
<?php
