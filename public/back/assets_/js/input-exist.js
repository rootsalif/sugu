// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Check label</title>
// </head>
// <body>
//     <form id="registerForm">
//         <label for="label">label:</label>
//         <input type="text" id="label" name="label">
//         <div id="labelError" style="color: red;"></div>
//         <button type="submit" id="subRegist">Register</button>
//     </form>


document.getElementById('idInputLabel').addEventListener('input', function() {
    const label = this.value;
    console.log(label)

    if (label.length > 0) {
        // Effectuer une requête AJAX pour vérifier l'unicité du nom d'utilisateur
        fetch(`/check-functional?label=${encodeURIComponent(label)}`)
            .then(response => response.json())
            .then(data => {
                const subRegist = document.getElementById('subRegist');
                if (data.exists) {                                        
                    const idInputLabel =document.querySelector('table tr:last-child');                   
                    idInputLabel.getAttribute('class',red);
                    // subRegist.disabled = true;
                    console.log(idInputLabel);
                } 
            })
            // .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('labelError').textContent = '';
        document.getElementById('subRegist').disabled = false;
    }
});

document.getElementById('registerForm').addEventListener('submit', function(event) {
    const error = document.getElementById('labelError').textContent;

    // Si le message d'erreur est présent, empêcher l'envoi du formulaire
    if (error.length > 0) {
        event.preventDefault();
        alert('Please fix the errors before submitting');
    }
});

