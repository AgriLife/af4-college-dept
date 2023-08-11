/* jQuery function to make stat row numbers animate */
/* We have to use "jQuery" instead of $ (and other shorthand) to avoid conflicts with other functions in WordPress */
jQuery(document).ready(function(e) {   
var a = 0;

var top = (jQuery('#stat-row').offset() || { "top": NaN }).top;
if (isNaN(top)) {
    return;
  } else {

      jQuery(window).scroll(function() {

        var oTop = jQuery('#stat-row').offset().top - window.innerHeight;
        if (a == 0 && jQuery(window).scrollTop() > oTop) {


      jQuery('.uagb-ifb-title-prefix').each(function () {
          jQuery(this).prop('Counter',0).animate({
              Counter: jQuery(this).text()
          }, {
              duration: 2000,
              easing: 'linear',
              step: function (now) {
                  jQuery(this).text(Math.ceil(now));
              }
          });
      });
          a = 1;

      }

      })
  }
});