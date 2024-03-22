const swiper = new Swiper('.swiper', {
    loop: true,
    speed:1000,
    // autoplay:{

    // },
    breakpoints:{
        640:{
            slidesPerView:2, 
        }
    },
  
    pagination: {
      el: '.swiper-pagination',
    },
  
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    scrollbar: {
      el: '.swiper-scrollbar',
    }
  });

  $(function(){
   $(window).on('scroll', function(){
        $('.fadein').each(function(){
            let position = $(this).offset().top;
            let scroll = $(window).scrollTop();
            let windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
              $(this).addClass('active');
            }
        });
    });
});