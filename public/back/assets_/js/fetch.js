document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche la soumission normale du formulaire

    const form = document.getElementById('myForm');
    const formData = new FormData(form);
    const actionUrl = form.getAttribute('action');

    fetch('/check-role', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Traitez la réponse du serveur ici
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
