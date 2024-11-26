
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

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-btn-size/bsb-btn-size.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">
    <style>
        .about{
            padding-bottom: 130px;
        }
        #about {
           
           margin-left: 20px; /* Décale le contenu à droite pour éviter la sidebar */
           padding: 20px; /* Optionnel : ajoute un peu de marge intérieure */
        }
        
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('sidebar')
    <!-- About 8 - Bootstrap Brain Component -->
    <section id="about" class="about">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                <!-- Logo devant le titre -->
                <div class="  mb-4">
                    <div>
                       <h2 class="display-5 mb-0">À propos de nous</h2>  
                       <p class="text-secondary lead fs-4 mb-0">
                        Expertise Algérie (EXAL Spa), Leader dans le domaine de l’expertise, est une entreprise publique économique dotée d’un capital social de 500.000.000 DA. Créée en 1997, elle est la filiale de trois importantes compagnies d’assurance, à savoir la CAAR, la CAAT et la CCR.
                       </p>
                    </div>
                    <img src="{{ asset('images/exal_fr.png') }}" alt="Logo à droite" class="ms-3 logo-paragraph">
                </div>

                <hr class="w-50 mx-auto mt-4 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gy-4 gy-lg-0 align-items-lg-center">
        <div class="col-8 col-lg-5">
            <img class="img-fluid rounded border" loading="lazy" src="images/exal.png" alt="About Us">
        </div>
        <div class="col-12 col-lg-6 col-xxl-6">
            <div class="row justify-content-lg-end justify-content-xxl-around">
            <div class="col-12 col-lg-11 col-xxl-10">
                <div class="card border-0 mb-4">
                <div class="card-body p-0">
                    <h4 class="card-title mb-3">Our Services</h4>
                    <ul class="list-unstyled m-0 p-0 d-sm-flex flex-sm-wrap">
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Automobile et engins</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Expertise agricole</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Transport et maritime</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Surveillance maritime</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Expertise industrielle</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>Frame Services</span>
                    </li>
                    </ul>
                </div>
                </div>

                <div class="card border-0 mb-4 mb-xxl-5">
                <div class="card-body p-0">
                    <h4 class="card-title mb-3">Accessory Installation</h4>
                    <ul class="list-unstyled m-0 p-0 d-sm-flex flex-sm-wrap">
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>27 annnées d'expérience</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>500
                        Millions de DA de Capital Social</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>370
                        Employés</span>
                    </li>
                    <li class="py-1 d-flex align-items-center gap-2 col-sm-6">
                        <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                        </svg>
                        </span>
                        <span>43
                        Nbr des Centres d'Expertise</span>
                    </li>
                    </ul>
                </div>
                </div>

                <a href="#!" class="btn btn-primary bsb-btn-2xl">
                Explore
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                </svg>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>