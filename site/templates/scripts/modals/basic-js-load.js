// This creates the css & js files for modals

[
    'https://the-chumney.github.io/grid/css/compiled/cagrid.css',
    'https://www.theautohost.com/sandbox/modal/css/iziModal.min.css'
].forEach(function(href) {
    var link = document.createElement('link');
    link.href = href;
    link.rel = "stylesheet";
    link.type = "text/css";
    document.head.appendChild(link);

}); // end creating styles

$.when(
    $.getScript("https://www.theautohost.com/sandbox/modal/js/js.cookie.js", function(){
    console.log("Chumney & Associates cookie was loaded.");
    }),
    $.getScript("https://www.theautohost.com/sandbox/modal/js/iziModal.min.js", function(){
        console.log("Chumney & Associates modal script was loaded.");
    }),
    $.getScript("https://www.theautohost.com/sandbox/modal/js/exit-intent.js", function(){
    console.log("Chumney & Associates exit intent was loaded.");
    })
).then(function() {

    if ($.isFunction(caModalCreateEntrance)) {
        caModalCreateEntrance();
    } else if ($.isFunction(caModalCreateExit)) {
        caModalCreateEntrance();
    }
    else {
        console.log('There are no modals currently available to use.')
    }


});





function validateCaForm() {
  var isValid = true;
  $('.form-field').each(function() {
    if ( $(this).val() === '' )
        isValid = false;
  });
  return isValid;
}