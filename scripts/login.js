$(document).ready(function(){
  $('#btnLogin').on('click', function(){
    submitDataToServer();
  });
});

function submitDataToServer() {
    var vdata = getFormData();
    //console.log(JSON.stringify(vdata));

    // $.ajax({
    //        type: "post",
    //        url: "security/login/LoginCtl.php",
    //        dataType: "json",
    //        contentType: 'application/json',
    //        data: vdata,
    //        success: function (response) {
    //          console.console.log("Login Success");
    //        },
    //        error: function(response){
    //          console.log("Login Error" + JSON.stringify(response));
    //        }
    //    });
}

function getFormData(){
  var vjsnLogin = new Object();

  vjsnLogin.login = $('#login').val();
  vjsnLogin.pwd = $('#pwd').val();

  return vjsnLogin;
}
