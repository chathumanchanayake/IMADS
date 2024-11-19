<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Add New Product Stock</h5>
            </div>
            <siv class="col-6">
            <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_product" placeholder="Search product">
            </siv>
        </div>
        <hr>
        <div class="card border-danger py-4 px-4" id="form">
        <div class="col-6">
                <h6>New Stock Submit Form</h6>
            </div>
            <siv class="col-8">
            <div class="form-group mt-2">
                <label>Supplier</label>
                <input type="hidden" readonly name="supnameid" id="supnameid" class="form-control" placeholder="Product Name">
                <input type="text" readonly name="supname" id="supname" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group mt-2">
                <label>Product</label>
                <input type="hidden" readonly name="productNameid" id="productNameid" class="form-control" placeholder="Product Name">
                <input type="text" readonly name="productName" id="productName" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group mt-2">
                <label>Quantity</label>
                <input type="number" name="Quantity" id="Quantity" class="form-control" placeholder="Quantity">
            </div>
            <div class="form-group mt-2">
                <label>Reorder Level</label>
                <input type="number" name="rele" id="rele" class="form-control" placeholder="Quantity">
            </div>
            <div class="form-group mt-2">
                <label>Expiry Date</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="Quantity">
            </div>
                        <div class="form-group my-2">
                            <button class="btn btn-success" onclick="reorderthis()">Reorder Product</button>

                            <button class="btn btn-secondary" onclick="backlist()">Product List</button>
                        </div>
            </siv>
        </div>
        <div id="table">
        <table class="table table-hover">
            <thead>
                <tr class="table-info outline-primary">
                    <th scope="row">Pro Id</th>
                    <td>product pic</td>
                    <td>product Name</td>
                    <td>Product price</td>
                    <td>product Qty</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="pro_list">
                
            </tbody>
        </table>
    </div>  
    </div>
</div>
<script>
    $(document).ready(function(){
        //hide edit part
        $('#form').hide();
    
        //send an ajax request at loading products
        $.get("../routes/reorder/pro_list3.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_product").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/reorder/prosearch1.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })
    })

    function reorder(sid, pid, pn, sn){
         $supid = sid;
         $proid = pid;
         $product = pn;
         $supplier = sn;

        $('#form').show();
        $('#table').hide();

        $("#supnameid").val($supid);
       $("#productNameid").val($proid);
       $("#supname").val($supplier);
       $("#productName").val($product);
        
     }

     function backlist(){
        $('#form').hide();
        $('#table').show();
     }

     function reorderthis(){

        if ($("#productNameid").val() == 0 || $("#supnameid").val() == 0 || 
        $("#Quantity").val() == 0 || $("#rele").val() == 0 ) {
        Swal.fire(
            'Something Wrong',
            'Please fill the required fields!',
            'error');
        } else {

            $pid =  $("#productNameid").val();
            $supid = $("#supnameid").val();
            $qty = $("#Quantity").val();
            $rel = $("#rele").val();
            $da = $("#date").val();

                    
        Swal.fire({
        title: 'Are you sure?',
        text: "Do You want to Add this Stock!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Request it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/reorder/addstock.php",{
                sid: $supid,
                pid: $pid,
                qty: $qty,
                rel: $rel,
                da: $da

            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Request Done.',
            'success'
            )
            $('#form').hide();
            $('#table').show();
            $("#supnameid").val("");
            $("#productNameid").val("");
            $("#supname").val("");
            $("#productName").val("");
            $("#Quantity").val("");
            $("#rele").val("");
            $("#date").val("");

            //send an ajax request at loading products
        $.get("../routes/reorder/pro_list3.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })
            }
                else{
                    Swal.fire(
                    'Something Wrong',
                    'Could not add new stock.',
                    'error')

                    $('#form').hide();
                    $('#table').show();
                }
               
        })
        }
        
        });
    }
    }
</script>