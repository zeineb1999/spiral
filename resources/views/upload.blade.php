<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        /* Style général de la page */
        body {
            background: -webkit-linear-gradient(left, #2C2F3F, #6c757d); /* Dégradé de #2C2F3F à #6c757d */
            max-width: 100%;
            overflow-x:hidden; /* ou ne pas spécifier overflow-x pour le laisser par défaut */

        }
        
        .contact-form {
            background: #fff;
            margin-top: 10%; /* Ajuste la distance par rapport au haut */
            margin-bottom: 5%; /* Ajuste la distance par rapport au bas */
            width: 50%; /* Réduit la largeur du formulaire */
            margin-left: 5%; /* Centre horizontalement */
            margin-right: auto; /* Centre horizontalement */
            padding: 20px;
            border-radius: 8px; /* Ajoute des coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ajoute une ombre */
        }




        
        .contact-form .form-control{
            border-radius:1rem;
        }
        .contact-image{
            text-align: center;
        }
        .contact-image img{
            border-radius: 6rem;
            width: 11%;
            margin-top: -3%;
            transform: rotate(29deg);
        }
        .contact-form form{
            padding: 14%;
        }
        .contact-form form .row{
            margin-bottom: -7%;
        }
        .contact-form h3{
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #2C2F3F;
        }
        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #2C2F3F;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }
        .btnContactSubmit
        {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #2C2F3F;
            border: none;
            cursor: pointer;
        }
        
        .container-upload{
            padding-left: 0px;
            padding-right: 0px;
        }
                
    </style>
</head>
<body>

        <!-- Sidebar -->
        @include('sidebar')


  
    <div class="container-upload">



        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
        <form action="/send-email-with-photo" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Drop Us a Message</h3>
            <div class="row">
                <!-- Colonne gauche -->
                <div class="col-md-6">
                    <!-- Nom -->
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name *" >
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email *" required>
                    </div>
                    <!-- Téléphone -->
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" >
                    </div>
                    <!-- Photo -->
                    <div class="form-group">
                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <!-- Colonne droite -->
                <div class="col-md-6">
                    <!-- Message (avant le bouton d'envoi) -->
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" ></textarea>
                    </div>
                
                    
                </div>
                <!-- Bouton d'envoi -->
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message">
                </div>
            </div>
        </form>

        </div>
    </div>

</body>
</html>

{{--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload</title>
    
    <style>
        /* Style général de la page */
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

    

        /* Contenu principal (formulaire) */
        .content {
            margin-left: 300px; /* Décale le contenu pour éviter la superposition avec la sidebar */
            padding: 20px;
            background-color: #f9f9f9;
            width: calc(100% - 260px); /* Ajuste la largeur du contenu */
        }

        h1 {
            color: #333;
        }

        /* Style du formulaire */
        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="file"] {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .error-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>

  
    @include('sidebar')
    

   
    <div class="content">
        <h1>Envoyer un email avec des fichiers</h1>

       
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        
        <form action="/send-email-with-photo" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>

            <label for="photo">Photo :</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>

            <button type="submit">Envoyer</button>
        </form>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


    </div>

</body>
</html>--}}