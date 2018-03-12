var pageNumber = 1;
var key = "";
function studentPaginationLinkClicked(page){
    pageNumber = page;
    loadStudentsData();
}
function search(searchKey){
    key = searchKey;
    loadStudentsData();
}

function loadStudentsData(){
    var choice = document.getElementById("num-rows-choice");
    var numRows = choice.options[choice.selectedIndex].value;
    $.ajax({
        type: 'POST',   
        url: 'includes/process-ajax-request.php',
        data: 'rows=' + numRows+"&page="+pageNumber+"&key="+key+"&manage=student"
    }).done(function (response) {
        document.getElementById("student-info").innerHTML = response;
        pageNumber = 1; 
        
        /*The below function is used to create a modal when we press the delete button to delete a student entry.This is using SweetAlert plugin to create a user friendly modal!*/
        
        //If any contents are coming dynamically i.e. from ajax call always call window.bind function so it will bind the function after the data has came
        !function (t) {
        "use strict";
        var n = function () {};
        n.prototype.init = function () {
            /*$*/t(".delete-student").click(function () {
                 var sid = $(this).attr('data-student-id');
                 swal({
                     title: "Are you sure, you wanna delete this student entry?",
                     text: "You won't be able to revert this!",
                     type: "warning",
                     showCancelButton: !0,
                     confirmButtonClass: "btn btn-confirm mt-2",
                     cancelButtonClass: "btn btn-cancel ml-2 mt-2",
                     confirmButtonText: "Yes, delete it!"
                 }).then(function () {
                     $.ajax({
                         type: 'POST',
                         url: 'includes/delete-records.php',
                         data: 'sid=' + sid+"&manage=student"
                     }).done(function (response) {

                         swal({
                             title: "Deleted !",
                             text: "Student has been deleted!",
                             type: "success",
                             confirmButtonClass: "btn btn-confirm mt-2"
                         }).then(function(){
                             self.location = "student.php";
                         })
                     }).fail(function () {
                             swal({
                                 title: "Issue !",
                                 text: "There was issue deleteing student, please try again later!",
                                 type: "error",
                                 confirmButtonClass: "btn btn-confirm mt-2"
                             })
                         })
                 })
             })
        }, t.SweetAlert = new n, t.SweetAlert.Constructor = n
    }(window.jQuery),
        function (t) {
            "use strict";
            t.SweetAlert.init()
        }(window.jQuery);
    })
}

loadStudentsData();

$(document).ready(function() {
	$('form').parsley();
	$("#datepicker-autoclose").datepicker({
		autoclose: !0,
		todayHighlight: !0
	});
});

//$(window).bind("load", function(){
    //IT IS USED ONLY FOR ONE TIME LOADING LIKE ABHI VOH DELETE WALA HO RAHA THA NA SO UPAR DAAL DIYA TOH JAB BHI CONTENTS AA RAHE H IT WILL LOAD THAT SCRIPT
//});