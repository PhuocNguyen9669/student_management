$(document).ready(function() {
    $("#form-validate").validate({
        rules: {
            fullname : {
                required: true,
                minlength: 3
            },
            age: {
                required: true,
                number: true,
                min: 18,
                max: 30
            },
            gender: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone_number: {
                required: true,
                minlength: 9,
                maxlength: 10
            },
            address: {
                required: true,
                minlength: 5,
                maxlength: 300
            },
            number: true,
            min: 0
            },
        messages: {
            fullname: {
                minlength: "Full name should be at least 3 characters"
            },
            age: {
                required: "Please enter your age",
                number: "Please enter your age as a numerical value",
                min: "You must be at least 18 years old",
                max: "Your age must not exceed 30"
            },
            gender: {
                required: 'Please enter the gender',
            },
            email: {
                required: "Please enter the email",
                email: "The email should be in the format: abc@domain.tld"
            },
            phone_number: {
                required: 'Please enter the phone number',
                minlength: "Phone number should be at least 9 characters",
                maxlength: "Phone number must have at most 10 characters"
            },
            address: {
                required: 'Please enter the address',
                minlength: "Address should be at least 5 characters",
                maxlength: "Address should be at most 300 characters"
            },
        }
    })
});