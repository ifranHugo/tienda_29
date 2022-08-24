function controlTag(e) {
  tecla = document.all ? e.keyCode : e.which;
  if (tecla == 8) return true;
  else if (tecla == 0 || tecla == 9) return true;
  patron = /[0-9\s]/;
  n = String.fromCharCode(tecla);
  return patron.test(n);
}
function testText(txtString) {
  var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜ\s]+$/);
  if (stringText.test(txtString)) {
    return true;
  } else {
    return false;
  }
}
function testEntero(intCant) {
  var intCantidad = new RegExp(/^([0-9])*$/);
  if (intCantidad.test(intCant)) {
    return true;
  } else {
    return false;
  }
}
function fntEmailValidate(email) {
  var stringEmail = new RegExp(
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})*$/
  );
  if (stringEmail.test(email)) {
    return true;
  } else {
    return false;
  }
}
function fntValidText() {
  $(document).on("keyup", ".validText", (e) => {
    let el = e.target;
    if (!testText(el.value)) {
      el.classList.add("is-invalid");
    } else {
      el.classList.remove("is-invalid");
    }
  });
}
function fntValidNumber() {
  $(document).on("keyup", ".validNumber", (e) => {
    let el = e.target;
    if (!testEntero(el.value)) {
      el.classList.add("is-invalid");
    } else {
      el.classList.remove("is-invalid");
    }
  });
}
function fntValidEmail() {
  $(document).on("keyup", ".validEmail", (e) => {
    let el = e.target;
    if (!fntEmailValidate(el.value)) {
      el.classList.add("is-invalid");
    } else {
      el.classList.remove("is-invalid");
    }
  });
}
window.addEventListener(
  "load",
  () => {
    fntValidText();
    fntValidEmail();
    fntValidNumber();
  },
  false
);
