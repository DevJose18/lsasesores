<?php
$csrfToken = generateCsrfToken();
?>
  <!-- ======================================================================
       2. HERO SECTION (Imagen de Fondo, H1, Descripción y CTA)
       ====================================================================== -->
  <section class="hero-section text-center" id="hero">
    <div class="container py-5" style="max-width: 900px;">
      <div class="mb-3">
        <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2); color: var(--color-primary);">
          ● Solidez, Ética y Seguridad Patrimonial
        </span>
      </div>

      <h1 class="hero-title mb-4">
        Asesoría Estratégica para Empresas que <span class="hero-highlight">Buscan Trascender</span>
      </h1>

      <p class="fs-5 text-light opacity-75 mb-4 mx-auto" style="max-width: 700px; line-height: 1.7;">
        Optimizamos tu estructura fiscal, contable y corporativa con un modelo de consultoría preventivo, transparente y de máxima rentabilidad.
      </p>

      <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap mb-5">
        <a href="#contacto" class="btn btn-primary btn-lg px-4 py-3">
          Solicitar Asesoría
          <svg class="ms-1" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </a>
        <a href="#servicios" class="btn btn-outline-light btn-lg px-4 py-3">
          Conocer Servicios
        </a>
      </div>

      <!-- Métricas en Hero -->
      <div class="row pt-4 border-top border-secondary border-opacity-25 text-center g-3">
        <div class="col-4">
          <div class="hero-stat-number">+15</div>
          <div class="small text-light opacity-75 text-uppercase fw-semibold">Años de Éxito</div>
        </div>
        <div class="col-4">
          <div class="hero-stat-number">+500</div>
          <div class="small text-light opacity-75 text-uppercase fw-semibold">Empresas Asesoradas</div>
        </div>
        <div class="col-4">
          <div class="hero-stat-number">99.4%</div>
          <div class="small text-light opacity-75 text-uppercase fw-semibold">Fidelización</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       3. SECCIÓN DE LOGOS (Fila Centrada con 5 Logos en Escala de Grises)
       ====================================================================== -->
  <section class="logos-section py-5" id="logos">
    <div class="container text-center">
      <p class="text-uppercase text-secondary fw-bold small mb-4" style="letter-spacing: 0.12em;">
        Compañías líderes que confían en nuestras soluciones
      </p>
      
      <div class="d-flex justify-content-center align-items-center flex-wrap gap-4 gap-md-5">
        <!-- Logo 1 -->
        <div class="logo-item" title="Nexus Global Partners">
          <svg viewBox="0 0 160 40" fill="currentColor">
            <circle cx="20" cy="20" r="14" fill="none" stroke="currentColor" stroke-width="4"/>
            <path d="M12 20h16M20 12v16" stroke="currentColor" stroke-width="3"/>
            <text x="44" y="26" font-family="sans-serif" font-weight="800" font-size="16" letter-spacing="2">NEXUS</text>
          </svg>
        </div>

        <!-- Logo 2 -->
        <div class="logo-item" title="Apex Ventures">
          <svg viewBox="0 0 150 40" fill="currentColor">
            <polygon points="20,8 34,32 6,32" fill="none" stroke="currentColor" stroke-width="3"/>
            <polygon points="20,16 28,30 12,30" fill="currentColor"/>
            <text x="42" y="26" font-family="sans-serif" font-weight="800" font-size="16" letter-spacing="2">APEX</text>
          </svg>
        </div>

        <!-- Logo 3 -->
        <div class="logo-item" title="Horizon Capital">
          <svg viewBox="0 0 170 40" fill="currentColor">
            <path d="M8 28 C 16 10, 24 10, 32 28" fill="none" stroke="currentColor" stroke-width="4"/>
            <circle cx="20" cy="18" r="4" fill="currentColor"/>
            <text x="44" y="26" font-family="sans-serif" font-weight="800" font-size="15" letter-spacing="2">HORIZON</text>
          </svg>
        </div>

        <!-- Logo 4 -->
        <div class="logo-item" title="Synergy Corporate">
          <svg viewBox="0 0 170 40" fill="currentColor">
            <circle cx="15" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="3"/>
            <circle cx="27" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="3"/>
            <text x="46" y="26" font-family="sans-serif" font-weight="800" font-size="15" letter-spacing="2">SYNERGY</text>
          </svg>
        </div>

        <!-- Logo 5 -->
        <div class="logo-item" title="Vanguard Group">
          <svg viewBox="0 0 180 40" fill="currentColor">
            <path d="M10 10 L22 30 L34 10" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            <text x="46" y="26" font-family="sans-serif" font-weight="800" font-size="15" letter-spacing="2">VANGUARD</text>
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       4. SECCIÓN DE SERVICIOS (Grid de Tarjetas con Imagen y Título)
       ====================================================================== -->
  <section class="py-5" id="servicios">
    <div class="container py-4">
      <div class="text-center mb-5">
        <span class="badge-custom mb-3">Nuestras Soluciones</span>
        <h2 class="display-6 fw-bold text-dark mb-3">Servicios Diseñados para Proteger y Crecer</h2>
        <p class="text-secondary mx-auto" style="max-width: 650px;">
          Soluciones personalizadas y rigurosas adaptadas a la estructura fiscal, societaria y legal de cada empresa.
        </p>
      </div>

      <div class="row g-4">
        <!-- Servicio 1 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=700&q=80" alt="Asesoría Fiscal" loading="lazy">
              <span class="service-badge">Tributario</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Asesoría Fiscal y Tributaria</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Planificación preventiva de tributos, auditoría contable previa y defensa ante autoridades tributarias.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Servicio 2 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=700&q=80" alt="Consultoría Financiera" loading="lazy">
              <span class="service-badge">Finanzas</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Consultoría Financiera & Contable</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Control de flujo de caja, balance general analítico y métricas de rentabilidad para la toma de decisiones.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Servicio 3 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=700&q=80" alt="Auditoría y Legal" loading="lazy">
              <span class="service-badge">Legal</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Auditoría & Cumplimiento Legal</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Dictámenes de estados contables, análisis de riesgos normativos y blindaje contractual para tu tranquilidad.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Servicio 4 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=700&q=80" alt="Gestión Laboral" loading="lazy">
              <span class="service-badge">Laboral</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Gestión Laboral & Nóminas</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Administración integral de nóminas, contratos directivos y prevención de contingencias ante la legislación laboral.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Servicio 5 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=700&q=80" alt="Estrategia Corporativa" loading="lazy">
              <span class="service-badge">Estrategia</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Estrategia Corporativa & M&A</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Reestructuración societaria, fusiones, adquisiciones y modelos de gobernanza para la escalabilidad.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Servicio 6 -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 service-card">
            <div class="service-card-img-wrapper">
              <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=700&q=80" alt="Modernización Digital" loading="lazy">
              <span class="service-badge">Innovación</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h3 class="h5 fw-bold text-dark mb-2">Modernización & Procesos Digitales</h3>
              <p class="text-secondary small flex-grow-1 mb-4">
                Automatización de reportes, integración de ERPs y digitalización documental con estrictos protocolos de seguridad.
              </p>
              <a href="#contacto" class="fw-bold text-dark text-decoration-none mt-auto">
                Solicitar información &rarr;
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       5. SECCIÓN DE DOS COLUMNAS (Imagen a la Izquierda, Texto a la Derecha)
       ====================================================================== -->
  <section class="py-5 bg-white border-top border-bottom" id="nosotros">
    <div class="container py-4">
      <div class="row align-items-center g-5">
        <!-- Columna Izquierda: Imagen -->
        <div class="col-12 col-lg-6">
          <div class="media-container pe-lg-3">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1000&q=80" alt="Equipo de LS Asesores" loading="lazy">
            <div class="floating-stat-card d-none d-sm-block">
              <div class="fs-3 fw-bold text-dark lh-1">100%</div>
              <div class="small text-secondary fw-semibold mt-1">Garantía de confidencialidad y rigor técnico en cada caso.</div>
            </div>
          </div>
        </div>

        <!-- Columna Derecha: Texto -->
        <div class="col-12 col-lg-6">
          <span class="badge-custom mb-3">Experiencia Comprobada</span>
          <h2 class="display-6 fw-bold text-dark mb-3">Claridad y Visión Estratégica en Cada Etapa</h2>
          <p class="text-secondary mb-4" style="line-height: 1.7;">
            En <strong>LS Asesores</strong> transformamos la complejidad de los marcos legales y fiscales en ventajas competitivas para tu negocio. Trabajamos con cercanía, proactividad y soluciones orientadas a resultados reales.
          </p>

          <div class="d-flex flex-column gap-3 mb-4">
            <div class="d-flex align-items-start gap-3">
              <div class="check-circle mt-1">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </div>
              <div>
                <strong class="text-dark d-block">Atención Directa y Personalizada</strong>
                <span class="text-secondary small">Trato continuo y directo con socios directores especialistas en tu sector.</span>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3">
              <div class="check-circle mt-1">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </div>
              <div>
                <strong class="text-dark d-block">Enfoque Preventivo y Seguro</strong>
                <span class="text-secondary small">Identificamos y mitigamos riesgos antes de que generen costes imprevistos.</span>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3">
              <div class="check-circle mt-1">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </div>
              <div>
                <strong class="text-dark d-block">Información Clara para Decisiones</strong>
                <span class="text-secondary small">Presentamos diagnósticos concisos y recomendaciones prácticas sin tecnicismos innecesarios.</span>
              </div>
            </div>
          </div>

          <a href="#contacto" class="btn btn-primary px-4 py-2">
            Contactar con un Especialista
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       6. FORMULARIO DE CONTACTO (Campos: Nombre, Asunto, Mensaje + Email)
       ====================================================================== -->
  <section class="py-5" id="contacto">
    <div class="container py-4" style="max-width: 820px;">
      <div class="text-center mb-5">
        <span class="badge-custom mb-3">Canal Directo</span>
        <h2 class="display-6 fw-bold text-dark mb-3">Inicia la Conversación</h2>
        <p class="text-secondary">
          Envíanos tu consulta y un asesor especialista se comunicará contigo en menos de 24 horas laborables.
        </p>
      </div>

      <!-- Alertas de Sesión PHP (Flash Messages) -->
      <?php if (!empty($_SESSION['flash'])): ?>
        <?php 
          $flash = $_SESSION['flash'];
          $isSuccess = ($flash['type'] === 'success');
          $alertClass = $isSuccess ? 'alert-success border-success' : 'alert-danger border-danger';
        ?>
        <div class="alert <?php echo $alertClass; ?> shadow-sm mb-4" role="alert">
          <div class="d-flex align-items-center gap-2">
            <?php if ($isSuccess): ?>
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <?php else: ?>
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            <?php endif; ?>
            <strong><?php echo htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8'); ?></strong>
          </div>

          <?php if (!empty($flash['errors'])): ?>
            <ul class="mb-0 mt-2 ps-4">
              <?php foreach ($flash['errors'] as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>

      <!-- Tarjeta del Formulario -->
      <div class="contact-card">
        <form action="process.php" method="POST" id="contactForm">
          <!-- Token CSRF para prevención de ataques -->
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">

          <!-- Campo Honeypot Oculto (Anti-Spam sin requerir JS) -->
          <div class="d-none">
            <label for="empresa_hp">No llenar este campo</label>
            <input type="text" id="empresa_hp" name="empresa_hp" tabindex="-1" autocomplete="off">
          </div>

          <div class="row g-3 mb-3">
            <!-- Campo: Nombre -->
            <div class="col-12 col-md-6">
              <label for="nombre" class="form-label fw-bold text-dark small">
                Nombre Completo <span class="text-danger">*</span>
              </label>
              <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                class="form-control" 
                placeholder="Ej. Juan Pérez" 
                required 
                minlength="3"
                maxlength="100"
                autocomplete="name"
              >
            </div>

            <!-- Campo: Correo Electrónico -->
            <div class="col-12 col-md-6">
              <label for="email" class="form-label fw-bold text-dark small">
                Correo Electrónico <span class="text-danger">*</span>
              </label>
              <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control" 
                placeholder="contacto@empresa.com" 
                required 
                maxlength="120"
                autocomplete="email"
              >
            </div>
          </div>

          <!-- Campo: Asunto -->
          <div class="mb-3">
            <label for="asunto" class="form-label fw-bold text-dark small">
              Asunto <span class="text-danger">*</span>
            </label>
            <input 
              type="text" 
              id="asunto" 
              name="asunto" 
              class="form-control" 
              placeholder="Ej. Asesoría en planificación fiscal corporativa" 
              required 
              minlength="3"
              maxlength="150"
            >
          </div>

          <!-- Campo: Mensaje -->
          <div class="mb-4">
            <label for="mensaje" class="form-label fw-bold text-dark small">
              Mensaje o Consulta <span class="text-danger">*</span>
            </label>
            <textarea 
              id="mensaje" 
              name="mensaje" 
              rows="5"
              class="form-control" 
              placeholder="Describe detalladamente los requerimientos de tu empresa..." 
              required 
              minlength="10"
              maxlength="3000"
            ></textarea>
          </div>

          <!-- Botón de Envío -->
          <button type="submit" class="btn btn-primary w-100 py-3 fs-6">
            Enviar Solicitud
          </button>
        </form>
      </div>
    </div>
  </section>
