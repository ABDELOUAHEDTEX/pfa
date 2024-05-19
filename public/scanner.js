function scanFile() {
    var fileInput = document.getElementById('file-input');
    var scanResult = document.getElementById('scan-result');

    if ('files' in fileInput && fileInput.files.length > 0) {
        var file = fileInput.files[0];
        if (file.type.startsWith('image/')) {
            // cree un objet FileReader pour lire le contenu du fichier
            var reader = new FileReader();
            reader.onload = function(event) {
                // hada c est pour afficher le resultat de scanner 
                var img = new Image();
                img.src = event.target.result;
                scanResult.innerHTML = '';
                scanResult.appendChild(img);
            };
            //  hadi bach nqra le fichier entant que URL dyal donnees
            reader.readAsDataURL(file);
        } else {
            // Le fichier n'est pas une image
            scanResult.innerHTML = 'Le fichier doit être une image.';
        }
    } else {
        // Aucun fichier sélectionné
        scanResult.innerHTML = 'Veuillez sélectionner un fichier à scanner.';
    }
}
