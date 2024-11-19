<div class="card border-success">
    <div class="card-body">
        <h5>Change Password</h5>
        <hr>
        <form id="changepwdform">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Current Password" required>
                        <input type="hidden" name="uid" id="uid" class="form-control">
                        <span id="oldpassword_errorMsg" style="color:red"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" required>
                        <span id="newpassword_errorMsg" style="color:red"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <button id="btnChangepwd" type="button" class="btn btn-success">Change Password</button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#uid').val($('#input_user_id').val());

    $('#btnChangepwd').click(function (e) {
        e.preventDefault();

        const empemail = $('#uid').val();
        const oldpassword = $('#oldpassword').val();
        const newpassword = $('#newpassword').val();

        if (oldpassword === '' || newpassword === '') {
            Swal.fire('Error', 'All fields are required.', 'error');
            return;
        }

        $.ajax({
            url: '../routes/password/changepwd.php',
            type: 'POST',
            data: {
                empemail: empemail,
                oldpassword: oldpassword,
                newpassword: newpassword
            },
            success: function (res) {
                console.log(res); // Log the response for debugging
                res = res.trim(); // Trim the response to remove any extra whitespace or newline characters

                if (res === "ok") {
                    Swal.fire({
                        title: 'Successful!',
                        text: 'Password has been changed. You will be logged out.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href ='login.php'; // Redirect to the login page
                    });
                } else if (res === 'no') {
                    Swal.fire('Error', 'Current password is incorrect.', 'error');
                } else {
                    Swal.fire('Error', 'Could not change the password.', 'error');
                }
            }
        });
    });
});
</script>
