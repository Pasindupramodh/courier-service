// function fun() {
//     alert("login");
// }
// $('#login').on('click',function(event){
//     alert("fun dun")
// })
$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            document.getElementById("loginForm").submit();
            // document.getElementById('login').click();
        }
    });
    $('#loginForm').validate({
        rules: {
            uname: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 8,
            },
        },
        messages: {
            uname: {
                required: "Enter your Username",
                minlength: "At least 5 characters "
            },
            password: {
                required: "Enter your password",
                minlength: "At least 8 characters"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});


$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            document.getElementById("form-register").submit();
        }
    });
    $('#form-register').validate({
        rules: {
            uname: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 8,
            },
            email: {
                required: true,
                email: true,
            },
            mobile: {
                required: true,
                minlength: 10,
            },
            com_name: {
                required: true,
            },
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            nic: {
                required: true,
            },
            address_1: {
                required: true,
            },
            address_2: {
                required: true,
            },
            acc_name: {
                required: true,
            },
            acc_number: {
                required: true,
            }


        },
        messages: {
            newUName: {
                required: "Enter a Username.",
                minlength: "At least 5 characters."
            },
            cPassword: {
                required: "Enter a password.",
                minlength: "At least 8 characters."
            },
            email: {
                required: "Enter a Email",
            },
            mobile: {
                required: "Enter a Mobile number",
                minlength: "Invalid Number",
            },
            com_name: {
                required: "Company name required",
            },
            fname: {
                required: "First name required",
            },
            lname: {
                required: "Last name required",
            },
            nic: {
                required: "NIC required",
            },
            address_1: {
                required: "Address line 1 required",
            },
            address_2: {
                required: "Address line 2 required",
            },
            acc_name: {
                required: "Account name required",
            },
            acc_number: {
                required: "Account number required",
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
$('#bank').on('change', function () {
    $('#bank_branch').children().remove();
    
    $.ajax({
        url: './private/includes/bankbranch.php',
        type: 'POST',
        data: {bank:$('#bank').val()},
        dataType: 'JSON',   // tell it to expect a JSON reply
                            // and will convert the reply to an js object
                            
        success: function(response){
            if ( response.status == 0){
                // error
                alert(response.status_msg);
            } else {
                $("#bank_branch")
                    .append( response ) 
                    
                //  $("#invoice_customer_name").trigger("chosen:updated");
             }
        }
});
    // $('#bank_branch').append('<option id="foo">foo</option>');

    // $('#foo').focus();
});
$(".n").on("keydown", function (e) {
    return e.which !== 32;
});