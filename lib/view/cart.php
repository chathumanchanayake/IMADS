<?php
//start the session
session_start();


//link app/php file
include_once('../layout/app.php');
//link navBar
include_once('../layout/top Nav_cart.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
</head>

<body onload="FetchAll()">
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="cartItem" style="margin-top:20px">
                <h6>My Cart</h6>
                <img src="../upload/ui/07.png" width="200px" style="display: block; margin-left: auto; margin-right: auto; margin-top:100px; margin-bottom:20px;" alt="">

            </div>
            <div class="col-md-3 mt-5" style="margin-top:20px;border-radius:10px">
                <div class="card border-success mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title px-2">Order Summary</h4>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                   <li class="list-group-item my=1"><h6>Delivery</h6></li>
                                    <li class="list-group-item"><h6>Total</h6></li>
                            </div>
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    <!-- <li class="list-group-item"><h6 id="carttotal" style="display: inline;"></h6 style="display: inline;"> LKR</li> -->
                                    <li class="list-group-item"><h6 style="color: green;">FREE</h6></li>
                                    <li class="list-group-item"><h6 id="carttotal" style="display: inline;"></h6 style="display: inline;"> LKR</li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row py-3 px-3">
                            <button type="button" class="" id="buy">BUY</button>
                        </div>

                    </div>
                </div>
            </div>
            <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //chek the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>" id="input_user_id">
            <div class="row text-center py-5" id="cart">
            </div>

        </div>
</body>

</html>

<script>
    //login status
    //user account handling
    $userid = $("#input_user_id").val();

    //checking the login status of the user
    if ($userid == "") {
        $("#btn_user").hide();
    } else {
        $("#btn_sign").hide();
    }

    function validateInput(element) {
    // Ensure the input value is at least 1
    if (element.value < 1) {
        element.value = 1;
    }
}

    //display all items in the cart

    function FetchAll() {

        buy_button();

        let cartResult = document.getElementById('cartItem');
    
        let carttotal = document.getElementById('carttotal');
        let cart = JSON.parse(localStorage.getItem('cart'));
        cartResult.innerHTML = "";
        carttotal.innerHTML = "0";

        for (let i = 0; i < cart.length; i++) {
            let name = cart[i].productname;
            let id = cart[i].productid;
            let image = cart[i].productimage;
            let price = cart[i].productprice;
            let dis = cart[i].productprice;
            let count = cart[i].productcount;
            //add one more

            cartResult.innerHTML +=
                '<div class="border rounded mt-3"> <div class="row"> <div class="col-3">' +
                '<img src="../' + image + '" alt="Image1" style="width:180; height:180" class="img-fluid">' +
                '</div> <div class="col-5">' +
                '<h5 class="pt-2">' + name + '</h5>' +
                '<small class="text-secondary">' + dis + '</small>' +
                '<h5 class="pt-2">LKR' + price + '</h5>' +
                '<button type="submit" onclick="deleteitem(\'' + id +
                '\')" class="btn btn-danger mx-2"><i class="far fa-trash-alt"></i>  Remove</button>' +
                '</div> <div class="col-4  py-5">' +
                '<div>' +
                '<button type="button" onclick="minusitem(\'' + id +
                '\')" class="btn bg-dark border"><i class="fas fa-minus"></i></button>' +
                '<input type="number" disable readonly min="1" style="text-align:center;" value="' + count + '" class="form-control w-25 d-inline mx-2" oninput="validateInput(this)">' +
                '<button type="button" onclick="plusitem(\'' + id +
                '\')" class="btn bg-dark border"><i class="fas fa-plus"></i></button>' +

                '</div></div></div></div></div>';
            carttotal.innerHTML = (parseInt(carttotal.innerHTML) + parseInt(price) * parseInt(count)).toFixed(2);
        };

    }

    function buy_button() {
        //Disable the buy button if the cart is empty
        let tempcart = JSON.parse(localStorage.getItem('cart'));

        if (localStorage.getItem('cart') === null) {
            $("#buy").attr('class', "btn btn-danger disabled");
        } else if (tempcart.length == 0) {
            $("#buy").attr('class', "btn btn-danger disabled");
        } else {
            $("#buy").attr('class', "btn btn-danger");
        }
    }

    //delete cart items
    function deleteitem(id) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].productid == id) {
                cart.splice(i, 1);
            }

        }
        localStorage.setItem('cart', JSON.stringify(cart));
        FetchAll();
    }

    //increase the item count
    function plusitem(id) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    
    for (let i = 0; i < cart.length; i++) {
        if (cart[i].productid == id) {
            // Check database balance
            $.get("../routes/products/getquent.php", {
                pid: id
            }, function (res1) {
                let check = res1;
                
                if ((parseInt(cart[i].productcount) + 1) < check) {
                    cart[i].productcount = parseInt(cart[i].productcount) + 1;
                } else {
                    Swal.fire('Out of stock!');
                }
                
                localStorage.setItem('cart', JSON.stringify(cart));
                FetchAll();
            });
            
            break; // Exit the loop once the item is found
        }
    }
}

    //decrease the item count
    function minusitem(id) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    
    for (let i = 0; i < cart.length; i++) {
        if (cart[i].productid == id) {
            if (cart[i].productcount > 1) {
                cart[i].productcount = parseInt(cart[i].productcount) - 1;
            } else {
                Swal.fire('Item count cannot be less than 1!');
            }
        }
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    FetchAll();
}
    //press buy button
    $('#buy').click(function () {
        $userid = $("#input_user_id").val();
        $total = $("#carttotal").text();

        //checking login status of the user
        if ($userid == "") {
            //set redirect location
            document.cookie = "location='location:../view/cart'";

            window.location.href = 'login.php';

        } else {
            //add user detail to local storage
            let item = {
                userid: $userid,
                total: $total,
            }
            if (localStorage.getItem('order') === null) {
                //create java script array
                let order = [];
                //push data to array
                order.push(item);
                //set the local storage
                localStorage.setItem('order', JSON.stringify(order));
            } else {
                let order = JSON.parse(localStorage.getItem('order'));
                for (let i = 0; i < order.length; i++) {
                    let userid = order[i].userid;

                    if (userid === item.userid) {
                        order.splice(i, 1);
                    }
                }
                order.push(item);
                //Re-set localstorage
                localStorage.setItem('order', JSON.stringify(order));
            }

            //redirect the nect page
            window.location.href = 'order_final.php';
        }


    });
</script>