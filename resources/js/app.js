$(document).ready(function() {
    'use strict';
    /* Sidebar On Mobile */
    var fixHeight = function() {
      $('.navbar-nav').css('max-height',document.documentElement.clientHeight-100);
    };
    fixHeight();
    $(window).resize(function() {fixHeight();});
    $('.navbar .navbar-toggler').on('click', function() {fixHeight();});
    $('.navbar-toggler, .overlay').on('click', function() {
      $('.mobileMenu, .overlay').toggleClass('open');
    });

    /* Show And Hide Notification,Messages,User Content */
    $('.nav-link.notifications').click(function(e){HideOrShow(e,"#notifications")});
    $('.nav-link.messages').click(function(e){HideOrShow(e,"#messages")});
    $('.nav-link.user').click(function(e){HideOrShow(e,"#user")});
    function HideOrShow(e,t){
        e.preventDefault();
        if(!$(t).hasClass('d-none')){
            $(t).addClass('d-none');
            return
        }
        $('#notifications, #messages, #user').addClass('d-none');
        $(t).toggleClass('d-none');
    }

    /* Counter In Index Page */
    $('.counter').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: 2200,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
      });
    });
});
  