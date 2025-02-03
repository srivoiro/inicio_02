<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome &mdash; Laravel - Stisla</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .header {
            background: linear-gradient(45deg, #6c63ff, #3f3da1);
            color: white;
            text-align: center;
            padding: 80px 20px;
        }
        .header h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .header p {
            font-size: 1.2rem;
        }
        .btn-custom {
            background: #3f3da1;
            color: white;
            padding: 10px 30px;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: #2b2a82;
            transform: scale(1.1);
        }
        .features-section .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .features-section .card:hover {
            transform: translateY(-10px);
        }
        .contributors-section {
            background: #ffffff;
            padding: 60px 20px;
        }
        .contributors-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .contributor-card {
            margin: 20px 0;
            transition: transform 0.3s ease;
        }
        .contributor-card:hover {
            transform: scale(1.1);
        }
        .contributor-card img {
            border: 3px solid #f0f0f0;
            border-radius: 50%;
            transition: box-shadow 0.3s ease;
        }
        .contributor-card img:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        footer {
            background: linear-gradient(45deg, #3f3da1, #6c63ff);
            color: white;
            text-align: center;
            padding: 20px 10px;
        }
        .no-result {
            display: none;
            text-align: center;
            font-weight: bold;
            color: red;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1 class="animate__animated animate__fadeInDown">Bienvenidos</h1>
        <p class="animate__animated animate__fadeInUp">Sistema de Gestion</p>        
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
            @auth
            <a href="{{ url('/home') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >Inicio
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-custom animate__animated animate__zoomIn">Iniciar Sesion</a>

            @if (Route::has('register'))
                <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >Registrarse
                </a>
            @endif
            @endauth
            </nav>
        @endif  
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Todos los derechos reservados.</p>
    </footer>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>       
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  
    <script>
        AOS.init();
    </script>
</body>
</html>
                        