caricaRaccolte();

function caricaRaccolte() {
    const x= document.querySelector(".box");
    const parametro= x.children[1].textContent;
 //   x.children[0].children[0].children[1].textContent= parametro;
  //  const newForm2= new FormData();
  //  newForm2.append("collect", parametro);
 //   let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  //  const sendFormData= {method:'post', body: newForm2, headers:{ 'X-CSRF-TOKEN': token} };
    fetch("/loadcontenuto/"+ parametro).then(onResponse).then(onJson);
}

function onResponse(response) {
  //  console.log(response.json());
    return response.json();
}

function onJson(json) {
    for (evento of json) {
        const container= document.querySelector(".container");
        const box= document.createElement("div");
        box.classList.add("box");
        const image= document.createElement("img");
        const titolo= document.createElement("p");
        const id_cocktail= document.createElement("p");
        const instructions= document.createElement("p");
        const category= document.createElement("p");
        const pulsante= document.createElement("button");
        image.src= evento.foto;
        titolo.textContent= evento.nome;
        id_cocktail.textContent= evento.id_cocktail;
        instructions.textContent= evento.istruzioni;
        category.textContent= evento.tipo;
        pulsante.textContent= "Elimina";
        id_cocktail.classList.add("hidden");
        instructions.classList.add("hidden");
        category.classList.add("hidden");
        container.appendChild(box);
        box.appendChild(image);
        box.appendChild(titolo);
        box.appendChild(id_cocktail);
        box.appendChild(instructions);
        box.appendChild(category);
        box.appendChild(pulsante);
        image.addEventListener("click", addInfo);
        pulsante.addEventListener("click", eliminaContenuto);
    }
}


function addInfo(event) {
    event.currentTarget.parentNode.children[2].classList.remove("hidden");
    event.currentTarget.parentNode.children[3].classList.remove("hidden");
    event.currentTarget.parentNode.children[4].classList.remove("hidden");
    event.currentTarget.parentNode.children[0].addEventListener("click", removeInfo);
}

function removeInfo() {
    event.currentTarget.parentNode.children[2].classList.add("hidden");
    event.currentTarget.parentNode.children[3].classList.add("hidden");
    event.currentTarget.parentNode.children[4].classList.add("hidden");
    event.currentTarget.parentNode.children[0].removeEventListener("click", removeInfo);
    event.currentTarget.parentNode.children[0].addEventListener("click", addInfo);
}


function eliminaContenuto(event) {
    const nomeContenuto= event.currentTarget.parentNode.children[1].textContent;
    const x= document.querySelector(".box");
    const nameCollect= x.children[1].textContent;
    const anotherForm= new FormData();
    anotherForm.append("name", nomeContenuto);
    anotherForm.append("collect", nameCollect);
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formDaInviare= {method: 'post', body: anotherForm, headers:{ 'X-CSRF-TOKEN': token} };
    fetch("/deletecontenuto", formDaInviare).then(returnResponse).then(returnJson);
}

function returnResponse(response) {
   // console.log(response.json());
        return response.json();
}

function returnJson(json) {
    if (json != 1) {
        alert("Errore nell'eliminazione del contenuto");
      }
      else {
        alert("Contenuto eliminato correttamente");
        document.location.reload();
      }
}
