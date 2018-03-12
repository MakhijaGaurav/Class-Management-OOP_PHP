<!DOCTYPE html>
<html>
	<?php
    ob_start();
    include_once("includes/init.php");
	$page = "branch";
	$title ="Study Link | Manage Branch";
	include_once("includes/head.php");
    ?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            
            <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
            <?php 
			if(isset($_GET['r'])){
				$r = $_GET['r'];
            }else{
                $r = "default";
            }
				switch ($r)
                {
					case 'add':
						include_once("includes/branch/add-branch.php"); 
						break;
                    
                    case 'edit':
                        include_once("includes/branch/edit-branch.php");
                        break;
                        
                    default:
						include_once("includes/branch/manage-branch.php"); 
						break;
				}			
			?>
            
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Parsley js USED FOR VALIDATION-->
        <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>
        
        <!--SweetAlert is used for creating user-friendly modal-->
        <script src="plugins/sweet-alert/sweetalert2.min.js"></script>
        
        <!--TOASTER SCRIPT-->
        <script src="plugins/toastr-master/toastr.min.js"></script>
        
        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.branch.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>