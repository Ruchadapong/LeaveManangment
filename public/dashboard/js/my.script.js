$().ready(function () {
    $('#phone').mask("999-999-9999", {
        placeholder: "xxx-xxx-xxxx"
    })

    jQuery.validator.addMethod("accept", function (value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });


    $('#registerUser').validate({

        rules: {
            name: {
                required: true,
                minlength: 2,
                accept: "[a-zA-Z]+",
                remote: "/check-name"
            },
            email: {
                required: true,
                email: true,
                remote: "/check-email"
            },
        },
        messages: {
            name: {
                required: "Please enter your Name",
                minlength: "Your Name must be atleast 2 characters long",
                accept: "Your name must contain only letters",
                remote: "Name already exists!"

            },
            email: {
                required: "Please enter your Email",
                email: "Please enter valid Email",
                remote: "Email already exists!"
            },
            highlight: function (element) {
                $(element).parent().addClass('error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error')
            },

        }
    })
    $('#addStaff').validate({

        rules: {
            name: {
                required: true,
                minlength: 2,
                accept: "[a-zA-Z]+",
                remote: "/check-name"
            },
            email: {
                required: true,
                email: true,
                remote: "/check-email"
            },
        },
        messages: {
            name: {
                required: "Please enter your Name",
                minlength: "Your Name must be atleast 2 characters long",
                accept: "Your name must contain only letters",
                remote: "Name already exists!"

            },
            email: {
                required: "Please enter your Email",
                email: "Please enter valid Email",
                remote: "Email already exists!"
            },
            highlight: function (element) {
                $(element).parent().addClass('error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error')
            },

        }
    })


    // Password Strength Script
    $('#password').passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true,
        eyeImg: "/img/eye.svg"
    });
})
