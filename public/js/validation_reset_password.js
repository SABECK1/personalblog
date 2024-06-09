const reset_config = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};
const reset_validation = new JustValidate("#resetform", reset_config);

reset_validation
    .addField("#reset_password", [
        {
            rule: "required",
        },
        {
            rule: "strongPassword",
        },
        {
            validator: (value, fields) => {
                if (fields['#reset_password_confirm'] && fields['#reset_password_confirm'].elem) {
                    const repeatPasswordValue = fields['#reset_password_confirm'].elem.value;

                    return value === repeatPasswordValue;
                }

                return true;
            },
            errorMessage: 'Passwords should be the same',
        },
    ])

    .addField("#reset_password_confirm", [
        {
            rule: "required",
        },
        {
            rule: "strongPassword",
        }])
        .onSuccess((event) => {
            document.getElementById("resetform").submit();}
        );