function infoEdit() {
  document.getElementById("infoEdit").style.display = "block";
}
function infoEditClose() {
  document.getElementById("infoEdit").style.display = "none";
}
function newJ() {
  document.getElementById("addjob").style.display = "block";
  document.getElementById("addjob").style.height = "block";
}
function closeJ() {
  document.getElementById("addjob").style.display = "none";
}
function regForm2() {
  var resiDen = document.getElementById("resiDen");
  var coMM = document.getElementById("coMM");
  var comBtn = document.getElementById("resBT");
  if (coMM.style.display === "none") {
    resiDen.style.display = "none";
    coMM.style.display = "block";
    document.getElementById("resBT").innerHTML = "RESIDENTIAL";
    document.getElementById("comBT").innerHTML = "**COMMERCIAL";
  } else {
    resiDen.style.display = "block";
    coMM.style.display = "none";
    document.getElementById("resBT").innerHTML = "**RESIDENTIAL";
    document.getElementById("comBT").innerHTML = "COMMERCIAL";
  }
}
function regForm() {
  var resiDen = document.getElementById("resiDen");
  var coMM = document.getElementById("coMM");
  var comBtn = document.getElementById("comBT");
  if (resiDen.style.display === "none") {
    resiDen.style.display = "block";
    coMM.style.display = "none";
    document.getElementById("comBT").innerHTML = "COMMERCIAL";
    document.getElementById("resBT").innerHTML = "**RESIDENTIAL";
  } else {
    resiDen.style.display = "none";
    coMM.style.display = "block";
    document.getElementById("resBT").innerHTML = "RESIDENTIAL";
    document.getElementById("comBT").innerHTML = "**COMMERCIAL";
  }
}
function cliVM() {
  var x = document.getElementById("cliVM");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
