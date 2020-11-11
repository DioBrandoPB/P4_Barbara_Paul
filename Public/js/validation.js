function verificationVide() {
    if (document.getElementById("contenu").value != "" && document.getElementById("pseudo").value != "" && document.getElementById("mail").value != "") {
        document.getElementById("commBtn").setAttribute("style", "display : initial!important ");
    } else {
        document.getElementById("commBtn").setAttribute("style", "display : none  ");
    }

}

function verificationVide2() {
    if (document.getElementById("content").value != "" && document.getElementById("pseudo").value != "" && document.getElementById("mail").value != "" && document.getElementById("sujet").value != "") {
        document.getElementById("commBtn").setAttribute("style", "display : initial!important ");
    } else {
        document.getElementById("commBtn").setAttribute("style", "display : none  ");
    }

}

function verificationVide3() {
    if (document.getElementById("pseudo").value != "" && document.getElementById("mail").value != "" && document.getElementById("password").value != "") {
        document.getElementById("btnInscription").setAttribute("style", "display : initial!important ");
    } else {
        document.getElementById("btnInscription").setAttribute("style", "display : none  ");
    }

}

function verificationVide4() {
    if (document.getElementById("titre").value != "") {
        document.getElementById("chapitrebtn").setAttribute("style", "display : initial!important ");
        window.addEventListener('keydown', function(e) { if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) { if (e.target.nodeName == 'INPUT' && e.target.type == 'text') { e.preventDefault(); return false; } } }, true);

    } else {
        document.getElementById("chapitrebtn").setAttribute("style", "display : none  ");
    }

}