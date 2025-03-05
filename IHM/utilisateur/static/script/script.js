function validateForm() {
    let email = document.getElementById("email").value;
    let tel = document.getElementById("tel").value;
    let emailError = document.getElementById("emailError");
    let telError = document.getElementById("telError");

    // Réinitialiser les erreurs
    emailError.textContent = "";
    telError.textContent = "";

    // Expression régulière pour un email valide
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        emailError.textContent = "Adresse email invalide.";
        return false; // Bloquer la soumission du formulaire
    }

    // Expression régulière pour un numéro de téléphone valide (ex: 06XXXXXXXX ou 07XXXXXXXX)
    let telPattern = /^(06|07)\d{8}$/;
    if (!telPattern.test(tel)) {
        telError.textContent = "Numéro de téléphone invalide (doit commencer par 06 ou 07 et contenir 10 chiffres).";
        return false;
    }

    return true; // Autoriser la soumission si tout est valide
}