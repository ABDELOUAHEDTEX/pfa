@include('Layouts.header')
<div class="container">
@if(session('success1'))
            <div class="message">
                {{ session('success1') }}
            </div>
        @endif
        <form class="form-items" method="post" action="{{ route('courrierexterne.storeexterne') }}"
        enctype="multipart/form-data">
        @csrf

        <div>
            <label for="reference">Référence :</label>
            <input type="text" id="reference" name="reference" required />
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required />
        </div>

        <div id="images" class="img"></div>
        <div>
            <label>Envoyé depuis :</label><br />
            <fieldset>
                <label><input type="radio" name="envoye_depuis" id="envoye_depuis_entreprise" value="entreprise" checked required />Entreprise</label><br />
            </fieldset>
        </div>
        <div>
            <label for="envoye_a">Envoyé à :</label>
            <input type="text" id="envoye_a" name="envoye_a" required />
        </div>
        <div>
            <label for="objet">Objet :</label>
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
