$(document).ready(function(){
    //lode user image, name and jobtitel
    $.get("../routes/emp/show_current_user.php", function (res) {
       //display data 
       $("#show_current_user1").html(res);
     });
   
   });