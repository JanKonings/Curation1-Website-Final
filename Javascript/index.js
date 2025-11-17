// submitting  early access form
$(document).ready(function () {
    $("#signupForm").on("submit", function (e) {
        e.preventDefault();

        const email = $("#email").val();
        const countryCode = $("#countryCode").val(); // Get selected country code from dropdown
        const phone = $("#phone").val();

        // Validate phone number format
        const phonePattern = /^\d{1,14}$/; // Allow only digits, up to 14 characters
        if (!phonePattern.test(phone)) {
            alert("Please enter a valid phone number (only digits, no spaces or special characters).");
            return;
        }

        // Concatenate country code and phone number
        const fullPhone = countryCode + phone; // This is the full phone number to send
        console.log("Full Phone Number: ", fullPhone); // Debugging line
        console.log("Email: ", email); // Debugging line
        $.ajax({
            type: "POST",
            url: "signupToBrevo.php",
            data: {
                email: email,
                phone: fullPhone // Send the concatenated phone number
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


// early acces styling and toggling
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".earlyAccess").style.display = "flex";

    document.getElementById("earlyAccessToggle").addEventListener("mouseenter", function() {
        this.style.fontWeight = "bold";
    });
    document.getElementById("earlyAccessToggle").addEventListener("mouseleave", function() {
        this.style.fontWeight = "normal";
    });
});


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

// egg click logic
window.onload = function () {
    let clickCount = 0; // Track number of clicks
    const animationImg = document.getElementById("animation");
    const imagePaths = [];
    const totalFrames = 14;
    
    for (let i = 1; i <= totalFrames; i++) {
        imagePaths.push(`Images/eggDrop/Untitled_Artwork-${i}-Picsart-BackgroundRemover.jpeg`);
    }

    var crackCount;

    document.getElementById("eggClick").addEventListener("click", function () {
        clickCount++;

        // First click: Change the image once
        if (clickCount === 1) {
            animationImg.src = imagePaths[1]; // Show first frame
            var audio = document.getElementById("crack");
            audio.load();
            audio.play().then(() => {
                animationImg.classList.add("shake");
                setTimeout(() => {
                    animationImg.classList.remove("shake");
                }, 500);
            }).catch(error => {
                console.error("Audio playback failed:", error);
                animationImg.classList.add("shake");
                setTimeout(() => {
                    animationImg.classList.remove("shake");
                }, 500);
            });

            crackCount = Math.floor(Math.random() * (4 - 2 + 1)) + 2;
            console.log(crackCount);
            return; // Stop further execution
        } else if (clickCount === crackCount) {
            const text = document.querySelector('.instructions');
            text.innerHTML = "";

            animationImg.dataset.clicked = "true"; // Prevent further clicks
            var audio = document.getElementById("crackSizzle");
            audio.load();
            audio.play().catch(error => {
                console.error("Audio playback failed:", error);
            });

            let frameIndex = 1;

            function updateImageSource() {
                animationImg.src = imagePaths[frameIndex]; // Update image
                frameIndex++;

                if (frameIndex >= imagePaths.length) {
                    clearInterval(animationInterval); // Stop slideshow

                    // // Start countdown
                    // const targetDate = Date.now();

                    // // const targetDate = Date.now() + 10000;
                    // const countdownFunction = setInterval(function () {
                    //     const now = new Date().getTime();
                    //     const remainingTime = targetDate - now;

                    //     const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                    //     const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    //     const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                    //     const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                    //     document.getElementById("countdownTimer").innerText = 
                    //         `${String(days).padStart(2, '0')}:${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                    //     if (remainingTime < 0) {
                    //         clearInterval(countdownFunction);
                    //         document.getElementById("countdownTimer").innerText = "00:00:00";
                    //         window.location.href = "Shop.php";
                    //     }
                    // }, 200);


                    // Delay navigation slightly to let audio/rendering settle
                    setTimeout(() => {
                        window.location.href = "Shop.php";
                    }, 200);
                }
            }

            // Start animation
            const frameRate = 80;
            let animationInterval = setInterval(updateImageSource, frameRate);
        } else if (clickCount < crackCount) {
            var audio = document.getElementById("crack");
            // Preload and play audio
            audio.load();
            audio.play().then(() => {
                // Only start animation after audio starts playing
                animationImg.classList.add("shake");
                
                // Remove class after animation ends
                setTimeout(() => {
                    animationImg.classList.remove("shake");
                }, 500);
            }).catch(error => {
                console.error("Audio playback failed:", error);
                // Fallback: start animation even if audio fails
                animationImg.classList.add("shake");
                setTimeout(() => {
                    animationImg.classList.remove("shake");
                }, 500);
            });
        }
    });
};

