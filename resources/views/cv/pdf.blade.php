<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $name }} - CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        .section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $name }}</h1>
    <p>Email: {{ $email }}</p>
    <div class="section">
        <h3>Education</h3>
        <p>{{ $education }}</p>
    </div>
    <div class="section">
        <h3>Work Experience</h3>
        <p>{{ $work_experience }}</p>
    </div>
    <div class="section">
        <h3>Skills</h3>
        <p>{{ $skills }}</p>
    </div>
</body>
</html>
