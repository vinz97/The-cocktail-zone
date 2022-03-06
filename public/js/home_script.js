
 aggiornaEventi();
 aggiornaCopertina();


 function aggiornaEventi() {
     fetch("/loadcollection").then(responseAggiorna).then(jsonAggiorna);
 }

 function responseAggiorna(response) {
     return response.json();
 }

 function jsonAggiorna(json) {

     for (evento of json) {

         const container= document.querySelector(".container");
         const box= document.createElement("div");
         box.classList.add("box");
         const link= document.createElement("a");
         const image= document.createElement("img");
         const titolo= document.createElement("p");
         link.href= "/collection/" + evento.nome;
         image.src= "https://previews.123rf.com/images/burakowski/burakowski1202/burakowski120200227/12222018-example-rubber-stamp.jpg";
         titolo.textContent= evento.nome;
         container.appendChild(box);
         box.appendChild(link);
         link.appendChild(image);
         box.appendChild(titolo);

    }

 }

 function aggiornaCopertina() {
         fetch("/loadcover").then(onResponseCopertina).then(onJsonCopertina);
         fetch("/correggicover");
 }
 function onResponseCopertina(response) {
     return response.json();
 }
 function onJsonCopertina(jsonC) {
     const ex= document.querySelectorAll(".box");
     for (events of jsonC) {
         if (events.copertina != null) {
         for (scatola of ex) {
         if (scatola.children[1].textContent == events.nome) {
             scatola.children[0].children[0].src= events.copertina;
             }
         }
     }
  }
 }

 function creaInvio(event) {
    const form_raccolta= document.querySelector("#raccolta form");
    form_raccolta.classList.remove("hidden");

}


function creaRaccolta(event) {
    const sendForm= document.querySelector("form");
    const form_data= {method: 'post', body: new FormData(sendForm)};
  //  form_data= sendForm.nome_raccolta.value;
    fetch("/loadraccolta", form_data).then(onResponse).then(onJson).catch(function(){
            alert("Impossibile creare la raccolta: esiste già!");
    });
    event.preventDefault();

}
function onResponse(response) {

    return response.json();
}
function onJson(json) {

    const container= document.querySelector(".container");
    const box= document.createElement("div");
    box.classList.add("box");
    const link= document.createElement("a");
    const image= document.createElement("img");
    const titolo= document.createElement("p");
    link.href= "";
    image.src= "https://previews.123rf.com/images/burakowski/burakowski1202/burakowski120200227/12222018-example-rubber-stamp.jpg";
  //  titolo.textContent= json["title"];
    titolo.textContent= json;
    container.appendChild(box);
    box.appendChild(link);
    link.appendChild(image);
    box.appendChild(titolo);
}











const raccolta= document.querySelector("#raccolta");
raccolta.addEventListener("click", creaInvio);
const form= document.forms["form_home"];
form.addEventListener("submit", creaRaccolta);





