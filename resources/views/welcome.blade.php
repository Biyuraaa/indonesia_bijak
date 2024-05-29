<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia Bijak</title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>

    <!-- Navbar start -->
    @include('components.navbar')
    <!-- Navbar end -->



    <!-- Hero Section start -->
    <section class="hero" id="Home">

        <main class="content" style="position: relative; margin:auto;">
            <h1 style="align-items: center;">Mari Bijak Memilih Untuk Negeri</h1>
            <p>Mari bersama-sama menjadi bagian dari perubahan dengan memberikan suaramu pada pemilihan presiden.</p>
            <p>Setiap
                suara kita memiliki kekuatan untuk membentuk masa depan negara kita</p>
                @if (Auth::check())
                    <a href="{{route('dashboard')}}" class="cta btn btn-primary">Tentukan Pilihanmu</a>
                @else
                    <a href="{{route('login')}}" class="cta btn btn-primary">Tentukan Pilihanmu</a>
                    
                @endif

        </main>
    </section>

    <!-- Feather Icons -->
    <script>
        feather.replace(); 
    </script>





    < <!-- My Javascript -->
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        @include('components.footer')
</body>

<!-- Footer Section start -->

<!-- Footer Section end -->




</html>