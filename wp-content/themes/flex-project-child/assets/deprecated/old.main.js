jQuery(document).ready(function($) {
    
 /** TAG Slider **/
     var owl2 = $('.flex-slidercats2');
              owl2.owlCarousel({
                items: 1,
                loop: false,
                rewind: true,
                animateOut: 'fadeOut',
                margin: 20,
                autoHeight: true,
                autoplay: true,
               autoplayTimeout: 4000,
                 dots: true,
                autoplayHoverPause: true,
                nav : true,
               //  video: true,
                 navText: ['<span class="fas fa-chevron-left fa-3x"></span>','<span class="fas fa-chevron-right fa-3x"></span>'],
      
              });
             // Stop slide onClick this element
               $('form').on('click', function() {
                owl2.trigger('stop.owl.autoplay');
              });
              // Start slide onClick these elements
              $('.owl-nav').on('click', function() {
                owl2.trigger('play.owl.autoplay', []);
              });
               $('.owl-dot').on('click', function() {
                owl2.trigger('play.owl.autoplay', []);
              });
                $('.slideimgmasterwrap').on('click', function() {
                owl2.trigger('play.owl.autoplay', []);
              });
               $('#header').on('click', function() {
                owl2.trigger('play.owl.autoplay', []);
              });
               $('#chicago_tpl').on('click', function() {
                owl2.trigger('play.owl.autoplay', []);
              });
              
              
 //  Reset autoplay timeout when scrolled by user - GLOBAL FIX
 //  https://github.com/OwlCarousel2/OwlCarousel2/issues/2452
$('.owl-carousel').on('click', '.owl-dots, .owl-nav', function(e) {
	$(this).closest('.owl-carousel').trigger('stop.owl.autoplay');
	$(this).closest('.owl-carousel').trigger('play.owl.autoplay');
});        
$('.owl-carousel').on('touchstart', 'img', function(e) {
	$(this).closest('.owl-carousel').trigger('stop.owl.autoplay');
});
$('.owl-carousel').on('touchend', 'img', function(e) {
	$(this).closest('.owl-carousel').trigger('play.owl.autoplay');
});



var owl = $(".owl-carousel");

owl.on('changed.owl.carousel', function(e) {
owl.trigger('stop.owl.autoplay');
owl.trigger('play.owl.autoplay');
});






/** End Tag Slider **/
    

    
    
    
});