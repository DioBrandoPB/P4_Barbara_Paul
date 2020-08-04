class Booking {
    constructor() {
        this.verificationVide();

    }
    verificationVide() {
        if (document.getElementById('pseudo').value != "" && document.getElementById('content').value != "") {
            alert("Reservation annulée");
        } else {
            boutonSoumettre.style.cssText = "background: grey; cursor: auto;";
            boutonSoumettre.disabled = "disabled";
        }
    }

}
let bookingObject = new Booking();