
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
    const totalFrames = 33;
    
    for (let i = 16; i <= totalFrames; i++) {
        imagePaths.push(`Images/eggDropMidnight/IMG_0251-${i}.PNG`);
    }

    // prload the frames
    const preloadedFrames = [];
    let loadedCount = 0;

    imagePaths.forEach((src, index) => {
        const img = new Image();
        img.onload = () => {
            loadedCount++;
            if (loadedCount === imagePaths.length) {
                setupEggLogic();   // start after preload
            }
        };
        img.onerror = () => {
            loadedCount++;
            if (loadedCount === imagePaths.length) {
                setupEggLogic();
            }
        };
        img.src = src;
        preloadedFrames[index] = img;
    });


    // start egg logic after preloading
    function setupEggLogic() {
        var crackCount;

        document.getElementById("eggClick").addEventListener("click", function () {
            clickCount++;

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

                        animationImg.src = imagePaths[7]; // Ensure final image is set

                        setTimeout(() => {
                            const LOOP_START = imagePaths.length - 11; // last 10 frames
                            let loopIndex = LOOP_START;

                            // animationImg.src = imagePaths[7]; // Ensure final image is set


                            // 🎞 Loop animation: last 10 frames ONLY
                            const loopInterval = setInterval(() => {
                                animationImg.src = imagePaths[loopIndex];
                                loopIndex++;

                                // If reached end, restart back at LOOP_START
                                if (loopIndex >= imagePaths.length) {
                                    animationImg.src = imagePaths[7]; // Ensure final image is set
                                    setTimeout(() => {
                                        loopIndex = LOOP_START;
                                    }, 800);
                                }
                            }, 90); // speed of loop
                        }, 800); // 1 second pause before looping


                        // Start countdown
                        const targetDate = Date.UTC(2025, 11, 5, 18, 16, 0); 


                        // const targetDate = new Date().getTime() + 5000; // 5 seconds from now for testing

                        const countdownFunction = setInterval(function () {
                            const now = new Date().getTime();
                            const remainingTime = targetDate - now;

                            const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                            document.getElementById("countdownTimer").innerText = 
                                `${String(days).padStart(2, '0')}:${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                            if (remainingTime < 0) {
                                clearInterval(countdownFunction);
                                document.getElementById("countdownTimer").innerText = "00:00:00:00";

                                // Delay navigation slightly to let audio/rendering settle
                                setTimeout(() => {
                                    window.location.href = "Shop.php";
                                }, 500);
                            }
                        }, 200);
                    }
                }

                // Start animation
                const frameRate = 90;
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
    }
};

