let deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        let dateDebut = new Date(this.getAttribute('date-debut'));
        let today = new Date(); 

        if (today > dateDebut) 
        {
            alert("Vous ne pouvez pas annuler une réservation dont la date de début est déjà passée.");
            event.preventDefault();
            return;
        }

        let confirmDelete = confirm("Êtes-vous sûr de vouloir annuler cette réservation ?");
        if (!confirmDelete) 
        {
            event.preventDefault();
        }
    });
});

let editButtons = document.querySelectorAll('.edit-btn');

editButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        let dateDebut = new Date(this.getAttribute('date-debut')); 
        let today = new Date(); 

        if (today > dateDebut) 
        {
            alert("Vous ne pouvez pas modifier une réservation dont la date de début est déjà passée.");
            event.preventDefault();
        }
    });
});

