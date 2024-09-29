<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Library</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    </head>
    <body class="font-sans antialiased">

        <div class="bg-gray-50 text-black">
            <!-- Background with bookshelf image -->
            <main class="d-flex justify-content-center align-items-center min-vh-100" 
                style="background-image: url('{{ asset('icon/bookcase.png') }}'); background-size: cover; background-position: center;">
                
                <!-- Overlay layer -->
                <div class="overlay"></div> 

                <!-- Main container -->
                <div class="container text-center" style="position: relative; z-index: 2;">
                    <div class="card custom-card mx-auto">
                        <h1 class="text-shadow mb-4">Welcome to the Virtual Library</h1>
                        <p class="lead text-muted mb-4">Register or sign in to borrow books from our extensive collection.</p>

                        <!-- Action buttons -->
                        <div class="d-flex justify-content-center gap-4">
                            <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        </div>

                        <!-- Optional decorative image -->
                        <div class="mt-5">
                            <img src="{{ asset('icon/library_books.png') }}" alt="Books" class="img-fluid decor-img">
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>