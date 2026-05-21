// Función interactiva exclusiva para el ojo de contraseña en Reset
function toggleResetPassword() {
    const passwordInput = document.getElementById("resetPasswordInput");
    const eyeIcon = document.getElementById("resetEyeIcon");
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
    }
}