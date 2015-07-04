$(document).ready(function(){
  $(document).menuHoverDropdown('#menu-menu-1 > .menu-item-has-children');
  $('.menu-item-has-children').addDownArrow();
  $(document).linkHighlight();
  $(document).linkSuperscript();
  
  $.fn.mobileMenu();
  
  $('a[href^="#"]').on('click', function (e) {

    e.preventDefault();
    
    $(this).scrollToHash(this.hash);
    
  });
  
  
  
  $(window).on('scroll', function() {
    
    $('.sidebar-wrap').fixElement('#post','#comments');
    
  });
  
  $('#arrow').bounceArrow(900, 100);
  
  /*$('#social > li').hover(function(){
    $(this).children(".name").css("margin-left", "5px");
  }, function(){
    $(this).children(".name").css("margin-left", "-25vw");
  });*/
  
});