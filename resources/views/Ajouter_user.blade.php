<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        /* Add CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            color: #3336FF;
            font-family: Arial, sans-serif;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: calc(100% - 10px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type=submit], button[type=button] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        button[type=submit]:hover, button[type=button]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un utilisateur</h2>

        @if(session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
        @endif

        <form class="form-items" method="post" enctype="multipart/form-data" action="{{ route('ajouter_user.store') }}">
            @csrf
            <div class="form-group">
                <label for="Nom">Nom :</label>
                <input type="text" id="Nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="Prénom">Prénom :</label>
                <input type="text" id="Prénom" name="prenom" required>
            </div>
           
            <div class="form-group">
                <label for="Service">service :</label>
                <input type="text" id="Service" name="service" required>
            </div>
            <div class="form-group">
                <label for="Fonction">Fonction :</label>
                <input type="text" id="Fonction" name="fonction" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="button" onclick="window.history.back()">Retour</button>
            <button type="submit">Ajouter</button>
          
        </form>
    </div>
</body>
</html>
