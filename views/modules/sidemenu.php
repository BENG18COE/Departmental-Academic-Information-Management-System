<div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu" >
            <div class="sidebar-header" style="background: #0c7af5;">
               <h5 style="color: black;">DAIMS</h5> 
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <?php
                             if ($_SESSION["role"] == "System Admin") {
                                echo '<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Departments</span></a>
                                <ul class="collapse">
                                    <li><a href="departments">Manage Departments</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>
                                        System Users
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="viewuseraccounts">View Users</a></li>
                                    <li><a href="newuser">Add New Teacher</a></li>
                                <li><a href="teacherlist">Teachers List</a></li>
                                </ul>
                            </li>';
                             }
                            ?>
                             <?php
                             if ($_SESSION["role"] == "hod" || $_SESSION["role"] == "timetable" ) {
                            echo '<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>
                                        System Users
                                    </span></a>
                                <ul class="collapse">
                                <li><a href="teacherlist">Teachers List</a></li>
                                <li><a href="viewuseraccounts">View Users</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Department Activities</span></a>
                                <ul class="collapse">
                                    <li><a href="modules">Manage Modules</a></li>
                                    <li><a href="courses">Manage Coarse</a></li>
                                    <li><a href="classes">Manage Classes</a></li>
                                    <li><a href="students">Manage Students</a></li>
                                </ul>
                            </li>
                             ';
                             }
                             if ($_SESSION["role"] == "timetable") {
                               echo ' <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Module Assign Section</span></a>
                                <ul class="collapse">
                                   <li><a href="assiugnmodule">Assign Module</a></li>
                                    <li><a href="viewassigned">View Assigned Module</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Partime Teachers</span></a>
                                <ul class="collapse">
                                   <li><a href="partimetichers">Assign Module</a></li>
                                    <li><a href="viewassigned">View Assigned Module</a></li>
                                </ul>
                            </li>';
                             }
                             if ($_SESSION["role"] == "ipt") {
                               echo ' <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>IPT Activity</span></a>
                                <ul class="collapse">
                                    <li><a href="iptstudent">IPT Books Marking</a></li> 
                                    <li><a href="iptstudentreprt">View Teachers</a></li> 
                                    
                                </ul>
                            </li>';
                             }
                             if ($_SESSION["role"] == "exam") {
                              echo ' <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Examination Activities</span></a>
                                <ul class="collapse">
                                    <li><a href="scriptmarking">Script Marking</a></li>
                                    <li><a href="scriptmarkingrprt">Script Marking Reports</a></li>
                                    <li><a href="examsetting">Exam Setting</a></li>
                                     <li><a href="examsettingrprt">Exam Setting Reports</a></li>
                                </ul>
                            </li>';
                             }

                             if ($_SESSION["role"] == "project") {
                                echo '<li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table" style="color: yellow;"></i>
                                    <span>Final Year Project</span></a>
                                <ul class="collapse">
                                    <li><a href="studentsupersion">Student Supervsion</a></li> 
                                    <li><a href="finalpresentation">Final Presentation</a></li> 
                                    <li><a href="booksmarking">Books Marking</a></li> 
                                    <li><a href="finalpresentationrpt">Panel Sitting Report</a></li>                              
                                </ul>
                            </li>';
                             }
                             if ($_SESSION["role"] != "System Admin") {
                                echo '<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Personal Reports</span></a>
                                <ul class="collapse">
                                    <li><a href="tchmdlcted">Modules Allocated</a></li>
                                    <li><a href="prstudentsuperv">Supervsed Student </a></li>
                                    <li><a href="fnlbooksmark">Books Marking</a></li> 
                                    <li><a href="iptbooksmark">View IPT info</a></li>
                                    <li><a href="trchsriptmarking">Script Marking</a></li>
                                    <li><a href="tichaexamsetrprt">Exam Setting</a></li>
                                    <li><a href="finalreprt">Summary Report</a></li>
                                </ul>
                            </li>';
                        }
                            if ($_SESSION["role"] == "hod") {
                              echo ' <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Department Reports</span></a>
                                <ul class="collapse">
                                    <li><a href="dprtstdntsupersionrprt">Student Supervsion</a></li>
                                    <li><a href="dprtfinalpresentationrpt">Final Presentation</a></li> 
                                    <li><a href="dprtbooksmarkingrprt">Books Marking</a></li> 
                                    <li><a href="allocatedmodules">View Assigned Module</a></li>
                                    <li><a href="iptstudentreprt">View IPT info</a></li>
                                    <li><a href="scriptmarkingrprt">Script Marking</a></li>
                                    <li><a href="examsettingrprt">Exam Setting</a></li>
                                    <li><a href="dprtpartimetichersrprt">Partime </a></li>
                                    <li><a href="sumreportdprt">Summary Report</a></li>
                                </ul>
                            </li>';
                             }
                             if ($_SESSION["role"] == "System Admin" ||  $_SESSION["role"] == 'hod') {
                                 echo '  <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>System Settings</span></a>
                                <ul class="collapse">
                                
                                 <li><a href="sepayments">Set Payments</a></li>
                                </ul>
                            </li>
                            ';
                             }

                             if ($_SESSION["role"] == 'hod') {
                                 echo '  <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Consultance Records</span></a>
                                <ul class="collapse">
                                
                                 <li><a href="consultancerecord">Add Consultance </a></li>
                                 <li><a href="viewconsultances">View Consultance </a></li>
                                </ul>
                            </li>
                            ';
                             }
                         
                            ?>
                           
                            
                              <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Consultance Records</span></a>
                                <ul class="collapse">
                                    <li><a href="personconsult">Consultance Records</a></li>
                                    
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>User Settings</span></a>
                                <ul class="collapse">
                                    <li><a href="passwordsettings">Password Settings</a></li>
                                    
                                </ul>
                            </li>
                           
                            
                           
                           
                           
                           
                           
                             

                            
                           
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>