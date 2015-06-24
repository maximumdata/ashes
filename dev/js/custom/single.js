$(document).ready(function(){
  
  $(document).linkHighlight();
  $(document).linkSuperscript();
  
  $('a[href^="#"]').on('click', function (e) {

    e.preventDefault();
    
    $(this).scrollToHash(this.hash);
    
  });
  
  
  
  $(window).on('scroll', function() {
    
    $('.sidebar-wrap').fixElement('#post','#comments');
    
  });
  
  $('#arrow').bounceArrow(900, 100);
  
});