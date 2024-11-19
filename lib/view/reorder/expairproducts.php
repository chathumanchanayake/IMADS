<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Expired Products</h5>
            </div>
            <siv class="col-6">
                
            </siv>
        </div>
        <hr>
        <div >
        <table class="table table-hover">
            <thead>
                <tr class="table-danger outline-warning">
                    <th scope="row">Pro Id</th>
                    <td>product pic</td>
                    <td>product Name</td>
                    <td>Product price</td>
                    <td>product category</td>
                    <td>Expair Date</td>
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
        $('#edit').hide();
    
        //send an ajax request at loading products
        $.get("../routes/reorder/pro_list.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })
    })
</script>
