<?php
include_once("Database.php");
/*SCHEMA OF STUDENT TABLE:
id, student_first_name, student_last_name, student_email, student_number, student_branch, student_sem, stream_id, reference, date_of_enquiry, college_name, comments, handeled_by, created_at, updated_at, updated_by, deleted, deleted_at, deleted_by, admitted
*/

class Enquiry{
	private $connection;
    public function __construct(){
        global $database; //as $database is coming from other file, we have declared it as global
        $this->connection = $database->getConnection();
    }
	
    public function readAllEnquiry(){
        $result_set = $this->connection->query("SELECT * FROM enquiry WHERE deleted = 0");
        return $result_set;
    }
    
    public function insertEnquiry($student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream_id, $reference, $date_of_enquiry, $college_name, $comments, $handeled_by){
        
        $query = "INSERT INTO enquiry (student_first_name, student_last_name, student_email, student_number, student_branch, student_sem, stream_id, reference, date_of_enquiry, college_name, comments, handeled_by, created_at, updated_at, updated_by, deleted, admitted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if(!$preparedStatement = $this->connection->prepare($query)){
            die($this->connection->error);
        } //to check the error if any error is there the query will die and give the error
        $preparedStatement = $this->connection->prepare($query);
        $current_date = date("Y-m-d h:i:sa");
        $updated_by = 1;
        $deleted = 0;
        $admitted = 1;
        $preparedStatement->bind_param("ssssiiissssissiii", $student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream_id, $reference, $date_of_enquiry, $college_name, $comments, $handeled_by, $current_date, $current_date, $updated_by, $deleted, $admitted);
        
        if($preparedStatement->execute()){
            return $this->connection->insert_id;
        }else{
            die("ERROR WHILE INSERTING ENQUIRY" . $this->connection_error);
        }
    }
	
	public function updateEnquiry($id, $student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream_id, $reference, $date_of_enquiry, $college_name, $comments, $handeled_by){
        
        $query = "UPDATE enquiry SET student_first_name = ?, student_last_name = ?, student_email = ?, student_number = ?, student_branch = ?, student_sem = ?, stream_id = ?, reference = ?, date_of_enquiry = ?, college_name = ?, comments = ?, handeled_by = ?, updated_at = ?, updated_by = ?, admitted = ? WHERE id = ?";
        
        if(!$preparedStatement = $this->connection->prepare($query)){
            die($this->connection->error);
        } //to check the error if any error is there the query will die and give the error
       	//$preparedStatement = $this->connection->prepare($query);
        $current_date = date("Y-m-d h:i:sa");
        $updated_by = 1;
        $admitted = 1;
        $preparedStatement->bind_param("ssssiiissssisiii", $student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream_id, $reference, $date_of_enquiry, $college_name, $comments, $handeled_by, $current_date, $updated_by, $admitted, $id);
        
        if($preparedStatement->execute()){
            return true;
        }else{
            die("ERROR WHILE UPDATING ENQUIRY" . $this->connection_error);
        }
    }
	
	public function getAllDetailsOfAEnquiry($id){
        $sql = "SELECT * FROM enquiry WHERE id=$id";
        $result_set = $this->connection->query($sql);
        if($this->connection->error)
            echo $this->connection->error;
        return($result_set);
    }
	
	public function deleteEnquiry($id){
        $deleted = 1;
        $deleted_by = 1;
        $current_date = date("Y-m-d h:i:sa");
        $sql = "UPDATE enquiry SET deleted = $deleted, deleted_by = $deleted_by, deleted_at = '$current_date' WHERE id = $id";
        $this->connection->query($sql);
    }
}

?>