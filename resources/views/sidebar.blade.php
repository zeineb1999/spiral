<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navigation Bar</title>

    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Lien vers les icônes Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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

    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #272829;
            
        }

        a {
            color: #149ddd;
            text-decoration: none;
        }

        a:hover {
            color: #37b3ed;
            text-decoration: none;
        }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
            font-family: "Raleway", sans-serif;
        }

        

        .sidebar {
            width: 300px;
            background-color: #0d1117;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            transition: transform 0.3s ease-in-out;
        }

        /* Cacher la sidebar quand la fenêtre est plus petite que 768px */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%); /* Déplace la sidebar hors de l'écran */
            }
        }
        /*
        .profile img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 8px solid rgba(77, 77 ,88, 1); 
            cursor: pointer;
        }
        */

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
                
        /*--------------------------------------------------------------
        # Header
        --------------------------------------------------------------*/
        #header {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 300px;
        transition: all ease-in-out 0.5s;
        z-index: 9997;
        transition: all 0.5s;
        padding: 0 15px;
        background: #040b14;
        overflow-y: auto;
        }

        #header .profile img {
        margin: 15px auto;
        display: block;
        width: 120px;
        border: 8px solid #2c2f3f;
        }

        #header .profile h1 {
        font-size: 24px;
        margin: 0;
        padding: 0;
        font-weight: 600;
        -moz-text-align-last: center;
        text-align-last: center;
        font-family: "Poppins", sans-serif;
        }

        #header .profile h1 a,
        #header .profile h1 a:hover {
        color: #fff;
        text-decoration: none;
        }

        #header .profile .social-links a {
        font-size: 18px;
        display: inline-block;
        background: #212431;
        color: #fff;
        line-height: 1;
        padding: 8px 0;
        margin-right: 4px;
        border-radius: 50%;
        text-align: center;
        width: 36px;
        height: 36px;
        transition: 0.3s;
        }

        #header .profile .social-links a:hover {
        background: #149ddd;
        color: #fff;
        text-decoration: none;
        }

        #main {
        margin-left: 300px;
        }

        .container,
        .container-fluid {
        padding-left: 30px;
        padding-right: 30px;
        }

        @media (max-width: 1199px) {
        #header {
            left: -300px;
        }

        #main {
            margin-left: 0;
        }

        .container,
        .container-fluid {
            padding-left: 12px;
            padding-right: 12px;
        }
        }
        
/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/* Desktop Navigation */
.nav-menu {
  padding: 30px 0 0 0;
}

.nav-menu * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.nav-menu>ul>li {
  position: relative;
  white-space: nowrap;
}

.nav-menu a,
.nav-menu a:focus {
  display: flex;
  align-items: center;
  color: #a8a9b4;
  padding: 12px 15px;
  margin-bottom: 8px;
  transition: 0.3s;
  font-size: 15px;
}

.nav-menu a i,
.nav-menu a:focus i {
  font-size: 24px;
  padding-right: 8px;
  color: #6f7180;
}

.nav-menu a:hover,
.nav-menu .active,
.nav-menu .active:focus,
.nav-menu li:hover>a {
  text-decoration: none;
  color: #fff;
}

.nav-menu a:hover i,
.nav-menu .active i,
.nav-menu .active:focus i,
.nav-menu li:hover>a i {
  color: #149ddd;
}

/* Mobile Navigation */
.mobile-nav-toggle {
  position: fixed;
  right: 15px;
  top: 15px;
  z-index: 9998;
  border: 0;
  font-size: 24px;
  transition: all 0.4s;
  outline: none !important;
  background-color: #149ddd;
  color: #fff;
  width: 40px;
  height: 40px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  line-height: 0;
  border-radius: 50px;
  cursor: pointer;
}

.mobile-nav-active {
  overflow: hidden;
}

.mobile-nav-active #header {
  left: 0;
}
            

    </style>
</head>

<body>
   
    <!-- Barre de navigation latérale -->
   
        <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

        <!-- ======= Header ======= -->
        <header id="header">
            <div class="d-flex flex-column">

            <div class="profile">
            <img id="profile-pic"  src="{{ asset('images/caat.jpg') }}" alt="Profile Picture" onclick="document.getElementById('profile-pic-input').click();" style="cursor: pointer; width: 100px; height: 100px;">
                 <!--<img id="profile-pic" class="img-fluid rounded-circle" src="https://via.placeholder.com/80" alt="Profile Picture" onclick="document.getElementById('profile-pic-input').click();">
                <input type="file" id="profile-pic-input" style="display: none;" onchange="changeProfilePicture(event)"> -->
        
                <h1 class="text-light"><a href="index.html">CAAT</a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="https://x.com/Exal_Spa/status/1385247256836718598" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.facebook.com/ExpertiseAlgerie/" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://dz.linkedin.com/in/spa-expertise-alg%C3%A9rie-b14445297" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
            <nav id="navbar" class="nav-menu navbar">
                <ul>
                <li><a href="{{ url('/accueil') }}" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Accueil</span></a></li>
                <li><a href="{{ url('/profile') }}" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a></li>
                <li><a href="{{ url('/upload') }}" class="nav-link scrollto"><i class="bx bx-server"></i> <span>EAD</span></a></li>
                <li><a href="{{ url('/about') }}"  class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>About</span></a></li>
                <li><a href="{{ url('/contact') }}" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
                <li><a href="{{ url('/') }}" class="nav-link scrollto"><i class="bx bx-log-out"></i> <span>Déconnexion</span></a></li>
                </ul>
            </nav>
        
        </div>
        </header>
        <!-- Section Profil 
        <div class="profile text-center">
            <img id="profile-pic" src="https://via.placeholder.com/80" alt="Profile Picture" onclick="document.getElementById('profile-pic-input').click();">
            <input type="file" id="profile-pic-input" style="display: none;" onchange="changeProfilePicture(event)">
            <h3>John Doe</h3>
           

            <div class="social-links mt-4 mb-4 text-center">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
        
       
      
        <a href="{{ url('/accueil') }}" class="nav-link">
            <i class="bx bx-home"></i> Accueil
        </a>
        <a href="{{ url('/profile') }}" class="nav-link">
            <i class="bx bx-user"></i> Profile
        </a>
        <a href="{{ url('/upload') }}" class="nav-link">
            <i class="bx bx-server"></i> EAD
        </a>

        
        <div class="dropdown">

            
            <a href="{{ url('/upload') }}" class="dropdown-toggle text-white nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
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
        
        <a href="{{ url('/contact') }}" class="nav-link">
            <i class="bx bx-envelope"></i> Contact
        </a>
        <a href="{{ url('/about') }}" class="nav-link">
            <i class="bx bx-file-blank"></i> About
        </a>
        -->
    

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
