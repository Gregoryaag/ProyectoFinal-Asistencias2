<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Login</title>
</head>

<body>
    <h1>Bienvenido a Uneweb</h1>

    <div class="block-h2">
        <div class="class-h2">
            <h2>Ingrese su ID</h2>
            <input class="input-pass" type="password" id="passwordInput" readonly>
        </div>
    </div>
    </div>

    <div class="logo"><img src="/img/logo-uneweb.png" alt="Uneweb"></div>

    <div class="container-principal">
        <div class="container">
            <div class="cajade3">
                <div class="cajamenu ">
                    <button class="boton btn primary" onclick="agregarNumero(1)"><span class="numeros">1</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(2)"><span class="numeros">2</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(3)"><span class="numeros">3</span></button>
                </div>
            </div>
            <div class="cajade3">
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(4)"><span class="numeros">4</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(5)"><span class="numeros">5</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(6)"><span class="numeros">6</span></button>
                </div>
            </div>
            <div class="cajade3">
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(7)"><span class="numeros">7</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(8)"><span class="numeros">8</span></button>
                </div>
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(9)"><span class="numeros">9</span></button>
                </div>
            </div>
            <div class="cajade3">
                <div class="cajamenu">
                    <button class="boton btn primary" onclick="agregarNumero(0)"><span class="numeros">0</span></button>
                </div>
            </div>
            <div class="cajade3">
                <div class="cajamenu">
                    <button class="botonBorrar btn danger" onclick="borrarUltimoNumero()"><span
                            class="borrar">Borrar</span></button>
                </div>
                <div class="cajamenu">
                    <button class="btn success" onclick="confirmarAsistencia()"><a
                            href="/index.php">Ingresar</a></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        var password = "";

        function agregarNumero(numero) {
            if (password.length < 4) {
                password += numero;
                mostrarPassword();
            }
        }

        function borrarUltimoNumero() {
            password = password.slice(0, -1);
            mostrarPassword();
        }

        function mostrarPassword() {
            var passwordInput = document.getElementById("passwordInput");
            passwordInput.value = password;
        }

        function confirmarAsistencia() {
            console.log("Contraseña ingresada: " + password);
        }
    </script>

</body>

</html>