<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiservicios Plus - Cruz Roja</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="menu container">
            <div class="logo-text">MULTISERVICIOS <span class="logo-plus">PLUS</span></div>
            
            <div class="search-container">
                <input type="text" placeholder="Buscar convenios, servicios médicos, spa, entretenimiento..." id="search-input">
                <button class="search-btn" id="search-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </div>
            
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle"><img src="Imagenes/Menu.png" class="menu-icono" alt="Abrir Menú"></label>
            
            <nav class="navbar">
                <ul>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#asociados">Asociados</a></li>
                    <li><a href="#contactos">Contactos</a></li>
                    <li><a href="views/login.php" class="btn-auth" style="text-decoration: none; display: inline-block; text-align: center; box-sizing: border-box;">Iniciar Sesión</a></li>
                    <li><a href="views/register.php" class="btn-auth signup" style="text-decoration: none; display: inline-block; text-align: center; box-sizing: border-box;">Registrarse</a></li>
                </ul>
            </nav>
        </div>

        <div id="inicio" class="header-content container">
            <div class="header-txt">
                <h1>Convenios y Beneficios</h1>
                <p>
                    Descubre y disfruta de nuestros servicios exclusivos, descuentos en empresas aliadas y 
                    fidelización avanzada a través de tu tarjeta prepago con Multiservicios Plus.
                </p>
                <div class="botones-planes">
                    <a href="javascript:void(0)" class="btn-1 open-plan-btn" data-plan="basico">Plan Básico <span class="btn-icon">⚡</span></a>
                    <a href="javascript:void(0)" class="btn-2 open-plan-btn" data-plan="estandar">Plan Estándar <span class="btn-icon">💳</span></a>
                    <a href="javascript:void(0)" class="btn-3 open-plan-btn" data-plan="vip">Plan VIP <span class="btn-icon">💎</span></a>
                </div>

                <div class="hero-stats">
                    <div class="stat-box">
                        <span class="stat-number">10+</span>
                        <span class="stat-desc">Convenios Nacionales</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">24/7</span>
                        <span class="stat-desc">Asistencia Médica</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">100%</span>
                        <span class="stat-desc">Seguro y Sin Cuotas</span>
                    </div>
                </div>
            </div>
            <div class="header-img">
                <img src="Imagenes/integral.png" class="cruz-roja" alt="Cruz Roja Colombiana">
            </div>
        </div>
    </header>

    <main id="servicios" class="product-menu">
        <div class="container">
            <h2 class="title">Nuestros Servicios</h2>
            <p class="subtitle">Selecciona una categoría para explorar los beneficios de tu plan</p>
            
            <div class="menu-nav">
                <button class="tab active" data-tab="pro1">🩺 Servicios Médicos</button>
                <button class="tab" data-tab="pro2">🏋️‍♂️ Área Deportiva</button>
                <button class="tab" data-tab="pro3">💆‍♀️ Estética & Spa</button>
                <button class="tab" data-tab="pro4">🎬 Entretenimiento</button>
            </div>

            <div class="tab-container-content">
                <div id="pro1" class="tab-content active">
                    <div class="box-container">
                        <div class="box">
                            <div class="image"><img src="Imagenes/emergencias.png" alt="Consultas Médicas"></div>
                            <div class="content">
                                <h3>Consultas Médicas y Copagos</h3>
                                <p>Atención prioritaria y descuentos de hasta el 50% en consultas y exámenes de laboratorio.</p>
                                <div class="box-footer">
                                    <span class="price">Desde $30.000 / mes</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/medicina.png" alt="medicina"></div>
                            <div class="content">
                                <h3>Soporte Médico 24/7</h3>
                                <p>Línea de atención médica directa telefónica y orientación domiciliaria permanente.</p>
                                <div class="box-footer">
                                    <span class="price">Incluido en Plan VIP</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/clinica.jpg" alt="Exámenes Clínicos"></div>
                            <div class="content">
                                <h3>Exámenes de Laboratorio y Diagnósticos</h3>
                                <p>Convenios con laboratorios especializados para ecografías, radiografías y exámenes de sangre con 40% de descuento.</p>
                                <div class="box-footer">
                                    <span class="price">40% de Descuento</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pro2" class="tab-content">
                    <div class="box-container">
                        <div class="box">
                            <div class="image"><img src="Imagenes/smartfit.png" alt="Smart Fit"></div>
                            <div class="content">
                                <h3>Centros de Acondicionamiento</h3>
                                <p>Acceso preferencial y tarifas reducidas en complejos deportivos de la red Smart Fit.</p>
                                <div class="box-footer">
                                    <span class="price">Planes Especiales</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/lavilla.png" alt="Complejo Deportivo La Villa"></div>
                            <div class="content">
                                <h3>Centro Recreativo La Villa</h3>
                                <p>Ingreso a piscinas, zonas recreativas y canchas deportivas con tarifas de afiliado.</p>
                                <div class="box-footer">
                                    <span class="price">Beneficios Exclusivos</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/Deportes.jpg" alt="Tiendas Deportivas"></div>
                            <div class="content">
                                <h3>Descuento en Ropa Deportiva</h3>
                                <p>15% de reintegro directo en prendas, calzado y equipamiento en almacenes de retail deportivos aliados.</p>
                                <div class="box-footer">
                                    <span class="price">15% Cashback</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pro3" class="tab-content">
                    <div class="box-container">
                        <div class="box">
                            <div class="image"><img src="Imagenes/spa.png" alt="Spa Angeles"></div>
                            <div class="content">
                                <h3>Spa Angeles - Bienestar</h3>
                                <p>Masajes relajantes, tratamientos faciales y cuidado corporal con convenios preferenciales.</p>
                                <div class="box-footer">
                                    <span class="price">Descuentos de hasta 30%</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/Estetica.png" alt="Estética Avanzada"></div>
                            <div class="content">
                                <h3>Tratamientos Estéticos</h3>
                                <p>Procedimientos estéticos de vanguardia con especialistas y clínicas de estética aliadas.</p>
                                <div class="box-footer">
                                    <span class="price">Descuentos del 20%</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/Spa.jpg" alt="Relajación VIP"></div>
                            <div class="content">
                                <h3>Relajación y Masajes VIP</h3>
                                <p>Convenios exclusivos para masajes con piedras calientes, aromaterapia y peluquería en centros VIP.</p>
                                <div class="box-footer">
                                    <span class="price">Beneficios Exclusivos</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pro4" class="tab-content">
                    <div class="box-container">
                        <div class="box">
                            <div class="image"><img src="Imagenes/cinecolombia.png" alt="Cine Colombia"></div>
                            <div class="content">
                                <h3>Cine Colombia</h3>
                                <p>Entradas a salas de cine 2x1 y descuentos preferentes en confitería con tu tarjeta prepago.</p>
                                <div class="box-footer">
                                    <span class="price">Beneficios de Entretenimiento</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/olimpica.png" alt="Compras Aliadas"></div>
                            <div class="content">
                                <h3>Supermercados y Compras</h3>
                                <p>Beneficios y reembolsos del 10% en Almacenes Éxito, Olímpica y Jumbo al pagar con tu tarjeta.</p>
                                <div class="box-footer">
                                    <span class="price">Hasta 15% DCTO</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="image"><img src="Imagenes/playpoint.png" alt="Eventos y Parques"></div>
                            <div class="content">
                                <h3>Parques y Diversiones</h3>
                                <p>Tarifas especiales y accesos rápidos en parques infantiles, de diversiones y eventos familiares a nivel nacional.</p>
                                <div class="box-footer">
                                    <span class="price">Entradas desde $15.000</span>
                                    <span class="buy"><span class="buy-plus">+</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="asociados" class="partners-section">
        <div class="container">
            <h2 class="title">Nuestros Aliados y Convenios</h2>
            <p class="subtitle">Disfruta de beneficios exclusivos con las mejores marcas y entidades del país</p>
            
            <div class="partners-carousel">
                <div class="partner-item">
                    <img src="Imagenes/clinica.jpg" alt="Clínica La Estancia">
                    <span>Clínica La Estancia</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/smartfit.png" alt="Smart Fit">
                    <span>Smart Fit</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/olimpica.png" alt="Olímpica">
                    <span>Tiendas Olímpica</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/cinecolombia.png" alt="Cine Colombia">
                    <span>Cine Colombia</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/exito.png" alt="Almacenes Éxito">
                    <span>Almacenes Éxito</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/jumbo.png" alt="Almacenes Jumbo">
                    <span>Almacenes Jumbo</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/lavilla.png" alt="Centro Recreativo La Villa">
                    <span>Comfacauca</span>
                </div>
                <div class="partner-item">
                    <img src="Imagenes/Spa.jpg" alt="Spa Angeles">
                    <span>Spa Ángeles</span>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-plan" class="modal">
        <div class="modal-content plan-detail-modal">
            <span class="close-btn" id="close-plan">&times;</span>
            <div class="plan-detail-header">
                <span class="plan-badge" id="modal-plan-badge">PLAN</span>
                <h2 id="modal-plan-title">Plan Seleccionado</h2>
                <div class="modal-plan-price" id="modal-plan-price">$0 / mes</div>
            </div>
            <div class="plan-detail-body">
                <div class="plan-card-img-container">
                    <img id="modal-plan-image" src="" alt="Tarjeta del Plan">
                </div>
                <div class="plan-benefits-container">
                    <h4>Beneficios Incluidos:</h4>
                    <ul id="modal-plan-benefits">
                        </ul>
                </div>
            </div>
            <div class="plan-detail-footer">
                <button class="btn-submit" id="btn-acquire-plan">Suscribirse Ahora</button>
            </div>
        </div>
    </div>

    <footer id="contactos" class="footer-section">
        <div class="footer-content container">
            <div class="footer-brand">
                <img src="Imagenes/Logo.png" class="logo-footer" alt="Multiservicios Plus">
                <h3>Multiservicios Plus</h3>
                <p>Sistema CRM ágil con tarjeta prepagada diseñado para tu bienestar continuo.</p>
            </div>
            
            <div class="footer-info">
                <h4>Canales de Atención</h4>
                <ul class="contact-list">
                    <li>
                        <span class="icon">📞</span>
                        <div class="details">
                            <strong>Línea de Atención:</strong>
                            <span>+57 3225142264 - (602) 820 0000<br><small>Soporte Técnico 24/7</small></span>
                        </div>
                    </li>
                    <li>
                        <span class="icon">📍</span>
                        <div class="details">
                            <strong>Ubicación Principal:</strong>
                            <span>Calle 1N # 3-96 (Avenida Vásquez Cobo) Popayán, Cauca, Colombia</span>
                        </div>
                    </li>
                    <li>
                        <span class="icon">📧</span>
                        <div class="details">
                            <strong>Correo Electrónico:</strong>
                            <a href="mailto:multiservicios@cruzroja.org.co">multiservicios@cruzroja.org.co</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>Enlaces Rápidos & Legales</h4>
                <ul>
                    <li><a href="#"><svg class="footer-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg> Consultar Términos</a></li>
                    <li><a href="#"><svg class="footer-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg> Política de Privacidad</a></li>
                    <li><a href="#"><svg class="footer-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg> Soporte Técnico</a></li>
                    <li><a href="#"><svg class="footer-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg> Trabaja con Nosotros</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Ingeniería de Sistemas (FUP) | Diseñado para Cruz Roja Colombiana</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>