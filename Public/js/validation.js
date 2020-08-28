function verificationVide() {
    if (document.getElementById("content").value != "" && document.getElementById("pseudo").value != "") {
        document.getElementById("commBtn").setAttribute("style", "display : initial!important ");
    } else {
        document.getElementById("commBtn").setAttribute("style", "display : none  ");
    }
}