const schema = joi.object({
    admin_id: joi.string().min(3).max(30).label("Admin ID").required(),
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
    password: joi.string().alphanum().min(3).max(30).label("Password").required(),
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
    uname: joi.string().min(4).max(20).label("Student Username").required(),
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
    $(".formAdmin").on("submit", function (e) {
        e.preventDefault();
        const form = this;
        const adminIdField = $(form).find("#admin_id");
        const fnameField = $(form).find("#fname");
        const emailField = $(form).find("#email");
        const passwordField = $(form).find("#password");
        const mobileField = $(form).find("#mobile");
        const bdayField = $(form).find("#bday");
        const address1Field = $(form).find("#address1");
        const address2Field = $(form).find("#address2");
        const address3Field = $(form).find("#address3");
        const lnameField = $(form).find("#lname");
        const nicField = $(form).find("#nic");
        const unameField = $(form).find("#uname");
        const formErrors = validate({
            admin_id:adminIdField.val(),
            fname: fnameField.val(),
            email: emailField.val(),
            password: passwordField.val(),
            mobile: mobileField.val(),
            bday: bdayField.val(),
            address1: address1Field.val(),
            address2: address2Field.val(),
            address3: address3Field.val(),
            lname: lnameField.val(),
            nic: nicField.val(),
            envDate: "2023/10/06",
            uname: unameField.val(),
        });
        const initialErrors = {
            admin_id:null,
            fname: null,
            email: null,
            password: null,
            mobile: null,
            bday: null,
            address1: null,
            address2: null,
            address3: null,
            lname: null,
            nic: null,
            envDate: null,
            uname: null,
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
            var admin_id = document.getElementById("admin_id");
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
            var uname = document.getElementById("uname");
            var password = document.getElementById("password");
            var unique_code = Math.random().toString(36).substring(7, 15);
            
            var gender = "";
            if (radFemale.checked) {
                gender = "Female"
            } else {
                gender = "Male";
            }
            var f = new FormData();
            f.append("adminId",admin_id.value);
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
            f.append("uname", uname.value);
            f.append("password", password.value);
            f.append("unique_code", unique_code);

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

            r.open("POST", "saveAdminProcess.php", true);
            r.send(f);

        } else {
            console.log("success");
        }
    });
});
