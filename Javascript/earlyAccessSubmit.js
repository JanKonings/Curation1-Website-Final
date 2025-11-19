$(document).ready(function () {
    $("#signupForm").on("submit", function (e) {
        e.preventDefault();

        const email = $("#email").val();
        const countryCode = $("#countryCode").val(); // Get selected country code from dropdown
        const phone = $("#phone").val();
        const smsOptIn = $("#smsOptIn").is(":checked") ? 1 : 0;  // <— here

        if (!$("#termsOptIn").is(":checked")) {
            alert("You must agree to the Terms and Conditions and Privacy Policy.");
            return;
        }
        
        if (smsOptIn) {

            if (!phone) {
                alert("Please enter a phone number to receive SMS alerts.");
                return;
            }

            if (!countryCode) {
                alert("Please select your country code.");
                return;
            }

            const phonePattern = /^\d{1,14}$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid phone number (digits only, max 14).");
                return;
            }
        }


        // Concatenate country code and phone number
        const fullPhone = smsOptIn ? countryCode + phone : "";


        $.ajax({
            type: "POST",
            url: "signupToBrevo.php",
            data: {
                email: email,
                phone: fullPhone, // Send the concatenated phone number
                smsOptIn: smsOptIn   // <— send it to PHP

            },
            success: function (response) {
                alert("You're subscribed!");
                $("#signupForm")[0].reset();
            },
            error: function () {
                alert("Something went wrong. Please try again.");
            }
        });
    });
});