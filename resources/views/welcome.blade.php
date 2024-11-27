<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <!-- Inclure les assets générés par Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Optionnel : inclure le font awesome pour les icônes de réseaux sociaux -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!-- Ajouter la bibliothèque reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <!-- Section principale -->
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%),
                radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <!-- Conteneur principal avec une grille responsive -->
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        The best offer <br />
                        <span style="color: hsl(218, 81%, 75%)">for your business</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, expedita iusto veniam atque...
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <!-- Titre centré "Se connecter" -->
                            <h3 class="text-center mb-4" style="font-weight: bold;">Se connecter</h3>
                            
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <!-- Inputs pour le nom d'utilisateur et mot de passe -->
                                <div data-mdb-input-init class="form-outline mb-4"> 
                                    <label class="form-label" for="form3Example3">Nom d'utilisateur</label>
                                    <input type="text" name="username" id="form3Example3" class="form-control" placeholder="Nom d'utilisateur" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Mot de passe" />
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                            <i id="eye-icon" class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Ajout du reCAPTCHA -->
                                <div class="g-recaptcha" data-sitekey="VOTRE_SITE_KEY"></div>
                                <!-- Submit button qui prend toute la largeur -->
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">
                                    Connexion
                                </button>

                                <!-- Affichage des erreurs de connexion -->
                                @if (session('error'))
                                    <p style="color: red; text-align: center; margin-top: 10px;">{{ session('error') }}</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('form3Example4');
            var eyeIcon = document.getElementById('eye-icon');
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
