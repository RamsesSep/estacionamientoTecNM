<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículo</title>
    <link rel="shortcut icon" href="{{ asset('images/Car.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/styleRegistrarVehiculo.css') }}">
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
        /*
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
        */

        // Función para salir del sistema
        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                localStorage.clear();
                window.location.href = "{{ route('inicio.sesion') }}";
            }
        }
        /*
        // Función para ver el Código QR
        function verCodigoQR(id) {
            window.location.href = `codigoQR.html?id=${id}`;
        }
        */
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
            <!--<li onclick="window.location.href='Avance1.html'">-->
            <li>
                <a href="{{ route('registrar.bici') }}">
                    <!-- Icono Bicicleta -->
                    <img src="{{ asset('images/bici.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                    <span>Registro de Bicicletas</span>
                </a>
            </li>
            <!--Redireccionamiento a el modulo de monitoreo de estacionamiento-->
            <li>
                <a href="{{ route('monitoreo') }}">
                    <!-- Icono monitoreo -->
                    <img src="{{ asset('images/term-blanca.png') }}" width="20" height="20" alt="monitoreo" style="margin-right: 10px;">
                    <span>Monitoreo</span>
                </a>
            </li>
            <!--<li onclick="window.location.href='Menu.html'">-->
            <li>
                <a href="{{ route('menu.autos') }}">
                    <img src="{{ asset('images/Home.svg') }}" width="20" height="20" alt="Menú" style="margin-right: 10px;">
                    <span>Regresar al Menú</span>
                </a>
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
            <h2>Registro de Vehículo</h2>

            <!--Div para mensajes-->
            <div id="mensaje"></div>
            
            <!-- ****************************** FORMULARIO ****************************** -->

            <!-- <form id="registroForm" onsubmit="enviarFormulario(event)"> -->
            <form method="POST" action="/inicio/registrar-vehiculo/nuevo">
                
                @csrf

                <!-- Detalles del vehículo -->
                <div class="form-group">
                    <label for="marcaVehiculo">Datos del Vehículo</label>
                    <input type="text" id="marcaVehiculo" name="marcaVehiculo" placeholder="Ingresa la marca del vehículo" required>
                </div>

                <div class="form-group">
                    <label for="modeloVehiculo"></label>
                    <input type="text" id="modeloVehiculo" name="modeloVehiculo" placeholder="Ingresa el modelo del vehículo" required>
                </div>

                <!-- Color -->
                <div class="form-group">
                    <label for="color"></label>
                    <select id="color" name="color" required>
                        <option value="" disabled selected>Selecciona el color</option>
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
                
                <!-- Placas del vehículo -->
                <div class="form-group">
                    <label for="placasVehiculo">Ingresa tus placas:</label>
                    <input type="text" id="placasVehiculo" name="placasVehiculo" placeholder="ejemplo: GTO-23-123" required>
                </div>

                <!-- Tipo de vehículo -->
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="" disabled selected>Selecciona tu tipo de vehiculo</option>
                        <option value="auto">Automovil</option>
                        <option value="moto">Motocicleta</option>
                    </select>
                </div>

                <!-- Numero de control -->
                <div class="form-group">
                    <label for="numeroControl">Ingresa su numero de control:</label>
                    <input type="text" id="numeroControl" name="numeroControl" placeholder="ejemplo: 19240526" required>
                </div>

                <!-- ************************* BOTONES ************************* -->
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
