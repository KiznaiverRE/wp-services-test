jQuery(document).ready(function () {
  var marketing_firm_swiper = new Swiper(".marketing-firm-slider-wrapper.mySwiper", {
    slidesPerView: 4,
    spaceBetween: 15,
    speed: 1000,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".marketing-firm-button-next",
      prevEl: ".marketing-firm-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      600: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1000: {
        slidesPerView: 4,
      }
    }
  });
  const marketing_firm_slides = document.querySelectorAll('.marketing-firm-slider-wrapper .swiper-wrapper li');
  marketing_firm_slides.forEach(li => li.classList.add('swiper-slide'));
  var marketing_firm_swiper_testimonials = new Swiper(".testimonial-swiper-slider.mySwiper", {
    slidesPerView: 3,
      spaceBetween: 15,
      speed: 1000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".testimonial-swiper-button-next",
        prevEl: ".testimonial-swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        767: {
          slidesPerView: 2,
        },
        1023: {
          slidesPerView: 3,
        }
      },
  })
});