$(document).ready(function(){
  
  $('#menu-menu-1 > .menu-item-has-children').mouseenter(function() {
    $('#menu-menu-1 > .menu-item-has-children').children('.sub-menu').fadeIn("fast");
  });
  
  $('main').mouseenter(function() {
    $('#menu-menu-1 > .menu-item-has-children > .sub-menu').fadeOut("fast");
  });

  var menuOut = 0;
  $('#burger').click(function(){
    if(menuOut) {
      $('#off-canvas').animate({"left":"-101vw"}, 600, "swing");
      menuOut = 0;
    } else { $('#off-canvas').animate({"left":"0vw"}, 600, "swing"); menuOut = 1; }
  });
  
  $('#arrow > a').on('click', function (e) {

    e.preventDefault();
    
    var  $target = $(this.hash);
    $('html, body').stop().animate({ 'scrollTop': $target.offset().top - 50 }, 600, 'swing');
    
  });
  
  var down = 0,
      i = 0;
  while(i<=100) {
    if(!down) {
      $('#arrow').animate({"padding-top":"10px"}, 900, "swing");
      down = 1;
    } 
    else { 
      $('#arrow').animate({"padding-top":"0px"}, 900, "swing"); 
      down = 0;
    }
    i++;
  }
  
});