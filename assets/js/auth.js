document.addEventListener("DOMContentLoaded", () => {
    // Manejo del Cierre Automático de las Alertas del Login
    setTimeout(() => {
        const alerts = document.querySelectorAll('.auto-close');
        alerts.forEach(alert => {
            alert.style.transition = "all 0.5s ease";
            alert.style.opacity = "0";
            alert.style.transform = "translateY(-10px)";
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
});

// Función para el ojo de la contraseña exclusivo del Login
function toggleLoginPassword() {
    const passwordField = document.getElementById("passInput");
    const passwordIcon = document.getElementById("passIcon");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.classList.replace("bi-eye", "bi-eye-slash");
    } else {
        passwordField.type = "password";
        passwordIcon.classList.replace("bi-eye-slash", "bi-eye");
    }
}