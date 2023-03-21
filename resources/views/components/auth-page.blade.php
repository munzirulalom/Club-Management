<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Club Management System</title>
    <link rel="icon" href="assets/static/fav.ico" sizes="64x64">
    <!-- CSS files -->
    <link href="assets/css/tabler.min.css" rel="stylesheet" />
    <link href="assets/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="assets/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="assets/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column overflow-auto">
    <div class="page page-center">
        <div class="container-tight py-4">

            <div class="text-center mb-4">
                <a href="{{ route('/') }}" class="navbar-brand navbar-brand-autodark"><img src="assets/logo.png"
                        height="50" alt="Logo"></a>
            </div>


            {{ $slot }}

        </div>
    </div>

    <!-- Tabler Core -->
    <script src="assets/js/tabler.min.js"></script>
    <script src="assets/js/demo.min.js"></script>
</body>

</html>
