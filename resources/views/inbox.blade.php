@include('Layouts.header')
    <div class="container2">
        
        <div class="inbox-phrases">
            <h1 class="inbox-message">"Boîte de réception"</h1>
        </div>
        <div>
            <table class="inbox-table">
               <thead>

               
                <tr>
                    <th>Id</th>
                    <th>Référence</th>
                    <th>Date de réception</th>
                    <th>Expéditeur</th>
                    <th>Type</th>
                    <th>Contenu</th>
                    <th>Modéfication</th>
                    <th>Transférer</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courriers as $courrier)
                    <tr>
                        <td>{{ $courrier->id }}</td>
                        <td>{{ $courrier->reference }}</td>
                        <td>{{ $courrier->date }}</td>
                        <td>{{ $courrier->envoye_depuis }}</td>
                        <td>{{ $courrier->objet }}</td>
                        <td>{{ $courrier->message }}</td>
                    <td class="modefication">
                        <div class="buttons-inbox">
                        <form action="{{ route('supprimer-courrier', ['id' => $courrier->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="width: 24px; height: 24px; padding: 0; margin-right: 5px" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce courrier?')">
        <img src="images/860814.png" style="width: 100%; height: 100%" title="Supprimer le contenu" />
    </button>
</form>

<button style="width: 24px; height: 24px; padding: 0; margin-right: 5px">
    <img src="images/addtofavoris.png" style="width: 100%; height: 100%" title="Ajouter au favoris" />
</button>

<button style="width: 24px; height: 24px; padding: 0;">
    <img src="images/3221845.png" style="width: 100%; height: 100%" title="Modifier le courrier" />
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
</body>

</html>




