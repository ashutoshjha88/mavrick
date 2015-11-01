	// Preloader

//<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
		
	$('a.gallery').nivoLightbox({
    effect: 'fade',                             // The effect to use when showing the lightbox
    theme: 'default',                           // The lightbox theme to use
    keyboardNav: true,                          // Enable/Disable keyboard navigation (left/right/escape)
    clickOverlayToClose: true,                  // If false clicking the "close" button will be the only way to close the lightbox
    onInit: function(){},                       // Callback when lightbox has loaded
    beforeShowLightbox: function(){},           // Callback before the lightbox is shown
    afterShowLightbox: function(lightbox){},    // Callback after the lightbox is shown
    beforeHideLightbox: function(){},           // Callback before the lightbox is hidden
    afterHideLightbox: function(){},            // Callback after the lightbox is hidden
    onPrev: function(element){},                // Callback when the lightbox gallery goes to previous item
    onNext: function(element){},                // Callback when the lightbox gallery goes to next item
    errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
});

$('#sticky-navbar').affix({
  offset: {
    top: 300
  }
});

$('#sticky-checkout').affix({
  offset: {
    top: 300
  }
});

/* activate scrollspy menu */
$( document ).ready(function() {
    //Scrollspy offset
    $("body").scrollspy({target: "#sticky-navbar", offset:100});
});
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
});


/*----------------Pagination----------------*/
 // This is a very simple demo that shows how a range of elements can
            // be paginated.
            // The elements that will be displayed are in a hidden DIV and are
            // cloned for display. The elements are static, there are no Ajax 
            // calls involved.
        
            /**
             * Callback function that displays the content.
             *
             * Gets called every time the user clicks on a pagination link.
             *
             * @param {int} page_index New Page index
             * @param {jQuery} jq the container with the pagination links as a jQuery object
             */
            function pageselectCallback(page_index, jq){
                var new_content = jQuery('#hiddenresult div.result:eq('+page_index+')').clone();
                $('#Searchresult').empty().append(new_content);
                return false;
            }
           
            /** 
             * Initialisation function for pagination
             */
            function initPagination() {
                // count entries inside the hidden content
                var num_entries = jQuery('#hiddenresult div.result').length;
                // Create content inside pagination element
                $("#Pagination").pagination(num_entries, {
                    callback: pageselectCallback,
                    items_per_page:1 // Show only one item per page
                });
             }
            
            // When document is ready, initialize pagination
            $(document).ready(function(){      
                
            });
			
/*tooltip*/		
 $("body").tooltip({ selector: '[data-toggle=tooltip]' });	
            