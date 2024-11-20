<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navigation Bar</title>

    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Lien vers les icônes Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <!-- Autres feuilles de style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #0d1117;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .profile img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 8px solid rgba(77, 77 ,88, 1); /* Remplace la transparence dynamique */
            cursor: pointer;
        }


        .profile h5 {
            margin-top: 10px;
            font-size: 18px;
        }

        .profile p {
            font-size: 14px;
            color: #9ca3af;
        }

        .social-icons a {
            font-size: 18px;
            text-decoration: none;
            color: #9ca3af;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #007bff;
        }

        .nav-link {
            display: flex;
            align-items: center;
            font-size: 16px;
            padding: 20px 15px;
            color: #d1d5db;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            
            color: blue;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 18px;
        }

        .dropdown-menu {
            background-color: #2a2d52;
        }

        .dropdown-item {
            color: #d1d1d1 !important;
        }

        .dropdown-item:hover {
            background-color: #575757;
        }

        h4 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            margin-left: 250px;
            padding: 20px;
        }
        .social-links {
            display: flex; /* Aligner les éléments sur une ligne */
            justify-content: center; /* Centrer les éléments horizontalement */
            align-items: center; /* Centrer les éléments verticalement */
        }

        .header .social-links a {
            font-size: 20px; /* Taille des icônes */
            display: inline-flex; /* Utiliser Flexbox pour centrer l'icône à l'intérieur du lien */
            align-items: center; /* Centrer l'icône verticalement */
            justify-content: center; /* Centrer l'icône horizontalement */
            color: white; /* Icône en blanc */
            margin: 0 2px; /* Espacement entre les icônes */
            border-radius: 50%; /* Forme circulaire */
            text-align: center; /* Centrer le texte (icône) */
            width: 40px; /* Largeur du cercle */
            height: 40px; /* Hauteur du cercle */
            border: 2px solid transparent; /* Bordure transparente */
            transition: 0.3s; /* Transition au survol */
        }

        /* Au survol, on applique une bordure visible et on garde l'icône en blanc */
        .header .social-links a:hover {
            border: 2px solid white; /* Bordure blanche au survol */
            background: rgba(255, 255, 255, 0.1); /* Légère couleur de fond transparent au survol */
        }

        /* Taille des icônes à l'intérieur du cercle */
        .header .social-links a i {
            font-size: 16px; /* Taille plus petite de l'icône */
        }

      

    </style>
</head>

<body>
    <!-- Barre de navigation latérale -->
    <div class="sidebar">
        <!-- Section Profil -->
        <div class="profile text-center">
            <img id="profile-pic" src="https://via.placeholder.com/80" alt="Profile Picture" onclick="document.getElementById('profile-pic-input').click();">
            <input type="file" id="profile-pic-input" style="display: none;" onchange="changeProfilePicture(event)">
            <h3>John Doe</h3>
           

            <!-- Icônes sociales -->
            <div class="social-links mt-4 mb-4 text-center">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
   
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

        <!-- Menu Principal -->
      
        <a href="#" class="nav-link">
            <i class="fas fa-home me-2"></i> Accueil
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-user me-2"></i> Profile
        </a>

        <!-- Menu déroulant multilevel -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle text-white nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fas fa-briefcase me-2"></i> EAD
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Web Development</a></li>
                <li><a class="dropdown-item" href="#">App Development</a></li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Digital Marketing</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">SEO</a></li>
                        <li><a class="dropdown-item" href="#">Content Marketing</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <a href="#" class="nav-link">
            <i class="fas fa-envelope me-2"></i> Contact
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-envelope me-2"></i> About
        </a>
    </div>

    <!-- Contenu principal de la page 
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <p>This is a simple example of a sidebar navigation bar with multilevel dropdown using Bootstrap.</p>
    </div>
-->
    <!-- Lien vers les scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour changer l'image de profil -->
    <script>
        function changeProfilePicture(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-pic').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
