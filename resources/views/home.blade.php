@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestion des courriers</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .vertical-buttons-container ul.vertical-buttons li {
      display: block;
      margin-bottom: 10px; /* Ajustez selon l'espace souhaité entre les boutons */
    }

    .mail-icon {
      display: flex;
      justify-content: center; /* Centrer horizontalement */
      align-items: center; /* Centrer verticalement */
      height: 1000vh; /* Pour occuper toute la hauteur de l'écran */
      width: 50%; /* Changer la taille de l'image selon vos besoins */
      height: auto; /* Pour conserver les proportions de l'image */
    margin-right: 20%;
    }

  </style>
</head>
<body>
  <header>
    <h1>Suivez vos  Courriers</h1>
  </header>
  <br>
  <nav>
    <button id="toggleBtn"><i class="fas fa-bars"></i> Barre de navigation</button> <!-- Bouton pour afficher/masquer la liste de navigation -->
    <div class="vertical-buttons-container" style="display: none;">
      <ul class="vertical-buttons">
        <li><a href="/inbox"><i class="fas fa-inbox"></i> Entrants</a></li>
        <li><a href="/envoye"><i class="fas fa-envelope"></i> Sortants</a></li>
        <li><a href="#"><i class="fas fa-search"></i> Chercher</a></li>
        <li><a href="/approbation"><i class="fas fa-check"></i> Approbation</a></li>
        
        <li><a href="/Corbeille"><i class="fas fa-trash-alt"></i> Corbeille</a></li>
        <li><a href="#" id="nouveauCourrier"><i class="fas fa-plus"></i> Nouveau Courrier</a></li>
        <div id="selectionContainer" style="display: none;">
          <label for="typeCourrier">Sélectionnez le type de courrier :</label>
          <select id="typeCourrier">
            <option value="interne">Courrier Interne</option>
            <option value="externe">Courrier Externe</option>
          </select>
          <button id="valider">Valider</button>
        </div>
        <li><a href="/Ajouter"><i class="fas fa-plus"></i> Ajouter un utilisateur</a></li>
        <li><a href="/plus"><i class="fas fa-plus"></i> Plus</a></li>
      </ul>
    </div>
  </nav>
  <main>
  <!--<img src="images/cour.jpg" alt="icone de courrier" class="mail-icon">
  -->  
</main>
  <footer>
    <p>&copy; 2024 Suivi de Courriers</p>
  </footer>
 
  <script>
  document.getElementById("nouveauCourrier").addEventListener("click", function() {
    document.getElementById("selectionContainer").style.display = "block";
  });

  document.getElementById("valider").addEventListener("click", function() {
    var typeCourrier = document.getElementById("typeCourrier").value;
    if (typeCourrier === "interne") {
      window.location.href = "/new_courrier"; // Rediriger vers la page de courrier interne
    } else if (typeCourrier === "externe") {
      window.location.href = "/sortant"; // Rediriger vers la page de courrier externe
    }
  });

  document.getElementById("toggleBtn").addEventListener("click", function() {
    var navList = document.querySelector(".vertical-buttons-container");
    if (navList.style.display === "none") {
      navList.style.display = "block"; // Affiche la liste de navigation
    } else {
      navList.style.display = "none"; // Cache la liste de navigation
    }
  });

  
</script>
</body>
</html>

@endsection
