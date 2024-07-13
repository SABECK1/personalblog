
$(document).ready(function() {
    // Get the active tab link
    debugger
    let activeTab = $('.horizontal-tabs .active');

    // Get the URL for the active tab content
    let activeTabUrl = activeTab.attr('data-url');

    // Fetch the content for the active tab via AJAX
    $.get(activeTabUrl, function(data) {
        $('#' + activeTab.attr('href').slice(1)).html(data);
    });

    // Listen for the click event on each tab link
    $('.horizontal-tabs a').on('click', function(event) {
        // Prevent the default link behavior
        debugger
        event.preventDefault();

        // Get the URL for the selected tab content
        let tabUrl = $(this).attr('data-url');
        debugger
        // Fetch the content for the selected tab via AJAX
        $.get(tabUrl, function(data) {

            // Update the tab content with the fetched data
            debugger
            $('#' + $(event.target).attr('href').slice(1)).html(data);

            // Activate the selected tab
            $('.horizontal-tabs a').removeClass('active');
            $(event.target).addClass('active');
        });
    });
});
