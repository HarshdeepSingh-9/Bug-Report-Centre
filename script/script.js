var fullPath = window.location.pathname;
var fileName = fullPath.split('/').pop();

if (fileName === "track.html") {
    var obj_curr = document.getElementById('track');
    obj_curr.style.color = "black";
} else if (fileName === "report.html") {
    var obj_curr = document.getElementById('report');
    obj_curr.style.color = "black";
} else if (fileName === "dev.php") {
    var obj_curr = document.getElementById('dev');
    obj_curr.style.color = "black";
} else if (fileName === "community.php") {
    var obj_curr = document.getElementById('community');
    obj_curr.style.color = "black";
}

function changePage() {
    // Change the page to a different URL
    window.location.href = "register.html";
}

