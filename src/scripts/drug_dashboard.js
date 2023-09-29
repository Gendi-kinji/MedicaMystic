/*Drug dashboard script*/

/* Highlighting  the active link*/
var url = window.location.href; // full URL of current page

// Select all the anchor tags
var anchors = document.querySelectorAll('li a');

// Loop through all the anchor tags
for (var i = 0; i < anchors.length; i++) {
    // Check if the href attribute of the anchor tag matches the current URL
    if (url == anchors[i].href) {
        // Add 'active' class to the matching anchor tag
        anchors[i].className = 'active-page';
    }
}
