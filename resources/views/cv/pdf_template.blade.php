<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CV</title>
    <style>
        /* Puedes agregar estilos personalizados aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Currículum Vitae de {{ $name }}</h1>

    <div class="content">
        <h3>Email: {{ $email }}</h3>
        <h3>Teléfono: {{ $phone }}</h3>
        <!-- Aquí puedes agregar más datos como dirección, experiencia, etc. -->
    </div>

</body>
</html>
