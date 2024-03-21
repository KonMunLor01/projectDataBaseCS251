function toggleSellerFields() {
    var roleSelect = document.getElementById("role");
    var sellerFields = document.getElementsByClassName("seller-fields")[0];

    if (roleSelect.value === "seller") {
      sellerFields.style.display = "block";
    } else {
      sellerFields.style.display = "none";
    }
  }
  var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
    }
  }