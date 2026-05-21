document.addEventListener("DOMContentLoaded", () => {
    
    // --- LÓGICA DE LAS PESTAÑAS (TABS) DE SERVICIOS ---
    const tabs = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            // Remover clase activa de todos los botones de pestaña
            tabs.forEach(t => t.classList.remove("active"));
            // Remover clase activa de todas las secciones de contenido
            contents.forEach(c => c.classList.remove("active"));

            // Añadir clase activa a la pestaña clickeada
            tab.classList.add("active");
            
            // Mostrar el contenido correspondiente mediante su ID
            const targetId = tab.getAttribute("data-tab");
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.add("active");
            }
        });
    });

    // --- LÓGICA DE LOS MODALES (AUTH) ---
    const modalLogin = document.getElementById("modal-login");
    const modalRegister = document.getElementById("modal-register");

    // Botones de Apertura
    const btnOpenLogin = document.getElementById("open-login");
    const btnOpenRegister = document.getElementById("open-register");

    // Botones de Cierre
    const btnCloseLogin = document.getElementById("close-login");
    const btnCloseRegister = document.getElementById("close-register");

    // Abrir Login
    btnOpenLogin.addEventListener("click", () => {
        modalLogin.style.display = "flex";
    });

    // Abrir Registro
    btnOpenRegister.addEventListener("click", () => {
        modalRegister.style.display = "flex";
    });

    // Cerrar Modales al presionar la 'X'
    btnCloseLogin.addEventListener("click", () => {
        modalLogin.style.display = "none";
    });

    btnCloseRegister.addEventListener("click", () => {
        modalRegister.style.display = "none";
    });

    // Cerrar si el usuario hace clic por fuera de la caja blanca del modal
    window.addEventListener("click", (e) => {
        if (e.target === modalLogin) {
            modalLogin.style.display = "none";
        }
        if (e.target === modalRegister) {
            modalRegister.style.display = "none";
        }
    });

    // --- LÓGICA DE SIMULACIÓN DE LOGIN ---
    const loginForm = document.querySelector('#modal-login .auth-form');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('login-email').value;
            const name = email.split('@')[0];
            localStorage.setItem('crmUser', name);
            window.location.href = 'dashboard.html';
        });
    }

    const registerForm = document.querySelector('#modal-register .auth-form');
    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('reg-name').value;
            localStorage.setItem('crmUser', name);
            window.location.href = 'dashboard.html';
        });
    }

    // --- LÓGICA DE DETALLES DE PLANES ---
    const planDetails = {
        basico: {
            title: "Plan Básico",
            price: "$20.000 / mes",
            badge: "Básico",
            badgeClass: "basico",
            image: "Imagenes/tarjeta.png",
            benefits: [
                "Descuentos del 10% en convenios asociados",
                "Atención médica general y prioritaria",
                "Tarjeta prepago virtual para pagos seguros"
            ]
        },
        estandar: {
            title: "Plan Estándar",
            price: "$50.000 / mes",
            badge: "Estándar",
            badgeClass: "estandar",
            image: "Imagenes/Estandar.png",
            benefits: [
                "Descuentos del 25% en convenios asociados",
                "Atención médica general y especialistas",
                "Acceso a gimnasios afiliados estándar",
                "Tarjeta prepago física y virtual"
            ]
        },
        vip: {
            title: "Plan VIP",
            price: "$100.000 / mes",
            badge: "VIP",
            badgeClass: "vip",
            image: "Imagenes/tarjetavip.jpg",
            benefits: [
                "Descuentos del 50% en todos los convenios",
                "Cobertura médica total y soporte prioritario",
                "Acceso a gimnasios premium a nivel nacional",
                "Zonas de spa, cines y eventos VIP incluidos",
                "Tarjeta prepago Golden física"
            ]
        }
    };

    const modalPlan = document.getElementById("modal-plan");
    const closePlan = document.getElementById("close-plan");
    const openPlanBtns = document.querySelectorAll(".open-plan-btn");

    if (modalPlan && closePlan) {
        openPlanBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const planKey = btn.getAttribute("data-plan");
                const plan = planDetails[planKey];
                
                if (plan) {
                    // Populate modal contents
                    document.getElementById("modal-plan-title").textContent = plan.title;
                    document.getElementById("modal-plan-price").textContent = plan.price;
                    
                    const badge = document.getElementById("modal-plan-badge");
                    badge.textContent = plan.badge;
                    badge.className = "plan-badge " + plan.badgeClass;
                    
                    document.getElementById("modal-plan-image").src = plan.image;
                    
                    const benefitsUl = document.getElementById("modal-plan-benefits");
                    benefitsUl.innerHTML = ""; // Clear
                    plan.benefits.forEach(benefit => {
                        const li = document.createElement("li");
                        li.textContent = benefit;
                        benefitsUl.appendChild(li);
                    });
                    
                    // Show modal
                    modalPlan.style.display = "flex";
                }
            });
        });

        closePlan.addEventListener("click", () => {
            modalPlan.style.display = "none";
        });

        window.addEventListener("click", (e) => {
            if (e.target === modalPlan) {
                modalPlan.style.display = "none";
            }
        });
    }

    // --- LÓGICA MENÚ MÓVIL ---
    const menuToggle = document.getElementById("menu-toggle");
    const navbar = document.querySelector(".navbar");

    if (menuToggle && navbar) {
        menuToggle.addEventListener("change", function() {
            if (this.checked) {
                navbar.classList.add("active");
            } else {
                navbar.classList.remove("active");
            }
        });
    }

    // --- LÓGICA DE BÚSQUEDA INTERACTIVA (FILTRO DE CONVENIOS/SERVICIOS) ---
    const searchInput = document.getElementById("search-input");
    const searchSubmit = document.getElementById("search-submit");

    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const query = searchInput.value.toLowerCase().trim();
            const allBoxes = document.querySelectorAll(".box-container .box");
            const allTabs = document.querySelectorAll(".tab");
            const allContents = document.querySelectorAll(".tab-content");

            if (query === "") {
                // Si la búsqueda está vacía, restauramos la visibilidad de todas las tarjetas
                allBoxes.forEach(box => {
                    box.style.display = "";
                    box.style.opacity = "1";
                });
                return;
            }

            let firstMatchingTabId = null;

            allBoxes.forEach(box => {
                const title = box.querySelector("h3").textContent.toLowerCase();
                const text = box.querySelector("p").textContent.toLowerCase();
                
                if (title.includes(query) || text.includes(query)) {
                    box.style.display = "";
                    box.style.opacity = "1";
                    
                    // Encontrar la pestaña contenedora de esta tarjeta
                    const parentTabContent = box.closest(".tab-content");
                    if (parentTabContent && !firstMatchingTabId) {
                        firstMatchingTabId = parentTabContent.getAttribute("id");
                    }
                } else {
                    box.style.display = "none";
                }
            });

            // Si encontramos una coincidencia, cambiamos automáticamente a la pestaña correspondiente
            if (firstMatchingTabId) {
                allTabs.forEach(t => {
                    if (t.getAttribute("data-tab") === firstMatchingTabId) {
                        t.classList.add("active");
                    } else {
                        t.classList.remove("active");
                    }
                });

                allContents.forEach(c => {
                    if (c.getAttribute("id") === firstMatchingTabId) {
                        c.classList.add("active");
                    } else {
                        c.classList.remove("active");
                    }
                });
            }
        });
    }

    if (searchSubmit && searchInput) {
        searchSubmit.addEventListener("click", () => {
            const serviciosSection = document.getElementById("servicios");
            if (serviciosSection) {
                serviciosSection.scrollIntoView({ behavior: "smooth" });
            }
        });

        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                const serviciosSection = document.getElementById("servicios");
                if (serviciosSection) {
                    serviciosSection.scrollIntoView({ behavior: "smooth" });
                }
            }
        });
    }
});