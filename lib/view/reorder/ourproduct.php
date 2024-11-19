<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Products Supply by our company</h5>
            </div>
            
        </div>
        <hr>
       
        <div id="list">
        <table class="table table-hover">
            <thead>
                <tr class="table-success outline-primary">
                    <th scope="row">Pro Id</th>
                    <td>product pic</td>
                    <td>product Name</td>
                    <td>Product price</td>
                    <td>product Quantity</td>
                    <td>Reprder Level</td>
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
    $uid = $("#input_user_id").val();

    // alert($uid);

        $.get("../routes/products/pro_list1.php", {
            uid: $uid
            }, function (res) {
                $("#pro_list").html(res);
            })
        
    })
</script>
