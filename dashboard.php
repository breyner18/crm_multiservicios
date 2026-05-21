<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Como index.php está al lado de dashboard.php, la ruta es directa:
    header("Location: index.php"); 
    exit(); 
}

// Recogemos la variable de sesión dentro del mismo bloque PHP
$nombreUsuario = $_SESSION['usuario']; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard - Multiservicios Plus</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body style="background: url('Imagenes/fondo.jpg') center/cover no-repeat fixed;">
    <div class="crm-container" style="background: transparent;">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="Imagenes/Logo.png" alt="Multiservicios Plus" class="sidebar-logo" onerror="this.src='https://via.placeholder.com/150x50?text=Logo'">
                <h2>MULTISERVICIOS PLUS</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active" data-target="overview">
                    <span class="icon">📊</span> SERVICIOS
                </a>
                <a href="#" class="nav-item" data-target="card">
                    <span class="icon">💳</span> MI TARJETA PREPAGO
                </a>
                <a href="#" class="nav-item" data-target="transactions">
                    <span class="icon">📋</span> REGISTRO EVENTOS
                </a>
                <a href="#" class="nav-item" data-target="plans">
                    <span class="icon">⭐</span> PLANES
                </a>
                <a href="#" class="nav-item" data-target="partners">
                    <span class="icon">🤝</span> CONVENIOS
                </a>
                <a href="#" class="nav-item" data-target="profile">
                    <span class="icon">👤</span> MI PERFIL
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="controllers/logout.php" class="nav-item logout">
                    <span class="icon">🚪</span> CERRAR SESIÓN
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="top-header">
                <div class="header-search">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="dashboard-search-input" placeholder="Buscar convenios, secciones, transacciones..." autocomplete="off">
                    <div class="search-results-dropdown" id="search-results-dropdown"></div>
                </div>
                <div class="user-profile">
                    <div class="notifications">🔔<span class="badge">3</span></div>
                    <div class="avatar">
                        <img id="user-avatar-img" src="https://ui-avatars.com/api/?name=<?= urlencode($nombreUsuario) ?>&background=e63946&color=fff" alt="User Avatar">
                        <span id="user-name-display"><?= htmlspecialchars($nombreUsuario) ?></span>
                    </div>
                </div>
            </header>

            <div class="content-area" style="background: url('Imagenes/fondo.jpg') center/cover no-repeat fixed;">
                <section id="overview" class="content-section active">
                    <h1 class="page-title">Bienvenido <?= htmlspecialchars($nombreUsuario) ?></h1>
                    
                    <div class="dashboard-grid">
                        <div class="widget card-widget" style="display: flex; flex-direction: column; justify-content: space-between;">
                            <h3 style="font-size: 1.1rem; color: #111827; font-weight: 600; margin-bottom: 15px;">Mi Tarjeta Prepago</h3>
                            <div class="prepaid-card-image-container" style="text-align: center; margin-bottom: 20px;">
                                <img src="Imagenes/tarjetavip.jpg" alt="Tarjeta VIP" style="width: 100%; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.15);">
                            </div>
                            <div class="card-balance-info" style="text-align: left;">
                                <h3 style="font-size: 0.95rem; color: #4b5563; font-weight: 500; margin-bottom: 5px;">Saldo Disponible</h3>
                                <p class="balance-amount" id="balance-amount" style="font-size: 2.2rem; font-weight: 800; color: #111827; margin: 0;">$ 565.000 <span style="font-size: 1rem; font-weight: 600;">COP</span></p>
                            </div>
                        </div>

                        <div class="widget plan-widget">
                            <h3 style="font-size: 1.1rem; color: #111827; font-weight: 600; margin-bottom: 15px;">Plan Actual</h3>
                            <div class="current-plan-badge vip" style="background-color: #f59e0b; color: rgb(255, 255, 255); display: inline-block; padding: 6px 16px; border-radius: 20px; font-weight: 600; font-size: 0.9rem; margin-bottom: 20px;">Plan VIP</div>
                            <ul class="plan-benefits-list" style="list-style: none; padding: 0; margin-bottom: 30px; color: #111827; font-size: 0.95rem; line-height: 2.2;">
                                <li>✓ Consultas médicas con 50% DCTO</li>
                                <li>✓ Acceso a red de gimnasios premium</li>
                                <li>✓ Entradas de cine 2x1 mensuales</li>
                                <li>✓ Spa y Estética con 30% DCTO</li>
                            </ul>
                            <button class="btn-action outline" onclick="document.querySelector('[data-target=\'plans\']').click()" style="width: 100%; background: #e2e8f0; border: none; color: #1e293b; font-weight: 600; padding: 12px; border-radius: 50px; cursor: pointer; transition: background 0.3s;">Cambiar de Plan</button>
                        </div>

                        <div class="widget info-widget" style="display: flex; flex-direction: column; justify-content: space-between;">
                            <h3 style="font-size: 1.1rem; color: #111827; font-weight: 600; margin-bottom: 15px;">Información Personal</h3>
                            <div class="personal-info-summary" style="text-align: left; margin-bottom: 20px;">
                                <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                                    <span style="color: #64748b; font-size: 0.9rem; font-weight: 500;">Correo:</span>
                                    <strong id="widget-email" style="color: #1e293b; font-size: 0.9rem;">--</strong>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                                    <span style="color: #64748b; font-size: 0.9rem; font-weight: 500;">Contacto:</span>
                                    <strong id="widget-phone" style="color: #1e293b; font-size: 0.9rem;">--</strong>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                                    <span style="color: #64748b; font-size: 0.9rem; font-weight: 500;">Ocupación:</span>
                                    <strong id="widget-occupation" style="color: #1e293b; font-size: 0.9rem; text-transform: capitalize;">--</strong>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                                    <span style="color: #64748b; font-size: 0.9rem; font-weight: 500;">Edad:</span>
                                    <strong id="widget-age" style="color: #1e293b; font-size: 0.9rem;">-- años</strong>
                                </div>
                            </div>
                            <button class="btn-action primary w-100" onclick="document.querySelector('.nav-item[data-target=\'profile\']').click()" style="background: #0ea5e9; font-weight: 600; padding: 12px; border-radius: 50px; cursor: pointer; transition: background 0.3s; border: none; color: white;">Editar Información</button>
                        </div>

                        <div class="widget usage-widget">
                            <h3 style="font-size: 1.1rem; color: #111827; font-weight: 600; margin-bottom: 15px;">Resumen de Uso</h3>
                            <div class="usage-stats" style="display: flex; gap: 15px; margin: 20px 0 30px 0;">
                                <div class="stat-item" style="flex: 1; background: #e2e8f0; padding: 25px 15px; border-radius: 12px; text-align: center;">
                                    <span class="stat-value" style="display: block; font-size: 2.2rem; font-weight: bold; color: #111827; margin-bottom: 5px;">7</span>
                                    <span class="stat-label" style="font-size: 0.85rem; color: #4b5563; font-weight: 500;">Servicios Usados</span>
                                </div>
                                <div class="stat-item" style="flex: 1; background: #e2e8f0; padding: 25px 15px; border-radius: 12px; text-align: center;">
                                    <span class="stat-value" style="display: block; font-size: 2.2rem; font-weight: bold; color: #111827; margin-bottom: 5px;">$215K</span>
                                    <span class="stat-label" style="font-size: 0.85rem; color: #4b5563; font-weight: 500;">Ahorro Generado</span>
                                </div>
                            </div>
                            <div class="progress-container">
                                <label style="font-size: 0.9rem; color: #111827; margin-bottom: 12px; display: block; font-weight: 500;">Límite de eventos VIP consumidos (7/10)</label>
                                <div class="progress-bar" style="height: 14px; background: #e2e8f0; border-radius: 10px; overflow: hidden; width: 100%;">
                                    <div class="progress-fill" style="width: 70%; height: 100%; background: #0ea5e9; border-radius: 10px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="card" class="content-section">
                    <h1 class="page-title">Gestión de Tarjeta Prepago</h1>
                    <div class="card-management">
                        <p style="color: var(--text-muted); margin-bottom: 30px;">Visualiza y administra los fondos de tu tarjeta de forma interactiva.</p>
                        <div class="recharge-animation-panel">
                            <div class="animated-card-container">
                                <img src="Imagenes/tarjeta.png" alt="Tarjeta Básico" class="floating-card-img">
                            </div>
                            <div class="recharge-options-panel">
                                <h3 style="margin-bottom: 20px; font-size: 1.5rem; color: var(--text-main);">Opciones de Recarga Rápida</h3>
                                <div class="recharge-grid-animated">
                                    <button class="recharge-btn-animated" data-amount="50000">
                                        <div class="amount">$50.000</div>
                                        <div class="bonus">+ Puntos CRM</div>
                                    </button>
                                    <button class="recharge-btn-animated" data-amount="100000">
                                        <div class="amount">$100.000</div>
                                        <div class="bonus">Mes Gratis Básico</div>
                                    </button>
                                    <button class="recharge-btn-animated" data-amount="200000">
                                        <div class="amount">$200.000</div>
                                        <div class="bonus">Upgrade a VIP</div>
                                    </button>
                                    <button class="recharge-btn-animated" custom" onclick="customRecharge()">
                                        <div class="amount">Otro Valor</div>
                                        <div class="bonus">Monto Libre</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="transactions" class="content-section">
                    <h1 class="page-title">Control de Eventos y Uso</h1>
                    <div class="transactions-container">
                        <table class="transactions-table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Establecimiento / Convenio</th>
                                    <th>Categoría</th>
                                    <th>Valor Transacción</th>
                                    <th>Ahorro CRM</th>
                                </tr>
                            </thead>
                            <tbody id="transaction-list">
                            </tbody>
                        </table>
                    </div>
                </section>

                <section id="plans" class="content-section">
                    <h1 class="page-title">Planes de Servicio y Montos</h1>
                    <div class="plans-grid">
                        <div class="plan-card">
                            <h3>Básico</h3>
                            <div class="plan-price">$20.000 <span>/ mes</span></div>
                            <div style="margin-bottom: 15px; text-align: center;">
                                <img src="Imagenes/tarjeta.png" alt="Tarjeta VIP" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                            </div>
                            <ul>
                                <li>Descuentos del 10% en convenios</li>
                                <li>Atención médica general</li>
                                <li>Tarjeta prepago virtual</li>
                            </ul>
                            <button class="btn-action outline w-100">Seleccionar</button>
                        </div>
                        <div class="plan-card">
                            <h3>Estándar</h3>
                            <div class="plan-price">$50.000 <span>/ mes</span></div>
                            <div style="margin-bottom: 15px; text-align: center;">
                                <img src="Imagenes/Estandar.png" alt="Tarjeta VIP" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                            </div>
                            <ul>
                                <li>Descuentos del 25% en convenios</li>
                                <li>Atención médica + Especialistas</li>
                                <li>Acceso a gimnasios básicos</li>
                                <li>Tarjeta prepago física</li>
                            </ul>
                            <button class="btn-action outline w-100">Seleccionar</button>
                        </div>
                        <div class="plan-card featured">
                            <div class="featured-badge">Tu Plan Actual</div>
                            <h3>VIP</h3>
                            <div class="plan-price">$100.000 <span>/ mes</span></div>
                            <div style="margin-bottom: 15px; text-align: center;">
                                <img src="Imagenes/tarjetavip.jpg" alt="Tarjeta VIP" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                            </div>
                            <ul>
                                <li>Descuentos del 50% en convenios</li>
                                <li>Cobertura médica total</li>
                                <li>Gimnasios Premium</li>
                                <li>Spa, cines y eventos VIP</li>
                                <li>Tarjeta prepago Golden</li>
                            </ul>
                            <button class="btn-action primary w-100">Administrar</button>
                        </div>
                    </div>
                </section>

                <section id="partners" class="content-section">
                    <h1 class="page-title" style="text-align: center; font-size: 2.5rem; margin-bottom: 30px;">Directorio de Convenios</h1>
                    <div class="partners-filters" style="justify-content: center;">
                        <button class="filter-btn active">Todos</button>
                        <button class="filter-btn">Supermercados</button>
                        <button class="filter-btn">Clínicas</button>
                        <button class="filter-btn">Gimnasios</button>
                        <button class="filter-btn">Cines</button>
                        <button class="filter-btn">Recreación</button>
                        <button class="filter-btn">Estética & Spa</button>
                    </div>
                    <div class="partners-grid">
                        <div class="partner-card">
                            <div class="partner-img bg-medical" style="padding: 5px;">
                                <img src="Imagenes/clinica.jpg" alt="Clínica La Estancia" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>CLÍNICA LA ESTANCIA</h4>
                            <p>Descuentos en consultas y exámenes.</p>
                            <span class="partner-discount">Hasta 50% DCTO</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('CLÍNICA LA ESTANCIA', 'medical', 30000, 30000)">Simular Consulta ($30k)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-sports" style="padding: 5px;">
                                <img src="Imagenes/smartfit.png" alt="Smart Fit" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>SMART FIT</h4>
                            <p>Acceso a todas las sedes nacionales.</p>
                            <span class="partner-discount">Incluido VIP</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('SMART FIT', 'sports', 0, 80000)">Simular Ingreso ($0)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-retail" style="padding: 5px;">
                                <img src="Imagenes/olimpica.png" alt="Olímpica" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>OLÍMPICA</h4>
                            <p>En toda la canasta familiar.</p>
                            <span class="partner-discount">10% de Reintegro</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('OLÍMPICA', 'retail', 150000, 15000)">Simular Compra ($150k)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-entertainment" style="padding: 5px;">
                                <img src="Imagenes/cinecolombia.png" alt="Cine Colombia" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>CINE COLOMBIA</h4>
                            <p>Entradas y combos preferenciales.</p>
                            <span class="partner-discount">2x1 Lunes a Jueves</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('CINE COLOMBIA', 'entertainment', 15000, 15000)">Simular Cine ($15k)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-retail" style="padding: 5px;">
                                <img src="Imagenes/exito.png" alt="Almacenes Éxito" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>ALMACENES ÉXITO</h4>
                            <p>Tecnología, hogar y supermercado.</p>
                            <span class="partner-discount">15% DCTO Adicional</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('ALMACENES ÉXITO', 'retail', 200000, 30000)">Simular Compra ($200k)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-retail" style="padding: 5px;">
                                <img src="Imagenes/jumbo.png" alt="Almacenes Jumbo" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>ALMACENES JUMBO</h4>
                            <p>Ofertas exclusivas en importados.</p>
                            <span class="partner-discount">Puntos Dobles CRM</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('ALMACENES JUMBO', 'retail', 180000, 18000)">Simular Compra ($180k)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-sports" style="padding: 5px;">
                                <img src="Imagenes/lavilla.png" alt="La Villa" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>CENTRO RECREATIVO LA VILLA</h4>
                            <p>Piscinas, canchas y zonas verdes.</p>
                            <span class="partner-discount">Entrada Familiar Gratis</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('CENTRO RECREATIVO LA VILLA', 'sports', 0, 50000)">Simular Ingreso ($0)</button>
                        </div>
                        <div class="partner-card">
                            <div class="partner-img bg-medical" style="padding: 5px;">
                                <img src="Imagenes/Spa.jpg" alt="Spa Angeles" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <h4>SALUD Y BELLEZA SPA ANGELES</h4>
                            <p>Masajes, relajación y tratamientos.</p>
                            <span class="partner-discount">30% DCTO en Paquetes</span>
                            <button class="btn-action primary w-100" style="margin-top: 15px;" onclick="simulatePurchase('SALUD Y BELLEZA SPA ANGELES', 'medical', 70000, 30000)">Simular Spa ($70k)</button>
                        </div>
                    </div>
                </section>

                <section id="profile" class="content-section">
                    <h1 class="page-title">Mi Perfil</h1>
                    <div class="widget" style="max-width: 800px; margin: 0 auto;">
                        <form id="profile-form" onsubmit="saveProfile(event)">
                            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #e5e7eb;">
                                <div style="position: relative; width: 100px; height: 100px;">
                                    <img id="profile-preview-img" src="https://ui-avatars.com/api/?name=<?= urlencode($nombreUsuario) ?>&background=e63946&color=fff" alt="Foto de Perfil" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #0ea5e9;">
                                    <label for="profile-photo-upload" style="position: absolute; bottom: 0; right: 0; background: #0f172a; color: white; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center; cursor: pointer; border: 2px solid white;">📷</label>
                                    <input type="file" id="profile-photo-upload" style="display: none;" accept="image/*" onchange="previewProfilePhoto(this)">
                                </div>
                                <div>
                                    <h3 style="margin-bottom: 5px; color: #111827;">Foto de Perfil</h3>
                                    <p style="color: #6b7280; font-size: 0.9rem;">Sube una foto en formato JPG o PNG (Max. 2MB)</p>
                                </div>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Nombre Completo</label>
                                    <input type="text" id="prof-name" value="<?= htmlspecialchars($nombreUsuario) ?>" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;" required>
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Nombre de Usuario <span style="font-size: 0.8rem; color: #ef4444;">(No modificable 🔒)</span></label>
                                    <input type="text" id="prof-username" value="<?= htmlspecialchars($nombreUsuario) ?>" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #e2e8f0; color: #64748b; cursor: not-allowed;" readonly required>
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Correo Electrónico</label>
                                    <input type="email" id="prof-email" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;" required>
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Número de Contacto</label>
                                    <input type="tel" id="prof-phone" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Fecha de Nacimiento</label>
                                    <input type="date" id="prof-dob" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Edad</label>
                                    <input type="number" id="prof-age" min="0" max="120" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Género</label>
                                    <select id="prof-gender" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                        <option value="">Seleccionar...</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Otro">Otro</option>
                                        <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Ocupación</label>
                                    <select id="prof-occupation" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                        <option value="">Seleccionar...</option>
                                        <option value="independiente">Independiente</option>
                                        <option value="empleado">Empleado</option>
                                        <option value="estudiante">Estudiante</option>
                                    </select>
                                </div>
                                <div class="form-group" style="grid-column: span 2;">
                                    <label style="display: block; margin-bottom: 8px; color: #4b5563; font-weight: 500;">Dirección de Residencia</label>
                                    <input type="text" id="prof-address" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                                </div>
                            </div>
                            
                            <div style="text-align: right; margin-top: 30px;">
                                <button type="submit" style="background: #0ea5e9; color: white; border: none; padding: 12px 30px; border-radius: 50px; font-weight: 600; cursor: pointer; transition: background 0.3s; font-size: 1rem;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>