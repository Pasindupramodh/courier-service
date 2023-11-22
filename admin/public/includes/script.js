
const schema = joi.object({
    fname: joi.string().min(3).max(30).label("First Name").required(),
    email: joi
        .string()
        .email({
            tlds: {
                allow: false
            }
        })
        .label("Email")
        .required(),
    mobile: joi
        .string()
        .ruleset.min(10)
        .max(10)
        .pattern(/^(?:[+0]9)?[0-9]{10}$/)
        .rule({
            keep: true,
            message: "Invalid Mobile Number"
        }),
    bday: joi.string().min(3).max(30).label("Birth Day").required(),
    address1: joi.string().min(3).max(100).label("Address Line 1").required(),
    address2: joi.string().min(3).max(100).label("Address Line 2").required(),
    address3: joi.string().min(3).max(100).label("Address Line 3").required(),
    lname: joi.string().min(3).max(100).label("Last Name").required(),
    nic: joi
        .string()
        .ruleset.min(10)
        .max(12)
        .rule({
            keep: true,
            message: "Invalid NIC Number"
        }),
    envDate: joi.string().min(3).max(30).label("Enrollment Day").required(),
});

function validate(dataObject) {
    const result = schema.validate(
        {
            ...dataObject,
        },
        { abortEarly: false }
    );
    return result;
}
//admin save
$(document).ready(function () {
    $(".adminUpdate").on("submit", function (e) {
        e.preventDefault();
        const form = this;
        const fnameField = $(form).find("#fname");
        const emailField = $(form).find("#email");
        const mobileField = $(form).find("#mobile");
        const bdayField = $(form).find("#bday");
        const address1Field = $(form).find("#address1");
        const address2Field = $(form).find("#address2");
        const address3Field = $(form).find("#address3");
        const lnameField = $(form).find("#lname");
        const nicField = $(form).find("#nic");
        const formErrors = validate({
            fname: fnameField.val(),
            email: emailField.val(),
            mobile: mobileField.val(),
            bday: bdayField.val(),
            address1: address1Field.val(),
            address2: address2Field.val(),
            address3: address3Field.val(),
            lname: lnameField.val(),
            nic: nicField.val(),
            envDate: "2023/10/06",
        });
        const initialErrors = {
            fname: null,
            email: null,
            mobile: null,
            bday: null,
            address1: null,
            address2: null,
            address3: null,
            lname: null,
            nic: null,
            envDate: null,
        };
        if (formErrors?.error) {
            const { details } = formErrors.error;
            details.map((detail) => {
                initialErrors[detail.context.key] = detail.message;
            });
        }

        Object.keys(initialErrors).map((errorName) => {
            if (initialErrors[errorName] != null) {
                $(`#${errorName}`).removeClass("is-valid").addClass("is-invalid");
                $(`#${errorName}`)
                    .next(".invalid-feedback")
                    .text(initialErrors[errorName]);
            } else {
                $(`#${errorName}`).removeClass("is-invalid").addClass("is-valid");
            }
        });

        let isValid = Object.values(initialErrors).every(
            (value) => value === null
        );
        if (isValid) {
            var id = document.getElementById("id");
            var fname = document.getElementById("fname");
            var email = document.getElementById("email");
            var mobile = document.getElementById("mobile");
            var bday = document.getElementById("bday");
            var address1 = document.getElementById("address1");
            var address2 = document.getElementById("address3");
            var lname = document.getElementById("lname");
            var nic = document.getElementById("nic");
            var radMale = document.getElementById("male");
            var radFemale = document.getElementById("female");
            var address3 = document.getElementById("address3");
            var e = document.getElementById("admin_type");
            var branch = e.options[e.selectedIndex].value;

            var gender = "";
            if (radFemale.checked) {
                gender = "Female"
            } else {
                gender = "Male";
            }
            var f = new FormData();
            f.append("id",id.value);
            f.append("fname", fname.value);
            f.append("email", email.value);
            f.append("mobile", mobile.value);
            f.append("bday", bday.value);
            f.append("address1", address1.value);
            f.append("address2", address2.value);
            f.append("lname", lname.value);
            f.append("nic", nic.value);
            f.append("gender", gender);
            f.append("address3", address3.value);
            f.append("branch",branch);
            
            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    if (t.includes('successfully')) {
                        window.location.reload();
                    } else {
                        msg("danger", t);
                    }
                }
            }

            r.open("POST", "updateAdminProcess.php", true);
            r.send(f);

        } else {
            var e = document.getElementById("admin_type");
            var branch = e.options[e.selectedIndex].value;
            console.log(branch);
        }
    });
});


function msg(msgType, msgStr) {
    var example = $('#example');
    switch (example.attr('data-icon')) {
        case 'fa':
            Msg.icon = Msg.ICONS.FONTAWESOME;
            break;

        case 'bs':
            Msg.icon = Msg.ICONS.BOOTSTRAP;
            break;

        default:
            Msg.icon = {
                info: 'fa fa-bath',
                success: 'fa fa-check-circle',
                warning: 'fa fa-bell-o',
                danger: 'fa fa-bolt'
            };
    }


    Msg[msgType](msgStr);

};
