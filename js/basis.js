jQuery(document).ready(function($) {

// Responsive video fix

$('iframe').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});
  
$('embed').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});

$('object').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});

//make side by side paragraphs equal height
function resetHeight() {
	var maxHeight = 0;
   $(".two-column-first").height("auto").each(function(){ 
       maxHeight = $(this).height(); 
   }).height(maxHeight);
	 $('.two-column-second').height(maxHeight);
}

resetHeight();
// reset height on resize of the window:
$(window).resize(function() { 
    resetHeight();
});

});