function validateForm(event) 
{
    const civilite = document.getElementById('civilite').value;
    const prenom = document.getElementById('prenom').value;
    const nom = document.getElementById('nom').value;
    const login = document.getElementById('login').value;
    const email = document.getElementById('email').value;
    const tel = document.getElementById('tel').value;
    const mdp = document.getElementById('mdp').value;

    if (!civilite || !prenom || !nom || !login || !email || !tel || !mdp) 
    {
        alert("Tous les champs sont obligatoires.");
        event.preventDefault(); 
        return false;
    }
    
    if (login.indexOf(' ') !== -1) 
    {
        alert("Le login ne doit pas contenir d'espaces.");
        event.preventDefault();
        return false;
    }

    if (mdp.indexOf(' ') !== -1) 
    {
        alert("Le mot de passe ne doit pas contenir d'espaces.");
        event.preventDefault(); 
        return false;
    }

    if (login.length < 4) 
    {
        alert("Le login doit comporter au moins 4 caractères.");
        event.preventDefault();
        return false;
    }

    if (mdp.length < 4) 
    {
        alert("Le mot de passe doit comporter au moins 4 caractères.");
        event.preventDefault(); 
        return false;
    }

    return true;
}
