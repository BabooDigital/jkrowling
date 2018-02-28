
// FILTER-GALERI TIMELINE OUT
$(document).ready(function(){
    $('.slider6').bxSlider({
        auto: true,
        autoHover: true,
        shrinkItems: true,
        slideWidth: 500,    
        minSlides: 1,
        // moveSlides: 2,
        // maxSlides: 2,
        pager: false,
        /* Controls must be true */
        controls: true,

        /* Class selectors from step 1 */
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',

        nextText: '<i class="fa fa-angle-right fa-2x contslider"></i>',
        prevText: '<i class="fa fa-angle-left fa-2x contslider"></i>',
      }); 
    $('.slider_login').bxSlider({
        // moveSlides: 2,
        // maxSlides: 2,
        pager: false,
        /* Controls must be true */
        controls: true,

        /* Class selectors from step 1 */
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',

        nextText: '<i class="fa fa-angle-right fa-2x contslider"></i>',
        prevText: '<i class="fa fa-angle-left fa-2x contslider"></i>',
      });       

    // clicking button with class "category-button"
    $(".btnfilter").click(function(){
        // get the data-filter value of the button
        var filterValue = $(this).attr('data-filter');
        
        // show all items
        if(filterValue == "all")
        {
            $(".all").show("slow");
        }
        else
        {   
            // hide all items
            $(".all").not('.'+filterValue).hide("slow");
            // and then, show only items with selected data-filter value
            $(".all").filter('.'+filterValue).show("slow");
        }
    });

    var window_width = $( window ).width();

    if (window_width < 768) {
      $(".stickymenu").trigger("sticky_kit:detach");
    } else {
      make_sticky();
    }

    $( window ).resize(function() {

      window_width = $( window ).width();

      if (window_width < 768) {
        $(".stickymenu").trigger("sticky_kit:detach");
      } else {
        make_sticky();
      }

    });

    function make_sticky() {
      $(".stickymenu").stick_in_parent();
    }

});