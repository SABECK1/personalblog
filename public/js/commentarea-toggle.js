// function hideElement(elementToHideId) {
//     // ElementToHideID is the ID given to the whole commentarea through the comment->id
//     let element = document.getElementById(elementToHideId);
//     if (element.style.display === 'none') {
//         element.style.display = "block";
//     } else {
//         element.style.display = "none";
//     }
// }
// // If edit button is pushed the action should be set to edit, when using reply the action should be set to store
// function setForm(elementToHideId, action, submitText) {
//     hideElement(elementToHideId);
//     // Now we need to get the Form that is the parent of the commentarea
//     let commentarea = document.getElementById(elementToHideId);
//     let associatedForm = commentarea.parentElement;
//
//     // Now we set the action to the desired outcome
//     associatedForm.action = action;
//
//     let submitButton = associatedForm.querySelector('button[type="submit"]');
//     submitButton.textContent = submitText;
//
//     // If reply, then the text needs to be empty
//     if (submitText === 'Reply') {
//         let editor = document.getElementById(`editor${elementToHideId}`)
//         editor.value = '';
//     }
//
// }
