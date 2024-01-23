document.addEventListener("DOMContentLoaded", function() {
    // Wait for the DOM to be fully loaded

    // Stop zoom-in and zoom-out animation after 2 seconds
    setTimeout(function() {
        document.getElementById("logo-container").style.animation = "none";
    }, 2000);

    // Display the logo for 4 seconds before fading out
    setTimeout(function() {
        document.getElementById("logo-container").style.opacity = 0;
        document.getElementById("content-container").style.opacity = 1;
    }, 2000);
});
