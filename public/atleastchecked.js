function Validate(event) {
    var envoye_a_options = document.querySelectorAll('input[name="envoye_a"]');
    var atLeastOneChecked = Array.from(envoye_a_options).some(function(option) {
        return option.checked;
    });

    if (!atLeastOneChecked) {
        alert("Sélectionnez au moins un destinataire.");
        event.preventDefault(); // Empêcher le formulaire de se soumettre
        return false;
    }

    return true;
}