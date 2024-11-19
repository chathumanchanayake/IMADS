<?php
//start the session
session_start();

//link app/php file
include_once('../layout/app.php');
//link navBar
include_once('../layout/qut.php');

?>
<style>
    @media print {
        .no-print,
        .no-print,
        #gradient,
        #steps-uid-0-p-3 * {
            display: none !important;
        }

        #date,
        #date * {
            display: none !important;
        }

        #sidenav,
        #sidenav * {
            display: none !important;
        }
    }

    table,
    th,
    td {
        border: 1px solid;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <title class="no-print">Price Quotation</title>
</head>

<body onload="FetchAll()">
    <div class="container">
        <div class="row">
            <div class="no-print" style="margin-top:20px">
                <div class="card border-success py-4 px-4">
                    <div class="row">
                        <div class="col-4">
                            <h5>Product Category</h5>
                        </div>
                        <div class="col-4">
                            <h5>Product Name</h5>
                        </div>
                        <div class="col-3">
                            <div class="col-4">
                                <h5>Quantity</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mt-2 mx-3">
                                <select class="form-select" name="productCategory" id="productCategory">
                                    <option value="0">Select Category</option>
                                    <option value="Reading books">Reading books</option>
                                    <option value="Books / Writing">Books / Writing</option>
                                    <option value="Drawing items">Drawing items</option>
                                    <option value="School books">School books</option>
                                    <option value="Writing items">Writing items</option>
                                    <option value="Papers">Papers</option>
                                    <option value="Cardboard">Cardboard</option>
                                    <option value="Mathematical tools">Mathematical tools</option>
                                    <option value="Polithin">Polithin</option>
                                    <option value="Binding tools">Binding tools</option>
                                    <option value="Preschool items">Preschool items</option>
                                    <option value="School items">School items</option>
                                    <option value="Bags">Bags</option>
                                    <option value="toys">toys</option>
                                    <option value="Wool Items">Wool Items</option>
                                    <option value="Electronic Items">Electronic Items</option>
                                    <option value="Party Items">Party Items</option>
                                    <option value="Plastic items">Plastic items</option>
                                    <option value="Muiltimeadia Iems">Muiltimeadia Iems</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mt-2 mx-3">
                                <select class="form-select" name="productCategory" id="productlist">

                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mt-2">
                                <input type="number" min="0" name="Quantity" id="Quantity" class="form-control" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group mt-2">
                                <button type="submit" onclick="addtoqt()" class="btn btn-success mx-2 no-print"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-2" style="text-align:center;">
                <h4>Price Quotation</h4>
            </div>
            <hr>
            <div class="row col-12">
                <div class="col-4">
                    <h5>Product Name</h5>
                </div>
                <div class="col-2">
                    <h5>Unit Price</h5>
                </div>
                <div class="col-3">
                    <h5>Quantity</h5>
                </div>
                <div class="col-3">
                    <h5>Total Price</h5>
                </div>
            </div>
            <hr>
            <div class="col-md-12" id="cartItem" style="margin-top:20px">

            </div>
            <div class="col-md-12" style="margin-top:20px">
                <div class="row">
                    <hr>
                    <div class="col-9">
                        <h4>Total</h4>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <h4 id="carttotal" style="display: inline;"></h4>
                            <h4>LKR</h4>
                        </div>
                    </div>
                </div>
                <div class="row col-2 py-3 px-3 no-print">
                    <button type="button" class="btn btn-success my-3 px-5" onclick="window.print();"><i class="fas fa-print"></i> Print</button>
                </div>
                <input class="form-control mx-1 my-1" type="hidden" value="<?php
                //chek the user session
                if (empty($_SESSION['user_id'])) {} else {
                    print_r($_SESSION['user_id']);
                } ?>" id="input_user_id">
                <div class="row text-center py-5" id="cart">
                </div>
            </div>
</body>

</html>

<script>
    localStorage.removeItem("qta");
    function addtoqt() {
        if ($("#productlist").val() == 0 || $("#Quantity").val() == 0) {
            Swal.fire(
                'Something Wrong',
                'Please fill the required fields.',
                'error'
            );
        } else if ($("#Quantity").val() < 0) {
            Swal.fire(
                'Invalid Quantity',
                'Quantity cannot be negative.',
                'error'
            );
        } else {
            $id = $("#productlist").val();
            $name = ($("#productlist").find(':selected').data('name'));
            $price = ($("#productlist").find(':selected').data('price'));
            $qty = $("#Quantity").val();
            //create object
            var item = {
                productid: $id,
                productname: $name,
                productprice: $price,
                productcount: $qty,
            }

            if (localStorage.getItem('qta') === null) {
                //create java script array
                var cart = [];
                //push data to array
                cart.push(item);
                //set the local storage
                localStorage.setItem('qta', JSON.stringify(cart));
            } else {
                var cart = JSON.parse(localStorage.getItem('qta'));
                for (var i = 0; i < cart.length; i++) {
                    var productid_demo = cart[i].productid;

                    if (productid_demo === item.productid) {
                        Swal.fire({
                            icon: 'info',
                            text: 'Product is already added to the cart',
                        });
                        cart.splice(i, 1);
                    }
                }
                cart.push(item);
                //Re-set localstorage
                localStorage.setItem('qta', JSON.stringify(cart));
            }
            FetchAll();
            $("#Quantity").val("");
        }
    }

    $("#productCategory").on('change', function() {
        $cat = $(this).val();

        $.get("../routes/products/getprodroplist.php", {
            cat: $cat
        }, function(res1) {
            $("#productlist").html(res1);
        })
    })

    function FetchAll() {
        var cartResult = document.getElementById('cartItem');
        var carttotal = document.getElementById('carttotal');
        var cart = JSON.parse(localStorage.getItem('qta'));
        cartResult.innerHTML = "";
        carttotal.innerHTML = "0";

        for (var i = 0; i < cart.length; i++) {
            var name = cart[i].productname;
            var id = cart[i].productid;
            var price = cart[i].productprice;
            var count = cart[i].productcount;
            cartResult.innerHTML +=
                '<div class="mt-1"> <div class="row"><div class="col-4">' +
                '<h5 class="pt-2">' + name + '</h5></div><div class="col-2">' +
                '<h5 class="pt-2">LKR ' + price + '</h5></div>' +
                '<div class="col-3">' +
                '<button type="button" onclick="minusitem(\'' + id +
                '\')" class="btn bg-dark no-print"><i class="fas fa-minus"></i></button>' +
                '<input type="text" style="text-align:center; color:white" value="' + count +
                '" class="form-control bg-dark w-25 d-inline mx-2">' +
                '<button type="button" onclick="plusitem(\'' + id +
                '\')" class="btn bg-dark no-print"><i class="fas fa-plus"></i></button>' +
                '</div><div class="col-2"><h5 class="pt-2">LKR ' + count * price + '</h5></div><div class="col-1">' +
                '<button type="submit" onclick="deleteitem(\'' + id +
                '\')" class="btn btn-danger mx-2 no-print"><i class="far fa-trash-alt"></i></button>' +
                '</div></div></div>';
            carttotal.innerHTML = (parseInt(carttotal.innerHTML) + parseInt(price) * parseInt(count)).toFixed(2);
        }
    }

    function deleteitem(id) {
        var cart = JSON.parse(localStorage.getItem('qta'));
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].productid == id) {
                cart.splice(i, 1);
            }
        }
        localStorage.setItem('qta', JSON.stringify(cart));
        FetchAll();
    }

    function plusitem(id) {
        var cart = JSON.parse(localStorage.getItem('qta'));
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].productid == id) {
                $.get("../routes/products/getquent.php", {
                    pid: id
                }, function(res1) {
                    $check = res1;
                })

                if ((parseInt(cart[i].productcount) + 1) < $check) {
                    var item = {
                        productid: cart[i].productid,
                        productname: cart[i].productname,
                        productimage: cart[i].productimage,
                        productprice: cart[i].productprice,
                        productdis: cart[i].productprice,
                        productcount: parseInt(cart[i].productcount) + 1,
                    }
                } else {
                    var item = {
                        productid: cart[i].productid,
                        productname: cart[i].productname,
                        productimage: cart[i].productimage,
                        productprice: cart[i].productprice,
                        productdis: cart[i].productprice,
                        productcount: cart[i].productcount,
                    }
                    Swal.fire('Out of stock!');
                }
                cart.splice(i, 1);
            }
        }
        localStorage.setItem('qta', JSON.stringify(cart));

        cart.push(item);
        localStorage.setItem('qta', JSON.stringify(cart));
        FetchAll();
    }

    function minusitem(id) {
        var cart = JSON.parse(localStorage.getItem('qta'));
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].productid == id) {
                if (cart[i].productcount > 1) {
                    var item = {
                        productid: cart[i].productid,
                        productname: cart[i].productname,
                        productimage: cart[i].productimage,
                        productprice: cart[i].productprice,
                        productdis: cart[i].productprice,
                        productcount: parseInt(cart[i].productcount) - 1,
                    }
                } else {
                    var item = {
                        productid: cart[i].productid,
                        productname: cart[i].productname,
                        productimage: cart[i].productimage,
                        productprice: cart[i].productprice,
                        productdis: cart[i].productprice,
                        productcount: cart[i].productcount,
                    }
                }
                cart.splice(i, 1);
            }
        }
        localStorage.setItem('qta', JSON.stringify(cart));

        cart.push(item);
        localStorage.setItem('qta', JSON.stringify(cart));
        FetchAll();
    }
</script>
