
$(document).ready(function() {
    // Get the active tab link
    let activeTab = $('#dashboard-tabs .active');

    // Get the URL for the active tab content
    let activeTabUrl = activeTab.attr('data-url');

    // This triggers when the tab wasnt clicked but it was routed to using URL
    // Button already init -> Now handle it
    handleButtonClick(activeTabUrl);

    // Fetch content for initial Tab
    $.get(activeTabUrl, function (data){
        $("#tabcontent").html(data);
    });



    // Listen to click events on a href
    $("#dashboard-tabs a").on('click', function(event) {
       event.preventDefault(); // Prevent loading through laravel routes
       let clickedTabUrl = $(this).attr('data-url');

        debugger

       $.get(clickedTabUrl, function (data) {
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
        let btn = $("#create_post_btn");
        btn.on('click', function (event) {
            event.preventDefault();
            let clickedBtnUrl = $(this).attr('data-url');
            $.get(clickedBtnUrl, function (data) {
                $("#precontent").html(data);
            });
        });
    }
}
