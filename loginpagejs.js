
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        style.display = "none";
    }
}

function myFunction() {
var x = document.getElementById("pswd");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}

