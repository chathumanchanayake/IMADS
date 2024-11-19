<div class="card border-success">
    <div class="card-body">
        <h5>Add New Customer</h5>
        <hr>
        <form id="registrationForm">
            <div class="form-group py-3">
                <input type="text" name="userName" id="userName" class="form-control" placeholder="Enter Your Name">
                <span id="name_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="Enter Your Email">
                <span id="email_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <input type="password" name="userPwd" id="userPwd" class="form-control" placeholder="Enter Temporary Password">
                <span id="pwd_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <input type="password" name="reuserPwd" id="reuserPwd" class="form-control" placeholder="Re-enter Temporary Password">
                <span id="repwd_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" name="userPhone" id="userPhone" class="form-control" placeholder="Enter Your Phone Number">
                <span id="phone_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" name="userNIC" id="userNIC" class="form-control" placeholder="Enter Your NIC">
                <span id="nic_errorMsg" style="color:red"></span>
            </div>
            <div class="form-group mt-3">
                <button type="button" class="btn btn-success" id="btnSave">Create Your Account</button>
                <input type="reset" value="Clear" class="btn btn-outline-warning">
            </div>
        </form>
    </div>
</div>

<script>
  $(document).ready(function () {

$('#btnSave').click(function (e) {
    e.preventDefault();
    
    // Clear previous error messages
    $('span[id$="_errorMsg"]').html("");

    // Get input values
    var $name = $("#userName").val();
    var $email = $("#userEmail").val();
    var $phone = $("#userPhone").val();
    var $nic = $("#userNIC").val();
    var $pwd = $("#userPwd").val();
    var $repwd = $("#reuserPwd").val();

    // Validation rule
    var isValid = true;

    if ($name.length === 0) {
        $("#name_errorMsg").html("Please Enter Your Name");
        isValid = false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if ($email.length === 0 || !emailPattern.test($email)) {
        $("#email_errorMsg").html("Please Enter a Valid Email Address");
        isValid = false;
    }

    if ($phone.length < 10) {
        $("#phone_errorMsg").html("Incorrect Phone Number");
        isValid = false;
    }

    if ($nic.length < 10) {
        $("#nic_errorMsg").html("Incorrect NIC");
        isValid = false;
    }

    if ($pwd.length === 0) {
        $("#pwd_errorMsg").html("Please Enter Your Password");
        isValid = false;
    }

    if ($repwd.length === 0) {
        $("#repwd_errorMsg").html("Please Retype Your Password");
        isValid = false;
    } else if ($pwd !== $repwd) {
        $("#repwd_errorMsg").html("Password Mismatch");
        isValid = false;
    }

    if (isValid) {
        // Disable the button to prevent multiple submissions
        $('#btnSave').prop('disabled', true);

        // Use AJAX request to send the data
        $.ajax({
            url: "../routes/users/register.php",
            type: "post",
            data: $("#registrationForm").serialize(),
            success: function (res) {
                $('#btnSave').prop('disabled', false); // Re-enable the button

                // Log the response for debugging
                console.log(res);

                // Trim the response to remove any extra whitespace or newline characters
                res = res.trim();

                if (res == "Message has been sent01") {
                    Swal.fire({
                        icon: 'success',
                        text: 'Successfully Registered, Please Check Your Email Account',
                    });
                } else if (res == "Message could not be sent.01") {
                    Swal.fire({
                        icon: 'info',
                        text: 'Something Wrong In Your Email Account',
                    });
                } else if (res == "02") {
                    Swal.fire({
                        icon: 'info',
                        text: 'Please Check the Inputs and Try Again!',
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        text: 'Please Try Again Later!',
                    });
                }
            },
            error: function (xhr, status, error) {
                $('#btnSave').prop('disabled', false); // Re-enable the button

                // Log the error for debugging
                console.error(xhr, status, error);

                Swal.fire({
                    icon: 'error',
                    text: 'An error occurred. Please try again later.',
                });
            }
        });
    }
});
});


</script>
