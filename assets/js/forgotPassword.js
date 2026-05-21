document.addEventListener("DOMContentLoaded", () => {
    // Desvanecer alertas automáticamente después de 5 segundos
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