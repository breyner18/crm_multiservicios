document.addEventListener("DOMContentLoaded", () => {
    // --- LÓGICA DE USUARIO PERFIL ---
    const savedUser = localStorage.getItem('crmUser') || 'Invitado';
    const profileKey = `crmUserProfile_${savedUser}`;
    
    // Cargar o crear perfil por defecto
    let profileData = {
        name: savedUser.charAt(0).toUpperCase() + savedUser.slice(1),
        username: savedUser,
        email: savedUser.toLowerCase() + '@multiserviciosplus.com',
        phone: '3225142264',
        address: 'Calle 10 #15-20, Popayán',
        dob: '1998-05-18',
        age: 28,
        gender: 'Masculino',
        occupation: 'estudiante',
        photo: ''
    };

    const savedProfile = localStorage.getItem(profileKey);
    if (savedProfile) {
        try {
            profileData = { ...profileData, ...JSON.parse(savedProfile) };
        } catch(e) {
            console.error("Error al decodificar el perfil de usuario", e);
        }
    } else {
        localStorage.setItem(profileKey, JSON.stringify(profileData));
    }

    // Función para actualizar los elementos de perfil en el DOM
    function applyProfileToUI() {
        // En el encabezado
        const nameDisplay = document.getElementById('user-name-display');
        const avatarImg = document.getElementById('user-avatar-img');
        const cardHolderName = document.getElementById('card-holder-name');
        const welcomeTitle = document.querySelector('.page-title'); // "Bienvenido Cristian1893d"

        const defaultAvatar = `https://ui-avatars.com/api/?name=${encodeURIComponent(profileData.name)}&background=e63946&color=fff`;
        const profilePhotoUrl = profileData.photo || defaultAvatar;

        if (nameDisplay) {
            nameDisplay.textContent = profileData.name;
        }
        if (cardHolderName) {
            cardHolderName.textContent = profileData.name.toUpperCase();
        }
        if (avatarImg) {
            avatarImg.src = profilePhotoUrl;
        }
        if (welcomeTitle && welcomeTitle.textContent.startsWith('Bienvenido')) {
            welcomeTitle.textContent = `Bienvenido ${profileData.name}`;
        }

        // Rellenar formulario de perfil si está presente
        const profName = document.getElementById('prof-name');
        const profUsername = document.getElementById('prof-username');
        const profEmail = document.getElementById('prof-email');
        const profPhone = document.getElementById('prof-phone');
        const profAddress = document.getElementById('prof-address');
        const profDob = document.getElementById('prof-dob');
        const profAge = document.getElementById('prof-age');
        const profGender = document.getElementById('prof-gender');
        const profOccupation = document.getElementById('prof-occupation');
        const previewImg = document.getElementById('profile-preview-img');

        if (profName) profName.value = profileData.name;
        if (profUsername) profUsername.value = profileData.username;
        if (profEmail) profEmail.value = profileData.email;
        if (profPhone) profPhone.value = profileData.phone;
        if (profAddress) profAddress.value = profileData.address;
        if (profDob) profDob.value = profileData.dob;
        if (profAge) profAge.value = profileData.age;
        if (profGender) profGender.value = profileData.gender;
        if (profOccupation) profOccupation.value = profileData.occupation;
        if (previewImg) previewImg.src = profilePhotoUrl;

        // Rellenar widget de información en el resumen de inicio
        const widgetEmail = document.getElementById('widget-email');
        const widgetPhone = document.getElementById('widget-phone');
        const widgetOccupation = document.getElementById('widget-occupation');
        const widgetAge = document.getElementById('widget-age');

        if (widgetEmail) widgetEmail.textContent = profileData.email;
        if (widgetPhone) widgetPhone.textContent = profileData.phone;
        if (widgetOccupation) widgetOccupation.textContent = profileData.occupation;
        if (widgetAge) widgetAge.textContent = `${profileData.age} años`;
    }

    // Inicializar perfil en UI
    applyProfileToUI();

    // Guardar cambios en el formulario
    window.saveProfile = function(event) {
        event.preventDefault();
        
        profileData.name = document.getElementById('prof-name').value;
        profileData.email = document.getElementById('prof-email').value;
        profileData.phone = document.getElementById('prof-phone').value;
        profileData.dob = document.getElementById('prof-dob').value;
        profileData.age = parseInt(document.getElementById('prof-age').value) || 0;
        profileData.gender = document.getElementById('prof-gender').value;
        profileData.occupation = document.getElementById('prof-occupation').value;
        profileData.address = document.getElementById('prof-address').value;
        
        const previewImg = document.getElementById('profile-preview-img');
        if (previewImg && previewImg.src && !previewImg.src.startsWith('https://ui-avatars.com')) {
            profileData.photo = previewImg.src;
        }

        // Guardar
        localStorage.setItem(profileKey, JSON.stringify(profileData));
        applyProfileToUI();
        
        alert("¡Perfil actualizado correctamente con toda la información básica!");
    };

    // Previsualizar la foto cargada por File API en base64
    window.previewProfilePhoto = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.size > 2 * 1024 * 1024) {
                alert("La foto supera el límite de 2MB. Seleccione una más liviana.");
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('profile-preview-img');
                if (previewImg) {
                    previewImg.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    };

    // --- LÓGICA DE NAVEGACIÓN ---
    // Redirigir al perfil al hacer click en el avatar/nombre superior
    const topAvatar = document.querySelector('.top-header .avatar');
    if (topAvatar) {
        topAvatar.addEventListener('click', () => {
            const profileNav = document.querySelector('.nav-item[data-target="profile"]');
            if (profileNav) {
                profileNav.click();
            }
        });
    }

    const navItems = document.querySelectorAll('.nav-item[data-target]');
    const contentSections = document.querySelectorAll('.content-section');

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            
            navItems.forEach(nav => nav.classList.remove('active'));
            item.classList.add('active');

            contentSections.forEach(section => section.classList.remove('active'));
            
            const targetId = item.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.add('active');
            }
        });
    });

    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            // Aquí se podría implementar el filtrado visual
        });
    });

    // --- BASE DE DATOS LOCAL (LOCALSTORAGE) ---
    const DB_KEY = 'crm_multiservicios_db';

    // Datos por defecto si no existe la base de datos
    const defaultData = {
        balance: 450000,
        transactions: [
            { date: '17/05/2026', partner: 'Clínica San José', category: 'medical', categoryName: 'Médico', amount: -30000, savings: 30000 },
            { date: '15/05/2026', partner: 'Gimnasio SmartFit', category: 'sports', categoryName: 'Deportes', amount: 0, savings: 80000 },
            { date: '12/05/2026', partner: 'Supermercado Éxito', category: 'retail', categoryName: 'Supermercado', amount: -150000, savings: 15000 },
            { date: '10/05/2026', partner: 'Cine Colombia', category: 'entertainment', categoryName: 'Entretenimiento', amount: -15000, savings: 15000 },
            { date: '05/05/2026', partner: 'Recarga de Tarjeta', category: 'system', categoryName: 'Sistema', amount: 500000, savings: 0 }
        ]
    };

    function getDB() {
        const data = localStorage.getItem(DB_KEY);
        if (data) {
            return JSON.parse(data);
        } else {
            localStorage.setItem(DB_KEY, JSON.stringify(defaultData));
            return defaultData;
        }
    }

    function saveDB(data) {
        localStorage.setItem(DB_KEY, JSON.stringify(data));
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0 }).format(amount);
    }

    function updateUI() {
        const db = getDB();
        
        // Actualizar Saldo
        const balanceElement = document.getElementById('balance-amount');
        if (balanceElement) {
            balanceElement.innerHTML = `${formatCurrency(db.balance)} <span>COP</span>`;
        }

        // Actualizar Estadísticas
        const usedServices = db.transactions.filter(t => t.amount <= 0).length;
        const totalSavings = db.transactions.reduce((acc, t) => acc + (t.savings || 0), 0);
        
        const statValues = document.querySelectorAll('.stat-value');
        if (statValues.length >= 2) {
            statValues[0].textContent = usedServices;
            statValues[1].textContent = totalSavings >= 1000 ? `$${(totalSavings/1000).toFixed(0)}K` : formatCurrency(totalSavings);
        }

        // Barra VIP
        const progressFill = document.querySelector('.progress-fill');
        const progressLabel = document.querySelector('.progress-container label');
        if(progressFill && progressLabel) {
            const maxVipEvents = 10;
            const currentVipEvents = usedServices > maxVipEvents ? maxVipEvents : usedServices;
            const percentage = (currentVipEvents / maxVipEvents) * 100;
            progressFill.style.width = `${percentage}%`;
            progressLabel.textContent = `Límite de eventos VIP consumidos (${currentVipEvents}/${maxVipEvents})`;
        }

        // Actualizar Tabla Transacciones
        const tbody = document.getElementById('transaction-list');
        if (tbody) {
            tbody.innerHTML = '';
            db.transactions.forEach(t => {
                const tr = document.createElement('tr');
                
                let amountText = '';
                let amountClass = '';
                if (t.amount > 0) {
                    amountText = `+${formatCurrency(t.amount)}`;
                    amountClass = 'positive';
                } else if (t.amount === 0) {
                    amountText = `-${formatCurrency(0)} (Plan VIP)`;
                } else {
                    amountText = `-${formatCurrency(Math.abs(t.amount))}`;
                }

                let savingsText = t.savings > 0 ? `+${formatCurrency(t.savings)}` : '--';

                tr.innerHTML = `
                    <td>${t.date}</td>
                    <td>${t.partner}</td>
                    <td><span class="badge category-${t.category}">${t.categoryName}</span></td>
                    <td class="${amountClass}">${amountText}</td>
                    <td class="${t.savings > 0 ? 'savings' : ''}">${savingsText}</td>
                `;
                tbody.appendChild(tr);
            });
        }
    }

    // 1. Inicializar Interfaz con Base de Datos
    updateUI();

    // --- LÓGICA DE RECARGAS ---
    const rechargeBtns = document.querySelectorAll('.recharge-btn[data-amount], .recharge-btn-animated[data-amount]');
    rechargeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const amount = parseInt(btn.getAttribute('data-amount'));
            processRecharge(amount);
        });
    });

    window.customRecharge = function() {
        const val = prompt("Ingresa el valor a recargar en COP (Ej: 50000):");
        if (val) {
            const amount = parseInt(val.replace(/\D/g,''));
            if (amount >= 10000) {
                processRecharge(amount);
            } else {
                alert("El valor mínimo de recarga es $10.000");
            }
        }
    };

    function processRecharge(amount) {
        const db = getDB();
        db.balance += amount;
        
        const today = new Date();
        const dateStr = `${today.getDate().toString().padStart(2, '0')}/${(today.getMonth()+1).toString().padStart(2, '0')}/${today.getFullYear()}`;
        
        db.transactions.unshift({
            date: dateStr,
            partner: 'Recarga de Tarjeta',
            category: 'system',
            categoryName: 'Sistema',
            amount: amount,
            savings: 0
        });

        saveDB(db);
        updateUI();
        alert(`¡Recarga exitosa de ${formatCurrency(amount)}!\nSu nuevo saldo es: ${formatCurrency(db.balance)}`);
        
        document.querySelector('.nav-item[data-target="overview"]').click();
    }

    // --- LÓGICA DE COMPRAS (SIMULACIÓN CONVENIOS) ---
    window.simulatePurchase = function(partnerName, category, cost, savingsAmount) {
        const db = getDB();
        
        if (db.balance < cost) {
            alert(`Saldo insuficiente.\nNecesita ${formatCurrency(cost)} pero tiene ${formatCurrency(db.balance)}.\nPor favor, recargue su tarjeta.`);
            document.querySelector('.nav-item[data-target="card"]').click();
            return;
        }

        const confirmMsg = cost > 0 
            ? `¿Desea pagar ${formatCurrency(cost)} en ${partnerName} usando su Tarjeta Multiservicios?`
            : `¿Desea usar su beneficio de Plan VIP ($0) en ${partnerName}?`;
            
        if (confirm(confirmMsg)) {
            db.balance -= cost;
            
            const today = new Date();
            const dateStr = `${today.getDate().toString().padStart(2, '0')}/${(today.getMonth()+1).toString().padStart(2, '0')}/${today.getFullYear()}`;
            
            const categoryNames = {
                'medical': 'Médico',
                'sports': 'Deportes',
                'retail': 'Supermercado',
                'entertainment': 'Entretenimiento'
            };

            db.transactions.unshift({
                date: dateStr,
                partner: partnerName,
                category: category,
                categoryName: categoryNames[category] || 'Otros',
                amount: -cost,
                savings: savingsAmount
            });

            saveDB(db);
            updateUI();
            
            const successMsg = cost > 0 
                ? `¡Transacción exitosa!\nSe descontó ${formatCurrency(cost)} de su tarjeta.\nAhorró ${formatCurrency(savingsAmount)} gracias a su plan.`
                : `¡Acceso concedido (Beneficio VIP)!\nAhorró ${formatCurrency(savingsAmount)}.`;
            alert(successMsg);
            
            document.querySelector('.nav-item[data-target="transactions"]').click();
        }
    };

    // --- LÓGICA DE BÚSQUEDA UNIVERSAL (SPOTLIGHT) ---
    const searchInput = document.getElementById('dashboard-search-input');
    const searchDropdown = document.getElementById('search-results-dropdown');

    if (searchInput && searchDropdown) {
        // Ocultar dropdown al hacer click fuera
        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
                searchDropdown.style.display = 'none';
            }
        });

        searchInput.addEventListener('focus', () => {
            if (searchInput.value.trim().length > 0) {
                searchDropdown.style.display = 'block';
            }
        });

        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim().toLowerCase();
            
            // 1. Filtrado local al vuelo (Convenios y Transacciones en la sección activa)
            filterDOMActiveContent(query);

            if (query.length === 0) {
                searchDropdown.style.display = 'none';
                searchDropdown.innerHTML = '';
                return;
            }

            searchDropdown.style.display = 'block';
            
            // 2. Búsqueda Universal en base de datos y secciones
            const results = {
                sections: [],
                partners: [],
                transactions: []
            };

            // A. Buscar en Secciones
            const sectionsList = [
                { name: 'Inicio / Resumen', target: 'overview', icon: '🏠', desc: 'Vista general, saldo y widgets' },
                { name: 'Mi Tarjeta Prepago', target: 'card', icon: '💳', desc: 'Recargar saldo y ver tarjeta digital' },
                { name: 'Directorio de Convenios', target: 'partners', icon: '🤝', desc: 'Clínicas, gimnasios, cines y spa' },
                { name: 'Historial de Transacciones', target: 'transactions', icon: '📊', desc: 'Lista detallada de consumos y ahorros' },
                { name: 'Mi Perfil de Usuario', target: 'profile', icon: '👤', desc: 'Gestionar foto, contraseña y datos personales' }
            ];

            sectionsList.forEach(sec => {
                if (sec.name.toLowerCase().includes(query) || sec.desc.toLowerCase().includes(query)) {
                    results.sections.push(sec);
                }
            });

            // B. Buscar en Convenios (DOM)
            const partnerCards = document.querySelectorAll('.partner-card');
            partnerCards.forEach((card, index) => {
                const name = card.querySelector('h4').textContent;
                const desc = card.querySelector('p').textContent;
                const discount = card.querySelector('.partner-discount').textContent;
                
                if (name.toLowerCase().includes(query) || desc.toLowerCase().includes(query)) {
                    results.partners.push({
                        name: name,
                        desc: desc,
                        discount: discount,
                        element: card,
                        index: index
                    });
                }
            });

            // C. Buscar en Transacciones (DB)
            const db = getDB();
            db.transactions.forEach(t => {
                if (t.partner.toLowerCase().includes(query) || t.categoryName.toLowerCase().includes(query)) {
                    results.transactions.push(t);
                }
            });

            // Renderizar resultados en el dropdown
            renderSearchResults(results);
        });
    }

    function filterDOMActiveContent(query) {
        // Filtrar tarjetas de convenios si están visibles
        const partnerCards = document.querySelectorAll('.partner-card');
        partnerCards.forEach(card => {
            const name = card.querySelector('h4').textContent.toLowerCase();
            const desc = card.querySelector('p').textContent.toLowerCase();
            if (name.includes(query) || desc.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Filtrar filas de transacciones
        const trs = document.querySelectorAll('#transaction-list tr');
        trs.forEach(tr => {
            const text = tr.textContent.toLowerCase();
            if (text.includes(query)) {
                tr.style.display = '';
            } else {
                tr.style.display = 'none';
            }
        });
    }

    function renderSearchResults(results) {
        searchDropdown.innerHTML = '';
        let hasAnyResults = false;

        // Secciones
        if (results.sections.length > 0) {
            hasAnyResults = true;
            const catDiv = document.createElement('div');
            catDiv.className = 'search-category';
            catDiv.innerHTML = `<div class="search-category-title">Secciones del Dashboard</div>`;
            
            results.sections.forEach(sec => {
                const item = document.createElement('div');
                item.className = 'search-item';
                item.innerHTML = `
                    <span class="item-icon">${sec.icon}</span>
                    <div class="item-details">
                        <span class="item-name">${sec.name}</span>
                        <span class="item-sub">${sec.desc}</span>
                    </div>
                `;
                item.addEventListener('click', () => {
                    const navBtn = document.querySelector(`.nav-item[data-target="${sec.target}"]`);
                    if (navBtn) navBtn.click();
                    searchDropdown.style.display = 'none';
                    searchInput.value = '';
                    // Limpiar filtros del DOM
                    filterDOMActiveContent('');
                });
                catDiv.appendChild(item);
            });
            searchDropdown.appendChild(catDiv);
        }

        // Convenios
        if (results.partners.length > 0) {
            hasAnyResults = true;
            const catDiv = document.createElement('div');
            catDiv.className = 'search-category';
            catDiv.innerHTML = `<div class="search-category-title">Convenios Disponibles</div>`;
            
            results.partners.forEach(partner => {
                const item = document.createElement('div');
                item.className = 'search-item';
                item.innerHTML = `
                    <span class="item-icon">🤝</span>
                    <div class="item-details">
                        <span class="item-name">${partner.name} <small style="color: var(--primary-red); font-weight: bold;">(${partner.discount})</small></span>
                        <span class="item-sub">${partner.desc}</span>
                    </div>
                `;
                item.addEventListener('click', () => {
                    // Navegar a la sección
                    const navBtn = document.querySelector('.nav-item[data-target="partners"]');
                    if (navBtn) navBtn.click();
                    
                    searchDropdown.style.display = 'none';
                    searchInput.value = '';
                    filterDOMActiveContent('');

                    // Desplazamiento suave al elemento y resaltado temporario
                    setTimeout(() => {
                        partner.element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        partner.element.style.borderColor = 'var(--primary-red)';
                        partner.element.style.boxShadow = '0 0 25px rgba(230, 57, 70, 0.4)';
                        partner.element.style.transform = 'translateY(-10px)';
                        
                        setTimeout(() => {
                            partner.element.style.borderColor = '';
                            partner.element.style.boxShadow = '';
                            partner.element.style.transform = '';
                        }, 2500);
                    }, 300);
                });
                catDiv.appendChild(item);
            });
            searchDropdown.appendChild(catDiv);
        }

        // Transacciones
        if (results.transactions.length > 0) {
            hasAnyResults = true;
            const catDiv = document.createElement('div');
            catDiv.className = 'search-category';
            catDiv.innerHTML = `<div class="search-category-title">Historial de Transacciones</div>`;
            
            // Mostrar hasta un máximo de 5 transacciones para evitar saturación
            const slicedTransactions = results.transactions.slice(0, 5);
            slicedTransactions.forEach(t => {
                const item = document.createElement('div');
                item.className = 'search-item';
                
                const amountText = t.amount > 0 ? `+ $${t.amount.toLocaleString()}` : `- $${Math.abs(t.amount).toLocaleString()}`;
                const amountColor = t.amount > 0 ? 'var(--accent-blue)' : '#f87171';
                
                item.innerHTML = `
                    <span class="item-icon">📋</span>
                    <div class="item-details">
                        <span class="item-name">${t.partner} <span style="color: ${amountColor}; font-weight: bold; font-size: 0.85rem; margin-left: 8px;">${amountText}</span></span>
                        <span class="item-sub">Fecha: ${t.date} | Categoría: ${t.categoryName}</span>
                    </div>
                `;
                item.addEventListener('click', () => {
                    const navBtn = document.querySelector('.nav-item[data-target="transactions"]');
                    if (navBtn) navBtn.click();
                    
                    searchDropdown.style.display = 'none';
                    searchInput.value = '';
                    filterDOMActiveContent('');

                    // Desplazar a la tabla de transacciones
                    setTimeout(() => {
                        const table = document.querySelector('.transactions-container');
                        if (table) table.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 300);
                });
                catDiv.appendChild(item);
            });
            searchDropdown.appendChild(catDiv);
        }

        if (!hasAnyResults) {
            searchDropdown.innerHTML = `<div class="search-no-results">❌ No se encontraron resultados que coincidan con la búsqueda.</div>`;
        }
    }
});
