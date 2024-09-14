        // Get the scrollable div element
        var scrollableDiv = document.
            getElementById('scrollableDiv');

        // Function to scroll to the bottom
        //of the div using scrollIntoView method
        function scrollToBottom() {
            var bottomElement = scrollableDiv.
                lastElementChild;
            bottomElement
                .scrollIntoView({ behavior: 'smooth', block: 'end' });
        }

function scrollbottom(){
    document.documentElement.scrollTop = 520;
}

var originalDropdownContent = document.getElementById("myDropdown").innerHTML;

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    event.preventDefault();
}

function filterFunction() {
    var input, filter, div, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");

    // Always restore the original content when the input changes
    div.innerHTML = originalDropdownContent;

    // Counter for found items
    var foundCount = 0;

    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 && filter !== " ") {
            a[i].style.display = "";
            foundCount++;
        } else {
            a[i].style.display = "none";
        }
    }

    // Show/hide the dropdown based on whether there is text input
    div.style.display = filter.length > 0 ? "block" : "none";

    // Display "not found" message if no items are found
    if (foundCount === 0 && filter.length > 0) {
        div.innerHTML = '<p class="m-2" style="color: #050505;margin:0px; background-color: "white";">No matching results found.</p>';
    }
}

window.onkeyup = function (event) {
    if (!event.target.matches('.form-control')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            openDropdown.style.display = 'none';
        }
    }
}

document.getElementById("myInput").addEventListener("input", filterFunction);
