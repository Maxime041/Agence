function validate(input) 
{
    
    if(input.checkValidity()) 
    {
        return true;
    }

    
    let div = document.createElement("div");
    let message = document.createTextNode(input.validationMessage); 

    div.style.color = "red";  
    div.appendChild(message); 
    input.after(div);  

    return false;
}


document.getElementById("vehiculeForm").addEventListener("submit", function(event) 
{
    let isValid = true;

    
    let inputs = document.querySelectorAll("#vehiculeForm input, #vehiculeForm select");

    
    inputs.forEach(function(input) 
    {
        if (!validate(input)) 
        {
            isValid = false;
        }
    });

    
    let typeVehicule = document.getElementById("type_vehicule").value.trim().toLowerCase();
    
    if (!["voiture", "camion", "2 roues"].includes(typeVehicule)) 
    {
        isValid = false;
        let typeError = document.querySelector("#type_vehicule + div");
        if (typeError) 
        {
            typeError.remove(); 
        }
        let div = document.createElement("div");
        let message = document.createTextNode("Veuillez entrer un type de véhicule valide (voiture, camion, 2 roues).");
        div.style.color = "red";
        div.appendChild(message);
        document.getElementById("type_vehicule").after(div); 
    }


    if (!isValid) 
    {
        event.preventDefault();
    }
});


document.getElementById("prix_journalier").addEventListener("input", function() 
{
    let prixError = document.querySelector("#prix_journalier + div");
    if (prixError) 
    {
        prixError.remove(); 
    }

    let prixJournalier = this.value;
    if (prixJournalier < 100 || prixJournalier > 350) 
    {
        validate(this);
    }
});

