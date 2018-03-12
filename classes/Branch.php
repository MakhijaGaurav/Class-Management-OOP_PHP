<?php
include_once("Database.php");
include_once("GeneralFunctions.php");
/*SCHEMA OF BRANCH TABLE:
id, branch_code, branch_name, created_at, updated_at, updated_by, deleted, deleted_at, deleted_by
*/

class Branch extends GeneralFunctions
{
    private $connection;
    public $recordsPerPage;
    private $tableName;
    public function __construct(){
        parent:: __construct();
        global $database; //as $database is coming from other file, we have declared it as global
        $this->connection = $database->getConnection();
        $this->recordsPerPage = 2;
        $this->tableName = "branch";
    }
    
    public function readAllBranch(){
        $result_set = $this->connection->query("SELECT * FROM branch WHERE deleted = 0");
        return $result_set;
    }
	
    
    public function insert($branch_code, $branch_name){
        $query = "INSERT INTO $this->tableName (branch_code, branch_name, created_at, updated_at, updated_by, deleted) VALUES(?, ?, ?, ?, ?, ?)";
        
        if(!$preparedStatement = $this->connection->prepare($query)){
            die($this->connection->error);
        } //to check the error if any error is there the query will die and give the error
        $preparedStatement = $this->connection->prepare($query);
        $current_date = date("Y-m-d h:i:sa");
        $updated_by = 1;
        $deleted = 0;
        $preparedStatement->bind_param("ssssii", $branch_code, $branch_name, $current_date, $current_date, $updated_by, $deleted);
        
        if($preparedStatement->execute()){
            return $this->connection->insert_id;
        }else{
            die("ERROR WHILE INSERTING RECORD IN $this->tableName" . $this->connection_error);
        }
    }
    
    
	public function update($id, $branch_code, $branch_name){
        $query = "UPDATE $this->tableName SET branch_code = ?, branch_name = ?, updated_at = ?, updated_by = ? WHERE id = ?";
        
		if(!$preparedStatement = $this->connection->prepare($query)){
            die($this->connection->error);
        }//to check the error if any error is there the query will die and give the error
        $preparedStatement = $this->connection->prepare($query);
        $current_date = date("Y-m-d h:i:sa");
        $updated_by = 1;
        $preparedStatement->bind_param("sssii", $branch_code, $branch_name, $current_date, $updated_by, $id);
        
        if($preparedStatement->execute()){
            return true;
        }else{
            die("ERROR WHILE UPDATING BRANCH" . $this->connection->error);
        }
    }
	
	 public function getBranchDetailsByID($id){
        return($this->getAllDetailsByID($this->tableName, $id));
    }
	
	public function delete($id){
        $deleted = 1;
        $deleted_by = 1;
        $current_date = date("Y-m-d h:i:sa");
        $sql = "UPDATE $this->tableName SET deleted = $deleted, deleted_by = $deleted_by, deleted_at = '$current_date' WHERE id = $id";
        $this->connection->query($sql);    
    }
    
    public function displayRecordsWithPagination($records_per_page){
        echo "<table class='table'>
        	<thead class='thead-light'>
            	<tr>
                	<th>#</th>
                    <th>Branch Name</th>
                    <th>Branch Code</th>
                    <th>Action</th>
                </tr>
            </thead>
       	<tbody>";
        if(isset($_POST['page'])){
        	$page = $_POST['page'];
        }else{
        	$page=1;
        }
        if($page=="" || $page == 1){
            $limit_start = 0;
        }else{
            $limit_start = ($page * $records_per_page) - $records_per_page;
        }
        $condition = "";
        if(isset($_POST['key'])){
            $key = $_POST['key'];
            $condition = "AND (branch_name like '%$key%' or branch_code like '%$key%') ";
        }
        $total_records = $this->getTotalRecordCountWithCondition($this->tableName, $condition);
        $num_of_pages = ceil($total_records/$records_per_page);
        
        $condition = $condition . "LIMIT $limit_start, $records_per_page";
        $result_set = $this->readAllRecordsWithCondition($this->tableName, $condition);

        $sr_no = $records_per_page * $page - $records_per_page + 1;
		while ($row = mysqli_fetch_assoc($result_set)) {
            $id = $row['id'];
        ?>
        <tr>
            <th scope="row"><?php echo $sr_no; ?></th>
            <td><?php echo $row['branch_name']; ?></td>
            <td><?php echo $row['branch_code']; ?></td>
            <td>
                <div class="button-list">
                    <a type="button" class="btn btn-icon waves-effect waves-light btn-purple" data-toggle="tooltip" title="Edit Branch!" href="branch.php?r=edit&id=<?php echo $id; ?>"> <i class="fa fa-pencil"></i> </a>
                    
                    <a type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-record" data-toggle="tooltip" title="Delete Branch!" data-record-id="<?php echo $id; ?>"> <i class="fa fa-remove"></i> </a>
                </div>
            </td>
        </tr>
        <?php
                $sr_no++;
            }//end of while
        ?>
        </tbody>
    </table>
    <hr>
        <ul class="pagination justify-content-end pagination-split mt-0">
        <?php
            $li_class= "page-item";
            $a_class = "page-link";
            $li_active_class = $li_class." active";
            $page_num = $page==1?1:$page-1;
            echo "<li class='$li_class'><a class='$a_class' onclick='paginationLinkClicked($page_num)'>&lt;&lt;</a></li>";
            for($i=1; $i<=$num_of_pages; $i++) {
                if($i==$page)
                    echo "<li class='$li_active_class'><a onclick='paginationLinkClicked($i)' class='$a_class'>$i</a></li>";
                else
                    echo "<li class='$li_class'><a onclick='paginationLinkClicked($i)' class='$a_class'>$i</a></li>";
            }
            $page_num = $page==$num_of_pages?$num_of_pages:$page+1;
            echo "<li class='$li_class'><a class='$a_class' onclick='paginationLinkClicked($page_num)'>&gt;&gt;</a></li>";
        ?>
        </ul>
<?php
	}//end of class
	
}

?>