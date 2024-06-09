const forgot_config = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};

const forgot_validation = new JustValidate("#forgotform", forgot_config);

forgot_validation
    .addField("#forgot_email", [
        {
            rule: "required",
            rule: "email"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("forgotform").submit();
    });
