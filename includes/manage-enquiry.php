<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
	$page_title = "Manage Enquiry";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Manage Enquiry</li>";
	include_once("top-bar.php");
    $enquiry = new Enquiry();
    $result_set = $enquiry->readAllEnquiry();
	?>
        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div class="pull-left form-row">
                       		<div class="form-group">
                       			<select id="num-rows-choice" class="custom-select" onchange="loadEnquiryData()">
                       				<option value="0" selected>Rows Per Page</option>
                       				<option>1</option>
                       				<option>2</option>
                       				<option>5</option>
                       			</select>
                       		</div>
                       		<div class="form-group">
                       			<input type="text" class="form-control" placeholder="Search" name="key" id="key" style="margin-left: 10px;" onkeyup="search(this.value)">
                       		</div>
                       	</div> 
                            <p class="text-muted font-14 m-b-20 pull-right">
                                <a type="button" class="btn btn-primary waves-effect waves-light btn-lg" href="enquiry.php?e=add"><i class="fa fa-plus m-r-5"></i> <span>Add New Enquiry</span> </a>
                            </p>

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Branch</th>
										<th>Sem</th>
                                        <th>Date of Enquiry</th>
                                        <th>College</th>
                                        <th>Comments</th>
                                        <th>Handeled By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
									$eid = 1;
									while($row = mysqli_fetch_assoc($result_set)){
                                    	$id = $row['id'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $eid; ?></th>
                                        <td><?php echo $row['student_first_name'] . " " . $row['student_last_name']; ?></td>
                                        <td><?php  echo $row['student_email']; ?></td>
                                        <td><?php  echo $row['student_number']; ?></td>
                                        <td><?php  echo $row['student_branch']; ?></td>
                                        <td><?php  echo $row['student_sem']; ?></td>
                                        <td><?php  echo $row['date_of_enquiry']; ?></td>
                                        <td><?php  echo $row['college_name']; ?></td>
                                        <td><?php  echo $row['comments']; ?></td>
                                        <td><?php  echo $row['handeled_by']; ?></td>
                                        <td>
                                            <div class="button-list">
                                                <a type="button" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" title="View Enquriy!"> <i class="fa fa-eye"></i> </a>
                                               
                                                <a type="button" class="btn btn-icon waves-effect waves-light btn-purple" data-toggle="tooltip" title="Edit Enquiry!" href="enquiry.php?e=edit&id=<?php echo $id; ?>"> <i class="fa fa-pencil"></i> </a>
                                                
                                                <a type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-enquiry" data-toggle="tooltip" data-enquiry-id="<?php echo $id;?>" title="Delete Enquiry!"> <i class="fa fa-remove"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
<?php
                                    $eid++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <?php include_once("footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
