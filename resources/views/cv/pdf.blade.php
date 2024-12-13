<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
        }
        p {
            margin: 5px 0;
        }
        .section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Currículum Vitae</h1>
    <p><strong>Nombre:</strong> {{ $cv->name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $cv->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cv->phone }}</p>
    <p><strong>Dirección:</strong> {{ $cv->address }}</p>

    @if ($cv->experience)
        <div class="section">
            <h2>Experiencia Profesional</h2>
            <p>{{ $cv->experience }}</p>
        </div>
    @endif

    @if ($cv->education)
        <div class="section">
            <h2>Educación</h2>
            <p>{{ $cv->education }}</p>
        </div>
    @endif

    @if ($cv->skills)
        <div class="section">
            <h2>Habilidades</h2>
            <p>{{ $cv->skills }}</p>
        </div>
    @endif

    @if ($cv->portfolio)
        <div class="section">
            <h2>Portafolio</h2>
            <p><a href="{{ $cv->portfolio }}">{{ $cv->portfolio }}</a></p>
        </div>
    @endif
</body>
</html>
