<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tasks.index') }}">
                <i class="bi bi-check2-square me-2"></i>To-Do App
            </a>
    
            <!-- Toggle button untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Menu navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('tasks.index') }}">
                            <i class="bi bi-house-door-fill me-1"></i>Beranda
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table.table {
            border-collapse: collapse;
        }
    
        table.table th,
        table.table td {
            border: 1px solid #495057; /* ketebalan & warna border */
        }
    
        table thead th {
            background-color: #dee2e6;
            font-weight: bold;
            text-align: center;
        }
    
        table tbody tr:nth-child(odd) {
            background-color: #f8f9fa; /* warna abu putih */
        }
    
        table tbody tr:hover {
            background-color: #e9ecef; /* efek hover */
        }
    </style>
    
</body>
</html>
