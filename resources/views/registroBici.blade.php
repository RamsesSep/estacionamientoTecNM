<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Bicicleta</title>
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
            align-items: center;
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
            margin-left: 20px;
            font-size: 20px;
            font-weight: bold;
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
            margin-top: 60px; 
            margin-left: 250px; 
            padding: 20px;
            transition: margin-left 0.3s ease;
            width: 100%;
        }

        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        /* Formulario de Registro de Bicicleta */
        .tabla-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            margin-top: 20px; 
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .tabla-container h2 {
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
        }

        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #ffffff; 
            color: #333;
            font-size: 16px; 
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
            outline: none;
        }

        input[readonly] {
            background-color: #e0e0e0;
        }

        .image-preview {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            display: none;
            border: 2px solid #ddd;
            padding: 5px;
            border-radius: 8px;
            max-height: 300px;
        }

        /* Botones con Íconos */
        .buttons {
            display: flex;
            justify-content: flex-end;
            align-items: center; 
            margin-top: 20px;
        }

        .icon-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
            outline: none; 
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-button:hover img {
            transform: scale(1.1);
            opacity: 0.8;
        }

        .icon-button:focus img {
            outline: 2px solid #2980b9; 
        }

        .icon {
            width: 30px; 
            height: 30px;
        }

        #preview_bici_large {
            display: none;
            margin-top: 20px;
            width: 100%;
            height: auto;
            border: 3px solid white;
            border-radius: 8px;
            max-height: 500px;
            object-fit: cover;
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
            .tabla-container {
                padding: 15px;
            }

            .buttons {
                flex-direction: column; 
                align-items: flex-end;
            }

            .icon-button {
                width: 60px; 
                height: 60px;
                margin-left: 0;
                margin-bottom: 10px; 
            }

            .icon-button:last-child img {
                margin-bottom: 0; 
            }
        }

        /* Estilos para los mensajes de éxito y error */
        #mensaje {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 4px;
            display: none;
            font-size: 16px;
            text-align: center;
        }

        .mensaje-exito {
            background-color: #4CAF50; 
            color: white;
            border: 1px solid #4CAF50;
        }

        .mensaje-error {
            background-color: #f44336; 
            color: white;
            border: 1px solid #f44336;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector(".sidebar");
            const content = document.querySelector(".content");
            const form = document.getElementById('registroForm');
            const previewBici = document.getElementById('preview_bici');
            const previewBiciLarge = document.getElementById('preview_bici_large');
            const mensajeDiv = document.getElementById('mensaje');

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

            // Manejar el evento de reset para borrar las vistas previas de las imágenes
            form.addEventListener("reset", () => {
                // Ocultar las imágenes de vista previa
                previewBici.src = "";
                previewBiciLarge.src = "";
                previewBici.style.display = 'none';
                previewBiciLarge.style.display = 'none';

                // Ocultar el mensaje de éxito o error si está visible
                mensajeDiv.style.display = 'none';
                mensajeDiv.className = '';
                mensajeDiv.textContent = '';
            });
        });

        // Función para mostrar la vista previa de la imagen en un tamaño grande
        function mostrarVistaPrevia(input) {
            const preview = document.getElementById('preview_bici');
            const previewLarge = document.getElementById('preview_bici_large');
            const maxSize = 2 * 1024 * 1024; 

            if (input.files && input.files[0]) {
                if (input.files[0].size > maxSize) {
                    mostrarMensaje("El archivo es demasiado grande. El tamaño máximo es 2MB.", "error");
                    input.value = "";
                    preview.style.display = 'none';
                    previewLarge.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    previewLarge.src = e.target.result;
                    preview.style.display = 'block';
                    previewLarge.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                previewLarge.style.display = 'none';
            }
        }

        // Función para manejar el envío del formulario y redirigir a codigoQR.html
        function enviarFormulario(event) {
            event.preventDefault();

            // Obtener los valores de los campos del formulario
            const nombreBicicleta = document.getElementById('nombreBicicleta').value.trim();
            const color = document.getElementById('color').value.trim();
            const fotoBiciInput = document.getElementById('fotoBici');
            const fotoBici = fotoBiciInput.files[0];

            // Obtener referencia al div de mensajes
            const mensajeDiv = document.getElementById('mensaje');

            // Limpiar mensajes anteriores
            mensajeDiv.style.display = 'none';
            mensajeDiv.className = '';
            mensajeDiv.textContent = '';

            // Validar que una imagen haya sido seleccionada
            if (!fotoBici) {
                mostrarMensaje("Por favor, selecciona una foto de la bicicleta.", "error");
                return;
            }

            // Obtener la fecha actual para fechaRegistro
            const fechaRegistro = new Date().toISOString(); // Formato ISO para facilitar el backend

            // Asignar tipoUsuario como "estudiante"
            const tipoUsuario = "estudiante";

            // Crear un objeto con los datos a enviar al backend
            const datosBicicleta = {
                nombreBicicleta: nombreBicicleta,
                color: color,
                fechaRegistro: fechaRegistro,
                tipoUsuario: tipoUsuario,
                // La foto de la bicicleta se convertirá a Base64
                fotoBici: ""
            };

            // Leer la imagen como Base64
            const reader = new FileReader();
            reader.onloadend = function () {
                datosBicicleta.fotoBici = reader.result;

                // Enviar los datos al backend
                // Aquí puedes implementar la lógica para enviar los datos, por ejemplo, mediante una solicitud AJAX
                // Para este ejemplo, almacenaremos los datos en localStorage y redirigiremos
                let bicicletas = JSON.parse(localStorage.getItem('bicicletas')) || [];
                bicicletas.push(datosBicicleta);
                localStorage.setItem('bicicletas', JSON.stringify(bicicletas));

                // Mostrar mensaje de éxito
                mostrarMensaje("Bicicleta registrada con éxito. Serás redirigido a tu código QR.", "exito");

                // Redirigir a 'codigoQR.html' después de 2 segundos
                setTimeout(() => {
                    window.location.href = "codigoQR.html";
                }, 2000); // 2000 milisegundos = 2 segundos
            };
            reader.readAsDataURL(fotoBici);
        }

        // Función para salir del sistema
        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                window.location.href = "Inicio.html";
            }
        }

        // Función para ver el Código QR (Implementa según tu lógica)
        function verCodigoQR(id) {
            window.location.href = `codigoQR.html?id=${id}`;
        }

        // Función para manejar eventos de teclado (Enter) en los íconos
        function handleKeyPress(event, action) {
            if (event.key === 'Enter' || event.keyCode === 13) {
                action();
            }
        }

        // Función para mostrar mensajes en el div 'mensaje'
        function mostrarMensaje(mensaje, tipo) {
            const mensajeDiv = document.getElementById('mensaje');
            mensajeDiv.textContent = mensaje;
            if (tipo === "exito") {
                mensajeDiv.className = 'mensaje-exito';
            } else if (tipo === "error") {
                mensajeDiv.className = 'mensaje-error';
            }
            mensajeDiv.style.display = 'block';

            // Ocultar el mensaje después de 5 segundos
            setTimeout(() => {
                mensajeDiv.style.display = 'none';
            }, 5000);
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

    <!-- Menú Lateral con la clase 'active' agregada para que esté abierto por defecto -->
    <div class="sidebar active">
        <div class="logo">Registro</div>
        <ul>
            <li onclick="window.location.href='RegistrarVehiculo.html'">
                <!-- Icono Carros -->
                <img src="{{ asset('images/Car.svg') }}" width="20" height="20" alt="Carros" style="margin-right: 10px;">
                <span>Registro de Carros</span>
            </li>
            <li onclick="window.location.href='Menu.html'">
                <!-- Icono Regresar al Menú -->
                <img src="{{ asset('images/Home.svg') }}" width="20" height="20" alt="Menú" style="margin-right: 10px;">
                <span>Regresar al Menú</span>
            </li>
            <li class="salir" onclick="salir()">
                <!-- Icono Salir -->
                <img src="{{ asset('images/power.svg') }}" width="20" height="20" alt="Salir" style="margin-right: 10px;">
                <span>Cerrar sesión</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="tabla-container">
            <h2>Registro de Bicicleta</h2>

            <!-- Div para mensajes -->
            <div id="mensaje"></div>

            <form id="registroForm" onsubmit="enviarFormulario(event)">
                <!-- Nombre de la Bicicleta -->
                <div class="form-group">
                    <label for="nombreBicicleta"></label>
                    <input type="text" id="nombreBicicleta" name="nombreBicicleta" placeholder="Ingresa el nombre de la bicicleta" required>
                </div>

                <!-- Color -->
                <div class="form-group">
                    <label for="color"></label>
                    <select id="color" name="color" required>
                        <option value="" disabled selected>Selecciona el color de tu bicicleta</option>
                        <option value="Negro">Negro</option>
                        <option value="Blanco">Blanco</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Azul">Azul</option>
                        <option value="Verde">Verde</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Naranja">Naranja</option>
                        <option value="Morado">Morado</option>
                        <option value="Plata">Plata</option>
                        <option value="Gris">Gris</option>
                        <option value="Rosa">Rosa</option>
                        <option value="Marrón">Marrón</option>
                        <option value="Dorado">Dorado</option>
                        <option value="Lima">Lima</option>
                        <option value="Azul Marino">Azul Marino</option>
                        <option value="Oxido">Oxido</option>
                        <option value="Granate">Granate</option>
                        <option value="Turquesa">Turquesa</option>
                        <option value="Magenta">Magenta</option>
                    </select>
                </div>

                <!-- Foto de la Bicicleta -->
                <div class="form-group">
                    <label for="fotoBici">Foto de la Bicicleta:</label>
                    <input type="file" id="fotoBici" name="fotoBici" accept="image/*" onchange="mostrarVistaPrevia(this)" required>
                    <img id="preview_bici" class="image-preview" alt="Vista Previa de la Bicicleta">
                    <img id="preview_bici_large" class="image-preview" alt="Vista Previa Grande de la Bicicleta">
                </div>

                <div class="buttons">
                    <!-- Botón de Eliminar -->
                    <button type="reset" class="icon-button" aria-label="Eliminar">
                        <img src="{{ asset('images/delete.svg') }}" alt="Eliminar" class="icon reset-icon">
                    </button>

                    <!-- Botón de Guardar -->
                    <button type="submit" class="icon-button" aria-label="Guardar">
                        <img src="{{ asset('images/Save.svg') }}" alt="Guardar" class="icon submit-icon">
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>