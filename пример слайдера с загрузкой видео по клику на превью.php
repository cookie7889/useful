<style>
    .play-video-btn {
        width: 438px;
        height: 286px;
        border-radius: 3px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .play-video-btn.remove {
        position: absolute;
        top: 0;
        opacity: 0;
        transition: opacity 1.2s ease;
    }

    .play-video-btn .prev-img {
        width: 438px;
        height: 286px;
        border-radius: 3px;
    }

    .play-video-btn .yt-btn {
        position: absolute;
        height: 48px;
        width: 68px;
        margin: 0 auto;
        display: flex;
    }

    .play-video-btn .yt-btn .background {
        -webkit-transition: fill .1s cubic-bezier(0.4, 0, 1, 1), fill-opacity .1s cubic-bezier(0.4, 0, 1, 1);
        transition: fill .1s cubic-bezier(0.4, 0, 1, 1), fill-opacity .1s cubic-bezier(0.4, 0, 1, 1);
        fill: #212121;
        fill-opacity: .8;
    }

    .play-video-btn:hover .yt-btn .background {
        -webkit-transition: fill .1s cubic-bezier(0, 0, 0.2, 1), fill-opacity .1s cubic-bezier(0, 0, 0.2, 1);
        transition: fill .1s cubic-bezier(0, 0, 0.2, 1), fill-opacity .1s cubic-bezier(0, 0, 0.2, 1);
        fill: #f00;
        fill-opacity: 1;
    }
</style>

<div class="reviews-block-slider">
    <? foreach ($resultElement as $keyVid => $arElement) { ?>
        <div class="reviews-slide">
            <div id="player-<?= $keyVid ?>"></div>
            <div class="play-video-btn" data-video-id="player-<?= $keyVid ?>" data-video="<?= $arElement['LINK'] ?>">
                <img class="prev-img" data-lazy="https://img.youtube.com/vi/<?= $arElement['LINK'] ?>/hqdefault.jpg" alt="">
                <div class="yt-btn" aria-label="Смотреть">
                    <svg data-lazy height="100%" version="1.1" viewBox="0 0 68 48" width="100%">
                        <path class="background" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"></path>
                        <path d="M 45,24 27,14 27,34" fill="#fff"></path>
                    </svg>
                </div>
            </div>
        </div>
    <? } ?>
</div>

<script>
    $('.reviews-block-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        adaptiveHeight: true, 
        prevArrow: $('.reviews-block .slider-arrow-prev'),
        nextArrow: $('.reviews-block .slider-arrow-next'),
        dots: true,
        appendDots:$('.reviews-block .slider-dots')
    });

    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


    var player;
    $('.play-video-btn').click(function() {
        let btn = $(this);
        let videoID = btn.data('video');
        let playerID = btn.data('video-id');

        player = new YT.Player(playerID, {
            playerVars: {
                'autoplay': 0,
                'controls': 1,
                'playsinline': 1 //для iOS
            },
            height: '286',
            width: '438',
            videoId: videoID,
            events: {
                'onReady': onPlayerReady,
                //'onStateChange': onPlayerStateChange
            }
        });

        $(this).addClass('remove');
        setTimeout(function() {
            $('.remove', '.reviews-slide').css('z-index', '-1');
        }, 1000);
    });

    function onPlayerReady(event) {
        event.target.playVideo();
    }
</script>