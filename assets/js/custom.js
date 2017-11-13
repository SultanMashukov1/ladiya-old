$(document).ready(function () {
    /** Место для скриптов **/

    /** Скрипт для Автоподкачки с инстаграмма **/

    $("#result").load("/inwidget/index.php?toolbar=false&width=100%&preview=large");

    /** Cкрипты обработки видео с ютуба в блоке видео отзывов **/

    var itemid = 0;

    $('.video .item-block').each(function() {
      $(this).attr('data-item',itemid);
      var videoid = $(this).attr('data-youtube');
      if(videoid) {
        $(this).children('.time').html('');
        $(this).children('.image').css('background-image', 'url(http://img.youtube.com/vi/' + videoid + '/0.jpg)');
        getVideoDuration(itemid, videoid);
      };
      itemid++;
    });

    function getVideoDuration(itemid, id) {
      $.get(
        "https://www.googleapis.com/youtube/v3/videos",
        {
          part: "snippet, contentDetails",
          key: "AIzaSyDYwPzLevXauI-kTSVXTLroLyHEONuF9Rw",
          id: id
        },
        function(video) {
          var videoID = video.items[0].id;
          var videoDuration = convertTime(video.items[0].contentDetails.duration);
          $('.video .item-block[data-item="' + itemid + '"] .time').append(videoDuration);
        }
      )
    };

    function convertTime(duration) {
        var a = duration.match(/\d+/g);
        if (
            duration.indexOf("M") >= 0 &&
            duration.indexOf("H") == -1 &&
            duration.indexOf("S") == -1
        ) {
        a = [0, a[0], 0];
        }
        if (duration.indexOf("H") >= 0 && duration.indexOf("M") == -1) {
            a = [a[0], 0, a[1]];
        }
        if (
            duration.indexOf("H") >= 0 &&
            duration.indexOf("M") == -1 &&
            duration.indexOf("S") == -1
        ) {
            a = [a[0], 0, 0];
        }
        duration = 0;
        if (a.length == 3) {
            duration = duration + parseInt(a[0]) * 3600;
            duration = duration + parseInt(a[1]) * 60;
            duration = duration + parseInt(a[2]);
        }
        if (a.length == 2) {
            duration = duration + parseInt(a[0]) * 60;
            duration = duration + parseInt(a[1]);
        }
        if (a.length == 1) {
            duration = duration + parseInt(a[0]);
        }
        var h = Math.floor(duration / 3600);
        var m = Math.floor(duration % 3600 / 60);
        var s = Math.floor(duration % 3600 % 60);
        return (
            (h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") +
            m +
            ":" +
            (s < 10 ? "0" : "") +
            s
        );
    }

    $('.video .item-block').click(function() {
      var videoid = $(this).attr('data-youtube');
      var frame = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + videoid + '?autoplay=1" frameborder="0" allowfullscreen></iframe>';
      $('.popup-video').removeClass('hidden');
      $('.popup-video .inner').append(frame);
    });

    $('.popup-video .inner .fa').click(function() {
      $(this).parent('.inner').children('iframe').remove();
      $('.popup-video').addClass('hidden');
    });

    /** Функция выравнивания левой части шапки **/

    var lastchild = '<li class="dropdown"><a href="#" class="add dropdown-toggle" data-toggle="dropdown">ЕЩЕ</a><ul class="nav dropdown-menu"></ul></li>';

    function resizing() {

      if ( $('.container').outerWidth() <= 1170 && $('.container').outerWidth() > 750 ) {
        var maxwidth = $(document).width() - ( ( $(document).width() - $('.container').width() ) / 2 + ( $(document).width() * 0.1 + $('.offer').outerWidth() ) );
      } else {
        var maxwidth = $('.container').width();
      }

      if ( $('.navbar-toggle').css('display') == 'none' ) {
        var left = 0 - ( $(document).width() - $('.container').width() ) / 2 + $(document).width() * 0.1 ;
        $('.icon-menu .navbar-nav').css('margin-left', left);
        $('.logo').css('margin-left', left);
        for (
          i = 2,
          items = $('.header-menu .navbar-nav > li').length;
          i < items;
          i++
        ) {

          var headermenuwidth = $('.header-menu .navbar-nav').outerWidth();
          if (headermenuwidth > maxwidth) {
            if (!$('.header-menu .navbar-nav > li:eq(-1) a').hasClass('add')) {
              $('.header-menu .navbar-nav').append(lastchild);
            }
            //$('.header-menu .navbar-nav li:eq(-' + i + ')').addClass('hidden');
            $('.header-menu .navbar-nav > li:eq(-' + i + ')').prependTo('.header-menu .navbar-nav > li.dropdown .dropdown-menu');
          };

          var mainmenuwidth = $('.main-menu .navbar-nav').outerWidth();
          if (mainmenuwidth > maxwidth) {
            if (!$('.main-menu .navbar-nav li:eq(-1) a').hasClass('add')) {
              $('.main-menu .navbar-nav').append(lastchild);
            }
            //$('.main-menu .navbar-nav li:eq(-' + i + ')').addClass('hidden');
            $('.main-menu .navbar-nav > li:eq(-' + i + ')').prependTo('.main-menu .navbar-nav > li.dropdown .dropdown-menu');
          };

        };
      } else {
        $('.header-menu .navbar-nav li a.add').parent('li').remove();
        $('.main-menu .navbar-nav li a.add').parent('li').remove();
      };
    };

    $(document).ready(function() {
      resizing();
    });

    $(window).resize(function() {
      resizing();
    });
    /** Туры **/
    (function ($) {

        $('#items .tour .img').bind('touchstart touchend', function (event) {
            event.preventDefault();
            $(this).parent().toggleClass('onhover');
        });

        $('#items .tour .img').hover(function (event) {
            event.preventDefault();

            $(this).parent().toggleClass('onhover');

        });

    })(jQuery);

    // SelectFx кастомизация select
    (function () {
        [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
            new SelectFx(el);
        });
    })();
    // JQRangeSlider сщздание ползунков выбора
    $('#filter-slider').rangeSlider({
        arrows:false,
        bounds: {min: 1200, max: 25000},
        defaultValues:{min: 2500, max: 15000},
        formatter:function(val){
            var value = Math.round(val);
            return value+" р";
        }
    });
    $('#filter-slider_single').rangeSlider({
        arrows:false,
        bounds: {min: 12, max: 60},
        defaultValues:{min: 18, max: 36}
    });
    //  datepicker окно выбора даты
    $('.filter__item__date__inp').datepicker($.datepicker.regional["ru"]);

    /** Конец скриптов **/
});