
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

    document.querySelector('#addButton').addEventListener('click', addToTable);
    const forms = [];

    function addToTable() {
        const form = document.getElementById('myForm');
        const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        forms.push(new FormData(form));

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
            deleteRow(this);
        };
        actionCell.appendChild(deleteButton);       


        const tableData=document.querySelector('#inputData');

        const existingData = tableData.value ? JSON.parse(tableData.value) : [];

    const formData = {};  

    Array.from(form.elements).forEach(element => {
        
        if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
            if (element.type === 'file') {
                formData[element.name] = element.files[0] ? JSON.stringify(element.files[0]) : '';
            } else {
                formData[element.name] = element.value;
            }
        }
    });
        existingData.push(formData);

        tableData.value = JSON.stringify(existingData);

        console.log(formData, tableData);
        form.reset();


                // Envoie Data   
        const actionUrl = document.getElementById('myForm').getAttribute('action');
        console.log(actionUrl);


        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Traitez la réponse du serveur ici
        })
        .catch(error => {
            console.error('Error:', error);
        });


    }


    // document.querySelector('#submitButton').addEventListener('click', submitButton());

    // function submitButton(){

    //     const formDatas = forms.map(formItem => {
    //         const formData = {};
    //         for (let [key, value] of formItem.entries()) {
    //             formData[key] = value;
    //         }
    //         return formData;
    //     });

    //     // Envoie Data   
    //     const actionUrl = document.getElementById('myForm').getAttribute('action');
    //     console.log(actionUrl);


    //     fetch(actionUrl, {
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify(formDatas)
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         console.log(data);
    //         // Traitez la réponse du serveur ici
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });
    // }

    function deleteRow(button) {
        // Supprime la ligne du tableau
        const row = button.parentNode.parentNode;
        const rowIndex = row.rowIndex - 1; // Enlève 1 pour ajuster l'en-tête
        row.parentNode.removeChild(row);

        // Supprime les données correspondantes dans le tableau forms
        forms.splice(rowIndex, 1);
    }

    document.querySelector('#resetButton').addEventListener('click', clearTable);

    function clearTable() {
        const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        table.innerHTML = '';

        forms.length = 0; // Réinitialise le tableau forms
    }
});




























// document.addEventListener('DOMContentLoaded', (event) => {
//     initializeTableHeaders();
// });

// document.getElementById('myForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Empêche la soumission du formulaire
// });

// document.addEventListener('DOMContentLoaded', () => {
//     initializeTableHeaders();
//     function initializeTableHeaders() {
//         const form = document.getElementById('myForm');

//         const tableHeader = document.getElementById('tableHeader');


//         // Ajouter des en-têtes de tableau en fonction des champs de formulaire
//         Array.from(form.elements).forEach(element => {
//             if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
//                 if(element.placeholder){
//                     const th = document.createElement('th');
//                     th.innerText = element.placeholder.charAt(0).toUpperCase() + element.placeholder.slice(1);
//                     tableHeader.appendChild(th);
//                 }

            
//             }
//         });

//         // Ajouter une colonne pour les actions (supprimer)
//         const th = document.createElement('th');
//         th.innerText = 'Actions';
//         tableHeader.appendChild(th);
//     }

//     // Blog add form

//     document.querySelector('#addButton').addEventListener('click', addToTable);
//     var forms=[];

//     function addToTable() {
//         const form = document.getElementById('myForm');
//         const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
//         const newRow = table.insertRow();

//         forms.push(form);

//         // Ajouter des cellules avec des données dans le tableau HTML


//         Array.from(form.elements).forEach(element => {

//             if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
//                 if(element.placeholder){
//                     const newCell = newRow.insertCell();
//                     if (element.type === 'file') {
//                         const file = element.files[0];
//                         if (file) {
//                             const reader = new FileReader();
//                             reader.onload = function(e) {
//                                 const img = document.createElement('img');
//                                 img.src = e.target.result;
//                                 img.width = 50; // Largeur de l'image
//                                 newCell.appendChild(img);
//                             };
//                             reader.readAsDataURL(file);
//                         }
//                     } else {
//                         newCell.innerText = element.value;
//                     }

//                 }
            
//             }
//         });

//         // Ajouter une cellule pour l'action de suppression
//         const actionCell = newRow.insertCell();

//         const deleteButton = document.createElement('button');
//         deleteButton.innerText = 'Supprimer';
//         deleteButton.setAttribute('class', 'btn btn-danger btn-sm ml-2');
//         deleteButton.onclick = function () {
//             deleteRow(this);
//             forms[this].removeChild;
//         };
//         actionCell.appendChild(deleteButton);
        
//         form.reset();
//     }

//     document.querySelector('#submitButton').addEventListener('click', submitButton);


//     function submitButton(){

//         let formDatas=[];
//         forms.forEach((formItem)=>{
//             formDatas.push(new FormData(formItem));
//         })

