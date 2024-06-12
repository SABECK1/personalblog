const register_config = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};

const login_config = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};




const register_validation = new JustValidate("#registerform", register_config);
const login_validation = new JustValidate("#loginform", login_config);



register_validation
    .addField("#register_email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        // {
        //     validator: (value) => () => {
        //         return fetch("validate-inputs-registration.php?email=" + encodeURIComponent(value))
        //             .then(function (response) {
        //                 return response.json();
        //             })
        //             .then(function (json) {
        //                 return json.email_is_available;
        //             });
        //     },
        //     errorMessage: "Email already taken"
        // }
    ])
    .addField("#register_username", [
        {
            rule: "required"
        },
        // {
        //     validator: (value) => () => {
        //         return fetch("validate-inputs-registration.php?username=" + encodeURIComponent(value))
        //             .then(function (response) {
        //                 return response.json();
        //             })
        //             .then(function (json) {
        //                 return json.username_is_available;
        //             });
        //     },
        //     errorMessage: "Username already taken"
        // }
    ])
    .addField("#register_password", [
        {
            rule: "required"
        },
        {
            rule: "strongPassword",
        }
    ])
    .onSuccess((event) => {
        document.getElementById("registerform").submit();
    });




login_validation
    .addField("#login_password", [
        {
            rule: "required"
        },
        // {
        //     validator: (value) => () => {
        //         //Password is dependent on username to work, so we get the value of the username using Javascript
        //         return fetch("validate-inputs-login.php?password=" + encodeURIComponent(value) + "&username=${document.getElementsByID('register_username').value}")
        //             .then(function (response) {
        //                 return response.json();

        //             })
        //             .then(function (json) {
        //                 return json.password_is_correct;
        //             });
        //     },
        //     errorMessage: "Password doesn't match!"
        // }
    ])
    .addField("#login_username", [
        {
            rule: "required"
        },
        // {
        //     validator: (value) => () => {
        //         return fetch("validate-inputs-login.php?username=" + encodeURIComponent(value))
        //             .then(function (response) {
        //                 return response.json();
        //             })
        //             .then(function (json) {
        //                 return json.username_exists;
        //             });
        //     },
        //     errorMessage: "Username doesn't exist!"
        // }
    ])
    .onSuccess((event) => {
        document.getElementById("loginform").submit();
    });


