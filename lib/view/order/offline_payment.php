<div class="card border-warning">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>View all Offline Payments</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_product" placeholder="Search Order">
            </siv>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr class="table-warning">
                    <th scope="row">Order Id</th>
                    <td>User Id</td>
                    <td>Date</td>
                    <td>Price</td>
                    <td>Payment</td>
                    <td>Delete</td>
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
        $.get("../routes/order/offlinepay.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_product").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/order/offlinepayserch.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })

        
    })

   
    function deleteorder(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/order/delete_order.php",{
                oid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            $.get("../routes/order/offlinepay.php", function (res) {
                //display data 
                $("#pro_list").html(res);
                })
                }
                else{
                    Swal.fire(
                    'Something Wrong',
                    'Could not delete the order.',
                    'error')
                }
            })
        }
        });
     }

     
    function offlinepay(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to Undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Pay!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/order/pay_offline.php",{
                oid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Payed!',
            'Your Order payment has been Done.',
            'success'
            )
            $.get("../routes/order/offlinepay.php", function (res) {
                //display data 
                $("#pro_list").html(res);
                })
                }
                else{
                    Swal.fire(
                    'Something Wrong',
                    'Could not pay.',
                    'error')
                }
            })
        }
        });
     }
    
</script>
