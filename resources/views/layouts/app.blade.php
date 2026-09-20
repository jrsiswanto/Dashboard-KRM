<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Kebun Raya Mangrove Surabaya' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Kebun Raya Mangrove (KRM) Surabaya - kawasan konservasi mangrove yang mengintegrasikan pelestarian alam, inovasi teknologi ramah lingkungan, dan pemberdayaan ekonomi masyarakat pesisir.' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/logo krm.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <x-navbar :active="$active ?? ''" />

    <main>
        @yield('content')
    </main>

    <x-cta />

    <x-footer />

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>