<?php
    if(isset($_POST['update_enquiry_details'])){
        extract($_POST);
        $enquiry = new Enquiry();
        $enquiry->updateEnquiry($id, $student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream_id, $reference, $date_of_enquiry, $college_name, $comments, $handeled_by);
        
        Functions::redirect("enquiry.php?e=default");
	}
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $enquiry = new Enquiry();
    $result_set = $enquiry->getAllDetailsOfAEnquiry($id);
    if($row = mysqli_fetch_assoc($result_set))
        extract($row);
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
        $page_title = "Manage Enquiry";
        $breadcrumb = "
        <li class='breadcrumb-item'>Student Management</li>
        <li class='breadcrumb-item active'>Add Enquiry</li>";
        include_once("top-bar.php");
	?>
        
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" action="" name="add-enquiry" id="add-enquiry" method="POST">
                            <h4>Personal Details</h4>
                            
                            <div class="form-group">
                                <label for="student_first_name">First Name</label>
                                <input type="text" class="form-control" required placeholder="Enter first name" value="<?php echo $student_first_name;?>" name="student_first_name" id="student_first_name" />
                            </div>

                            <div class="form-group">
                                <label for="student_last_name">Last Name</label>
                                <input type="text" class="form-control" required placeholder="Enter last name" value="<?php echo $student_last_name;?>" name="student_last_name" id="student_last_name" />
                            </div>
                        
                             <div class="form-group">
                                <label for="student_email">E-Mail</label>
                                <div>
                                    <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $student_email;?>" name="student_email" id="student_email" />
                                </div>
                            </div>

                           <div class="form-group">
                                <label for="student_number">Number</label>
                                <div>
                                    <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter your phone number" value="<?php echo $student_number;?>" name="student_number" id="student_number" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="student_branch">Branch</label>
                                <input type="text" class="form-control" required placeholder="Enter your branch" value="<?php echo $student_branch;?>" name="student_branch" id="student_branch" />
                            </div>

                            <div class="form-group">
                                <label for="student_sem">Semester</label>
                                <input type="text" class="form-control" required placeholder="Enter your semester" value="<?php echo $student_sem;?>" name="student_sem" id="student_sem" />
                            </div>
                                
                            <div class="form-group">
                                <label for="stream_id">Stream</label>
                                <input type="text" class="form-control" required placeholder="Enter your stream" value="<?php echo $stream_id;?>" name="stream_id" id="stream_id" />
                            </div>

                            <div class="form-group">
                                <label for="reference">Reference</label>
                                <input type="text" class="form-control" required placeholder="Who gave you reference?" value="<?php echo $reference;?>" name="reference" id="reference" />
                            </div>
                           
                            <div class="form-group">
                                <label for="date_of_enquiry">Date of Enquiry</label>
                                <input type="text" class="form-control" required placeholder="Y-d-m" value="<?php echo $date_of_enquiry;?>" name="date_of_enquiry" id="date_of_enquiry" />
                            </div>
                           
                            <div class="form-group">
                                <label for="college_name">College</label>
                                <input type="text" class="form-control" required placeholder="Enter your college name" value="<?php echo $college_name;?>" name="college_name" id="college_name" />
                            </div>
                           
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                 <div>
                                    <textarea name="comments" id="comments" required class="form-control" placeholder="Enter your comments"><?php echo $comments;?></textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="handeled_by">Handeled By</label>
                                <input type="text" class="form-control" required placeholder="Who were you handeled by?" value="<?php echo $handeled_by;?>" name="handeled_by" id="handeled_by" />
                            </div>
                           
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves light" name="update_enquiry_details">Submit</button>
                      
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
    <?php
        }else{
            echo "Something Wrong";    
        }
    ?>
    <?php include_once("footer.php");?>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->