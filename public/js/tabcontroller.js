
$(document).ready(function() {
    // Get the active tab link
    debugger
    let activeTab = $('#dashboard-tabs .active');

    // Get the URL for the active tab content
    let activeTabUrl = activeTab.attr('data-url');
    // Fetch content for initial Tab
    debugger
    $.get(activeTabUrl, function (data){
        $("#tabcontent").html(data);
    });

    // Listen to click events on a href
    $("#dashboard-tabs a").on('click', function(event) {
       event.preventDefault(); // Prevent loading through laravel routes
       let clickedTabUrl = $(this).attr('data-url');
       $.get(clickedTabUrl, function (data) {
           $("#tabcontent").html(data);

           // Event to inject Content before the main content
           // Needs to be set here because the button is loaded in the event above and therefore can only be triggered if it's already loaded
           $("#create_post_btn").on('click', function(event) {
               event.preventDefault()
               let clickedBtnUrl = $(this).attr('data-url');
               $.get(clickedBtnUrl, function(data) {
                   $("#precontent").html(data);
               })
           })

       })
    });

});

//     $(document).ready(function() {
//     // Get the active tab link
//     var activeTab = $('.nav-tabs .active');
//
//     // Get the URL for the active tab content
//     var activeTabUrl = activeTab.attr('data-url');
//
//     // Fetch the content for the active tab via AJAX
//     $.get(activeTabUrl, function(data) {
//     $('#' + activeTab.attr('href').slice(1)).html(data);
// });
//     debugger
//     // Listen for the click event on each tab link
//     $('.nav-tabs a').on('click', function(event) {
//     // Prevent the default link behavior
//     event.preventDefault();
//     debugger
//
//     // Get the URL for the selected tab content
//     var tabUrl = $(this).attr('data-url');
//
//     // Fetch the content for the selected tab via AJAX
//     $.get(tabUrl, function(data) {
//         debugger
//     // Update the tab content with the fetched data
//     $('#' + $(event.target).attr('href').slice(1)).html(data);
//
//     // Activate the selected tab
//     $('.nav-tabs a').removeClass('active');
//     $(event.target).addClass('active');
// });
// });
// });
