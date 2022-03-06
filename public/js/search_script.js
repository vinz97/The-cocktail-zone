function inviaRichiesta(event) {
    //  const sendForm= document.querySelector("form");
    //  const form_data= {method: 'post', body: new FormData(sendForm)};
      // headers: {"Content-type": "application/x-www-form-urlencoded"
    fetch("/api/dosearch/" + form.testo.value).then(onResponse).then(onJson);
    //  console.log(res.drinks[0]);
      /*
      for (const drink of res.drinks) {

          console.log(drink.idDrink);
      }
      */
      event.preventDefault();
  }

  function onResponse(response) {
      return response.json();
    //  console.log(response.json());
  }


  function onJson(json) {

     const container= document.querySelector(".container");
      container.innerHTML= '';
      if (json.drinks == null) {
          alert("Nessun risultato trovato!");
          return;
      }
      for (drink of json.drinks) {
      const container= document.querySelector(".container");
      const box= document.createElement("div");
      const button= document.createElement("button");
      box.classList.add("box");
      const titolo= document.createElement("h1");
      const id= document.createElement("p");
      const istruct= document.createElement("p");
      const categ= document.createElement("p");
      const img= document.createElement("img");
      button.textContent= "+";
      titolo.textContent= drink.strDrink;
      id.textContent= drink.idDrink;
      istruct.textContent= drink.strInstructions;
      categ.textContent= drink.strCategory;
      img.src= drink.strDrinkThumb;
      container.appendChild(box);
      box.appendChild(titolo);
      box.appendChild(id);
      box.appendChild(istruct);
      box.appendChild(categ);
      box.appendChild(img);
      box.appendChild(button);
      button.addEventListener("click", creaInput);


  }


  }

  function creaInput(event) {

    //  butt.innerHTML= '';
      const div= document.createElement("div");
   //   const anotherForm= document.createElement("form");
      const newSelect= document.createElement("select");
   //   newSelect.onchange= "this.form.submit()";
      newSelect.name= "selezionaRaccolta";
      event.currentTarget.parentNode.appendChild(div);
      div.appendChild(newSelect);
   //   anotherForm.appendChild(newSelect);
      event.currentTarget.removeEventListener("click", creaInput);
      const opt= document.createElement("option");
      opt.value= null;
      opt.textContent= '--';
      newSelect.appendChild(opt);
      fetch("/loadcollection").then(onResp).then(onJsn);
      function onResp(response) {
            return response.json();
      }
      function onJsn(json) {
        for (evento of json) {
          const opt= document.createElement("option");
          opt.value= evento.nome;
          opt.textContent= evento.nome;
          newSelect.appendChild(opt);
        }
      }


    newSelect.addEventListener("change", salvaRaccolta);

  }
  // event.currentarget.parentnode.parentnode

  function salvaRaccolta(event) {
        const newForm1= new FormData();
        const collect= event.currentTarget.parentNode.children[0].value;
        const title= event.currentTarget.parentNode.parentNode.children[0].textContent;
        const iD= event.currentTarget.parentNode.parentNode.children[1].textContent;
        const istruz= event.currentTarget.parentNode.parentNode.children[2].textContent;
        const category= event.currentTarget.parentNode.parentNode.children[3].textContent;
        const immag= event.currentTarget.parentNode.parentNode.children[4].src;
        console.log(collect);
        console.log(title);
        console.log(iD);
        if (collect != null) {
        newForm1.append('collect' , collect);
        newForm1.append('title' , title);
        newForm1.append('iD', iD);
        newForm1.append('istruz', istruz);
        newForm1.append('category', category);
        newForm1.append('immag', immag);
      //  newForm1.append( "_token", Laravel.csrfToken );
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const inviaForm= {method: 'post', body: newForm1, headers:{ 'X-CSRF-TOKEN': token} };
     //   console.log(newForm1);
        fetch("/addcontenuto", inviaForm).then(onResponse2).then(onJson2);
     //   event.preventDefault();
     }
  }

  function onResponse2(response) {
   // console.log(response.json());
        return response.json();
  }

  function onJson2(json) {
        if (json == 1) {
          alert("Inserimento avvenuto correttamente");
        }
        else if(json == 2) {
          alert("Il contenuto è già presente all'interno della raccolta");
        }
        else  {
          alert("Errore nell'inserimento del contenuto");

        }
  }
  /*
  console.log(json.drinks[0]);
  for (const drink of json.drinks) {
   console.log(drink.idDrink);
  }
  */


  //fetch("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita").then(onText);
  /*
  function onText(text) {
      console.log(text.json());
  }
  */




  const form= document.forms["form_search"];
  form.addEventListener("submit", inviaRichiesta);
