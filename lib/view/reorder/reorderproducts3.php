<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-9">
                <h5>Upload E-Book</h5>
            </div>
            <siv class="col-3">
            <button class="btn btn-success" id="01" onclick="addnew()">Add New E-Book</button>
            <button class="btn btn-secondary" id="02" onclick="backlist()">Back E-Book List</button>
            </siv>
        </div>
        <hr>
        <div class="card border-danger py-4 px-4" id="form">
        <form id="addProductForm"  enctype="multipart/form-data">
            <div class="col-12">
            <div class="form-group mt-2">
                <label>Book</label>
                <select class="form-select" name="id" id="id">
                    
                    </select> </div>
            <div class="form-group mt-2">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Book Name">
            </div>
            <div class="form-group mt-2">
                <label>file</label>
                <input class="form-control mt2" type="file" id="productImg" name="productImg">
            </div>
                        <div class="form-group my-2">
                            <button class="btn btn-success" id="btnAddProduct">Add</button>
                        </div>
            </div>
            </form>
        </div>
        <div id="table">
        <table class="table table-hover">
            <thead>
                <tr class="table-danger outline-primary">
                    <th scope="row">Id</th>
                    <td>Name</td>
                    <td>view</td>
                    <td>action</td>
                </tr>
            </thead>
            <tbody id="pro_list">
                
            </tbody>
        </table>
    </div>  
    </div>
</div>
<script>

$(document).on('click', '#btnAddProduct', function(e) {
    e.preventDefault();
    
    // Disable the button to prevent duplicate requests
    $(this).prop('disabled', true);

    var form = $("#addProductForm")[0];
    var formData = new FormData(form);

    $.ajax({
        url: "../routes/ebook/add.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            swal.fire(data);
            $('#form').hide();
            $('#02').hide();
            $('#table').show();
            $('#01').show();
            
            // Send an AJAX request to load products
            $.get("../routes/ebook/pro_list4.php", function(res) {
                // Display data 
                $("#pro_list").html(res);
            });

            // Re-enable the button after the request completes
            $('#btnAddProduct').prop('disabled', false);
        },
        error: function(data) {
            swal.fire(data);

            // Re-enable the button in case of an error
            $('#btnAddProduct').prop('disabled', false);
        }
    });
});


    $(document).ready(function(){
        $('#form').hide();
        $('#02').hide();
        //send an ajax request at loading products
        $.get("../routes/ebook/pro_list4.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        $.get("../routes/ebook/pro_list3.php", function (res) {
        //display data 
        $("#id").html(res);
        })

    });

     function backlist(){
        $('#form').hide();
        $('#table').show();
        $('#01').show();
        $('#02').hide();
     };

     function addnew(){
        $('#form').show();
        $('#table').hide();
        $('#01').hide();
        $('#02').show();
     };

     function deleteE(oid){
        Swal.fire({
            title: 'Are you sure?',
            text: "Do You want to delete this E-book permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete the E-book!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("../routes/ebook/delete.php", {
                    uid: oid
                }, function (res) {
                    if (res = "ok") {
                        Swal.fire(
                            'Successful!',
                            ' E-book Deleted.',
                            'success'
                        )
                        
                         //send an ajax request at loading products
                    $.get("../routes/ebook/pro_list4.php", function (res) {
                    //display data 
                    $("#pro_list").html(res);
                    })
                     
                    } else {
                        Swal.fire(
                            'Something Wrong',
                            'Could not delete the E-book.',
                            'error')
                    }
                })
            }
        });
    };

</script>