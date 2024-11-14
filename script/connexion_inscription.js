let formulaire_un=document.querySelector(".formulaireUN");
console.log(formulaire_un);

let formulaire_deux=document.querySelector(".formulaireDEUX");
console.log(formulaire_deux);

let para=document.querySelector(".p_form_ins");
console.log(para);

para.addEventListener('click',() =>{
    formulaire_un.classList.toggle("afficher")
   
})
