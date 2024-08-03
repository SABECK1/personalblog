import {ClassicEditor} from "ckeditor5";
import {config, simpleconfig} from "../assets/vendor/ckeditor5.js";

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

function setPostEditor(clickedBtnUrl, config) {
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
        ClassicEditor.create(document.querySelector('#editor'), config).then(editor => {
            CKEDITOR["one"] = editor;
            editor.setData(document.getElementById('editor').value);

            // Hide loading icon after the editor is initialized
            $('#loading-icon').hide();
        });
    });
}


// Mainly used for the Profile, where it should be possible to edit the user profile via ajax
// This is just because it should be possible to use the buttons not only as submits but also as edit toggles
// Alternative approach was to use another button/submit the form using submit(). This was not possible due to the edits not being reflected on submit in the html
// Therefore data needed to be sent via ajax since html was empty
function sendDataViaAjax(data) {
    // Example AJAX call using Fetch API
    console.log(data);
    $.ajax({
        method: "PATCH",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PATCH',
            'Content-Type': 'application/json'
        },
        url: '/profile',
        data: JSON.stringify(data), // Example data
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            return false;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX request failed:", textStatus, errorThrown);
            console.error("Server response:", jqXHR.responseText);
            // Handle the error appropriately, e.g., display an error message to the user
        },
    });

}

// Function to toggle readonly state
function toggleReadonly(targetId, sender) {
    let textarea = document.querySelector(`[name="${targetId}"]`);
    if (textarea.disabled) {
        textarea.removeAttribute('disabled');
        textarea.focus();
        sender.firstElementChild.className = 'fa-solid fa-floppy-disk';
    } else {
        textarea.setAttribute('disabled', 'true');
        let formData = new FormData(document.getElementById("editProfileForm"));
        sender.firstElementChild.className = 'fa-solid fa-pen-to-square';

        formData.append('_method', 'PATCH');
        // Select only text input fields within the form
        let textInputs = document.querySelectorAll('#editProfileForm input[type="text"]');
        textInputs.forEach(input => {
            let name = input.name;
            let value = input.value;
            !value ? formData.append(name, '') : formData.append(name, value);
        });
        // // Collect form data


        // Convert FormData to JSON if needed
        let jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        // Submit form programmatically
        // document.getElementById("editProfileForm").submit();

        // Handle AJAX request
        sendDataViaAjax(jsonData);
    }
}

// Add click event listeners to each button

function handleButtonClick(url) {
    if (url.includes("dashboard/content")) {
        let create_btn = $("#create_post_btn");
        create_btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            setPostEditor(clickedBtnUrl, config());
        });

        let edit_post_btns = document.querySelectorAll('.edit_post_btn');
        edit_post_btns.forEach(function (button) {
            button.addEventListener('click', function (event){
                event.preventDefault();
                let clickedBtnUrl = $(this).attr('data-url');
                setPostEditor(clickedBtnUrl, config());
            })
        })

        // let edit_cmt_btn = $('#edit_cmt_btn');
        let edit_cmt_btns = document.querySelectorAll('.edit_cmt_btn');
        edit_cmt_btns.forEach(function (button) {
            button.addEventListener('click', function (event){
                event.preventDefault();
                let clickedBtnUrl = $(this).attr('data-url');
                setPostEditor(clickedBtnUrl, simpleconfig());
            })
        })
    }
    else if (url.includes("dashboard/profile")) {
        let buttons = document.querySelectorAll('.edit-button');

        buttons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Get the target ID from the button's data attribute
                let targetId = button.getAttribute('data-toggle-target');
                // Toggle the readonly state for the associated textarea
                toggleReadonly(targetId, button);
            });
        });
    }
}
