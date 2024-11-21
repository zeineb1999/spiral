<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-btn-size/bsb-btn-size.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <style>
       
        #hero {
            width: 100%;
            height: 100vh;
            background: url("images/fond.jpg") top center;
            background-size: cover;
        }

        

        #hero .hero-container {
            position: relative;
            z-index: 2;
            min-width: 300px;
        }

        #hero h1 {
            margin: 0 0 10px 0;
            font-size: 64px;
            font-weight: 700;
            line-height: 56px;
            color: #fff;
        }

        #hero p {
            color: #fff;
            margin-bottom: 50px;
            font-size: 26px;
            font-family: "Poppins", sans-serif;
        }

        #hero p span {
            color: #fff;
            padding-bottom: 4px;
            letter-spacing: 1px;
            border-bottom: 3px solid #149ddd;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        @media (max-width: 768px) {
            #hero h1 {
                font-size: 28px;
                line-height: 36px;
            }

            #hero h2 {
                font-size: 18px;
                line-height: 24px;
                margin-bottom: 30px;
            }
        }
        
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('sidebar')
    <!-- About 8 - Bootstrap Brain Component -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>SPA EXAL</h1>
            <p><span class="typed"></span></p>
        </div>
    </section><!-- End Hero -->

    <!-- Initialisation de Typed.js -->
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var options = {
            strings: ["Automobile", "Industrie et batiment", "Transport et maritime", "Reforme"], // Texte à faire défiler
            typeSpeed: 100, // Vitesse de saisie
            backSpeed: 50,  // Vitesse de retour
            backDelay: 1000, // Délai avant le retour
            loop: true // Répéter l'animation en boucle
        };

        var typed = new Typed(".typed", options);
      });
    </script>
</body>
</html>
