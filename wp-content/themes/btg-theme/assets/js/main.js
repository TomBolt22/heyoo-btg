jQuery(function () {
  //Add class to navbar when scrolled
  $(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
      $("header").addClass("scrolled");
    } else {
      $("header").removeClass("scrolled");
    }
  });
  //Change responsive menu button when open
  $(".mobileMenuToggle").click(function () {
    $(this).find("i").toggleClass("fa-bars fa-times");
  });

  $(".navbar-nav li.menu-item-has-children > a").click(function () {
    console.log("show");
    $(this).next("ul.dropdown-menu").slideToggle();
    $(this).next("ul.dropdown-menu").toggleClass("show");
    $(this).toggleClass("open");
  });
  if ($(window).width() >= 994) {
    // $('.navbar-nav li.menu-item-has-children').hover(
    //     function() {
    //         console.log('show');
    //         var submenu = $(this).find('ul.dropdown-menu');
    //         submenu.slideToggle();
    //         submenu.toggleClass('show');
    //         $(this).toggleClass('open');
    //     }
    // );
  }

  $("button.menu").click(function () {
    $(this).toggleClass("opened");
    $("header").toggleClass("menu-open");
  });

  // Sliders
  $(".partner-slider").slick({
    speed: 7500,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: "linear",
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
      {
        breakpoint: 993,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  $(".testimonial-slider").slick({
    speed: 500,
    autoplay: true,
    autoplaySpeed: 2500,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  });

  $(".cs-slider").slick({
    speed: 500,
    autoplay: true,
    autoplaySpeed: 1750,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    asNavFor: ".cs-images",
    nextArrow: $(".slider-nav .next"),
    prevArrow: $(".slider-nav .prev"),
  });

  $(".cs-images").slick({
    speed: 500,
    autoplay: true,
    autoplaySpeed: 1750,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    asNavFor: ".cs-slider",
  });

  $(".results-slider").slick({
    speed: 500,
    autoplay: true,
    autoplaySpeed: 1750,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 993,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".pod-slider").slick({
    speed: 500,
    dots: true,
    autoplay: true,
    autoplaySpeed: 2500,
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    nextArrow: $(".ps-nav .next"),
    prevArrow: $(".ps-nav .prev"),
    responsive: [
      {
        breakpoint: 993,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(document).ready(function ($) {
    // Function to load results
    function loadResults(industry, tags, page) {
      var ajaxurl = "/wp-admin/admin-ajax.php";
      $.ajax({
        url: ajaxurl,
        type: "post",
        data: {
          action: "filter_results",
          industry: industry,
          tags: tags,
          page: page,
        },
        success: function (response) {
          // Update results container
          $(".results").html(response.results);

          // Update pagination container
          $(".result-pagination").html(response.pagination);
        },
      });
    }

    // Event listener for pagination links
    $(document).on("click", ".result-pagination a", function (e) {
      e.preventDefault();
      var page = $(this).attr("href").split("page=")[1];
      var industry = $("#filter-industry").val();
      var tags = $("#filter-tags").val();

      loadResults(industry, tags, page);
    });

    // Initial load
    $("#filter-industry, #filter-tags").change(function () {
      var industry = $("#filter-industry").val();
      var tags = $("#filter-tags").val();
      var page = 1;

      loadResults(industry, tags, page);
    });
  });
});
