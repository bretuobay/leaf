var FrontInteractive = (function() {


    var FRONTURLS = {
        "register" : "index.php/users/register",
        "login" : "index.php/users/login"
    };

    return {


        registerUser: function() {

            var data = {
                "email": $("#email").val(),
                "password": $("#password").val(),
                "confirm_password": $("#confirm-password").val()
            };

            if (!data.email || !data.password) {
                alert('No empty fields allowed');
                return;
            } else {

                $.ajax({
                    type: 'POST',
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    url: FRONTURLS.register,
                    error: function(data) {
                        console.log(data)
                    },
                    data: data,
                    success: function(data) {
                        if (data.success) {
                            $("#register").hide();
                            $("#login").show();
                        } else {

                            alert('Registration failed!')
                        }
                    },
                    dataType: "json"
                });

            }

        },

        loginUser: function() {

            var data = {
                "email": $('#lemail').val(),
                "password": $('#lpassword').val()
            };

            if (!data.email || !data.password) {
                alert('All fields should be filled');
                return
            }

            $.ajax({
                type: 'POST',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processDataBoolean: false,
                url: FRONTURLS.login,
                error: function(data) {
                    console.log(data)
                },
                data: data,
                success: function(data) {

                    if (data.success) {
                        window.location.replace('dashboard.php');
                    } else {
                        alert('authentication failed')
                    }
                },
                dataType: "json"
            });

        }


    }; // return

})();




$(document).ready(function() {

    $("#login").show();

    $("#register_link").click(function() {

        $("#register").show();
        $("#login").hide();

    });

    $("#login_link").click(function() {
        $("#register").hide();
        $("#login").show();

    });


    $("#register-button").click(function() {
        //event.preventDefault();
        FrontInteractive.registerUser();

    });

    $("#login-button").click(function(event) {
        event.preventDefault();
        FrontInteractive.loginUser();

    });


});
