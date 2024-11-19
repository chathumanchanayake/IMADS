<div class="card border-success">
    <div class="card-body">
        <h5>Add New Employer</h5>
        <hr>
        <form id="addEmployerForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="text" name="empfirstName" id="empfirstName" class="form-control"
                            placeholder="Employer First Name">
                        <span id="firstname_errorMsg" style="color:red"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="text" name="empsecondName" id="empsecondName" class="form-control"
                            placeholder="Employer Second Name">
                        <span id="secondname_errorMsg" style="color:red"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label>Birthday </label>
                <input type="date" class="form-control" id="empBirthday" name="empBirthday" max="2003-12-31">
                <span id="birthday_errorMsg" style="color:red"></span>
            </div>
            <div class="form-check">
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Select Gender</label>
                    </div>
                    <div class="col-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="empGender" value="Male" checked="">
                            Male
                        </label>
                    </div>
                    <div class="col-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="empGender" value="female">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label>Employer Picture </label>
                <input class="form-control mt2" type="file" id="empImg" name="empImg">
                <img src="" alt="" id="imgPrev" height="200" widh="400">
            </div>
            <div class="form-group col-md-5 mt-3">
                <input type="text" name="empNIC" id="empNIC" class="form-control" placeholder="Employer NIC Number">
                <span id="nic_errorMsg" style="color:red"></span>
            </div>
            <h5>Contact Details</h5>
            <div class="form-group mt-3">
                <textarea class="form-control" name="empAddress" id="empAddress" placeholder="Employer Address"
                    rows="3"></textarea>
                <span id="address_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="empPhone" id="empPhone" class="form-control"
                    placeholder="Employer Phone Number">
                <span id="phone_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="empEmail" id="empEmail" class="form-control"
                    placeholder="Employer Email Address">
                <span id="email_errorMsg" style="color:red"></span>
            </div>
            <h5>Job Details</h5>
            <hr>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobTitle" id="empJobTitle">
                    <option value="0">Select Job Position</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Store Keeper">Store Keeper</option>
                    <option value="Delivery Man">Delivery Man</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobType" id="empJobType">
                    <option value="0">Select Job Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobLevel" id="empJobLevel">
                    <option value="0">Select Job Level</option>
                    <option value="Trainee">Trainee</option>
                    <option value="Internship">Internship</option>
                    <option value="Junior">Junior</option>
                    <option value="Senior">Senior</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button id="btnAddEmployer" class="btn btn-success">Add Employer</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Real-time image preview
        $("#empImg").change(function () {
            let fileRead = new FileReader();
            fileRead.onload = function (e) {
                $("#imgPrev").attr('src', e.target.result);
                $("#imgPrev").attr('style', "height:200px;widh:400px");
            }
            fileRead.readAsDataURL(this.files[0]);
        });

        $(document).on('click', '#btnAddEmployer', function (e) {
            e.preventDefault();

            // Clear previous error messages
            $('span[id$="_errorMsg"]').html("");

            // Get input values
            let $fname = $("#empfirstName").val();
            let $sname = $("#empsecondName").val();
            let $bday = $("#empBirthday").val();
            let $gender = $('input[name="empGender"]:checked').val();
            let $nic = $("#empNIC").val();
            let $address = $("#empAddress").val();
            let $phone = $("#empPhone").val();
            let $email = $("#empEmail").val();

            // Validation rule
            let isValid = true;

            if ($fname.length === 0) {
                $("#firstname_errorMsg").html("Please Enter Your First Name");
                isValid = false;
            }

            if ($sname.length === 0) {
                $("#secondname_errorMsg").html("Please Enter Your Second Name");
                isValid = false;
            }

            if ($bday.length === 0) {
                $("#birthday_errorMsg").html("Please Enter Your Birthdate");
                isValid = false;
            }

            if ($nic.length < 10) {
                $("#nic_errorMsg").html("Incorrect NIC");
                isValid = false;
            }

            if ($address.length === 0) {
                $("#address_errorMsg").html("Please Enter Your Address");
                isValid = false;
            }

            if ($phone.length < 10) {
                $("#phone_errorMsg").html("Incorrect Phone Number");
                isValid = false;
            }

            if ($email.length === 0) {
                $("#email_errorMsg").html("Please Enter Your Email");
                isValid = false;
            }

            if (isValid) {
                // Disable the button to prevent multiple submissions
                $('#btnAddEmployer').prop('disabled', true);
                let form = $("#addEmployerForm")[0];
                let formData = new FormData(form);

                $.ajax({
                    url: "../routes/emp/addEmployer.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Employer registered successfully. Please check the entered email.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // Re-enable the button after request completes
                        $('#btnAddEmployer').prop('disabled', false);
                    },
                    error: function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'An error occurred. Please try again later.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // Re-enable the button after request completes
                        $('#btnAddEmployer').prop('disabled', false);
                    }
                });
            }
        });
    });
</script>
