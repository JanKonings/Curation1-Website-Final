$(document).ready(function() {
    const nav = $('#nav');
    nav.css('left', '-100vw').hide(); // Start with navbar off-screen

    // Toggle the navigation menu
    $('#hamburgerNav').click(function() {
        if (nav.hasClass('active')) {
            // If the menu is active, slide it out
            nav.stop(true, true).animate({
                left: '-100vw',
                opacity: 0
            }, 130, function() {
                nav.removeClass('active'); // Remove active class after the slide-out
                nav.hide(); // Ensure it is hidden after sliding out
            });
        } else {
            // If it’s not active, slide it in
            nav.stop(true, true).show().animate({
                left: '50%',
                opacity: 1
            }, 150, function() {
                nav.addClass('active'); // Add active class after the slide-in
            });
        }
    });
});
