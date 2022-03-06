function validazione(event) {
    if (form.username.value.length === 0 || form.password.value.length === 0) {
        alert("Attenzione! Uno o più campi vuoti!");
        event.preventDefault();
    }
}


const form= document.forms["form_login"];
form.addEventListener('submit', validazione);