import {isInvalid, typedCharsOnInput, dismissAlerts, isInvalidMessage} from './functions.js';

// let loading = document.getElementById('loading');
// window.addEventListener("load", function() {
//   loading.style.display = "none";
// });

$(document).ready(function(){
  $('.fixed-action-btn').floatingActionButton();
});

(function() {

  // Makes alerts dismissible
  dismissAlerts();

  // Validate 'cantidad' in app.php
  var cantidad = document.getElementById('cantidad');
  var addButton = document.getElementById("add-concepto");

  cantidad.addEventListener("keyup", function() {
    isInvalid(cantidad, '(?:^\\d+$|^\\d+\\.\\d{1,2}$)', isInvalidMessage[0], addButton);
  });


  // Responsive menu on navbar
  var burger = document.getElementById("menu-trigger-icon");

  burger.addEventListener("click", function() {
    let links = document.getElementById("navigation-links");

    if(links.className === "menu-links") {
      links.className += " responsive";
    } else {
      links.className = "menu-links";
    }
  });

  // Expandable button functionality
  let expandBtn = document.getElementById('links-menu-group');

  expandBtn.addEventListener("click", function() {
    var conceptoLinks = document.getElementById('concepto-links');

    if(conceptoLinks.className === "button-group-links") {
      conceptoLinks.className += " visible";
    } else {
      conceptoLinks.className = "button-group-links";
    }
  });

})();
