<div class="card border-warning">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Order Confirmation</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_product" placeholder="Search Order">
            </siv>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr class="table-info">
                    <th scope="row">Order Id</th>
                    <td>User Id</td>
                    <td>Date</td>
                    <td>Price</td>
                    <td>Payment</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="pro_list"  style="border: 1px solid;">
                
            </tbody>
        </table>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        //send an ajax request at loading products
        $.get("../routes/order/order_confrm.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_product").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/order/order_confrm_serch.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })

        
    })

   
    function conferm(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/order/conferm.php",{
                oid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'confirmed!',
            'Your Order has been Confirmed.',
            'success'
            )
            $.get("../routes/order/order_confrm.php", function (res) {
                //display data 
                $("#pro_list").html(res);
                })
                }
                else{
                    Swal.fire(
                    'Something Wrong',
                    'Could not confirm the order.',
                    'error')
                }
            })
        }
        });
     }


     
    function declare(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, decline!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/order/order_declare.php",{
                oid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'declared!',
            'Your Order has been Canceled.',
            'success'
            )
                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Could not decline the order.',
                    'error')
                }
            })
        }
        });
     }
    
</script>
