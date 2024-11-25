<?php
//start the session
session_start();


// Top Navigationbar Connection
include_once('lib/layout/top Nav_main.php');
// Component card Connection
include_once('lib/layout/component.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dreamy Bookshop</title>

  <!--Link Bootstrap css file-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--Link Font awesome css file-->
  <link rel="stylesheet" href="css/all.min.css">
  <!--Link Style sheet css file-->
  <link rel="stylesheet" href="css/style.css">

  <!--Link Font awesome bootstrap and Jquery scrip files-->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>

  
</head>
<body onload="loadcount()">
  <div class="container-fluid py-5">
    <div class="card shadow card card border-shadow">
      <div class="row">
        <div class="col-9 py-0 px-0" style="height:400; " id="image1000">
          <div class="slider" id="slidergal">
            <div class="slides" id="slidersgal">
              <input type="radio" name="radio-btn" id="radio1">
              <input type="radio" name="radio-btn" id="radio2">
              <input type="radio" name="radio-btn" id="radio3">
              <input type="radio" name="radio-btn" id="radio4">

              <div class="slidefirst" id="slidefirst">
                <img src="lib/upload/gallery/01.JPEG" alt="">
              </div>
              <div class="slide">
                <img src="lib/upload/gallery/02.JPG
                " alt="">
              </div>
              <div class="slide">
                <img src="lib/upload/gallery/03.JPG" alt="">
              </div>
              <div class="slide">
                <img src="lib/upload/gallery/04.JPG" alt="">
              </div>
              <!-- automatic navigation -->
              <div class="navigation-auto" id="navigationauto">
                <div class="auto-btn1" id="autobtn1"></div>
                <div class="auto-btn2" id="autobtn2"></div>
                <div class="auto-btn3" id="autobtn3"></div>
                <div class="auto-btn4" id="autobtn4"></div>
              </div>
              <!-- Manual nevigation -->
              <div class="navigation-manual" id="navigationmanual">
                <label for="radio1" class="manual-btn" id="manulbtn"></label>
                <label for="radio2" class="manual-btn" id="manulbtn"></label>
                <label for="radio3" class="manual-btn" id="manulbtn"></label>
                <label for="radio4" class="manual-btn" id="manulbtn"></label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 align-self-center">
          <h3 id="dup1" class="card-title-center">Welcome to Our Book Store</h3>
          <h5 id="dup" class="card-text">
          Books are a uniquely portable magic -Stephen King
          </h5>
         <!-- <a href="lib/view/login.php" class=" my-0 mx-0">
          <button class="btn btn-outline-success my-3" style="width:300px" >Sign in <i
              class="fas fa-sign-in-alt"></i></button> </a>-->
              <br>
              <a href="lib/view/quotation.php" class=" my-0 mx-0">
              <button class="btn btn-outline-success my-3" style="width:300px; height:110px"><i
              class="fas fa-list fa-2x"></i><br>Print Price Quotation</button>
              </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid px-0 py-2">
   <div class="card" id="indexproducttitel" style="width:150px">
   <h4 class="px-2">Products</h4>
   </div> 
  </div>
  <div class="container">
  <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //checking the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>"
          id="input_user_id">
    <div class="row text-center py-0" id="products">
      <!-- Product listed Area -->
    </div>
  </div>
  <div class="container-fluid px-0 py-2">
   <div class="card" id="indexproducttitel" style="width:150px">
   <h4 class="px-2">Books</h4>
   </div> 
  </div>
  <div class="container">
    <div class="row text-center py-0" id="books">
      <!-- books listed Area -->
    </div>
  </div>
  <footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <hr>
				<div class="footer_title">
					<h4 style="color: red">About Company</h4>
				</div>
				<div class="footer_content">
					<div class="footer_logo">

					</div>
					<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro </p>
					
					
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-10">
      <hr>
			<div class="footer_title">
					<h4 style="color: red">Contact us </h4>
				</div>
				<div class="footer_content">
					<ul class="contact_details">
						<li><a href="#"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>No. 09, Rajapihilla road, Kurunegala.</a></li>
						</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <hr>
				<div class="footer_title">
					<h4 style="color: red">About Company</h4>
				</div>
				<div class="footer_content">
					
					<div class="footer_social">
						<ul>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						</ul>
					</div>
          <li><a href="#"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>dreamsbooks.com</a></li>
						<li><a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i></span>+44 00 00 1234 <br></a></li>
					
				</div>
			</div>
		</div>
	</div>
</footer>
</body>
<script>
  // Script for auto changing gallery
  var counter = 1;
    setInterval(function () {
      document.getElementById('radio'+counter).checked = true;
      counter++;
      if (counter > 4) {
        counter = 1;
      }
    },5000)

    //user account handeling
    $userid=$("#input_user_id").val();

    //checking the login status of the user
    if ($userid == ""){
     $("#btn_user").hide();
    }
    else{
      $("#btn_sign").hide();
      $("#btn_reg").hide();
    }

    //add to cart button
    function addtocart(id,name,image,price,dis){

      //create object
      var item = {
        productid: id,
        productname: name,
        productimage: image,
        productprice: price,
        productdis:dis,
        productcount: 1,
        
      }

      if ( localStorage.getItem('cart') === null ) {
        //create java script array
        var cart = [];
        //push data to array
        cart.push(item);
        //set the local storage
        localStorage.setItem('cart', JSON.stringify(cart));
        loadcount();
      } else {var cart = JSON.parse(localStorage.getItem('cart'));
            for (var i = 0; i < cart.length; i++) {
                var productid_demo = cart[i].productid;

                if (productid_demo === item.productid) {
                   Swal.fire({
                      icon: 'info',
                      text: 'The product is already added to the cart',
                    });
                    cart.splice(i, 1);
                    
                }

            }
            cart.push(item);
            //Re-set localstorage
            localStorage.setItem('cart', JSON.stringify(cart));
            loadcount();
    }
  }
  function loadcount(){
  //show cart count
  var tempcart = JSON.parse(localStorage.getItem('cart'));
    if(localStorage.getItem('cart') === null){
      $("#cart_count").text("0");
    }
    else if ( tempcart.length == 0 ) {
        $("#cart_count").text("0");
    }
    else{
      $("#cart_count").text(tempcart.length);
    }
  }
</script>
</html>