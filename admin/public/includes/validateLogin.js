const schema = joi.object({
    username: joi.string().min(3).max(30).label("User Name").required(),
    password: joi.string().min(3).max(30).label("Password").required()
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
    $(".form").on("submit", function (e) {
        e.preventDefault();
        const form = this;
        const userNameField = $(form).find("#username");
        const passwordField = $(form).find("#password");
        const formErrors = validate({
            username:userNameField.val(),
            password: passwordField.val(),
        });
        const initialErrors = {
            username:null,
            password: null,
        };
        if (formErrors?.error) {
            const { details } = formErrors.error;
            details.map((detail) => {
                initialErrors[detail.context.key] = detail.message;
            });
        }

        Object.keys(initialErrors).map((errorName) => {
            if (initialErrors[errorName] != null) {
                    msg("danger", initialErrors[errorName]);
            } else {
                $(`#${errorName}`).removeClass("is-invalid").addClass("is-valid");
            }
        });

        let isValid = Object.values(initialErrors).every(
            (value) => value === null
        );
        if (isValid) {
            var userName = document.getElementById("username");
            var password = document.getElementById("password");
            
            var f = new FormData();
            f.append("username",userName.value);
            f.append("password", password.value);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    if (t.includes('successfully')) {
                        window.location="home.php";
                    } else {
                        msg("danger", t);
                    }
                }
            }

            r.open("POST", "../../private/loginProcess.php", true);
            r.send(f);

        } else {
            console.log("success");
        }
    });
});
