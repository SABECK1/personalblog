import {ClassicEditor} from "ckeditor5";
import {config, simpleconfig} from "../assets/vendor/ckeditor5.js";
let CKEDITOR = [];
const elements = document.querySelectorAll('[id^="editor"]');
debugger
function initEditor(element) {
    const id = element.id; // Get the element's ID
    // const inputId = 'input' + id.slice(5); // Construct the input field's ID based on the element's ID

    // Create the editor and set its data
    ClassicEditor.create(element, simpleconfig()).then(editor => {
        CKEDITOR[id] = editor; // Store the editor instance in CKEDITOR["one"]

        // Find the input field and set its value as the editor's data
        // const inputField = document.getElementById(inputId);
        // if (inputField) {
        //     editor.setData(inputField.value);
        // } else {
        //     console.warn(`Input field with ID "${inputId}" not found.`);
        // }
    }).catch(error => {
        console.error('There was a problem initializing the editor:', error);
    });
}
elements.forEach(initEditor);
export function hideElement(comment_id) {
    // ElementToHideID is the ID given to the whole commentarea through the comment->id
    let element = document.getElementById(comment_id);
    if (element.style.display === 'none') {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}
// If edit button is pushed the action should be set to edit, when using reply the action should be set to store
export function setForm(comment_id, action, submitText) {
    hideElement(comment_id);
    // Now we need to get the Form that is the parent of the commentarea
    let commentarea = document.getElementById(comment_id);
    let associatedForm = commentarea.parentElement;

    // Now we set the action to the desired outcome
    associatedForm.action = action;

    let submitButton = associatedForm.querySelector('button[type="submit"]');
    submitButton.textContent = submitText;

    // If reply, then the text needs to be empty
    let editor = CKEDITOR[`editor${comment_id}`]
    if (submitText === 'Reply') {
        editor.setData('');
    }
    else if (submitText === 'Edit') {
        let editorTextArea = document.getElementById(`editor${comment_id}`);
        editor.setData(editorTextArea.value);
    }


}
