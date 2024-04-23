// Obtener referencias a los elementos del DOM
const showPasswordCheckbox = document.getElementById("showPassword");
const passwordInput = document.getElementById("passwordInput");

// Agregar un evento de cambio al checkbox
showPasswordCheckbox.addEventListener("change", function () {
  // Si el checkbox está marcado, mostrar la contraseña
  if (this.checked) {
    passwordInput.type = "text";
  } else {
    // Si el checkbox está desmarcado, ocultar la contraseña
    passwordInput.type = "password";
  }
});
