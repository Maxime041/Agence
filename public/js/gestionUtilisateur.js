let deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) 
    {

        let confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
        
  
        if (!confirmDelete) 
        {
            event.preventDefault();  
        }
    });
});
