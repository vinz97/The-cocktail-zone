function validazione(event) {
    const message= document.querySelector('#errore');
    const val= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!val.test(String(form.email.value).toLowerCase())) {
        message.innerHTML= '';
        message.textContent= 'E-mail non valida';
        event.preventDefault();
    }
    if (form.password.value != form.repassword.value) {
        message.innerHTML= '';
        message.textContent= 'Le password devono coincidere';
        event.preventDefault();
    }
    if (form.maggiorenne.checked == false) {
        message.innerHTML= '';
        message.textContent= 'Devi essere maggiorenne per registrarti!';
        event.preventDefault();
    }
    if (form.username.value.length === 0 || form.password.value.length === 0 || form.name.value.length === 0 || form.surname.value.length === 0
        || form.email.value.length === 0 || form.residenza.value.length === 0 || form.sitoweb.value.length === 0 ||
        form.repassword.value.length === 0) {
        message.innerHTML= '';
        message.textContent= 'Attenzione! Uno o più campi vuoti!';
        event.preventDefault();
    }
    if (check == false) {
        event.preventDefault();
    }
}

function verificaUsername() {
    const sendForm= form.username.value;
  //  const form_data= {method: 'post', body: new FormData(sendForm)};
    fetch("/checkutente/" + sendForm).then(onResponse).then(onJson);
    event.preventDefault();

 }

function onResponse(response) {
  //  console.log(response.json());
    return response.json();
}
function onJson(json) {
    const message= document.querySelector('#errore');
   if (json > 0) {
        message.innerHTML= '';
        message.textContent= 'Questo username non è disponibile';
        check= false;

    }
    else {
        message.innerHTML= '';
        check= true;
    }
}


check= true;



const form= document.forms["form_register"];
form.addEventListener('submit', validazione);
form.username.addEventListener('blur', verificaUsername);


