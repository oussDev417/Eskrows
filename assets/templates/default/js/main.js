/* Main Js Start */

(function ($) {
  "use strict";

  $(document).ready(function () {

    // sidebar dropdown
    $(".has-dropdown > a").on("click", function (e) {
      e.preventDefault();
      var $submenu = $(this).next(".sidebar-submenu");
      var $parent = $(this).parent();
      if ($submenu.css("display") === "block") {
        $submenu.slideUp(200);
        $parent.removeClass("active");
      } else {
        $(".sidebar-submenu").not($submenu).slideUp(200);
        $(".has-dropdown.active").removeClass("active");
        $parent.addClass("active");
        $submenu.slideDown(200);
      }
    });


    $(".dashboard-body__bar-icon").on("click", function () {
      $(".sidebar-menu").addClass('show-sidebar');
      $(".sidebar-overlay").addClass('show');
    });
    $(".sidebar-menu__close, .sidebar-overlay").on("click", function () {
      $(".sidebar-menu").removeClass('show-sidebar');
      $(".sidebar-overlay").removeClass('show');
    });

    $(".counterup-item").each(function () {
      $(this).isInViewport(function (status) {
        if (status === "entered") {
          for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
            var el = document.querySelectorAll('.odometer')[i];
            el.innerHTML = el.getAttribute("data-odometer-final");
          }
        }
      });
    });


    $(".add").on("click", function () {
      if ($(this).prev().val() < 999) {
        $(this)
          .prev()
          .val(+$(this).prev().val() + 1);
      }
    });
    $(".sub").on("click", function () {
      if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1)
          $(this)
            .next()
            .val(+$(this).next().val() - 1);
      }
    });


    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#imageUpload").on('change',function () {
      readURL(this);
    });

  });

  // preloader
  $(window).on("load", function () {
    $("#loading").fadeOut();
  })


  // sticky header
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 60) {
      $('.header').addClass('fixed-header');
    }
    else {
      $('.header').removeClass('fixed-header');
    }
  });


  var btn = $('.scroll-top');

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });


  $('.header-search-icon').on('click', function () {
    $('.header-search-hide-show').addClass('show');
    $('.header-search-icon').hide();
    $('.close-hide-show').addClass('show');
  });

  $('.close-hide-show').on('click', function () {
    $('.close-hide-show').removeClass('show');
    $('.header-search-hide-show').removeClass('show');
    $('.header-search-icon').show();
  });


  $('.sidebar-overlay, .close-hide-show').on('click', function () {
    $('.sidebar-menu-wrapper').removeClass('show');
    $(".sidebar-overlay").removeClass('show');
  });




  // tap to top with progress

  if ($('.scroll-top').length > 0) {
    var $scrollTopBtn = $('.scroll-top');
    var $progressPath = $('.scroll-top path');
    var pathLength = $progressPath[0].getTotalLength();

    $progressPath.css({
      transition: 'none',
      strokeDasharray: pathLength + ' ' + pathLength,
      strokeDashoffset: pathLength,
    });

    $progressPath[0].getBoundingClientRect();
    $progressPath.css({
      transition: 'stroke-dashoffset 10ms linear'
    });

    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength / height);
      $progressPath.css('strokeDashoffset', progress);
    };

    updateProgress();

    $(window).on('scroll', updateProgress);

    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 50) {
        $scrollTopBtn.addClass('show');
      } else {
        $scrollTopBtn.removeClass('show');
      }
    });

    $scrollTopBtn.on('click', function (event) {
      event.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 800);
      return false;
    });
  }

  // slider
  $(document).ready(function () {
    function setSlickCurrentToSecondSlide(slick) {
      var slides = $(slick.$slides);
      slides.removeClass('slick-current');

      var secondVisibleIndex;
      if (slick.options.slidesToShow > 1) {
        secondVisibleIndex = slick.currentSlide + 1;
      } else {
        secondVisibleIndex = slick.currentSlide;
      }

      slides.eq(secondVisibleIndex).addClass('slick-current');
    }

    $('.testimonial-slider').on('init', function (event, slick) {
      setSlickCurrentToSecondSlide(slick);
    });

    $('.testimonial-slider').on('afterChange', function (event, slick, currentSlide) {
      setSlickCurrentToSecondSlide(slick);
    });

    $('.testimonial-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      initialSlide: 2,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 780,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // Ensure correct positioning and class setting after window resize
    $(window).on('resize', function () {
      $('.testimonial-slider').slick('setPosition');
    });
  });


  // toggle show hide password
  $(".toggle-password-change").on('click', function () {
    var targetId = $(this).data("target");
    var target = $("#" + targetId);
    var icon = $(this);
    if (target.attr("type") === "password") {
      target.attr("type", "text");
      icon.removeClass("fa-eye-slash");
      icon.addClass("fa-eye");
    } else {
      
      
      target.attr("type", "password");
      icon.removeClass("fa-eye");
      icon.addClass("fa-eye-slash");
    }
  });



  // wow init
  new WOW().init();



  // tap balance
  $(document).on('click', '.textt, .balance, .tap-circle--icon', function () {
    var $parent = $(this).closest('.tap--balance');
  
    if (!$parent.data('clicked')) {
      $parent.data('clicked', false);
    }
  
    var clicked = $parent.data('clicked');
    $parent.data('clicked', !clicked);
  
    setTimeout(function () {
      $parent.find('.textt, .balance').toggleClass('d-none');
    }, 1000);
  
    if (!clicked) {
      $parent.addClass('goLeft').removeClass('goRight');
      $parent.find('.textt').addClass('op--0');
      $parent.find('.balance').removeClass('op--0');
    } else {
      $parent.removeClass('goLeft').addClass('goRight');
      $parent.find('.textt').removeClass('op--0');
      $parent.find('.balance').addClass('op--0');
    }

  });


  // for accordion
  $(document).ready(function () {

    function applyExpandedClassOnLoad() {
      $('#accordionFlushExample .accordion-item').each(function () {
        var $accordionItem = $(this);
        var $button = $accordionItem.find('.accordion-button');
        if ($button.attr('aria-expanded') === 'true') {
          $accordionItem.addClass('active');
        }
      });
    }

    applyExpandedClassOnLoad();

    $('#accordionFlushExample').on('shown.bs.collapse', function (e) {
      var $accordionItem = $(e.target).closest('.accordion-item');
      $accordionItem.addClass('active');
    });

    $('#accordionFlushExample').on('hidden.bs.collapse', function (e) {
      var $accordionItem = $(e.target).closest('.accordion-item');
      $accordionItem.removeClass('active');
    });
  });

  $(".caret").on('click', function () {
    $(this).toggleClass("caret-down");
    $(this).next(".nested").toggleClass("active");
  });

  Splitting();



  $(document).on('click', '.follow-this', function () {
    if ($(this).text().trim() === 'Follow') {
      $(this).text('Following');
      $(this).addClass('following');
    } else {
      $(this).text('Follow');
      $(this).removeClass('following');
    }
  });




  document.addEventListener("DOMContentLoaded", function () {


    if ($('.bg--blur').length) {
      gsap.to(".bg--blur", {
        scale: .8,
        duration: 3,
        ease: "elastic.inOut(1,0.3)",
        y: -50,
        x: -50,
        repeat: -1
      });
    }




  })


  $('.form-select').on('change', function () {
    const selectedOption = $(this).find('option').eq(this.selectedIndex);
    const textColor = selectedOption.css('color');
    $(this).css({
      'color': textColor
    });
  });







  document.addEventListener("DOMContentLoaded", function () {

    gsap.registerPlugin(ScrollTrigger);


    var tl = new TimelineLite(),
      firstBg = document.querySelector('.text__first-bg'),
      word = document.querySelector('.text__word');

    tl
      .to(firstBg, 0.2, { scaleX: 1, delay: 0.5 })
      .to(word, 0.1, { opacity: 1, delay: 0.5 }, "-=0.5")
      .to(firstBg, 0.2, { x: "-100%", scaleX: 0,  delay: 0.1});


    let revealContainers = document.querySelectorAll(".reveal");

    revealContainers.forEach((container) => {

      let element = container.querySelector(".one");
      let element3 = container.querySelector(".three");

      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: container,
          start: "top 90%",
          toggleActions: "play none none none",
        }
      });


      tl.set(container, {
        autoAlpha: 1
      });






      if (element) {
        tl.from(element, {
          duration: 2,
          x: -270,
          y: -300,
          scale: 1,
          ease: "power4.out"
        });
      }
      if (element3) {
        tl.from(element3, {
          duration: 2,
          x: 280,
          y: -300,
          scale: 1,
          ease: "power4.out"
        });
      }
    });
  });


  // parallax image
  document.addEventListener("mousemove", parallax);
  function parallax(e) {
    document.querySelectorAll(".animation-img").forEach(function (move) {
      var movingValue = move.getAttribute("data-value");
      var x = (e.clientX * movingValue) / 250;
      var y = (e.clientY * movingValue) / 250;
      move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
    })
  }

  AOS.init();

  
})(jQuery);



