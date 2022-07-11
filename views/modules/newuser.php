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
                 		  Academic department Intial Registration 
                 	</div>
                 	<br>

                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-3">
                        
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Entry Type</label>
                    <select class="form-control " id="entrytype" name="entrytype" required="" >
                        <option value=""> Select Entry Type</option>
                     <option value="Upload CSV"> Upload CSV</option>
                     <option value="Enter Single Info"> Enter Single Info</option>  
                    </select>
                    </div>
                    </div>
                    </div>

                 	

                 	<div class="form-group" style='display:none;' id="singlefullname">
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3" >
                         <label for="exampleInputEmail1">Select Title</label>
                        <select class="form-control"  name="position" >
                        <option value=""> Select Title</option>
                        <option value="Senior Lecturer">Senior Lecturer</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Assistant Lecturer">Assistant Lecturer</option>
                        <option value="Tutorial Assistant">Tutorial Assistant</option>
                        <option value="Senior Instructor">Senior Instructor </option>
                        <option value="Instructor"> Instructor</option>
                        <option value="Technician"> Technician</option>
                        </select> 
                        </div>
                       <div class="col-md-3" >
                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-control"  name="userrole" >
                        <option value=""> Select Role</option>
                        <option value="hod">HOD</option>
                        <option value="timetable">Timetable</option>
                        <option value="xxam">Exam</option>
                        <option value="ipt">IPT</option>
                        <option value="project">Project</option>
                        <option value="staff">Staff </option>
                        </select>
                        </select> 
                       </div>
                        <div class="col-md-3" >
                         <label for="exampleInputEmail1">Job Type</label>
                        <select class="form-control"  name="jobtype" >
                        <option value=""> Select Job Typ</option>
                        <option value="partime">Part-Time</option>
                        <option value="fulltime">Full-time</option>
                        </select>
                        </div>
                        </div>
    				<div class="row">
    				<div class="col-md-1">
    				
    				</div>
    				<div class="col-md-3">
    					<label for="exampleInputEmail1">First Name</label>
    				<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" >
    				</div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Second Name</label>
                    <input type="text" class="form-control" name="secondname" placeholder="Enter Second Name" >
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Third Name</label>
                    <input type="text" class="form-control" name="thirdname" placeholder="Enter Third Name" >
                    </div>
    				</div>

    				</div>

    				
    				<div class="form-group" style='display:none;' id="csvfileupload">
    				<div class="row">
    				<div class="col-md-3">
    				
    				</div>
    				<div class="col-md-6">
    					<label for="exampleInputEmail1">Upload CSV File</label>
    				<input type="file" class="form-control " name="csvfile" >
                    
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
			        $useradd = new managedepartsctrl();
			        $useradd ->addacademicuserctrl();
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

