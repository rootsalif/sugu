class ElementFromTagName {
    constructor(parentElement, id, config) {
        this._parentElement = parentElement;
        this._id = id;
        this._config = config; // Configuration des champs
    }

    get parentElement() {
        return this._parentElement;
    }

    get id() {
        return this._id;
    }

    createElement(tag, content = '', attributes = {}) {
        const element = document.createElement(tag);
        if (content) {
            element.textContent = content;
        }
        for (const key in attributes) {
            element.setAttribute(key, attributes[key]);
        }
        return element;
    }

    createTr() {
        return this.createElement('tr', '', { id: 'item' + this.id });
    }

    createTh() {
        return this.createElement('th', this.id, { scope: 'row' });
    }

    createInputWithName(name, value) {
        const input = this.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', name);
        input.setAttribute('value', value);
        return input;
    }

    createTd(content) {
        const td = this.createElement('td');
        td.textContent = content;
        return td;
    }

    createImageTd(imageUrl) {
        const td = this.createElement('td');
        const img = this.createElement('img', '', {
            src: imageUrl,
            alt: 'Image',
            style: 'width: 50px; height: 50px;'
        });
        td.appendChild(img);
        return td;
    }

    createButtonTd() {
        const td = this.createTd('');
        const button = this.createElement('button', 'Supprimer', {
            type: 'button',
            class: 'btn btn-danger btn-sm ml-2'
        });
        button.addEventListener('click', () => {
            this.parentElement.removeChild(td.parentElement);
        });
        td.appendChild(button);
        return td;
    }

    createCell(content, type) {
        switch (type) {
            case 'text':
                return this.createTd(content);
            case 'input':
                return this.createInputWithName(content.name, content.value);
            case 'image':
                return this.createImageTd(content);
            case 'button':
                return this.createButtonTd();
            default:
                return this.createTd('');
        }
    }

    addRow(data) {
        const tr = this.createTr();
        tr.appendChild(this.createTh());

        this._config.forEach(field => {
            const value = data[field.name] || '';
            const content = field.type === 'input' ? { name: field.name, value: value } : value;
            tr.appendChild(this.createCell(content, field.type));
        });

        tr.appendChild(this.createButtonTd());
        this.parentElement.appendChild(tr);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const config = [
        { name: 'label', type: 'text' },
        { name: 'labels[]', type: 'input' },
        { name: 'description', type: 'text' },
        { name: 'descriptions[]', type: 'input' },
        { name: 'imageUrl', type: 'image' },
        { name: 'images[]', type: 'input' }
    ];

    let formCount = 0;
    document.querySelector('#addButton').addEventListener('click', () => {
        const label = document.querySelector('#idInputName').value;
        const description = document.querySelector('#idInputDescrip').value;
        const imageInput = document.querySelector('#idInputImage');
        const form = document.querySelector('#idForm');

        const imageFile = imageInput.files[0];

        if (label && description && imageFile) {
            formCount++;

            const itemTable = document.querySelector('#itemTable tbody');
            const elementManager = new ElementFromTagName(itemTable, formCount, config);

            const reader = new FileReader();
            reader.onload = (e) => {
                const imageUrl = e.target.result;
                const newFile = dataURLtoFile(imageUrl, imageFile.name);

                // Data ajax
                const formData = new FormData();
                formData.append('label', label);
                formData.append('description', description);
                formData.append('image', newFile);

                // Récupérer l'URL d'action du formulaire
                const actionUrl = form.getAttribute('action');


                fetch('/super/role', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Ajouter la ligne à la table
                        elementManager.addRow({
                            label: label,
                            description: description,
                            imageUrl: imageUrl,
                            'labels[]': label,
                            'descriptions[]': description,
                            'images[]': newFile
                        });

                        // Vider les champs de saisie après avoir ajouté la rangée
                        document.querySelector('#idInputName').value = '';
                        document.querySelector('#idInputDescrip').value = '';
                        imageInput.value = '';
                    } else {
                        alert('Erreur lors de l\'ajout de l\'élément');
                    }
                })
                .catch(error => console.error('Error:', error));
            };

            reader.readAsDataURL(imageFile);
        } else {
            alert('Remplir tous les champs');
        }
    });

    // Réinitialiser le formulaire
    const resetBtn = document.querySelector('#resetButton');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            const rows = document.querySelectorAll('#itemTable tr');
            rows.forEach((row, index) => {
                if (index !== 0) {
                    row.remove();
                }
            });
            formCount = 0; // Réinitialiser le compteur de formulaires
        });
    }
});

// Fonction pour convertir un Data URL en un objet File
function dataURLtoFile(dataurl, filename) {
    const arr = dataurl.split(',');
    const mime = arr[0].match(/:(.*?);/)[1];
    const bstr = atob(arr[1]);
    let n = bstr.length;
    const u8arr = new Uint8Array(n);
    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new File([u8arr], filename, { type: mime });
}











        // envoie de requet ajax

        
// document.addEventListener('DOMContentLoaded', function () {
//     let formCount = 0;

//     document.querySelector('#addButton').addEventListener('click', function () {
//         const label = document.querySelector('#idInputName').value;
//         const description = document.querySelector('#idInputDescrip').value;
//         const imageFile = document.querySelector('#idInputImage').files[0];

//         if (label && description && imageFile) {
//             let reader = new FileReader();
//             reader.onload = function (e) {
//                 let dataUrl = e.target.result;
//                 const newFile = dataURLtoFile(dataUrl, imageFile.name);

//                 let formData = new FormData();
//                 formData.append('label', label);
//                 formData.append('description', description);
//                 formData.append('image', newFile);

//                 // Récupérer l'URL d'action du formulaire
//                 const form = document.querySelector('#roleForm');
//                 const actionUrl = form.getAttribute('action');

//                 // Envoyer le formulaire via AJAX
//                 fetch(actionUrl, {
//                     method: 'POST',
//                     headers: {
//                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                     },
//                     body: formData
//                 })
//                 .then(response => response.json())
//                 .then(data => {
//                     if (data.success) {
//                         // Ajouter la ligne à la table
//                         formCount++;
//                         let itemTable = document.querySelector('#itemTable');
//                         let elementManager = new ElementFromTagName(itemTable, formCount);
//                         elementManager.addRow(label, description, dataUrl); // Utiliser dataUrl pour afficher l'image
//                     } else {
//                         alert('Erreur lors de l\'ajout de l\'élément');
//                     }
//                 })
//                 .catch(error => console.error('Error:', error));
//             };
//             reader.readAsDataURL(imageFile);
//         } else {
//             alert('Remplir les champs');
//         }
//     });
// });












