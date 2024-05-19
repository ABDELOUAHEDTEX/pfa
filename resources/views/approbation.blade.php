<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approbation des Courriers Sortants</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
        }

        .container {

            width: 100%;
            margin-top:15%;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;

        }

        table {
            width: 100%;
          
            margin-top: 20px;
        }

        th,
tr,
td {
    width: fit-content;
    height: fit-content;

    word-wrap: break-word;
    border: 1px solid black;
    margin: 0 auto;
    padding: 2px;
    background-color: #fefae0;
    border: solid #0056b3;
    box-shadow: #ccc;
    caret-color: white;
    border: 0px solid;
    box-shadow: 1px 1px 1px 1px rgb(131, 133, 129), -1px -1px 1px 1px rgb(100, 100, 100);
    border-radius: 4px;
}


.options button {
    padding: 8px 20px;
    margin-right: 10px; /* Assure une petite marge entre les boutons */
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    white-space: nowrap; /* Empêche le texte du bouton de passer à la ligne suivante */
}

        .options button:last-child {
            background-color: #f44336;
        }

        .options button:hover {
            background-color: #45a049;
            transition: background-color 0.3s ease;
        }
        .options button:last-child {
        margin-right: 0; /* Supprime la marge pour le dernier bouton */
}
        .options button:last-child:hover {
            background-color: #d32f2f;
            transition: background-color 0.3s ease;
        }
        td {
    padding: 5px; /* Ajoute un peu de padding pour ne pas coller le texte aux bordures */
    text-align: center; /* Centre le texte et les boutons dans la cellule */
}
        .custom-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Approbation des Courriers Sortants</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Référence</th>
                    <th>Date</th>
                    <th>Envoyé par</th>
                    <th>Objet</th>
                    <th>Message</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCourriers as $listCourrier)
                <tr>
                    <td>{{ $listCourrier->id }}</td>
                    <td>{{ $listCourrier->reference }}</td>
                    <td>{{ $listCourrier->date }}</td>
                    <td>{{ $listCourrier->envoye_a }}</td>
                    <td>{{ $listCourrier->objet }}</td>
                    <td>{{ $listCourrier->message }}</td>
                    <td class="options">
                        <button onclick="approuverCourrier('{{ $listCourrier->id }}')">Approuver</button>
                        <button onclick="refuserCourrier('{{ $listCourrier->id }}')">Refuser</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="custom-button" onclick="retourPagePrecedente()">Retour</button>
    </div>
    <script>
    // Fetch data when the page loads
    fetchCourriers();

    function fetchlistCourriers() {
    fetch('/approbation')
        .then(response => response.json())
        .then(data => {
            let inbapprobation = document.getElementById('approbation');
            inbox.innerHTML = ''; // Clear existing inbox content
            data.forEach(listCourrier => {
                let mail = document.createElement('div');
                mail.innerHTML = `<div><h3>${listCourrier.subject}</h3><p>${listCourrier.body}</p></div>`;
                approbation.appendChild(mail);
            });
        });
}

   

    // Fetch data when the page is refreshed
    window.addEventListener('load', fetchCourriers);
</script>
    <script>
        function approuverCourrier(id) {
            alert("Courrier " + id + " approuvé !");
        } 

        function refuserCourrier(id) {
            alert("Courrier " + id + " refusé !");
        }

        function retourPagePrecedente() {
            window.history.back();
        }
    </script>
</body>
</html>
