<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('admin-assets/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link href="{{ url('admin-assets/assets/css/main.css?v=5.5') }}" rel="stylesheet" type="text/css" />
    

    
    
</head>

<body>
    <main>
        <header class="main-header style-2 navbar">
            <div class="col-brand">
                <a href="{{ url('/') }}" class="brand-wrap">
                    <img src="{{ url('admin-assets/assets/imgs/theme/logo.svg') }}" class="logo" alt="Nest Dashboard" />
                </a>
            </div>

        </header>
        @yield('content')
        <footer class="main-footer text-center">
            <p class="font-xs">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Nest - HTML Ecommerce Template .
            </p>
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="{{ url('admin-assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    
    <!-- Main Script -->
    <script src="{{ url('admin-assets/assets/js/main.js?v=1.1') }}" type="text/javascript"></script>
</body>

</html>
