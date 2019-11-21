/**
* @type {DOM}
*/
let isInvalidMessage = document.querySelectorAll(".is-invalid");

/**
* @type {DOM}
*/
let charCounter = document.getElementsByClassName("counting-chars-box");

/**
* @type {DOM}
*/
let inputs = document.getElementsByTagName("input");

/**
* Set styles for elements to guide user to input correct data
*
* @param {DOM element} input html input which to apply styles
* @param {string} strRegExp Regular expression to match
* @param {DOM element} message A span html element containing an error or mismatch message
* @param {DOM element} submitButton (Function) will make it unclickable
* @param {DOM element} charCounter Where to put char counting
*
* @return void
*/
function isInvalid(input, strRegExp, message, submitButton, charCounter) {

  let inputValue = input.value;
  let regex = new RegExp(strRegExp);

  if(inputValue.match(regex) == null) {

    input.setAttribute("valid", "false");
    input.style.border = '3px solid red';
    submitButton.disabled = true;
    message.style.display = 'block';
    if(arguments[4]) {
      charCounter.style.display = 'block';
    }

  } else {

    input.setAttribute("valid", "true");
    input.style.border = '1px solid #ccc';
    submitButton.disabled = false;
    message.style.display = 'none';
    if(arguments[4]) {
      charCounter.style.display = 'none';
    }
  }
}

/**
* It counts and shows the number of typed chars of an input as a guidance of users
*
* @param {DOM element} input html input which value to count to
* @param {DOM element} counterBox html input where to put counting
*
* @return void
*/
function typedCharsOnInput(input, counterBox) {
  let chars = input.value;
  let length = chars.length;
  counterBox.innerHTML = length;
}

/**
* Makes alerts dismissible
*
* @return void
*/
function dismissAlerts() {
  let dismisserBtn = document.getElementsByClassName("dismisser-btn");

  for(let i = 0; i < dismisserBtn.length; i++ ) {
    dismisserBtn[i].addEventListener("click", function() {
      let alert = document.getElementsByClassName("alert-container");
      alert[i].style.display = "none";
    });
  }
}

export {isInvalid, typedCharsOnInput, dismissAlerts, isInvalidMessage, charCounter};
