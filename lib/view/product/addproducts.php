<div class="card border-success">
    <div class="card-body">
        <h5>Add New Product</h5>
        <hr>
        <form id="addProductForm"  enctype="multipart/form-data">
            <div class="form-group mt-2">
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group mt-2" rows="3">
                <textarea class="form-control" name="productDetails" id="productDetails"
                    placeholder="Description About Product/Book Author" rows="3"></textarea>
            </div>
            <div class="form-group mt-2">
                <select class="form-select" name="productCategory" id="productCategory" placeholder="Add Picture">
                    <option value="0">Select Category</option>
                    <option value="Reading books-Novels">Reading books-Novels</option>
                    <option value="Reading books-Translations">Reading books-Translations</option>
                    <option value="Reading books-Educational books">Reading books-Educational books</option>
                    <option value="Reading books-Religious books">Reading books-Religious books</option>
                    <option value="Reading books-Children books">Reading books-Children books</option>
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
            <div class="form-group mt-2">
                <input class="form-control mt2" type="file" id="productImg" name="productImg">
                <img src="" alt="" id="imgPrev" height="200" widh="400">
            </div>
            <div class="form-group col-md-6 mt-2">
                <input type="text" name="productPrice" id="productPrice" class="form-control"
                    placeholder="Selling Price LKR">
            </div>
            <div class="form-group col-md-6 mt-2">
                <input type="text" name="productPPrice" id="productPPrice" class="form-control"
                    placeholder="Purchasing Price LKR">
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="productQuantity" id="productQuantity" class="form-control"
                    placeholder="Quantity">
            </div>
            <h5>Add Supplier details</h5>
            <hr>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="suppliyerName" id="suppliyerName" placeholder="Add Picture">
                    
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <input type="Nuumber" name="reorderlevel" id="reorderlevel" class="form-control"
                    placeholder="Re-Order Level">
            </div>
            <div class="form-group col-md-6 mt-2">
            <input type="date" class="form-control" id="expairdate" name="expairdate" placeholder="expair Date">
            </div>
            <h5>Add stock details</h5>
            <hr>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="productSection" id="productSection" placeholder="Add Picture">
                    <option value="0">Select Section</option>
                    <option value="01">Section 1</option>
                    <option value="02">Section 2</option>
                    <option value="03">Section 3</option>
                    <option value="04">Section 4</option>
                    <option value="05">Section 5</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="productRow" id="productRow" placeholder="Add Picture">
                    <option value="0">Select Row</option>
                    <option value="01">Row 01</option>
                    <option value="02">Row 02</option>
                    <option value="03">Row 03</option>
                    <option value="04">Row 04</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="productColume" id="productColume" placeholder="Add Picture">
                    <option value="0">Select Column</option>
                    <option value="01">Colume 01</option>
                    <option value="02">Colume 02</option>
                    <option value="03">Colume 03</option>
                    <option value="04">Colume 04</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="productLevel" id="productLevel" placeholder="Add Picture">
                    <option value="0">Select Level</option>
                    <option value="01">Level 01</option>
                    <option value="02">Level 02</option>
                    <option value="03">Level 03</option>
                    <option value="04">Level 04</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <input type="text" name="productQuantityWH" id="productQuantityWH" class="form-control"
                    placeholder="How many items in Warehouse">
            </div>
            <div class="form-group mt-2">
                <button id="btnAddProduct" class="btn btn-success">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script>

       

    //load suppliers
    $.get("../routes/sup/getsuplist.php", {
    
    }, function (res1) {
    $("#suppliyerName").html(res1);
    })
    // sample image privive 
    $("#productImg").change(function(){
        var fileRead = new FileReader();
        fileRead.onload = function(e){
            $("#imgPrev").attr('src',e.target.result);
            $("#imgPrev").attr('style',"height:200px;widh:400px");
        }
        fileRead.readAsDataURL(this.files[0]);
    })

    // data submition
    $(document).on('click','#btnAddProduct',function(e){
        e.preventDefault();

        if ($("#productName").val() == 0 || $("productDetails").val() == 0 || 
        $("#productCategory").val() == 0 || $("#productImg").val() == 0 ||
        $("#productPrice").val() == 0 || $("#productPPrice").val() == 0 ||
        $("#productQuantity").val() == 0 || $("#suppliyerName").val() == 0 ) {    
        
    Swal.fire(
                'Something Wrong',
                'Please fill the required fields.',
                'error');}

                
            if( $("#productPrice").val() <  $("#productPPrice").val()){

                Swal.fire(
                'Something Wrong',
                'The product selling price must not be less than product purchasing price.',
                'error');

            }
                else{

         // Disable the button to prevent multiple submissions
         $('#btnAddProduct').prop('disabled', true);
        var form = $("#addProductForm")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/products/addproduct.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                swal.fire(data);
            },
            error: function (data) {
                swal.fire(data);
            }
            
        });
    }
    });

</script>
