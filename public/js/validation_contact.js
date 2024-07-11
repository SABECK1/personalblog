const contact_config_guest = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
};

const contact_config_auth = {
    focusInvalidField: true,
    validateBeforeSubmitting: true,
}
debugger
const contact_validation_guest = new JustValidate("#contactform_guest", contact_config_guest);
const contact_validation_auth = new JustValidate("#contactform_auth", contact_config_auth);

contact_validation_guest
    .addField("#contact_email_guest", [
        {
            rule: "required",
            rule: "email"
        }])
    .addField("#contact_message_guest", [
        {
            rule: "required"
        }])
    .onSuccess((event) => {
        document.getElementById("contactform_guest").submit();
    });

contact_validation_auth
    .addField("#contact_email_auth", [
        {
            rule: "required",
            rule: "email"
        }])
    .addField("#contact_message_auth", [
        {
            rule: "required"
        }])
    .onSuccess((event) => {
        document.getElementById("contactform_auth").submit();
    });



