@include('Layouts.header')
    <div class="container">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <form class="form-items" method="post" enctype="multipart/form-data" action="{{ route('courrier.store') }}">

        @csrf           
 <p id="message-form">Veuillez remplir ce formulaire</p>

            <div>
                <label for="reference">Référence :</label>
                <input type="text" id="reference" name="reference" required />
            </div>
            <div>
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" required />
            

    <script src="https://unpkg.com/dynamsoft-javascript-barcode/dist/dbr.min.js"></script>

            <div id="images" class="img"></div>
            <div>
                <label>Envoyé depuis :</label><br />
                <fieldset>
                    <label><input type="radio" name="envoye_depuis" id="envoye_depuis_option1" value="Chef de département"
                            required />Chef de département</label><br />
                    <label><input type="radio" name="envoye_depuis" id="envoye_depuis_option2" value="Chef de service"
                            required />Chef de service</label><br />
                    <label><input type="radio" name="envoye_depuis" id="envoye_depuis_option3" value="Directeur"
                            required />Directeur</label><br />
                    <label><input type="radio" name="envoye_depuis" id="envoye_depuis_option4" value="Secrétaire"
                            required />Secrétaire</label><br />
                    <label><input type="radio" name="envoye_depuis" id="envoye_depuis_option5" value="Fonctionnaire"
                            required />Fonctionnaire</label><br />
                </fieldset>
            </div>
            <div id="app">
                <label>Envoyé à :</label>
                <fieldset class="checkboxgroup">
                    <label><input type="checkbox" name="envoye_a[]" value="Chef de département" /> Chef de
                        département</label><br />
                    <label><input type="checkbox" name="envoye_a[]" value=" Chef de service" /> Chef de
                        service</label><br />
                    <label><input type="checkbox" name="envoye_a[]" value="Directeur" />
                        Directeur</label><br />
                    <label><input type="checkbox" name="envoye_a[]" value="Secrétaire" />
                        Secrétaire</label><br />
                    <label><input type="checkbox" name="envoye_a[]" value="Fonctionnaire" />
                        Fonctionnaire</label><br />
                </fieldset>
            </div>

            <div>
                <label for="objet">objet</label>
                <input type="text" id="objet" name="objet" />
            </div>
            <div>
                <label for="message">Message :</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <div>
          
            <input type="file" id="file-input" accept="image/*">
    <button type="button" id="scan-button" name="scan-button" onclick="scanFile();">
        Scanner
    </button>
    <div id="scan-result"></div>

    <script src="scanner.js"></script>
                
            </div>
            

    <button type="submit">Envoyer</button>

        </form>
    </div>

    <script src="scan.js"></script>
    <script type="text/javascript" src="scannerjs\scanner.js"></script>
    <script src="bower_components/scanner.js/dist/scanner.js" type="text/javascript"></script>
    <script src="atleastchecked.js" type="text/javascript"></script>
    <script src="sortantsclic.js" type="text/javascript"></script>
    <script src="nav.js" type="text/javascript"></script>
</body>

</html>