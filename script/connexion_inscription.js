const formulaire_un = document.querySelector(".formulaireUN");
//console.log(formulaire_un);

const formulaire_deux = document.querySelector(".formulaireDEUX");
//console.log(formulaire_deux);

const para = document.querySelector(".p_form_ins");
//console.log(para);

para.addEventListener('click',() =>{
    formulaire_un[0].classList.toggle("afficher")
   
})
