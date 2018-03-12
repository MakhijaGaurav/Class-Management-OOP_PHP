<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Branch";
	$breadcrumb = "
	<li class='breadcrumb-item'>Branch Management</li>
	<li class='breadcrumb-item active'>Manage Branch</li>";
	include_once("includes/top-bar.php");
    include_once("includes/init.php");
    $branch = new Branch();
    //$result_set = $branch->readAllBranch();
	?>
        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div class="pull-left form-row">
                                <div class="form-group">
                                    <select id="num-rows-choice" class="custom-select" onchange="loadData()">
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
                                <a type="button" class="btn btn-primary waves-effect waves-light btn-lg" href="branch.php?r=add"><i class="fa fa-plus m-r-5"></i> <span>Add New Branch</span> </a>
                            </p>

                           
                            <div id="branch-info">
                            
                            </div>
<!--
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Code</th>
                                        <th>Branch Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
									$bid = 1;
									while($row = mysqli_fetch_assoc($result_set)){
										$id = $row['id'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $bid; ?></th>
                                        <td><?php echo $row['branch_code']; ?></td>
                                        <td><?php  echo $row['branch_name']; ?></td>
                                        <td>
                                            <div class="button-list">
                                                <a type="button" class="btn btn-icon waves-effect waves-light btn-purple" data-toggle="tooltip" title="Edit Branch!" href="branch.php?r=edit&id=<?php echo $id; ?>"> <i class="fa fa-pencil"></i> </a>
                                                
        										<a type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-branch" data-toggle="tooltip" data-branch-id="<?php echo $id;?>" title="Delete Branch!"> <i class="fa fa-remove"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
<?php
                                    $bid++;
                                    }
                                ?>
                                </tbody>
                            </table>
-->
                        </div>

                    </div>

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
