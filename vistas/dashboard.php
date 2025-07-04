<?php
require_once '../servicios/verificar_sesion.php';
verificarSesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM - Dashboard</title>
    <link rel="stylesheet" href="../componentes/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Añadir FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
           <img src="../componentes/img/logo2.png" alt="Logo" />
        </div>
        <div class="sidebar-menu">
            <a href="dashboard.php" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Inicio</span>
            </a>
            <a href="productos.php" class="menu-item">
                <i class="fas fa-box"></i>
                <span class="menu-text">Productos</span>
            </a>
            <a href="categorias.php" class="menu-item">
                <i class="fas fa-tags"></i>
                <span class="menu-text">Categorías</span>
            </a>
            <a href="movimientos.php" class="menu-item">
                <i class="fas fa-exchange-alt"></i>
                <span class="menu-text">Movimientos</span>
            </a>
            <a href="usuarios.php" class="menu-item">
                <i class="fas fa-users"></i>
                <span class="menu-text">Usuarios</span>
            </a>
            <a href="reportes.html" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span class="menu-text">Reportes</span>
            </a>
            <a href="configuracion.php" class="menu-item">
                <i class="fas fa-cog"></i>
                <span class="menu-text">Configuración</span>
            </a>
            <a href="../servicios/cerrar_sesion.php" class="menu-cerrar">
                <i class="fas fa-sign-out-alt"></i>
                <span class="menu-text">Cerrar Sesión</span>
            </a>
        </div>
    </div>
    
    <div class="main-content" id="mainContent">
        <div class="header">
            <h2>Panel de control</h2>
            <div class="user-info" onclick="showUserMenu()">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Usuario" />
                <span>Bienvenido, <strong id="userName">Usuario</strong></span>
            </div>
        </div>
        
        <div class="dashboard-cards">
            <div class="card" onclick="navigateTo('productos.php')">
                <div class="card-header">
                    <h3 class="card-title">Total Productos</h3>
                    <div class="card-icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="card-value" id="totalProducts">1,250</div>
                <div class="card-footer">+12% desde el mes pasado</div>
            </div>
            
            <div class="card" onclick="navigateTo('categorias.php')">
                <div class="card-header">
                    <h3 class="card-title">Categorías</h3>
                    <div class="card-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
                <div class="card-value" id="totalCategories">32</div>
                <div class="card-footer">+3 nuevas categorías</div>
            </div>
            
            <div class="card" onclick="navigateTo('movimientos.php')">
                <div class="card-header">
                    <h3 class="card-title">Movimientos Hoy</h3>
                    <div class="card-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                </div>
                <div class="card-value" id="todayMovements">48</div>
                <div class="card-footer">15 entradas, 33 salidas</div>
            </div>
            
            <div class="card" onclick="showAlerts()">
                <div class="card-header">
                    <h3 class="card-title">Alertas</h3>
                    <div class="card-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="card-value" id="totalAlerts">7</div>
                <div class="card-footer">Stock bajo en 7 productos</div>
            </div>
        </div>
        
        <div class="recent-activity">
            <div class="activity-header">
                <h3>Actividad Reciente</h3>
                <a href="#" class="btn-login" onclick="refreshActivity()">Actualizar</a>
            </div>
            
            <ul class="activity-list" id="activityList">
                <li class="activity-item" onclick="showActivityDetails(1)">
                    <div class="activity-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Se agregaron 50 unidades de Producto A</div>
                        <div class="activity-time">Hace 2 horas - por Juan Pérez</div>
                    </div>
                </li>
                
                <li class="activity-item" onclick="showActivityDetails(2)">
                    <div class="activity-icon">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Se retiraron 25 unidades de Producto B</div>
                        <div class="activity-time">Hace 3 horas - por María López</div>
                    </div>
                </li>
                
                <li class="activity-item" onclick="showActivityDetails(3)">
                    <div class="activity-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Se actualizó la información del Producto C</div>
                        <div class="activity-time">Hace 5 horas - por Carlos Rodríguez</div>
                    </div>
                </li>
                
                <li class="activity-item" onclick="showActivityDetails(4)">
                    <div class="activity-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Nuevo usuario registrado: Ana Martínez</div>
                        <div class="activity-time">Hace 1 día - por Sistema</div>
                    </div>
                </li>
                
                <li class="activity-item" onclick="showActivityDetails(5)">
                    <div class="activity-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Nueva categoría creada: Electrónicos</div>
                        <div class="activity-time">Hace 2 días - por Admin</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <script>
        // JavaScript para funcionalidad interactiva
        document.addEventListener('DOMContentLoaded', function() {
            initializeDashboard();
            setupEventListeners();
            loadDashboardData();
        });
        
        function initializeDashboard() {
            // Animación de entrada para las tarjetas
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
        }
        
        function setupEventListeners() {
            // Toggle sidebar en móvil
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
            
            // Cerrar sidebar al hacer click fuera en móvil
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && 
                    !sidebar.contains(e.target) && 
                    !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('collapsed');
                }
            });
            
            // Actualizar datos cada 30 segundos
            setInterval(updateDashboardData, 30000);
        }
        
        function loadDashboardData() {
            // Simular carga de datos
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                animateCounters();
            }, 1000);
        }
        
        function showLoading() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.classList.add('loading', 'pulse');
            });
        }
        
        function hideLoading() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.classList.remove('loading', 'pulse');
            });
        }
        
        function animateCounters() {
            // Animar contadores
            animateCounter('totalProducts', 1250);
            animateCounter('totalCategories', 32);
            animateCounter('todayMovements', 48);
            animateCounter('totalAlerts', 7);
        }
        
        function animateCounter(elementId, targetValue) {
            const element = document.getElementById(elementId);
            const duration = 2000;
            const startTime = performance.now();
            
            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const currentValue = Math.floor(targetValue * progress);
                
                element.textContent = currentValue.toLocaleString();
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                }
            }
            
            requestAnimationFrame(updateCounter);
        }
        
        function navigateTo(page) {
            // Efecto de transición antes de navegar
            document.body.style.opacity = '0.8';
            setTimeout(() => {
                window.location.href = page;
            }, 200);
        }
        
        function showUserMenu() {
            alert('Menú de usuario - Funcionalidad por implementar');
        }
        
        function showAlerts() {
            alert('Mostrando alertas de stock bajo - Funcionalidad por implementar');
        }
        
        function showActivityDetails(activityId) {
            alert(`Mostrando detalles de la actividad ${activityId} - Funcionalidad por implementar`);
        }
        
        function refreshActivity() {
            const activityList = document.getElementById('activityList');
            activityList.style.opacity = '0.5';
            
            setTimeout(() => {
                activityList.style.opacity = '1';
                // Aquí se cargarían los datos actualizados
            }, 1000);
        }
        
        function updateDashboardData() {
            // Actualizar datos en tiempo real
            console.log('Actualizando datos del dashboard...');
            // Aquí se implementaría la lógica para obtener datos actualizados del servidor
        }
        
        // Manejo de errores
        window.addEventListener('error', function(e) {
            console.error('Error en el dashboard:', e.error);
        });
    </script>
</body>
</html>