<?php
    if(isset($_POST['add_branch_details'])){
        extract($_POST);
        $branch = new Branch();
        $branch_id = $branch->insert($branch_code, $branch_name);
        
        Functions::redirect("branch.php?r=view");
        
    }

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
        $page_title = "Manage Branch";
        $breadcrumb = "
        <li class='breadcrumb-item'>Student Management</li>
        <li class='breadcrumb-item active'>Add Branch</li>";
        include_once("includes/top-bar.php");
	?>
        
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" action="" name="add-branch" id="add-branch" method="POST">
                            <h4>Personal Details</h4>
                            
                            <div class="form-group">
                                <label for="branch_code">Branch Code</label>
                                <input type="text" class="form-control" required placeholder="Enter branch code" name="branch_code" id="branch_code" />
                            </div>

                            <div class="form-group">
                                <label for="branch_name">Branch Name</label>
                                <input type="text" class="form-control" required placeholder="Enter branch name" name="branch_name" id="branch_name" />
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves light" name="add_branch_details">Submit</button>
                      
                                    <button type="reset" class="btn btn-light waves-effect m-l-5">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end row-->        
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    
    <?php include_once("includes/footer.php");?>

</div>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->