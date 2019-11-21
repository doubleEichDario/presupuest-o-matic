import {isInvalid, typedCharsOnInput, dismissAlerts, isInvalidMessage, charCounter} from './functions.js';

let loading = document.getElementById('loading');
window.addEventListener("load", function() {
  loading.style.display = "none";
});

(function() {

  let pass = document.getElementById('pass');
  let nickName = document.getElementById('nickname');
  var submitButton = document.querySelector("button[type=\"submit\"]");

  // Makes alerts dismissible
  dismissAlerts();

  // validate Nickname
  nickName.addEventListener("keyup", function() {
    isInvalid(nickName, '^\\w{6,24}$', isInvalidMessage[0], submitButton, charCounter[0]);
    typedCharsOnInput(nickName, charCounter[0]);
  });

  // validate Contraseña
  pass.addEventListener("keyup", function() {
    isInvalid(pass, '^[a-zA-Z0-9]{8,12}$', isInvalidMessage[1], submitButton, charCounter[1]);
    typedCharsOnInput(pass, charCounter[1]);
  });

})();
