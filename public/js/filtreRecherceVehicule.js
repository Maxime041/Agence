let maRecherche = document.getElementById('maRecherche');

maRecherche.addEventListener('input', function () 
{
    let filtre = this.value.toLowerCase();
    let lignes = document.querySelectorAll('#tableau tr');

    lignes.forEach(ligne => {

        if (ligne.querySelector('th')) 
        {
            return;
        }

        let marque = ligne.cells[0].textContent.toLowerCase();
        let modele = ligne.cells[1].textContent.toLowerCase();
        let type = ligne.cells[4].textContent.toLowerCase();

        if (marque.includes(filtre) || modele.includes(filtre) || type.includes(filtre)) 
        {
            ligne.style.display = ''; // Affiche la ligne
        } 
        else 
        {
            ligne.style.display = 'none'; // Masque la ligne
        }
    });
});