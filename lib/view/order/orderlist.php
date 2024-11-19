<div class="container">
    <card class="card border-shadow py-3 px-3" id="userlist2">
    
    </card>
</div>

<script>
    $(document).ready(function(){
        //send an ajax request at loading employers
        $.get("../routes/order/list.php", function (res) {
        //display data 
        $("#userlist2").html(res);
        })

    })
</script>