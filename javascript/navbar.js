//sidebar display nav script
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("menu").style.backgroundColor = "#1b4a2f";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("menu").style.backgroundColor = "";
}

function openmes() {
  var x = document.getElementById("myDIV");
  var inputField = document.getElementById("in");
  if (x.style.display === "none") {
      x.style.display = "block";
  } else {
      //x.style.display = "none";
  }
}
