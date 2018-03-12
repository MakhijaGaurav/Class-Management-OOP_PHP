<?php
if(isset($_POST['update_student_details'])){
    $sid = $_GET['sid'];
    extract($_POST);
    $student = new Student();
    $student->updateStudent($sid, $student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id);
    
    $parent = new Parents();
    $parent->updateParentDetails($father_id, $father_first_name, $father_number, $father_email);
    $parent->updateParentDetails($mother_id, $mother_first_name, $mother_number, $mother_email);
    
    Functions::redirect("student.php?q=default&op=update&p=success");
}
?>
<?php
if(isset($_GET['sid'])){
    $sid = $_GET['sid'];
    $student = new Student();
    $result_set = $student->getAllDetailsOfAStudent($sid);
    if($row = mysqli_fetch_assoc($result_set))
        extract($row);
    $parent = new Parents();
    $father_db_row = $parent->getFatherDetails($sid);
    $mother_db_row = $parent->getMotherDetails($sid);
    extract($father_db_row);
    //we cannot extract mother's row because the variable names would clash and father details would be overridden so to avoid that overriding we would extract mother details later after using father details variable
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Student";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Edit Student</li>";
	include_once("top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" method="post" action="#" name="edit_student" id="edit_student">
								<div class="form-group">
									<label for="student_first_name">First Name</label>
									<input id="student_first_name" name="student_first_name" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_first_name; ?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_last_name">Last Name</label>
									<input id="student_last_name" name="student_last_name" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_last_name; ?>"/>
								</div>

								<div class="form-group">
									<label for="student_email">E-Mail</label>
									<div>
										<input id="student_email" name="student_email" type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $student_email; ?>" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_number">Number</label>
									<div>
										<input id="student_number" name="student_number" data-parsley-type="digits" type="text" class="form-control" required placeholder="Enter only digits" value="<?php echo $student_number; ?>" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_address">Address</label>
									<div>
										<textarea id="student_address" name="student_address" required class="form-control"><?php echo $student_address; ?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_branch">Branch</label>
									<input id="student_branch" name="student_branch" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_branch; ?>" />
								</div>
								
								<div class="form-group">
									<label for="student_dob">DOB</label>
									<input id="student_dob" name="student_dob" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_dob; ?>" />
								</div>
								
								<div class="form-group">
									<label for="student_college">College</label>
									<input id="student_college" name="student_college" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_college; ?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_gender">Gender</label>
									<input id="student_gender" name="student_gender" type="text" class="form-control" required placeholder="Type something" value="<?php echo $student_gender; ?>" />
								</div>
								
								<div class="form-group">
									<label for="stream_id">Stream</label>
									<input id="stream_id" name="stream_id" type="text" class="form-control" required placeholder="Type something" value="<?php echo $stream_id; ?>" />
								</div>
								<!--End of personal details-->
								
								<!--Father Details-->
								<h4>Father Details</h4>
								<input type="hidden" value="<?php echo $pid; ?>" name="father_id">
								<div class="form-group">
									<label for="father_first_name">First Name</label>
									<input id="father_first_name" name="father_first_name" type="text" class="form-control" required placeholder="Type something" value="<?php echo $parent_first_name; ?>"/>
								</div>
								
                                <div class="form-group">
									<label for="father_number">Number</label>
									<input id="father_number" name="father_number" data-parsley-type="digits" type="text" class="form-control" required placeholder="Type something" value="<?php echo $parent_number; ?>"/>
								</div>
								
								<div class="form-group">
									<label for="father_email">E-Mail</label>
									<div>
										<input id="father_email" name="father_email" type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $parent_email; ?>" />
									</div>
								</div>
								<!--End of Father details-->
								
								<?php extract($mother_db_row); ?>
								
								<!--Mother Details-->
								<h4>Mother Details</h4>
								<input type="hidden" value="<?php echo $pid; ?>" name="mother_id">
								<div class="form-group">
									<label for="mother_first_name">First Name</label>
									<input id="mother_first_name" name="mother_first_name" type="text" class="form-control" required placeholder="Type something" value="<?php echo $parent_first_name; ?>"/>
								</div>
								
                                <div class="form-group">
									<label for="mother_number">Number</label>
									<input id="mother_number" name="mother_number" data-parsley-type="digits" type="text" class="form-control" required placeholder="Type something" value="<?php echo $parent_number; ?>"/>
								</div>
								
								<div class="form-group">
									<label for="mother_email">E-Mail</label>
									<div>
										<input id="mother_email" name="mother_email" type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $parent_email; ?>" />
									</div>
								</div>
								<!--End of Mother details-->
								<div class="form-group">
									<div>
										<button id="update_student_details" name="update_student_details" type="submit" class="btn btn-custom waves-effect waves-light">
                                                    Submit
                                                </button>
										<button type="reset" class="btn btn-light waves-effect m-l-5">
                                                    Cancel
                                                </button>
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

		<?php include_once("footer.php");?>

</div>
<?php
}else
    echo "Something wrong";
?>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->