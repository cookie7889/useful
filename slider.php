<?//слайдер на карусели с миниатюрами в качестве навигации и с адекватным фэнсибоксом?>

<style>
    .new-carusel-wrap {
        margin-bottom: 11.5px;
    }
    .new-dots {
        margin-top:4px;
        padding-top:4px;
        white-space:nowrap;
        justify-content: center;
        display: flex;
    }
    .new-dots .img {
        border: 1px solid #FFF;
        width: 192px;
        height: 130px;
        background-size: cover !important;
        display: inline-block;
        margin-left: 3px;
        margin-right: 3px;
    }
    .new-dots .img:hover {
        border: 1px solid #bbbbbb;;
    }
    /* .new-dots .img + .img {margin-left:1px;} */
    .new-dots .img.active {opacity: 0.3;}
    .new-carusel .owl-item img {
        display: block;
        width: auto;
        margin: 0 auto;
    }
    .new-carusel.owl-carousel.owl-theme .owl-nav .owl-prev, .owl-carousel.owl-theme .owl-nav .owl-next {
        
        top: -100px;
    }
</style>

<div class="new-carusel-wrap">
    <div class="new-carusel owl-loaded owl-drag owl-carousel owl-theme">
        <?php
        foreach ($arResult['PRODUCT_PHOTO'] as $key => $arPhoto)
        {
            $strAlt = isset($arPhoto['ALT']) && strlen($arPhoto['ALT']) > 0
                ? $arPhoto['ALT']
                : $arPhoto['DESCRIPTION'];

            $strTitle = isset($arPhoto['TITLE']) && strlen($arPhoto['TITLE']) > 0
                ? $arPhoto['TITLE']
                : $arPhoto['DESCRIPTION'];

            //ресайз для миниатюр
            $renderImage = CFile::ResizeImageGet($arPhoto, Array("width" => 250, "height" => 150));
            ?>
            
            <a href="<?=$arPhoto['RESIZE']['big']['src']?>" data-fancybox="gallery" class="item"><img src="<?=isset($arPhoto['RESIZE']['big']['src']) ? $arPhoto['RESIZE']['big']['src'] : $arPhoto['SRC']?>" data-icon="<?=$renderImage['src']?>"/></a>
            <?
        }
        ?>
    </div>

    <div class="new-dots"></div>
</div>

<script>
    var carousel = $('.new-carusel'); //слайдер
    var dots = $(carousel).next();  //миниатюры
    $(carousel).find('.item img').each(function() { //цикл для генерации миниатюр
        var ico = $(this).data('icon'); //ссылки на миниатюры из дата атрибута оригинальной картинки
        dots.append('<span class="img" style="background: url('+ico+')"></span>');  //заполнение миниатюр
    });
    carousel.owlCarousel({  //настройки слайдера 
        items: 1, //показывать один элемент
        nav: true,  //включить навигацию по кнопкам
        navClass: ['owl-prev', 'owl-next'], //переназначить кнопки навигации на кастомные
        navText: [  //создание кнопок навигации
            '<svg class="icon-svg icon-svg-chevron-left"><use xlink:href="#svg-chevron-left"></use></svg>', //левая
            '<svg class="icon-svg icon-svg-chevron-right"><use xlink:href="#svg-chevron-right"></use></svg>'  //правая
        ],
        dots: true, //включить навицгацию по точкам
        loop: true,
        animateOut: 'fadeOut',  //анимация смены слайдов
        dotsContainer: dots,    //переназначаем точки навигации на кастомные (миниатюры *строка 2*)
        onInitialized: carouselInitialized  //вызов функиции смены слайдов по клику по миниатюрам
    });
    dots.appendTo(carousel);
    function carouselInitialized () { //функия смены слайдов по клику
            dots.find('.img').click(function () { //событие клик
            carousel.trigger('to.owl.carousel', [$(this).index(), 300]);
        });

        $('.owl-stage').find('.cloned > .item').removeAttr('data-fancybox');  //удаление фенсибокса у клонов
    } 
</script>