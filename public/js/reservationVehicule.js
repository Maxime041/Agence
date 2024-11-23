let reservation = document.getElementById("reservationForm");

reservation.addEventListener("submit", function(event) {
    let dateDebut = new Date(document.getElementById("date_debut").value);
    let dateFin = new Date(document.getElementById("date_fin").value);
    let today = new Date();

    if (dateDebut < today) 
    {
        event.preventDefault();
        alert("La date de début doit être supérieure à la date actuelle.");
        return;
    }

    if (dateFin <= dateDebut) 
        {
        event.preventDefault();
        alert("La date de fin doit être supérieure à la date de début.");
    }
});
