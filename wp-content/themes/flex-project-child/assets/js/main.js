jQuery(document).ready(function($) {
    
  $("a[target*='_blank']").attr('rel','noopener noreferrer');   
    
 
    
// EQUAL HEIGHT AMENITIES - see https://chicago.tagmarketingdesigns.com/
 // Select and loop the container row  of the elements you want to equalise
    $('.equal_wrap').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      $('.equal_item', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });  
            
      // Set the height of all those children to whichever was highest 
      $('.equal_item',this).height(highestBox);
                    
    });     
    
    
   //initialize swiper when document ready

  var alertSwiper = new Swiper ('.alert_swiper-container', {
      direction: 'horizontal',
      slidesPerView: 'auto', 
      observer: true, 
      observeParents: true, 
      loop: true, 
      centeredSlides: true,
   watchOverflow: true,
        autoplay: {
        delay: 8500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.elementor-swiper-button-next',
        prevEl: '.elementor-swiper-button-prev',
      },
      scrollbar: {
        el: '.swiper-scrollbar',
        hide: false,
      }

    });
    
    
// Goback for privacy pages

 $('#goback').on('click', function(e){
    e.preventDefault();
    window.history.back();
}); 
 
 
 // Store locator toggle
 $( "#wpsl-stores" ).on( "click", ".lctm_title", function() {    
       var i, len,
            $parentLi = $( this ).parents( "li" );
      $parentLi.find( ".lct_storewp" ).toggle();
      $(this).toggleClass('active');
  });

 $('.cr_location').click(function(event) {
        $('.wpsl-icon-direction').click();
        return false;
    });

  
  
    
    
});