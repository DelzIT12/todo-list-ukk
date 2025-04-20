<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST | UKK DELA SADIRA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/ruang-kerja.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">

    <div class="overlay text-center">
        <h1 class="mb-3">TO DO LIST</h1>
        <p class="mb-4">UKK Dela Sadira</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary px-4 py-2">Masuk</a>
    </div>

</body>
</html>
