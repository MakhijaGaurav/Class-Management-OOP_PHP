<?php
$manage = $_POST['manage'];
if($manage =="student"){
    require_once("../classes/Student.php");
    $student = new Student();
    if(isset ($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $student->studentPerPage;
        }
    }
    $student->displayStudentWithPagination($numRows);
}
else if($manage == "branch"){
    require_once("../classes/Branch.php");
    $branch = new Branch();
    if(isset ($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $branch->recordsPerPage;
        }
    }
    $branch->displayRecordsWithPagination($numRows);
}
?>