<script> 
<?php
$notification_for="";
$op="";
$p="";
$page="";
if(isset($_GET['op'])){
    $op=$_GET['op'];
    echo $op;
    $p = $_GET['p'];
switch($page){
    case "student":
        $notification_for="student";
        break;
    case "subject":
        $notification_for="subject";
        break;
    case "branch":
        $notification_for="branch";
        break;
}
if($op=="ins" && $p=="success" && $page=="student"){
?>
    toastr["success"]("<?php echo $notification_for; ?> record successfully inserted!", "Record Inserted")
    
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
<?php
}else if($op=="update" && $p=="success"){
    ?>
     toastr["success"]("<?php echo $notification_for; ?> record successfully updated!", "Record Updated!")
      toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
<?php
}
}
?>
</script>