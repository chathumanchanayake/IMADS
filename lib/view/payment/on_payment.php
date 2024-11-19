<div class="card py-4 px-4" sytle="border-radius:20px;">
    <h4>Add Your Card Details</h4>
    <img src="../upload/ui/paymentLogo.png" style="height:40px; width:300px; margin-left: auto;
  margin-right: auto;">
    <div class="form-group px-5">
      <label class="form-label mt-2 ">Card Number</label>
      <input type="card_Number" class="form-control" id="card_Number" name="card_Number" placeholder="1234 5678 9012 3456">
      <span id="cardnumber_errorMsg" style="color:red"></span>
    </div>
    <div class="form-group px-5">
      <label class="form-label mt-2 ">Name On Card</label>
      <input type="card_Name" class="form-control" id="card_Name" name="card_Name" placeholder="Ex  Jone Smith">
      <span id="cardname_errorMsg" style="color:red"></span>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group px-5">
                <label class="form-label mt-2 ">Expiry date</label>
                <input type="card_Ed" class="form-control" id="card_Exd" name="card_Exd" placeholder="01/23">
                <span id="expdate_errorMsg" style="color:red"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group px-5">
                <label class="form-label mt-2 ">Security code</label>
                <input type="password" class="form-control" id="card_key" name="card_Key" placeholder="***">
                <span id="scode_errorMsg" style="color:red"></span>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function(){
    let input1 = document.querySelector("#card_Number");
    let input2 = document.querySelector("#card_Name");
    let input3 = document.querySelector("#card_Exd");
    let input4 = document.querySelector("#card_key");
   
    
    input1.addEventListener("change", stateHandle);
    input2.addEventListener("change", stateHandle);
    input3.addEventListener("change", stateHandle);
    input4.addEventListener("change", stateHandle);
    

    function stateHandle() {
      if (document.querySelector("#card_Number").value.length != 16 ||
          document.querySelector("#card_Name").value.length < 6 ||
          document.querySelector("#card_Exd").value.length < 5 ||
          document.querySelector("#card_key").value.length != 3
          ) {
        $("#next2").attr('class', "btn btn-success disabled");
      } else {
        $("#next2").attr('class', "btn btn-success");
      }}
////////////////////////////////////////////////////////////////////////////////////////////
    // function stateHandle() {
    // let cardNumber = input1.value;
    // let cardName = input2.value;
    // let cardExd = input3.value;
    

    // // Reset error messages
    // $("#card_Number_errorMsg").html("");
    // $("#card_Name_errorMsg").html("");
    // $("#card_Exd_errorMsg").html("");

    // // Validate card number
    // if (cardNumber === "" || cardNumber.length < 12) {
    //   $("#next2").attr('class', "btn btn-success disabled");
    //   if ($cardNumber === "") {
    //     $("#cardnumber_errorMsg").html("Please enter a Card Number");
    //   } else if (cardNumber.length < 12) {
    //     $("#cardnumber_errorMsg").html("Incorrect Card Number");
    //   }
      
    // }

    // // Validate card name
    // if (cardName === "" || cardName.length < 10) {
    //   $("#next2").attr('class', "btn btn-success disabled");
    //   if (cardName === "") {
    //     $("#cardname_errorMsg").html("Please enter a Card Name");
    //   } else if (cardName.length < 10) {
    //     $("#cardname_errorMsg").html("Incorrect Card Name");
    //   }
    //   isValid = false;
    // }

    // // Validate card expiration date
    // if (cardExd === "" || cardExd.length < 5) {
    //   $("#next2").attr('class', "btn btn-success disabled");
    //   if (cardExd === "") {
    //     $("#expdate_errorMsg").html("Please enter a Expiry Date");
    //   } else if (cardExd.length < 5) {
    //     $("#expdate_errorMsg").html("Incorrect Card Expiry Date");
    //   }
    //   isValid = false;
    // }}

    // $(document).on('click','#next2',function(e){
    //     e.preventDefault();

    // //get the first name input value
    // $cardNumber = $("card_Number").val();
    // //get the first name input value
    // $cardName = $("card_Name").val();
    // //get the first name input value
    // $expDate = $("#card_Exd").val();
    // //get the first name input value
    // $scode = $("card_key").val();
    
    // //validation rule
    // if ($cardNumber.length < 16 || $cardName.length == "" || 
    // $expDate.length < 5 || $scode.length < 3  ) {

    //     if ($cardNumber.length < 16) {
    //         $("#cardnumber_errorMsg").html("Please Enter Your Card Number");
    //     }

    //     if ($cardName.length == "") {
    //         $("#cardname_errorMsg").html("Please Enter Your Card Name");
    //     }

    //     if ($expDate.length < 5) {
    //         $("#expdate_errorMsg").html("Incorrect Expiry Date");
    //     }

    //     if ($scode.length < 3) {
    //         $("scode_errorMsg").html("Incorrect Security code");
    //     }

    //     if ($address.length == "") {
    //         $("#address_errorMsg").html("Please Enter Your Address");
    //     }

    //     } });
      });
   
</script>