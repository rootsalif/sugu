document.addEventListener('DOMContentLoaded', () => {
    initializeTableHeaders();

    function initializeTableHeaders() {
        const form = document.getElementById('myForm');
        const tableHeader = document.getElementById('tableHeader');

        if (!form || !tableHeader) return;

        // Ajouter des en-têtes de tableau en fonction des champs de formulaire
        Array.from(form.elements).forEach(element => {
            if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
                if(element.placeholder){
                    const th = document.createElement('th');
                    th.innerText = element.placeholder.charAt(0).toUpperCase() + element.placeholder.slice(1);
                    tableHeader.appendChild(th);
                }
            }
        });

        // Ajouter une colonne pour les actions (supprimer)
        const th = document.createElement('th');
        th.innerText = 'Actions';
        tableHeader.appendChild(th);
    }
});

$(document).ready(function() {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#myForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                let data = response.data;

                const form = document.getElementById('myForm');
                const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                const newRow = table.insertRow();

                // Ajouter des cellules avec des données dans le tableau HTML
                Array.from(form.elements).forEach(element => {
                    if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
                        if(element.placeholder){
                            const newCell = newRow.insertCell();
                            if (element.type === 'file') {
                                const file = element.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const img = document.createElement('img');
                                        img.src = e.target.result;
                                        img.width = 50; // Largeur de l'image
                                        newCell.appendChild(img);
                                    };
                                    reader.readAsDataURL(file);
                                }
                            } else {
                                newCell.innerText = element.value;
                            }
                        }
                    }
                });

                // Ajouter une cellule pour l'action de suppression
                const actionCell = newRow.insertCell();
                const deleteButton = document.createElement('button');
                deleteButton.innerText = 'Supprimer';
                deleteButton.setAttribute('class', 'btn btn-danger btn-sm ml-2');
                deleteButton.onclick = function () {
                    deleteArticle(data.id);
                    newRow.remove(); // Supprime la ligne du tableau de manière dynamique
                };
                actionCell.appendChild(deleteButton);

                form.reset(); // Réinitialise le formulaire après l'ajout
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                // alert('Une erreur est survenue lors de la soumission du formulaire');
            }
        });
    });

    function deleteArticle(id) {
        $.ajax({
            url: $('#myForm').attr('action') + '/' + id,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Article supprimé avec succès');
            },
            error: function(xhr) {
                console.error('Erreur lors de la suppression:', xhr.responseText);
            }
        });
    }
});
