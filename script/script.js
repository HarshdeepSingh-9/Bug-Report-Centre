var fullPath = window.location.pathname;
var fileName = fullPath.split('/').pop();

if (fileName === "track.html") {
    var obj_curr = document.getElementById('track');
    obj_curr.style.color = "black";
} else if (fileName === "report.html") {
    var obj_curr = document.getElementById('report');
    obj_curr.style.color = "black";
} else if (fileName === "find.html") {
    var obj_curr = document.getElementById('find');
    obj_curr.style.color = "black";
}else if (fileName === "community.html") {
    var obj_curr = document.getElementById('community');
    obj_curr.style.color = "black";
}

function changePage() {
    // Change the page to a different URL
    window.location.href = "register.html";
  }
