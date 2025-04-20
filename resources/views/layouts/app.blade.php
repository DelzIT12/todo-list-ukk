<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">To-Do List</a>
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
