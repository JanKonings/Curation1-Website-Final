document.getElementById("earlyAccessToggle").addEventListener("click", function () {
    document.querySelector(".earlyAccess").style.display = "flex";
});

document.addEventListener("click", function (event) {
    const earlyAccessForm = document.querySelector(".earlyAccessForm");
    const earlyAccessToggle = document.getElementById("earlyAccessToggle");
    const closeButton = document.getElementById("close");

    if (!earlyAccessForm.contains(event.target) && event.target !== earlyAccessToggle || event.target === closeButton) {
        document.querySelector(".earlyAccess").style.display = "none";
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');

    function isEarlyAccessOpen() {
        const ea = document.querySelector(".earlyAccess");
        return ea && ea.style.display === "flex";
    }

    document.addEventListener('click', function() {
        if (!isEarlyAccessOpen()) {
            passwordInput.focus();
        }
        const errorElement = document.querySelector('.error');
        if (errorElement) {
            errorElement.textContent = '';
        }
    });
                
    // Adjust input width as user types
    passwordInput.addEventListener('input', function() {
        this.style.width = Math.max(this.value.length, 1) + "ch";
        const errorElement = document.querySelector('.error');
        if (errorElement) {
            errorElement.textContent = '';
        }
    });

    const cursorImg = document.getElementById('cursor');
    const cursorBlink = setInterval(function() {
        // Only animate the fake cursor if Early Access is NOT open
        if (!isEarlyAccessOpen() && !passwordInput.matches(':focus') && passwordInput.value === '') {
            cursorImg.style.visibility = cursorImg.style.visibility === 'hidden' ? 'visible' : 'hidden';
        } else {
            cursorImg.style.visibility = 'hidden';
        }
    }, 500);

    passwordInput.addEventListener('focus', function() {
        cursorImg.style.visibility = 'hidden'; // Use visibility instead of display

    });

    // Only autofocus if Early Access overlay is NOT open
    if (!isEarlyAccessOpen() && !/Mobi|Android|iPad|Tablet|Touch/i.test(navigator.userAgent)) {
        passwordInput.focus();
    }
    
});