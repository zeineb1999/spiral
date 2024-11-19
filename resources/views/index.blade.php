<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navigation Bar with Multilevel Dropdown</title>

    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel: Ajouter votre propre style CSS pour personnaliser -->
    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #1c1f3c; /* Bleu foncé */
            padding-top: 20px;
            color: white;
        }

        .profile {
            text-align: center;
            margin-bottom: 30px;
            padding: 10px;
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .profile h5, .profile p {
            margin: 0;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .dropdown-item {
            color: #d1d1d1 !important;
        }

        .dropdown-item:hover {
            background-color: #575757;
        }

        .dropdown-menu {
            background-color: #2a2d52; /* Couleur légèrement plus claire pour les sous-menus */
        }

        .dropdown-submenu > .dropdown-menu {
            margin-left: 250px; /* Indentation pour les sous-menus */
        }

        .dropdown-toggle::after {
            content: none; /* Retirer l'icône par défaut du dropdown */
        }

        h4 {
            color: white;
            text-align: center;
        }

        .container {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Barre de navigation latérale -->
    <div class="sidebar">
        <!-- Section Profil -->
        <div class="profile">
            <img id="profile-pic" src="https://via.placeholder.com/80" alt="Profile Picture" onclick="document.getElementById('profile-pic-input').click();">
            <input type="file" id="profile-pic-input" style="display: none;" onchange="changeProfilePicture(event)">
            <h5>John Doe</h5>
            <p>Administrator</p>
        </div>
        
        <h4>Menu</h4>
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>
        
        <!-- Menu déroulant multilevel -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                Services
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Web Development</a></li>
                <li><a class="dropdown-item" href="#">App Development</a></li>
                
                <!-- Sous-menu déroulant -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Digital Marketing</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">SEO</a></li>
                        <li><a class="dropdown-item" href="#">Content Marketing</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <a href="#">Contact</a>
    </div>

    <!-- Contenu principal de la page -->
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <p>This is a simple example of a sidebar navigation bar with multilevel dropdown using Bootstrap.</p>
    </div>

    <!-- Lien vers les scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fonction pour changer la photo de profil
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
