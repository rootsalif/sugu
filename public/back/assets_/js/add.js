
const addBtn= document.querySelector('#addButton');
const table=document.querySelector('#itemTable');
const createElementTr=document.createElement('tr');

let formCount =0;

addBtn.addEventListener('click', function(){

   const label= document.querySelector('#idInputName').value;
   const description= document.querySelector('#idInputDescrip').value;

   if (label) {
    formCount++;

    function createElementWithAttribute(tagName){
        const element=document.createElement(tagName);
        element.innerText= content;
        element.setAttribute('hidden', 'hidden');
        element.value=label>label;
        element.classList.add('');

        return element;
    }

    createElementTr.innerHTML = `
    <tr id="item${formCount}">
        <th scope="row">${formCount}</th>
        <td>
            <input type="hidden" name="labels[]" value="${label}">${label}
        </td>
        <td>
            <input type="hidden" name="descriptions[]" value="${description}">${description}
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeItem(${formCount})">
                Supprimer
            </button> 
        </td>
    </tr>`;

    table.append(createElementTr);

    // Clear the input fields
    document.querySelector('#idInputName').value='';
    document.querySelector('#idInputDescrip').value='';
} else {
    alert('Veuillez remplir les champs.');
}
})
    // Réinitialiser le formulaire
    const resetBtn=document.querySelector('#resetButton');
    resetBtn.addEventListener('click', function() {
        createElementTr.remove();        
        formCount = 0;
        console.log(resetBtn);
    });

// $(document).ready(function() {
//     let formCount = 0;
//     // Ajouter un nouvel élément de formulaire
//     $('#addButton').click(function() {
//         const label = $('#idInputName').val();
//         const description = $('#idInputDescrip').val();
        
//         if (label) {
//             formCount++;

//             const newItemHtml = `
//             <tr id="item${formCount}">
//                 <th scope="row">${formCount}</th>
//                 <td>
//                     <input type="hidden" name="labels[]" value="${label}">${label}
//                 </td>
//                 <td>
//                     <input type="hidden" name="descriptions[]" value="${description}">${description}
//                 </td>
//                 <td>
//                     <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeItem(${formCount})">
//                         Supprimer
//                     </button> 
//                 </td>
//             </tr>`;
        
//             $('#itemTable').append(newItemHtml);

//             // Clear the input fields
//             $('#idInputName').val('');
//             $('#idInputDescrip').val('');
//         } else {
//             alert('Veuillez remplir les champs.');
//         }
//     });

//     // Réinitialiser le formulaire
//     $('#resetButton').click(function() {
//         $('#itemTable').empty();
//         formCount = 0;
//     });
// });

// // Fonction pour supprimer un élément
// function removeItem(id) {
//     $(`#item${id}`).remove();
// }



















// $(document).ready(function() { 
//     let formCount = 0; // Ajouter un nouvel élémentde formulaire 
//     $('#addButton').click(function() { 
//         formCount++; 

//             console.log($('#idInputName'));
  
//             const newItemHtml = `
//         <tr id="item${formCount}">
//             <th scope="row">${formCount}</th>
//             <td>
//                 <input type="text" class="form-control" name="label[]" placeholder="Label" required> 
//             </td>
//             <td>
//                 <input type="text" class="form-control" name="description[]" placeholder="description[${formCount}]" required> 
//             </td>
//             <td>
//                 <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeItem(${formCount})">
//                     Supprimer
//                 </button> 
//             </td>
//         </tr>`;
    

//     $('#itemTable').append(newItemHtml); 
//     }); 
//     // Réinitialiser le formulaire
//     $('#resetButton').click(function() { $('#itemTable').empty();
//     $('#formElements').empty(); 
//     formCount = 0; 
//     }); 
//     }); // Fonction pour supprimer un élément 
//     function removeItem(id) { $(`#item${id}`).remove(); 
// }

