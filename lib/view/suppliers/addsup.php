<div class="card border-success">
    <div class="card-body">
        <h5>Add New Suppliers</h5>
        <hr>
        <form id="addEmployerForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-2">
                        <input type="text" name="Name" id="Name" class="form-control"
                            placeholder="Company Name">
                    </div>
                </div>
            </div>
            <div class="form-group col-md-5 mt-3">
                <input type="text" name="br" id="br" class="form-control" placeholder="BR Number">
            </div>
            <h5>Contact Details</h5>
            <div class="form-group mt-3">
                <textarea class="form-control" name="empAddress" id="empAddress" placeholder="Company Address"
                    rows="3"></textarea>
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="Phone" id="Phone" class="form-control"
                    placeholder="Company Phone Number">
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="Email" id="Email" class="form-control"
                    placeholder="Company Email Address">
            </div>
            <h5>Other Details</h5>
            <hr>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="Type" id="Type">
                    <option value="0">Select Company Type</option>
                    <option value="Local">Local</option>
                    <option value="Forin">Foreign</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="service" id="service">
                    <option value="0">Select Service</option>
                    <option value="Products">Products</option>
                    <option value="Service">Service</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button id="btnAddEmployer" class="btn btn-success">Add Supplier</button>
            </div>
        </form>
    </div>
</div>

<script>
  
    $(document).on('click','#btnAddEmployer',function(e){
        e.preventDefault();

        if ($("#Name").val() == 0 || $("#br").val() == 0 || 
        $("#empAddress").val() == 0 || $("Phone").val() == 0 ||
        $("#Email").val() == 0 || $("Type").val() == 0 ) {
        Swal.fire(
            'Something Wrong',
            'Please fill the required fields!',
            'error');
        } else {
            
            // Disable the button to prevent multiple submissions
        $('#btnAddEmployer').prop('disabled', true);
        var form = $("#addEmployerForm")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/sup/addEmployer.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                // alert(data);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Supplier registerd Successfully, please refer Entered Email',
                    showConfirmButton: false,
                    timer: 1500
                    })
            },
            error: function (data) {
                alert(data);
            }
            
        });
    }
    });

</script>