//         // Envoie Data   

//         const actionUrl = form.getAttribute('action');

//         fetch(actionUrl, {
//             method: 'POST',
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: formDatas
//         })
//         .then(response => response.json())
//         .then(data => {
//             console.log(data);
//             // Traitez la réponse du serveur ici
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
//     }
// })


// function deleteRow(button) {
//     // Supprime la ligne du tableau
//     const row = button.parentNode.parentNode;
//     const rowIndex = row.rowIndex - 1; // Enlève 1 pour ajuster l'en-tête
//     row.parentNode.removeChild(row);

//     // Supprime les données correspondantes dans le champ caché
//     const tableDataInput = document.getElementById('tableData');
//     const existingData = JSON.parse(tableDataInput.value);
//     existingData.splice(rowIndex, 1);
//     tableDataInput.value = JSON.stringify(existingData);
// }

// document.querySelector('#resetButton').addEventListener('click', clearTable);

// function clearTable() {
//     const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
//     table.innerHTML = '';

//     const tableDataInput = document.getElementById('tableData');
//     tableDataInput.value = '';
// }







// document.addEventListener('DOMContentLoaded', (event) => {
//     initializeTableHeaders();
// });

// // document.getElementById('myForm').addEventListener('submit', function(event) {
// //     event.preventDefault(); // Empêche la soumission du formulaire
// // });


// function initializeTableHeaders() {
//     const form = document.getElementById('myForm');

//     const tableHeader = document.getElementById('tableHeader');


//     // Ajouter des en-têtes de tableau en fonction des champs de formulaire
//     Array.from(form.elements).forEach(element => {
//         if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
//             if(element.placeholder){
//                 const th = document.createElement('th');
//                 th.innerText = element.placeholder.charAt(0).toUpperCase() + element.placeholder.slice(1);
//                 tableHeader.appendChild(th);
//             }

        
//         }
//     });

//     // Ajouter une colonne pour les actions (supprimer)
//     const th = document.createElement('th');
//     th.innerText = 'Actions';
//     tableHeader.appendChild(th);
// }

// document.querySelector('#addButton').addEventListener('click', addToTable);

// function addToTable() {
//     const form = document.getElementById('myForm');
//     const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
//     const newRow = table.insertRow();



//     // Ajouter des cellules avec des données dans le tableau HTML
//     Array.from(form.elements).forEach(element => {

//         if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
//             if(element.placeholder){
//                 const newCell = newRow.insertCell();
//                 if (element.type === 'file') {
//                     const file = element.files[0];
//                     if (file) {
//                         const reader = new FileReader();
//                         reader.onload = function(e) {
//                             const img = document.createElement('img');
//                             img.src = e.target.result;
//                             img.width = 50; // Largeur de l'image
//                             newCell.appendChild(img);
//                         };
//                         reader.readAsDataURL(file);
//                     }
//                 } else {
//                     newCell.innerText = element.value;
//                 }

//             }
        
//         }
//     });

//     // Ajouter une cellule pour l'action de suppression
//     const actionCell = newRow.insertCell();

//     const deleteButton = document.createElement('button');
//     deleteButton.innerText = 'Supprimer';
//     deleteButton.setAttribute('class', 'btn btn-danger btn-sm ml-2');
//     deleteButton.onclick = function () {
//         deleteRow(this);
//     };
//     actionCell.appendChild(deleteButton);



//     // Ajout des données dans le champ caché pour l'envoi à Laravel
//     const tableDataInput = document.getElementById('tableData');
//     const existingData = tableDataInput.value ? JSON.parse(tableDataInput.value) : [];
//     // const existingData = tableDataInput.value ? tableDataInput.value : [];

//     const formData = {};


   

//     Array.from(form.elements).forEach(element => {
        
//         if (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') {
//             if (element.type === 'file') {
//                 formData[element.name] = element.files[0] ? element.files[0] : '';
//             } else {
//                 formData[element.name] = element.value;
//             }
//         }
//     });
//     existingData.push(formData);
//     tableDataInput.value = JSON.stringify(existingData);



//     // Réinitialise les champs du formulaire
//     form.reset();
// }

// function deleteRow(button) {
//     // Supprime la ligne du tableau
//     const row = button.parentNode.parentNode;
//     const rowIndex = row.rowIndex - 1; // Enlève 1 pour ajuster l'en-tête
//     row.parentNode.removeChild(row);

//     // Supprime les données correspondantes dans le champ caché
//     const tableDataInput = document.getElementById('tableData');
//     const existingData = JSON.parse(tableDataInput.value);
//     existingData.splice(rowIndex, 1);
//     tableDataInput.value = JSON.stringify(existingData);
// }

// document.querySelector('#resetButton').addEventListener('click', clearTable);

// function clearTable() {
//     const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
//     table.innerHTML = '';

//     const tableDataInput = document.getElementById('tableData');
//     tableDataInput.value = '';
// }
