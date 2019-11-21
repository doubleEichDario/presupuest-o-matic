import {isInvalid, typedCharsOnInput, dismissAlerts, isInvalidMessage, charCounter} from './functions.js';

let loading = document.getElementById('loading');
window.addEventListener("load", function() {
  loading.style.display = "none";
});

(function() {

  let familia = document.getElementById('familia');
  let descripcion = document.getElementById("descripcion");
  let unidadDeMedida = document.getElementById("u-medida");
  let createConceptBtn = document.getElementById("create-concepto");

  // Makes alerts dismissible
  dismissAlerts();

  // familia
  familia.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase();
    isInvalid(familia, '^[A-Z]{6,40}$', isInvalidMessage[0], createConceptBtn, charCounter[0]);
    typedCharsOnInput(familia, charCounter[0]);
  });

  // descripcion
  descripcion.addEventListener("keyup", function() {
    isInvalid(descripcion, '.{12,250}', isInvalidMessage[1], createConceptBtn, charCounter[1]);
    typedCharsOnInput(descripcion, charCounter[1]);
  });

  // unidad de medida
  unidadDeMedida.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase();
    isInvalid(unidadDeMedida, '^(?:PIEZA|LOTE|SERVICIO|M|M2|M3|TONELADA|KG|MILLAR|LITRO)$', isInvalidMessage[2], createConceptBtn, charCounter[2])
    typedCharsOnInput(unidadDeMedida, charCounter[2]);
  });

})();
