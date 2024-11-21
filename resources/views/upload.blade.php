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

        /* Message de succès */
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

    <!-- Sidebar -->
    @include('sidebar')

    <!-- Contenu principal -->
    <div class="content">
        <h1>Envoyer un email avec des fichiers</h1>

        <!-- Afficher un message de succès ou d'erreur -->
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <!-- Formulaire d'upload -->
        <form action="{{ route('send-email') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="images">Photos (JPG, PNG)</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple>
            </div>
            <div>
                <label for="pdfs">PDFs</label>
                <input type="file" name="pdfs[]" id="pdfs" accept="application/pdf" multiple>
            </div>
            <div>
                <label for="email">Email du destinataire</label>
                <input type="email" name="email" id="email" required placeholder="example@email.com">
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>

</body>
</html>
