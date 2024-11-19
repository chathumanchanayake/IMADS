<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Edit Suppliers data</h5>
            </div>
            <div class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_emp"
                    placeholder="Search supplier">
            </div>
        </div>
        <hr>
        <div id="list">
            <table class="table table-hover">
                <thead>
                    <tr class="table-success">
                        <th scope="row">Supplier Id</th>
                        <td>Company Name</td>
                        <td>BR No</td>
                        <td>Type</td>
                        <td>Service</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody id="emp_list">

                </tbody>
            </table>
        </div>
        <div id="edit">
        <div class="row">
                <div class="col">
                    <div class="form-group mt-2">
                    <input type="hidden" name="Id" id="Id" class="form-control"
                           >
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
                    <option value="Forin">Forin</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="service" id="service">
                    <option value="0">Select Service</option>
                    <option value="Products">Products</option>
                    <option value="Service">Service</option>
                </select>
            </div>
            <div class="form-group my-2">
                <button class="btn btn-success" onclick="edit()">Edit Data</button>

                <button class="btn btn-secondary" onclick="backlist()">Supplier List</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    

        $('#edit').hide();

   

        //send an ajax request at loading employers
        $.get("../routes/sup/emp_list.php", function (res) {
            //display data 
            $("#emp_list").html(res);
        })

        //search emp 
        $("#search_emp").on('input', function () {
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/sup/empsearch.php", {
                searchData: $inputData
            }, function (res) {
                $("#emp_list").html(res);
            })
        })
    })

    function deleteemp(oid) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do You want to delete this supplier permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("../routes/sup/delete_emp.php", {
                    uid: oid
                }, function (res) {
                    if (res = "ok") {
                        Swal.fire(
                            'Successful!',
                            'Your Deleted User Account.',
                            'success'
                        )
                        $.get("../routes/sup/emp_list.php", function (res) {
                            //display data 
                            $("#emp_list").html(res);
                        })
                    } else if (res = "no") {
                        Swal.fire(
                            'Something Wrong',
                            'You can not delete Loged User Account.',
                            'error')
                    } else {
                        Swal.fire(
                            'Somethin Wrong',
                            'Can not delete user.',
                            'error')
                    }
                })
            }
        });
    }

    function backlist() {
        $('#list').show();
        $('#edit').hide();
    }

    function editemp(uid) {
        $userid = uid;

        $('#list').hide();
        $('#edit').show();

        $.get("../routes/sup/getuserdata.php", {
            uid: uid
        }, function (res) {
            var jdata = jQuery.parseJSON(res);
            $("#Id").val(jdata.sup_Id);
            $("#Name").val(jdata.sup_Name);
            $("#br").val(jdata.sup_br);
            $("#empAddress").val(jdata.emp_Address);
            $("#Phone").val(jdata.phone);
            $("#Email").val(jdata.email);
            $("#Type").val(jdata.type);
            $("#service").val(jdata.service);

        })
    }



    function edit() {
        $uid = $("#Id").val();
        $name = $("#Name").val();
        $phone = $("#Phone").val();
        $email = $("#Email").val();
        $br = $("#br").val();
        $address = $("#empAddress").val();
        $type = $("#Type").val();
        $service = $("#service").val();

        Swal.fire({
            title: 'Are you sure?',
            text: "Do You want to edit this Supplier details!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Edit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("../routes/sup/editdata.php", {
                    id: $uid,
                    un: $name,
                    ph: $phone,
                    em: $email,
                    nic: $br,
                    ti: $address,
                    ty: $type,
                    le: $service
                }, function (res) {
                    if (res = "ok") {
                        Swal.fire(
                            'Successful!',
                            'Your Edit Done.',
                            'success'
                        )
                        $('#list').show();
                        $('#edit').hide();

                        //send an ajax request at loading employers
                        $.get("../routes/sup/emp_list.php", function (res) {
                            //display data 
                            $("#emp_list").html(res);
                        })
                    } else {
                        Swal.fire(
                            'Something Wrong',
                            'Could not edit data.',
                            'error')
                        $('#list').show();
                        $('#edit').hide();
                    }

                })
            }
        });
    }
</script>