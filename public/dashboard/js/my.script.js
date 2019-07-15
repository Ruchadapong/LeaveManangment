$(document).ready(function () {

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

    $(document).on('click', '.deleteData', function (e) {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = deleteFunction + "/" + id;
            }
        })


    });
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });

    $('[data-tooltip="tooltip"]').tooltip();

    $('.modal').appendTo("body").modal('hide');



});

