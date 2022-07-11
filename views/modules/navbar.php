 <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                       
                         <h5>Departmental Academic Information Management System</h5>
                    </div>

                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                       <b> <li style="color: #0c7af5;">Hello, 
                        <?php 
                        if ($_SESSION["role"] == "hod" || $_SESSION["role"] == "Staff" ) {
                            $userole = $_SESSION["role"];
                        } else if ($_SESSION["role"] == "timetable" ||$_SESSION["role"] == "exam" || $_SESSION["role"] == "ipt" ||$_SESSION["role"] == "project" ) {
                            $userole = $_SESSION["role"].' - '.'coordinator';
                        } elseif ($_SESSION["role"] == "System Admin") {
                             $userole = 'System Adminstrator';
                        } elseif ($_SESSION["role"] == "Accounts") {
                            $userole = 'Accounts Section';
                        }
                         else{
                            $userole = 'Not Assigned userole';
                        }
                        echo ucwords($userole); 
                         $itm = "id";
                        $valu = $_SESSION["departid"];
                        $departmenlist = managedepartsctrl::departmentctrlshow($itm,$valu);
                        ?>
                          || <?php echo  ucwords($departmenlist["name"]); ?>
                        </li></b>
                            <li id="full-view" ><i class="ti-fullscreen" style="color: #0c7af5;"></i></li>
                            <li id="full-view-exit" ><i class="ti-zoom-out" style="color: #0c7af5;"></i></li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
             <!-- page title area start -->
            
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right" style="background: #0c7af5;">

                            <?php 
                            if ($_SESSION["photo"] != null) {
                                echo '<img class="avatar user-thumb" src='.$_SESSION["photo"].' alt="avatar">';
                            } else{
                                echo '<img class="avatar user-thumb" src="view/assets/images/anonymous.png">';
                            }
                            ?>
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><p style="color: black;"><b><?php echo ucwords($_SESSION["username"]); ?></b>
                                   
                                </p>
                                <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->