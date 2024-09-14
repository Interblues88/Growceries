function openOrder(evt, orderStatus) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(orderStatus).style.display = "inline-flex";
    evt.currentTarget.className += " active";
}

// By default, open the "In Progress" tab
// document.addEventListener('DOMContentLoaded', function() {
//     document.querySelector('.tablinks').click();
// });

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "inline-flex") {
      panel.style.display = "none";
    } else {
      panel.style.display = "inline-flex";
    }
  });
}
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.tablinks').click();
});
