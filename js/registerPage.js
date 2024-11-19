$(document).ready(function () {
    $('#btnSave').click(function (e) {
        e.preventDefault();

        var name = $("#userName").val();
        var email = $("#userEmail").val();
        var phone = $("#userPhone").val();
        var nic = $("#userNIC").val();
        var pwd = $("#userPwd").val();
        var repwd = $("#reuserPwd").val();

        if (name.length === "" || email.length === "" || pwd.length === "" || repwd.length === "" || phone.length < 10 || nic.length < 10) {
            if (name.length === "") {
                $("#userName").attr('value', "Please Enter Your Name");
                $("#userName").attr('class', "form-control is-invalid");
            }

            if (email.length === "") {
                $("#userEmail").attr('value', "Please Enter Your Email");
                $("#userEmail").attr('class', "form-control is-invalid");
            }

            if (nic.length < 10) {
                $("#userNIC").attr('value', "Please Enter valid NIC Number");
                $("#userNIC").attr('class', "form-control is-invalid");
            }

            if (phone.length < 10) {
                $("#userPhone").attr('value', "Please Enter valid Phone Number");
                $("#userPhone").attr('class', "form-control is-invalid");
            }

            if (pwd.length === "") {
                $("#pwd_errorMsg").html("Please Re-type Your Password");
                $("#userPwd").attr('class', "form-control is-invalid");
            }

            if (pwd.length < 5) {
                $("#pwd_errorMsg").html("Password must be up to 5 characters");
                $("#userPwd").attr('class', "form-control is-invalid");
            }

            if (repwd.length === "") {
                $("#repwd_errorMsg").html("Please Re-type Your Password");
                $("#reuserPwd").attr('class', "form-control is-invalid");
            }
        } else {
            if (pwd === repwd) {
                $.ajax({
                    url: "../routes/users/register.php",
                    type: "post",
                    data: $("#registrationForm").serialize(),
                    success: function (res) {
                        // Re-enable the button
                        $('#btnSave').prop('disabled', false);

                        // Log the response for debugging
                        console.log("Raw response: ", res);
                        console.log("Trimmed response: ", res.trim());

                        // Trim the response to remove any extra whitespace or newline characters
                        res = res.trim();

                        console.log("Response from server after trim: ", res);
                        if (res === "Message has been sent01") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Successfully Registered, Please Check Your Email Account',
                            });
                        } else if (res === "Message could not be sent.01") {
                            Swal.fire({
                                icon: 'info',
                                text: 'Something Wrong In Your Email Account',
                            });
                        } else if (res === "02") {
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Check the inputs and try again!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Try again later!',
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("Error: ", status, error);
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occurred while processing your request. Please try again later.',
                        });
                    }
                });
            } else {
                $("#repwd_errorMsg").html("Password mismatch");
            }
        }
    });
});
