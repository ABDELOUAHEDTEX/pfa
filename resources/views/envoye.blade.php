


    @include('Layouts.header')
    <div class="container2">
        <div class="inbox-phrases">
            <h1 class="inbox-message">"Boite d'envoi"</h1>
        </div>
        <div>
            <table class="inbox-table">
               <thead>

               
                <tr>
                <th>ID Courrier</th>
                <th>Envoyé à</th>
                <th>Date de création</th>
                <th>Modéfication</th>
                <th>Transférer</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ecourriers as $envoye)

                    <tr>
                        <td>{{ $envoye->new_courrier_id }}</td>
                        <td>{{ $envoye->envoye_a }}</td>
                        <td>{{ $envoye->created_at }}</td>
                        
                    <td class="modefication">
                        <div class="buttons-inbox">
                        <button style="width: 100%; height: 100%; margin-right: 5px">
                            <img src="images/860814.png" style="width: 100%; height: 100%"
                                title="Supprimer le contenu" id="deleteContentButton" />
                        </button>

                            </button>
                            <button style="width: 100%; height: 100%; margin-right: 5px">
                                <img src="images/addtofavoris.png" style="width: 100%; height: 100%"
                                    title="Ajouter au favoris " />
                            </button>
                            <button style="width: 100%; height: 100%">
                                <img src="images/3221845.png" style="width: 100%; height: 100%"
                                    title="Modifier le courrier " />
                            </button>
                        </div>
                    </td>
                    <td>
                        <button class="open-button" onclick="openForm()">
                            Transférer
                        </button>

                        <div class="form-popup" id="myForm">
                            <form action="/action_page.php" class="form-container" onsubmit="return validateForm()">
                                <label for="option1"><input type="checkbox" id="option1" name="option1" />Chef
                                    de département</label>
                                <label for="option2"><input type="checkbox" id="option2" name="option2" />Chef
                                    de service
                                </label>
                                <label for="option3"><input type="checkbox" id="option3"
                                        name="option3" />Directeur</label>
                                <label for="option4"><input type="checkbox" id="option4"
                                        name="option4" />secreataire</label>
                                <label for="option5"><input type="checkbox" id="option5"
                                        name="option3" />Fonctionaire</label>
                                        <form action="{{ route('transfert') }}" method="post">
                                            @csrf
                                           
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
                                        </form>


                                <button type="button" class="btn cancel" onclick="closeForm()">
                                    Fermer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        
        <script>
    // Fetch data when the page loads
    fetchCourriers();

    function fetchCourriers() {
    fetch('/inbox')
        .then(response => response.json())
        .then(data => {
            let inbox = document.getElementById('inbox');
            inbox.innerHTML = ''; // Clear existing inbox content
            data.forEach(courrier => {
                let mail = document.createElement('div');
                mail.innerHTML = `<div><h3>${courrier.subject}</h3><p>${courrier.body}</p></div>`;
                inbox.appendChild(mail);
            });
        });
}

   

    // Fetch data when the page is refreshed
    window.addEventListener('load', fetchCourriers);
</script>
        
    </div>
    <script src="forward_to.js" type="text/javascript"></script>
    <script src="nav.js" type="text/javascript"></script>

    <script>
    // Sélectionnez l'image par son ID
    var deleteContentButton = document.getElementById('deleteContentButton');

    // Attachez un gestionnaire d'événements au clic sur l'image
    deleteContentButton.addEventListener('click', function() {
        // Envoyez une requête au serveur pour supprimer le contenu
        // Vous pouvez utiliser fetch ou XMLHttpRequest pour cela
        fetch('/supprimer-contenu', {
            method: 'POST', // ou 'DELETE' selon la méthode de suppression que vous utilisez
            headers: {
                'Content-Type': 'application/json',
                // Vous pouvez ajouter d'autres en-têtes si nécessaire
            },
            body: JSON.stringify({
                // Vous pouvez envoyer des données supplémentaires avec la requête si nécessaire
            }),
        })
        .then(response => {
            // Gérez la réponse de la requête
            if (response.ok) {
                // Si la suppression est réussie, mettez à jour la page ou effectuez toute autre action appropriée
                location.reload(); // Rechargez la page pour afficher les changements
            } else {
                // Si la suppression échoue, affichez un message d'erreur ou effectuez une autre action de gestion des erreurs
                console.error('La suppression a échoué');
            }
        })
        .catch(error => {
            // Gérez les erreurs de la requête
            console.error('Erreur lors de la suppression:', error);
        });
    });
</script>


</body>

</html>




