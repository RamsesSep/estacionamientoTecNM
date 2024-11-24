<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código QR Generado</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Estilos de la barra de encabezado */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            padding: 0 20px;
            z-index: 1001;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .toggle-btn {
            background: none;
            border: none;
            color: #ecf0f1;
            cursor: pointer;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .header .toggle-btn:hover {
            background-color: #1a252f;
            border-radius: 4px;
        }

        .header .toggle-btn img {
            width: 24px;
            height: 24px;
        }

        .header .titulo-pagina {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            flex-grow: 1; 
        }

        /* Estilos del menú lateral */
        .sidebar {
            position: fixed;
            top: 60px; 
            left: -250px; 
            width: 250px;
            height: calc(100% - 60px);
            background-color: #2c3e50;
            color: #ecf0f1;
            padding-top: 20px;
            transition: left 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #34495e;
        }

        .sidebar ul li img {
            margin-right: 15px;
            width: 20px;
            height: 20px;
        }

        .sidebar ul li.salir:hover {
            background-color: #d32f2f;
        }

        .sidebar ul li.salir img {
            margin-right: 8px;
            width: 20px;
            height: 20px;
        }

        /* Contenido Principal */
        .content {
            position: relative; 
            margin-top: 60px; 
            margin-left: 250px; 
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        /* Ajustes cuando el sidebar está activo */
        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        /* Estilos del Contenido de Confirmación */
        .titulo {
            font-size: 30px;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        .confirmacion {
            position: relative; 
            max-width: 800px; 
            margin: 0 auto;
            background-color: #2c3e50;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #ffffff;
        }

        .confirmacion img {
            max-width: 100%; 
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .botones {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .botones a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
            cursor: pointer;
        }

        .regresar-btn {
            background-color: #f44336;
        }

        /* Botón de Imprimir en el Menú Lateral */
        .sidebar ul li.imprimir {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background 0.3s;
            background-color: #2980b9; 
        }

        .sidebar ul li.imprimir:hover {
            background-color: #1f5a8d;
        }

        .sidebar ul li.imprimir img {
            margin-right: 15px;
            width: 20px;
            height: 20px;
        }
        .logo {
    width: 120px; 
    height: auto; 
    margin-left: 20px; 
}
.logo2 {
    width: 50px; 
    height: auto; 
    margin-left: 20px; 

}

        /* Responsividad */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px; 
            }

            .sidebar.active {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            .sidebar.active ~ .content {
                margin-left: 0;
            }
        }

        @media (max-width: 600px) {
            .confirmacion {
                padding: 15px;
            }

            .botones {
                flex-direction: column; 
            }

            .botones a {
                width: 100%;
                margin-bottom: 10px; 
            }

            .botones a:last-child {
                margin-bottom: 0; 
            }

            /* Ajustes para el ícono del menú en móviles si es necesario */
            .icono-menu a img.menu-icon {
                width: 30px;
                height: 30px;
            }

            .header .menu-icon-btn img {
                width: 30px;
                height: 30px;
            }

            .icono-menu {
                top: 5px; 
                right: 5px;
                padding: 5px;
            }

            .icono-menu img.menu-icon {
                width: 30px; 
                height: 30px;
            }
        }

        .icono-menu {
            position: absolute; 
            top: 0; 
            right: 0; 
            padding: 10px; 
        }

        .icono-menu a {
            display: inline-block;
        }

        .icono-menu img.menu-icon {
            width: 40px; 
            height: 40px;
            transition: transform 0.2s ease, opacity 0.2s ease; 
            border: none; 
            outline: none; 
            background: transparent; 
        }

        .icono-menu img.menu-icon:hover {
            transform: scale(1.1); 
            opacity: 0.8; 
        }

        .icono-menu img.menu-icon:focus {
            /* Mantener accesibilidad */
            box-shadow: 0 0 0 2px #2980b9; 
            border-radius: 4px; 
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector(".sidebar");
            const content = document.querySelector(".content");

            // Función para abrir/ocultar el menú lateral
            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("active");

                // Ajustar el margen del contenido según el estado del sidebar en escritorio
                if (window.innerWidth > 768) {
                    if (sidebar.classList.contains("active")) {
                        content.style.marginLeft = "250px";
                    } else {
                        content.style.marginLeft = "0";
                    }
                }
            });

            // Ajustar el estado del sidebar al redimensionar la ventana
            window.addEventListener("resize", () => {
                if (window.innerWidth > 768) {
                    // Asegurar que el sidebar esté activo en escritorio
                    sidebar.classList.add("active");
                    content.style.marginLeft = "250px";
                } else {
                    // Ocultar el sidebar por defecto en móviles
                    sidebar.classList.remove("active");
                    content.style.marginLeft = "0";
                }
            });

            // Inicializar el estado del sidebar basado en el tamaño de la ventana al cargar
            if (window.innerWidth > 768) {
                sidebar.classList.add("active");
                content.style.marginLeft = "250px";
            } else {
                sidebar.classList.remove("active");
                content.style.marginLeft = "0";
            }
        });

        // Función para salir del sistema
        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                window.location.href = "Inicio.html";
            }
        }

        // Funciones específicas para esta página
        function regresar() {
            window.history.back();
        }

        function imprimirPagina() {
            window.print();
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <button class="toggle-btn" aria-label="Abrir menú lateral">
            <!-- Icono de hamburguesa -->
            <img src="{{ asset('images/Menu.svg') }}" width="30" height="30" alt="Menú">
        </button>
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo TECNM" class="logo">
        <img src="{{ asset('images/itl.png') }}" alt="Logo ITL" class="logo2">
    </div>

    <!-- Menú Lateral Dinámico -->
    <div class="sidebar active">
        <div class="logo">Menú</div>
        <ul>
            <li onclick="window.location.href='registro_carros.html'">
                <img src="{{ asset('images/Car.svg') }}" width="20" height="20" alt="Registro de Carros">
                <span>Registro de Carros</span>
            </li>
            <li onclick="window.location.href='registro_motos.html'">
                <img src="{{ asset('images/Moto.svg') }}" width="20" height="20" alt="Registro de Motos">
                <span>Registro de Motos</span>
            </li>
            <li onclick="window.location.href='menu.html'">
                <img src="{{ asset('images/Home.svg') }}" width="20" height="20" alt="Menú Principal">
                <span>Regresar al Menú</span>
            </li>
            <li class="imprimir" onclick="imprimirPagina()">
                <img src="{{ asset('images/print.svg') }}" width="20" height="20" alt="Imprimir">
                <span>Imprimir</span>
            </li>
            <li class="salir" onclick="salir()">
                <img src="{{ asset('images/power.svg') }}" width="20" height="20" alt="Salir">
                <span>Cerrar sesión</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="titulo"><strong>Código QR Generado</strong></div>

        <div class="confirmacion">
            <!--  Ícono en la Parte Superior Derecha  -->
            <div class="icono-menu">
                <a href="Menu.html" aria-label="Ir al Menú">
                    <img src="{{ asset('images/cancelar.svg') }}" alt="Ir al Menú" class="menu-icon">
                </a>
            </div>

            <p>Este es tu código QR generado:</p>
            <img src="{{ asset('images/Commons_QR_code.png') }}" alt="Código QR">
        </div>
    </div>

</body>

</html>