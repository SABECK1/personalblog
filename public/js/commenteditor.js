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
//
// let CKEDITOR = [];
// let initializeForm = () => {
//     if(!CKEDITOR["one"]){
//         return;
//     }
//     CKEDITOR["one"].destroy();
// }
//
// initializeForm();
// ClassicEditor.create(document.querySelector('.editor'), config()).then(editor => {
//     CKEDITOR["one"] = editor;
//     editor.setData(document.getElementById('editor').value);
// });
