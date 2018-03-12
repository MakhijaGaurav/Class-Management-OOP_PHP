<?php
include_once("../classes/Enquiry.php");
if($_REQUEST['id']){
    $id = $_REQUEST['id'];
    $enquiry = new Enquiry();
    $enquiry->deleteEnquiry($id);
}
?>