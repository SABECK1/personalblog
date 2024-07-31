import {ClassicEditor} from "ckeditor5";
import {config, simpleconfig} from "../assets/vendor/ckeditor5.js";

let CKEDITOR = [];
let initializeForm = () => {
    if(!CKEDITOR["one"]){
        return;
    }
    CKEDITOR["one"].destroy();
}

initializeForm();
ClassicEditor.create(document.querySelector('#editor'), config()).then(editor => {
    CKEDITOR["one"] = editor;
    // editor.setData(document.getElementById('editor').value);
});
