<?php
session_start();

if(empty($_SESSION['login_email'])){
//redirect user backto login
header('location:login.php');

}

//link app/php file
include_once('../layout/app.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <Table>Admin</Table>
  </title>
  <style>
    
.clock {
    color: #17D4FE;
    font-size: 25px;
    font-family: Orbitron;
    text-align: center;

}
  </style>
</head>

<body>
  <!-- start side bar -->
  <div class="page-wrapper chiller-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="" #style="color:blue">Dreamy Bookshop</a>
          <div id="close-sidebar">
            <i class="fas fa-chevron-left"></i>
          </div>
        </div>
        <!-- show user Details  -->
        <div class="sidebar-header" id="show_current_user">
        </div>
        <!-- sidebar-header  -->
        <!-- <div class="sidebar-search">
          <div>
            <div class="input-group">
              
              
            </div>
          </div>
        </div> -->
        <!-- sidebar-Content  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Manage</span>
            </li>
            
            <li class="sidebar-dropdown">
              <a href="#">
              <i class="fas fa-layer-group"></i>
                <span>As Supplier</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a id="ourProducts" >Our Products</a>
                  </li>
                  <li>
                    <a id="ourorderlist">Order List</a>
                  </li>
                </ul>
              </div>
            </li>
            
        </div>
        <!-- End sidebar-menu  -->
      </div>
    </nav>
    <!-- rop Nav bar -->
    <main class="page-content pt-0">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
              </a>
            </ul>
          </div>
          <div class="col-2" id="navbarColor02">
          <div class="col-2" id="navbarColor02">
            <ul class="navbar-nav me-auto py-3">
            <a class="dropdown-item px-2" href="../function/logout.php" style="color:red; border-color: red;  text-align: center;
            border-style: solid; border-radius: 25px;
            border-width: 1px;"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
            </ul>
          </div>
        </div>
      </nav>
      <!-- content top 4 cardsS -->
      <div class="container-fluid">
        <div class="row">
          <div class="row py-2 px-3">
            <div class="col-3">
              <div class="card shadow card border-shadow h-100 py-3 px-2 " id="cardadmin01">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Products Count
                    </div>
                    <div class="h5 mb-0 text-gray-800" id="admin_product_count"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-box fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow card border-shadow h-100 py-3 px-2" id="cardadmin02">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User Count
                    </div>
                    <div class="h5 mb-0 text-gray-800" id="admin_user_count"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users  fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow card border-shadow h-100 py-3 px-2" id="cardadmin03">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Onging Projects
                    </div>
                    <div class="h5 mb-0 text-gray-800" >12</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-drafting-compass fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow card border-shadow h-100 py-3 px-2" id="cardadmin04">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending
                      Orders
                    </div>
                    <div class="h5 mb-0 text-gray-800" id="admin_order_count">12</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" >
      <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //chek the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>"
          id="input_user_id">
        <div class="col-8" id="adminloadContent" style=" display: block;    height: 450px; overflow-y: scroll;">
            <img src="../upload/ui/05.png" width="400px" style="display: block; margin-left: auto; margin-right: auto; margin-top:100px; margin-bottom:20px;" alt=""> 
        </div>
        <div class="col-4" >
            <div class="card border-info mb-3 px-1 mx-4">
                <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
            </div>
            <div id="adminloadContentSide" style=" display: block;    height: 450px; overflow-y: scroll;">

            </div>
      </div>
  </div>
  </main>
  </div>
</body>
    <script>

        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";
            
            if(h == 0){
                h = 12;
            }
            
            if(h > 12){
                h = h - 12;
                session = "PM";
            }
            
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            
            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;
            
            setTimeout(showTime, 1000);
            
        }

        showTime();

     $('#adminloadContentSide').load('user/userlist.php');
    </script>
</html>