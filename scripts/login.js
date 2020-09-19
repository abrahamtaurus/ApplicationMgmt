
$(document).ready(function(){
  $('#btnLogin').on('click', function(){
    console.log("Login Clicked");
    submitDataToServer();
  });
});

function submitDataToServer() {
    var vdata = getFormData();
    console.log(JSON.stringify(vdata));

    $.ajax({
           url: "web-app/security/login/LoginCtl.php",
           dataType: "text",
           type: "post",
           data: { formData: JSON.stringify( vdata ) },
           success: function (response) {
             console.log("Login Success" + response);
             window.location.replace(response);
           },
           error: function(response){
             console.log("Login Error" + JSON.stringify(response));
           }
       });
}

function getFormData(){
  var vjsnLogin = {
    "login":$('#login').val(),
    "pwd": $('#pwd').val()
  }

  return vjsnLogin;
}
