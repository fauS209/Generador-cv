<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        h2 {
            font-size: 22px;
            color: #34495e;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            margin: 5px 0;
        }
        .section {
            margin-top: 20px;
            border-top: 2px solid #ecf0f1;
            padding-top: 20px;
        }
        .section:last-child {
            border-bottom: 2px solid #ecf0f1;
        }
        .label {
            font-weight: bold;
            color: #2c3e50;
        }
        .content {
            color: #7f8c8d;
        }
        .portfolio-link {
            color: #3498db;
            text-decoration: none;
        }
        .portfolio-link:hover {
            text-decoration: underline;
        }
        .header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header-info p {
            font-size: 16px;
            margin: 0;
        }
        .header-info .name {
            font-size: 30px;
            color: #2c3e50;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <h1>Currículum Vitae</h1>
    <div class="container">
        <div class="header-info">
            <div>
                <p class="name">{{ $cv->name }}</p>
                <p>{{ $cv->email }}</p>
                <p>{{ $cv->phone }}</p>
                <p>{{ $cv->address }}</p>
            </div>
        </div>
    
        

        @if ($cv->experience)
            <div class="section">
                <h2>Experiencia Profesional</h2>
                <p class="content">{{ $cv->experience }}</p>
            </div>
        @endif

        @if ($cv->education)
            <div class="section">
                <h2>Educación</h2>
                <p class="content">{{ $cv->education }}</p>
            </div>
        @endif

        @if ($cv->skills)
            <div class="section">
                <h2>Habilidades</h2>
                <p class="content">{{ $cv->skills }}</p>
            </div>
        @endif

        @if ($cv->portfolio)
            <div class="section">
                <h2>Portafolio</h2>
                <p class="content"><a href="{{ $cv->portfolio }}" class="portfolio-link">{{ $cv->portfolio }}</a></p>
            </div>
        @endif
    </div>
</body>
</html>
