const contact_config = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};

const contact_validation = new JustValidate("#contactform", contact_config);

contact_validation
    .addField("#contact_email", [
        {
            rule: "required",
            rule: "email"
        }])
    .addField("#contact_message", [
        {
            rule: "required"
        }])
    .onSuccess((event) => {
        document.getElementById("contactform").submit();
    });

