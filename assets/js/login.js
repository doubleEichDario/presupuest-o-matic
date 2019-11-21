import {isInvalid, typedCharsOnInput, dismissAlerts, isInvalidMessage, charCounter} from './functions.js';

let loading = document.getElementById('loading');
window.addEventListener("load", function() {
  loading.style.display = "none";
});

(function() {

  let login = document.getElementById("login-nick");
  let pass = document.getElementById("login-pass");
  let loginBtn = document.getElementById("login-submit");

  // Makes alerts dismissible
  dismissAlerts();

  // validate login
  login.addEventListener("keyup", function() {
    isInvalid(login, '^\\w{6,24}$', isInvalidMessage[0], loginBtn, charCounter[0]);
    typedCharsOnInput(login, charCounter[0]);
  });

  // validate password
  pass.addEventListener("keyup", function() {
    isInvalid(pass, '^[a-zA-Z0-9]{8,12}$', isInvalidMessage[1], loginBtn, charCounter[1]);
    typedCharsOnInput(pass, charCounter[1]);
  });

})();
