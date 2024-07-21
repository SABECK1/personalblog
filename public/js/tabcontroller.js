
$(document).ready(function() {
    // Get the active tab link
    let activeTab = $('#dashboard-tabs .active');

    // Get the URL for the active tab content
    let activeTabUrl = activeTab.attr('data-url');

    // Fetch content for initial Tab
    $.get(activeTabUrl, function (data){
        $("#tabcontent").html(data);
        // This triggers when the tab wasnt clicked but it was routed to using URL
        // Button already init -> Now handle it
        handleButtonClick(activeTabUrl);
    });



    // Listen to click events on a href
    $("#dashboard-tabs a").on('click', function(event) {
       event.preventDefault(); // Prevent loading through laravel routes
       let clickedTabUrl = $(this).attr('data-url');

        debugger

       $.get(clickedTabUrl, function (data) {
           debugger
           $("#tabcontent").html(data);
           // This will work if the tab is clicked but not if it was routed to via URL
           // Init Button -> Handle Button

           handleButtonClick(clickedTabUrl);
       })
    });

});

function handleButtonClick(url) {
    debugger
    if (url.includes("dashboard/content")) {
        let create_btn = $("#create_post_btn");
        create_btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            $.get(clickedBtnUrl, function (data) {
                $("#precontent").html(data);
            });
        });

        let edit_btn = $("#edit_post_btn");
        edit_btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            $.get(clickedBtnUrl, function (data) {
                $("#precontent").html(data);
            });
        });
    }
}
