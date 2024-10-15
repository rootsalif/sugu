class ElementFromTagName {
    /**
     * 
     * @param {HTMLElement} parentElement Element parent où les éléments seront ajoutés
     * @param {number} id Unique ID
     * @param {Array} config Configuration des champs d'entrée
     */
    constructor(parentElement, id, config) {
        this._parentElement = parentElement;
        this._id = id;
        this._config = config; // Configuration des champs
    }

    // Getter pour l'élément parent
    get parentElement() {
        return this._parentElement;
    }

    // Getter pour l'id
    get id() {
        return this._id;
    }

    // Méthode pour créer un élément HTML avec des attributs et du contenu optionnel
    /**
     * 
     * @param {String} tag 
     * @param {String} content 
     * @param {Object} attributes 
     * @returns 
     */
    createElement(tag, content = '', attributes = {}) {
        let element = document.createElement(tag);
        if (content) {
            element.textContent = content;
        }
        for (let key in attributes) {
            element.setAttribute(key, attributes[key]);
        }
        return element;
    }

    // Méthode pour créer une rangée (tr)
    createTr() {
        return this.createElement('tr', '', { id: 'item' + this.id });
    }

    // Méthode pour créer une cellule d'en-tête (th)
    createTh() {
        return this.createElement('th', this.id, { scope: 'row' });
    }

    createInputWithName(name, value){
        let input = this.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', name);
        input.setAttribute('value', value);
        return input;
    }

    // Méthode pour créer une cellule (td)
    createTd(content) {
        let td = this.createElement('td');
        td.textContent = content;
        return td;
    }

    // Méthode pour créer une cellule avec une image
    createImageTd(imageUrl) {
        let td = this.createElement('td');
        let img = this.createElement('img', '', {
            src: imageUrl,
            alt: 'Image',
            style: 'width: 50px; height: 50px;'
        });
        td.appendChild(img);
        return td;
    }

    // Méthode pour créer une cellule avec un bouton de suppression
    createButtonTd() {
        let td = this.createTd('');
        let button = this.createElement('button', 'Supprimer', {
            type: 'button',
            class: 'btn btn-danger btn-sm ml-2'
        });
        button.addEventListener('click', () => {
            this.parentElement.removeChild(td.parentElement);
        });
        td.appendChild(button);
        return td;
    }

    // Méthode générique pour créer une cellule basée sur le type de contenu
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

    // Méthode pour ajouter une rangée au tableau de manière dynamique
    addRow(data) {
        let tr = this.createTr();
        tr.appendChild(this.createTh());

        this._config.forEach(field => {
            const value = data[field.name] || '';
            const content = field.type === 'input' ? { name: field.name, value: value } : value;
            tr.appendChild(this.createCell(content, field.type));
        });

        this.parentElement.appendChild(tr);
    }
}

// Fonction pour initialiser et ajouter des rangées au tableau
document.addEventListener('DOMContentLoaded', function () {
    const config = [
        { name: 'label', type: 'text' },
        { name: 'labels[]', type: 'input' },
        { name: 'description', type: 'text' },
        { name: 'descriptions[]', type: 'input' },
        { name: 'imageUrl', type: 'image' },
        { name: 'images[]', type: 'input' }
    ];

    let formCount = 0;
    document.querySelector('#addButton').addEventListener('click', function () {
        const label = document.querySelector('#idInputName').value;
        const description = document.querySelector('#idInputDescrip').value;
        const imageUrl = document.querySelector('#idInputImage').value;

        if (label && description && imageUrl) {
            formCount++;
            
            let itemTable = document.querySelector('#itemTable tbody');
            let elementManager = new ElementFromTagName(itemTable, formCount, config);

            elementManager.addRow({
                label: label,
                description: description,
                imageUrl: imageUrl,
                'labels[]': label,
                'descriptions[]': description,
                'images[]': imageUrl
            });

            // Vider les champs de saisie après avoir ajouté la rangée
            document.querySelector('#idInputName').value = '';
            document.querySelector('#idInputDescrip').value = '';
            document.querySelector('#idInputImage').value = '';
        } else {
            alert('Remplir tous les champs');
        }
    });

    // Réinitialiser le formulaire
    const resetBtn = document.querySelector('#resetButton');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
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
