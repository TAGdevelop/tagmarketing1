

jQuery( document ).ready( function( $ ) {

// for dropdown selection
 $("#sel-location").on('change',  function(event) {
    	event.preventDefault();
    	$sel_location_id = $(this).val();
    	if($sel_location_id == 'all') {
    		$('.fc-event.d-none').removeClass('d-none');
    	} else {
    		$('.fc-event').addClass('d-none');
    		$('.fc-event.'+$sel_location_id).removeClass('d-none');
    	}
    });

    $("#sel-studio").on('change',  function(event) {
        event.preventDefault();
        $sel_location_id = $(this).val();
        if($sel_location_id == 'all') {
            $('.desktop-calendar .single-class.d-none').removeClass('d-none');
        } else {
            $('.desktop-calendar .single-class').addClass('d-none');
            $('.desktop-calendar .single-class.'+$sel_location_id).removeClass('d-none');
        }
    });




  // Show-hide classes for calendar category
  $(".sort-class-button").on("click", function() {
    $(".desktop-calendar .single-class").addClass("hidden");
    $(".sort-class-button.show-all").removeClass('-selected');
    $(this).toggleClass('-selected');
    var selectedArray = $(".sort-class-button.-selected");
    if(selectedArray.length === 0) {
      $(".desktop-calendar .single-class").removeClass("hidden");
      $(".sort-class-button.show-all").addClass('-selected');
    } else {
      var classIDArray = [];
      for(var i=0; i < selectedArray.length; i++) {
        classIDArray.push($(selectedArray[i]).data("class-id"));
      }
      for(var i=0; i < classIDArray.length; i++) {
        $("."+classIDArray[i]).removeClass("hidden");
      }
    }
    recalculateTabHeight();
  });
  $(".sort-class-button.show-all").on("click", function() {
    $(".sort-class-button:not(.show-all)").removeClass('-selected');
    $(".desktop-calendar .single-class").removeClass("hidden");
    recalculateTabHeight();
  });


 
  // Variables defined here
  var clickedTab = $(".tabs > li.lower_tab.active");
  var tabWrapper = $(".tab__content");
  var activeTab = tabWrapper.find(".active");
  var activeTabHeight = activeTab.outerHeight();





// resets the all view
  function recalculateTabHeight() {
    activeTabHeight = activeTab.outerHeight();
    tabWrapper.stop().delay(0).animate({
      height: activeTabHeight
    });
  }




// hover popups info boxes dont work without it
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;
    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
  };
  
// class filters
  var eventType = getUrlParameter('filter-type');
  if (eventType) {
    $(".sort-class-button.show-all").removeClass('-selected');
    $(".sort-class-button[data-class-id='" + eventType +"']").addClass('-selected');
    $(".desktop-calendar .single-class:not(."+eventType+")").addClass("hidden");
    recalculateTabHeight();
  }

  var eventStudio = getUrlParameter('filter-studio');
  if (eventStudio) {
    $(".sort-class-button.show-all").removeClass('-selected');
    $(".sort-class-button[data-class-id='" + eventStudio +"']").addClass('-selected');
    $(".desktop-calendar .single-class:not(."+eventStudio+")").addClass("hidden");
    recalculateTabHeight();
  }

 

// mobile view script
  $('body').on('click','.mobile-calendar .info-button', function(e) {
    if($(this).hasClass('-active')) {
      $(this).parents('.single-class').find('.calendar-button').removeClass('-active');
    }
    $(this).toggleClass('-active');
    $(this).parents('.single-class').find('.info-panel').toggleClass('-hidden');
    $(this).parents('.single-class').find('.add-to-cal-panel').hide();
  });

  $('body').on('click','.calendar-button', function(e) {
    $(this).toggleClass('-active');
    $(this).parents('.single-class').find('.add-to-cal-panel').slideToggle('fast', function() {
    if ($(this).is(':visible'))
      $(this).css('display','flex');
    });
  });

  $('body').on('click','.desktop-calendar .info-button', function(e) {
    $(this).toggleClass('-active');
    $(this).parents('.single-class').find('.info-panel').toggleClass('-hidden');
  });

  $('body').on('click','.desktop-calendar .info-button, .desktop-calendar .calendar-button', function(e) {
    if($(this).siblings('.info-button, .calendar-button').hasClass('-active') || $(this).hasClass('-active')) {
      if(!$(this).parents('.single-class').find('.option-panel').hasClass('-visible')) {
        $(this).parents('.single-class').find('.option-panel').toggleClass('-visible');
      }
    } else {
      $(this).parents('.single-class').find('.option-panel').toggleClass('-visible');
    }
  });

  $(document).on("click", ".unclickable > a",function(e) {
    e.preventDefault();
  });



  $('.studio-name').on("click",function(){
    $(this).toggleClass('opened');
    setTimeout(function(){
      recalculateTabHeight();
    }, 500);
    $(this).parents('.studio-wrapper').find('.studio-classes-wrapper').slideToggle();
  });



});
