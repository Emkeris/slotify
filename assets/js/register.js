$(document).ready(function() {
    $("#hideLogin").on("click", function() {
        $("#logInContainer").hide();
        $("#registerContainer").show();
    });
    $("#hideRegister").on("click", function() {
        $("#logInContainer").show();
        $("#registerContainer").hide();
    });
});