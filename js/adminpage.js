$(document).ready(function(){
  
    //lode user image, name and jobtitel
    $.get("../routes/emp/show_current_user.php", function (res) {
        //display data 
        $("#show_current_user").html(res);
      });
    //lode product Count
    $.get("../routes/products/productcount.php", function (res) {
        //display data 
        $("#admin_product_count").html(res);
      });
      //load user count
    $.get("../routes/users/usercount.php", function (res) {
         //display data 
        $("#admin_user_count").html(res);
      });
    
    $.get("../routes/users/ordercount.php", function (res) {
      //display data 
     $("#admin_order_count").html(res);
   });

   $.get("../routes/products/pendingpaycount.php", function (res) {
    //display data 
   $("#pending_payment_count").html(res);
 });

//    $.get("../routes/users/cuscount.php", function (res) {
//     //display data 
//    $("#admin_cus_count").html(res);
//  });



    //load content to page
    $('#add_employer').click(function(){
        $('#adminloadContent').load('emp/addemployer.php');
    });

  //   //load content to page
  //   $('#change_pwd').click(function(){
  //     $('#adminloadContent').load('password/change_pwd.php');
  // });
    
    $('#edit_employer').click(function(){
      $('#adminloadContent').load('emp/editemployer.php');
     });

     
     $('#activate_employer').click(function(){
      $('#adminloadContent').load('emp/activateemployer.php');
  });


     $('#add_supplier').click(function(){
      $('#adminloadContent').load('suppliers/addsup.php');
  });
  
  $('#edit_supplier').click(function(){
    $('#adminloadContent').load('suppliers/editsup.php');
   });

    $('#edit_product').click(function(){
        $('#adminloadContent').load('product/editproduct.php');
    });

    $('#add_product').click(function(){
      $('#adminloadContent').load('product/addproducts.php');
    });

    $('#add_Customer').click(function(){
        $('#adminloadContent').load('user/adduser.php');
    });

    $('#edit_Customer').click(function(){
      $('#adminloadContent').load('user/edit_user.php');
    });

    $('#activate_Customer').click(function(){
      $('#adminloadContent').load('user/activate_user.php');
    });

    //    $('#cardadmin01').click(function(){
    //   $('#adminloadContentSide').load('product/prolist.php');
    // });

    $('#cardadmin02').click(function(){
      $('#adminloadContentSide').load('user/userlist.php');
    });

    // $('#cardadmin03').click(function(){
    //   $('#adminloadContentSide').load('service/servicelist.php');
    // });

    // $('#cardadmin04').click(function(){
    //   $('#adminloadContentSide').load('order/orderlist.php');
    // });
  
    $('#viewallorders').click(function(){
      $('#adminloadContent').load('order/view_all_Orders.php');
    });
    
    $('#deliveryifo').click(function(){
      $('#adminloadContent').load('order/deliveryinfo.php');
    });
  
    $('#offlinepay').click(function(){
      $('#adminloadContent').load('order/offline_payment.php');
    });

    $('#ordercontamation').click(function(){
      $('#adminloadContent').load('order/order_conform.php');
    });

    $('#storrady').click(function(){
      $('#adminloadContent').load('order/Rady_to_transport.php');
    });

    $('#deliverd').click(function(){
      $('#adminloadContent').load('order/deliverd.php');
    });
    

    $('#stockplane').click(function(){
      $('#adminloadContent').load('design/plane.php');
    });

    $('#bin').click(function(){
      $('#adminloadContent').load('design/bin.php');
    });

    $('#expairProducts').click(function(){
      $('#adminloadContent').load('reorder/expairproducts.php');
  });

  $('#reorderProducts').click(function(){
    $('#adminloadContent').load('reorder/reorderproducts.php');
  });

  $('#reorderProducts2').click(function(){
    $('#adminloadContent').load('reorder/reorderproducts1.php');
  });

  $('#addnewStock').click(function(){
    $('#adminloadContent').load('reorder/addnewStock.php');
  });

  $('#repairm').click(function(){
    $('#adminloadContent').load('reorder/reorderproducts3.php');
  });

  // $('#changepwd').click(function(){
  //   $('#adminloadContent').load('password/change_pwd.php');
  // });

  $('#ourProducts').click(function(){
    $('#adminloadContent').load('reorder/ourproduct.php');
  });

  $('#ourorderlist').click(function(){
    $('#adminloadContent').load('reorder/ourproducts2.php');
  });

});

