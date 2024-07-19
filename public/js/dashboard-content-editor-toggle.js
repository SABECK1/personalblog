$(document).ready(function () {
    let activeTab = $('#dashboard-tabs .active');

// Get the URL for the active tab content
    let activeTabUrl = activeTab.attr('data-url');

    debugger
// Event to inject Content before the main content
// Needs to be set here because the button is loaded in the event above and therefore can only be triggered if it's already loaded
    if (activeTabUrl.includes("dashboard/content")) {
        debugger
        let btn = $("#create_post_btn");
        $("#create_post_btn").on('click', function (event) {
            event.preventDefault();

            // Your existing logic here
            let clickedBtnUrl = $(this).attr('data-url');
            $.get(clickedBtnUrl, function (data) {
                $("#precontent").html(data);
            });
        });
    }
})
