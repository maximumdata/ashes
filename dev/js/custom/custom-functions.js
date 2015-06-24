// functions for single blog pages

$.fn.fixElement = function(top, bottom) {
  // set element as fixed only after scrolling past a certain point
  
  var $window = $(window);
  if($window.width() >= 480) {
    if($window.scrollTop() >= $(top).offset().top) {
      if($window.scrollTop() + $(this).height() < $(bottom).offset().top ) {
        $(this).css("position", "fixed").css("top", "50px");
      } 
      else { 
        $(this).css("position","absolute");
      }
    } 
    else { 
      $(this).css("position", "relative").css("top","0"); 
    }
  }
};
  
$.fn.scrollToHash = function(hash) {
  // control scrolling when clicking a link with a hashtag
    
  var  $target = $(hash);
  $('html, body').stop().animate({ 'scrollTop': $target.offset().top - 50 }, 600, 'swing');
  
};

$.fn.bounceArrow = function(time, times) {
  // bounce the scroll arrow for awhile
  
  var down = 0,
      i = 0;
  while(i<=times) {
    if(!down) {
      $(this).animate({"padding-top":"10px"}, time, "swing");
      down = 1;
    } 
    else { 
      $(this).animate({"padding-top":"0px"}, time, "swing"); 
      down = 0;
    }
    i++;
  }
};

$.fn.linkHighlight = function() {
  // highlight links in the sidebar when hovering in the article, and vice-versa
  
  var selectorText = ".post-content > p > a, .sidebar-wrap > a";
  $(selectorText).mouseenter(function(){
    var $this = $(this);
    $(selectorText).each(function(){
      if( $(this).attr("href") == $this.attr("href") ) {
        $(this).addClass("hover");
      }
    });
  });
  $(selectorText).mouseleave(function(){
    var $this = $(this);
    $(selectorText).each(function(){
      if( $(this).attr("href") == $this.attr("href") ) {
        $(this).removeClass("hover");
      }
    });
  });
};

$.fn.linkToSidebar = function() {
  // search article for links, create duplicates in the sidebar
  // might use this in the future, but need to figure out a way to format output link text.
  
  $('.sidebar-wrap > a').each(function() {
    
  });
};

$.fn.linkSuperscript = function() {
  // take links from the article and add a footnote superscript to the corresponding link in the sidebar
  
  var curLinkCount = 1;
  $('.sidebar-wrap > a').each(function(){
    var $this = $(this);
    $('.post-content > p > a').each(function(){
      if( $this.attr("href") == $(this).attr("href") ) {
        $this.after("<span class='superscript'>"+curLinkCount+"</span>");
        $(this).after("<span class='superscript'>"+curLinkCount+"</span>");
        curLinkCount++;
      }
    });
  });
};


// index functions

$.fn.menuHoverDropdown = function(hoverElement) {
  // display dropdown category menu when hovering over "blog" link
  
  $(hoverElement).mouseenter(function() {
    $(hoverElement).children('.sub-menu').fadeIn("fast");
  });
  
  $('main').mouseenter(function() {
    $('.sub-menu').fadeOut("fast");
  });
  
};