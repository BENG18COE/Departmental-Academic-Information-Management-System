<?php
session_start(); 
 ini_set('display_errors',0);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DAIMS</title>
    <meta name="viewsport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="views/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="views/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/assets/css/themify-icons.css">
    <link rel="stylesheet" href="views/assets/css/metisMenu.css">
    <link rel="stylesheet" href="views/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="views/assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="views/assets/datatables/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="views/assets/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="views/assets/datatables/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="views/assets/datatables/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="views/assets/css/typography.css">
    <link rel="stylesheet" href="views/assets/css/default-css.css">
    <link rel="stylesheet" href="views/assets/css/styles.css">
    <link rel="stylesheet" href="views/assets/css/responsive.css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- modernizr css -->
    <script src="views/assets/js/vendor/modernizr-2.8.3.min.js"></script>
     <script src="views/assets/js/sweetalert2@9.js"></script>
      <script src="views/assets/js/vendor/searchdropdown.js"></script>
     <!-- Latest compiled and minified JavaScript -->


  


</head>

<body>
   
 <!--    <div id="preloader">
        <div class="loader"></div>
    </div> -->
   
    <?php
   

    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "ok"){
       include "views/modules/sidemenu.php";
       include "views/modules/navbar.php";
      if ( $_SESSION["role"] == "System Admin") {
      if(isset($_GET["route"])){
        if ($_GET["route"] == "logout" ||
           $_GET["route"] == "departments" ||
           $_GET["route"] == "newuser" ||
           $_GET["route"] == "viewuseraccounts" ||
          $_GET["route"] == "semsterlist" ||
           $_GET["route"] == "viewsusers" ||
           $_GET["route"] == "useractivity" ||
           $_GET["route"] == "viewswards" ||
           $_GET["route"] == "memberdetails" ||
           $_GET["route"] == "teacherlist" ||
         
           $_GET["route"] == "home") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

     if ($_SESSION["role"] == "hod") {
         if(isset($_GET["route"])){  
        if ($_GET["route"] == "logout" || 
          $_GET["route"] == "viewuseraccounts" ||
          $_GET["route"] == "examsettingrprt" ||
          $_GET["route"] == "viewconsultances" ||
          $_GET["route"] == "iptstudentreprt" ||
           $_GET["route"] == "scriptmarkingrprt" ||
          $_GET["route"] == "allocatedmodules" ||
          $_GET["route"] == "newuser" ||
          $_GET["route"] == "partimetichers" ||
          $_GET["route"] == "partimetichers" ||
          $_GET["route"] == "departments" ||
          $_GET["route"] == "students" || 
          $_GET["route"] == "classes" ||
          $_GET["route"] == "consultancerecord" ||
          $_GET["route"] == "courses" ||
          $_GET["route"] == "classvisibilty" ||
          $_GET["route"] == "modules" ||
          $_GET["route"] == "teacherroles" ||
          $_GET["route"] == "teacherlist" ||
          $_GET["route"] == "sepayments" ||
          $_GET["route"] == "sumreportdprt" ||
          $_GET["route"] == "dprtpartimetichersrprt" ||
          $_GET["route"] == "dprtexamsettingrprt" ||
          $_GET["route"] == "dprtscriptmarkingrprt" ||
          $_GET["route"] == "dprtiptstudentreprt" ||
          $_GET["route"] == "dprtassiugnmodulereport" ||
          $_GET["route"] == "dprtbooksmarkingrprt" ||
          $_GET["route"] == "dprtfinalpresentationrpt" ||
          $_GET["route"] == "dprtstdntsupersionrprt") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

      if ( $_SESSION["role"] == "timetable" ) {
      if(isset($_GET["route"])){
        if (    
            $_GET["route"] == "assiugnmodule" ||
            $_GET["route"] == "viewassigned" ||
            $_GET["route"] == "modules" ||
            $_GET["route"] == "classvisibilty" ||
            $_GET["route"] == "partimetichers" ||
            $_GET["route"] == "courses" ||
            $_GET["route"] == "viewuseraccounts" ||
            $_GET["route"] == "teacherlist" ||
            $_GET["route"] == "classes" ||
            $_GET["route"] == "students") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

     if ( $_SESSION["role"] == "project" ) {
      if(isset($_GET["route"])){
        if (   

            $_GET["route"] == "studentsupersion" ||
            $_GET["route"] == "finalpresentation" ||
            $_GET["route"] == "booksmarking" ||
            $_GET["route"] == "iptstudent" ||
            $_GET["route"] == "finalpresentationrpt" ||
            $_GET["route"] == "iptstudentreprt" ||
            $_GET["route"] == "modules" ||
            $_GET["route"] == "courses" ||
            $_GET["route"] == "classes" ||
            $_GET["route"] == "students") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

     if ($_SESSION["role"] == "exam") {
      if(isset($_GET["route"])){
        if (
            $_GET["route"] == "scriptmarking" ||
            $_GET["route"] == "examsetting") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

      if ($_SESSION["role"] == "ipt") {
      if(isset($_GET["route"])){
        if (
            $_GET["route"] == "iptstudent" ||
            $_GET["route"] == "viewiptstudents") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }

     //  if ($_SESSION["role"] == "staff) {
     //  if(isset($_GET["route"])){
     //    if (
          
     //        $_GET["route"] == "singleloanApproval" ||
     //        $_GET["route"] == "showclient" ||
     //        $_GET["route"] == "home") {
     //         include "views/modules/".$_GET["route"].".php";
     //     }
     //    else{
     //       include "modules/404.php";
     //    }
     //  }else{
     //    include "modules/home.php";
     //  } 
     // }

        if ($_SESSION["role"] == "staff" || $_SESSION["role"] == "ipt" || $_SESSION["role"] == "timetable" || $_SESSION["role"] == "exam" || $_SESSION["role"] == "project" || $_SESSION["role"] == "hod" ||$_SESSION["role"] == null || $_SESSION["role"] == "System Admin" ) {
      if(isset($_GET["route"])){
        if ( 
            $_GET["route"] == "prstudentsuperv" ||
            $_GET["route"] == "finalpresentationrpt" ||
            $_GET["route"] == "booksmarkingrprt" ||
            $_GET["route"] == "assiugnmodulereport" ||
            $_GET["route"] == "iptstudentreprt" ||
            $_GET["route"] == "scriptmarkingrprt" ||
            $_GET["route"] == "userdetails" ||
            $_GET["route"] == "passwordsettings" ||
            $_GET["route"] == "personconsult" ||
            $_GET["route"] == "examsettingrprt" ||
            $_GET["route"] == "partimetichersrprt" ||
            $_GET["route"] == "fnlbooksmark" ||
            $_GET["route"] == "iptbooksrpt" ||
            $_GET["route"] == "iptbooksmark" ||
            $_GET["route"] == "trchsriptmarking" ||
            $_GET["route"] == "tichaexamsetrprt" ||
            $_GET["route"] == "tchmdlcted" ||   
            $_GET["route"] == "finalreprt" ||    
            $_GET["route"] == "logout" ||
            $_GET["route"] == "home") {
             include "views/modules/".$_GET["route"].".php";
         }
        else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
     }


      include "modules/footer.php";
      echo '</div>';
    }else{
      if (isset($_GET["route"])) {
        if ($_GET["route"] == "signupacademic" ||
            $_GET["route"] == "login") {
           include "views/modules/".$_GET["route"].".php";
        } else if($_GET["route"] != "signupacademic" ||
            $_GET["route"] != "login"){
          include "views/modules/login.php";
        }
      } else{
        include "views/modules/login.php";
      }
    }
    ?>
       
  
   
    
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="views/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="views/assets/js/popper.min.js"></script>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script src="views/assets/js/owl.carousel.min.js"></script>
    <script src="views/assets/js/metisMenu.min.js"></script>
    <script src="views/assets/js/jquery.slimscroll.min.js"></script>
    <script src="views/assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="views/assets/datatables/jquery.dataTables.js"></script>
    <script src="views/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="views/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="views/assets/datatables/dataTables.responsive.min.js"></script>
    <script src="views/assets/datatables/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="views/assets/js/plugins.js"></script>
    <script src="views/assets/js/scripts.js"></script>
    <script src="views/assets/js/sweetalert2@9.js"></script>
    <script src="views/assets/js/managedepartment.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
   
</body>

</html>
