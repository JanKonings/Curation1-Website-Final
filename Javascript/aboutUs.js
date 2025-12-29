$(document).ready(function () {
    let animationStarted = false;

    const $letterImg = $('#letterImg');

    $('.letterBox').hover(
        function () {
            if (!animationStarted) {
                $letterImg.attr('src', 'Images/Untitled_Artwork-2.png');
            }
        },
        function () {
            if (!animationStarted) {
                $letterImg.attr('src', 'Images/Untitled_Artwork-1.png');
            }
        }
    );

    $('.letterBox').on('click', function () {
        if (animationStarted) return;
        animationStarted = true;

        const totalFrames = 4;
        let currentFrame = 2;
        const interval = 200;

        const animate = () => {
            $letterImg.attr('src', `Images/Untitled_Artwork-${currentFrame}.png`);

            if (currentFrame === totalFrames) {
                setTimeout(() => {
                    $('.aboutUsModal')
                    .css('display', 'flex')
                }, 200) 

                animationStarted = false;
            } else {
                currentFrame++;
                setTimeout(animate, interval);
            }
        };

        animate();
    });


    $('.modalClose').on('click', function () {
        $('.aboutUsModal').css('display', 'none');
        $letterImg.attr('src', `Images/Untitled_Artwork-1.png`);
    });

    $('.aboutUsModal').on('click', function (e) {
        if ($(e.target).is('.aboutUsModal')) {
            $(this).css('display', 'none');
            $letterImg.attr('src', `Images/Untitled_Artwork-1.png`);
        }
    });
});