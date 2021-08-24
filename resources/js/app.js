//Add Postes
require('./bootstrap');
window.Vue = require('vue');
Vue.component('add-postes', require('./components/AddPostes.vue').default);
const app = new Vue({
    el: '#addPostes',
    methods:{
        add: function(){
            this.postes.push({
                id: this.nextPosteId++
            })
        }
    },
    data: {
        postes:[
            {
                id: 1,
            }
        ],
        nextPosteId: 2,
    },
});


$(document).ready(function () {
    'use strict';
  
    /* Sidebar On Mobile */
    var fixHeight = function fixHeight() {
      $('.navbar-nav').css('max-height', document.documentElement.clientHeight - 100);
      $('#notifications, #messages, #user').addClass('d-none');
    };
    fixHeight();
    $(window).resize(function () {
      fixHeight();
    });
    $('.navbar .navbar-toggler').on('click', function () {
      fixHeight();
    });
    $('.navbar-toggler, .overlay').on('click', function () {
      $('.mobileMenu, .overlay').toggleClass('open');
    });
  
    /* Show And Hide Notification,Messages,User Content */
    $('.nav-link.notifications').click(function (e) {
      HideOrShow(e, "#notifications");
    });
    $('.nav-link.messages').click(function (e) {
      HideOrShow(e, "#messages");
    });
    $('.nav-link.user').click(function (e) {
      HideOrShow(e, "#user");
    });
  
    function HideOrShow(e, t) {
      e.preventDefault();
      $('.mobileMenu, .overlay').removeClass('open');
  
      if (!$(t).hasClass('d-none')) {
        $(t).addClass('d-none');
        return;
      }
  
      $('#notifications, #messages, #user').addClass('d-none');
      $(t).toggleClass('d-none');
    }
  
    /* Counter In Index Page */
    $('.counter').each(function () {
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration: 2200,
        easing: 'swing',
        step: function step(now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
  
      /* Show/Hise Payment */
    $('.payment-tab-trigger > input').on('change', event=>{
      $('.payment-tab').removeClass('payment-tab-active');
      event.target.parentNode.parentNode.classList.add('payment-tab-active');
    });
  
    /* Recap In Payment Page*/
    $("#price").keyup(function(){
      $('#TVA').text("$"+(Math.round($(this).val()*0.1*100)/100));
      $('#finalPrice').text("$"+(Math.round($(this).val()*1.1*100)/100));
    });
  });

