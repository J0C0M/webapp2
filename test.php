<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>AOS - Animate on scroll library</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="CSS/test.css" />
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="js-scroll-counter scroll-counter"></div>
    <div class="aos-all">
      <div data-id="1" class="aos-item" data-aos="fade-up"></div>
      <div data-id="2" class="aos-item" data-aos="fade-down"></div>
      <div data-id="3" class="aos-item" data-aos="zoom-out-down"></div>
      <div data-id="4" class="aos-item" data-aos="flip-down"></div>
      <div data-id="5" class="aos-item" data-aos="flip-up"></div>
      <div data-id="6" class="aos-item" data-aos="fade-down"></div>
      <div data-id="7" class="aos-item" data-aos="fade-in"></div>
      <div data-id="8" class="aos-item" data-aos="fade-down"></div>
      <div data-id="9" class="aos-item" data-aos="fade-in"></div>
      <div data-id="10" class="aos-item" data-aos="fade-down" data-aos-id="super-duper"></div>
      <div data-id="11" class="aos-item" data-aos="fade-up"></div>
      <div data-id="12" class="aos-item" data-aos="fade-down"></div>
      <div data-id="13" class="aos-item" data-aos="fade-in"></div>
      <div data-id="14" class="aos-item" data-aos="fade-up"></div>
      <div data-id="15" class="aos-item" data-aos="fade-in"></div>
      <div data-id="16" class="aos-item" data-aos="fade-up"></div>
      <div data-id="17" class="aos-item" data-aos="fade-down"></div>
      <div data-id="18" class="aos-item" data-aos="fade-up"></div>
      <div data-id="19" class="aos-item" data-aos="zoom-out"></div>
      <div data-id="20" class="aos-item" data-aos="fade-up"></div>
      <div data-id="21" class="aos-item" data-aos="zoom-out"></div>
      <div data-id="22" class="aos-item" data-aos="fade-in"></div>
      <div data-id="23" class="aos-item" data-aos="zoom-out-up"></div>
      <div data-id="24" class="aos-item" data-aos="zoom-out-down"></div>
    </div>

    <script src="dist/aos.js"></script>
    <script>
      document.querySelector('html').classList.remove('no-js');
      if (!window.Cypress) {
        const scrollCounter = document.querySelector('.js-scroll-counter');

        AOS.init({
          mirror: true
        });

        document.addEventListener('aos:in', function(e) {
          console.log('in!', e.detail);
        });

        window.addEventListener('scroll', function() {
          scrollCounter.innerHTML = window.pageYOffset;
        });
      }
    </script>
  </body>
</html>