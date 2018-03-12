<?php
$manage = $_POST['manage'];
if($manage == "student"){
    require_once("../classes/Student.php");
    if($_REQUEST['sid']){
        $sid = $_REQUEST['sid'];
        $student = new Student();
        $student->deleteStudent($sid);
    }
}
else if($manage == "branch"){
    require_once("../classes/Branch.php");
    if($_REQUEST['id']){
        $id = $_REQUEST['id'];
        $branch = new Branch();
        $branch->delete($id);
    }
}
?>