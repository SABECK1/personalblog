import {ClassicEditor} from "ckeditor5";
import {config} from "../assets/vendor/ckeditor5.js";

let CKEDITOR = [];

$(document).ready(function() {

    let activeTab = $('#dashboard-tabs .active');
    let activeTabUrl = activeTab.attr('data-url');

    // Show loading icon before fetching content for the initial tab
    $('#loading-icon').show();

    $.get(activeTabUrl, function (data){
        $("#tabcontent").html(data);
        handleButtonClick(activeTabUrl);

        // Hide loading icon after content is fetched
        $('#loading-icon').hide();
    });

    $("#dashboard-tabs a").on('click', function(event) {
        event.preventDefault();
        let clickedTabUrl = $(this).attr('data-url');

        // Show loading icon before fetching content for the clicked tab
        $('#loading-icon').show();

        $.get(clickedTabUrl, function (data) {
            $("#tabcontent").html(data);
            handleButtonClick(clickedTabUrl);

            // Hide loading icon after content is fetched
            $('#loading-icon').hide();
        });
    });

});

function setEditor(clickedBtnUrl) {
    // Show loading icon before setting up the editor
    $('#loading-icon').show();

    $.get(clickedBtnUrl, function (data) {
        $("#postform").html(data);

        let initializeForm = () => {
            if(!CKEDITOR["one"]){
                return;
            }
            CKEDITOR["one"].destroy();
        }

        initializeForm();
        ClassicEditor.create(document.querySelector('#editor'), config()).then(editor => {
            CKEDITOR["one"] = editor;
            editor.setData(document.getElementById('#editor').value);

            // Hide loading icon after the editor is initialized
            $('#loading-icon').hide();
        });
    });
}

function handleButtonClick(url) {
    if (url.includes("dashboard/content")) {
        let create_btn = $("#create_post_btn");
        create_btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            setEditor(clickedBtnUrl);
        });

        let edit_btn = $("#edit_post_btn");
        edit_btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            setEditor(clickedBtnUrl);
        });
    }
}
