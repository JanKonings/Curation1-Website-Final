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