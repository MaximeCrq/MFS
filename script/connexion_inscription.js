const formulaire_un = document.querySelector(".formulaireUN");
//console.log(formulaire_un);

const formulaire_deux = document.querySelector(".formulaireDEUX");
//console.log(formulaire_deux);

const para = document.querySelector(".p_form_ins");
//console.log(para);


const para_co = document.querySelector(".p_form_co");
//console.log(para);
formulaire_deux.style.display="none"
para.addEventListener('click',() =>{
    formulaire_un.classList.toggle("formulaireDEUX")

   formulaire_deux.style.display="flex"
   formulaire_un.style.display="none"

})

para_co.addEventListener('click',() =>{
    formulaire_deux.classList.toggle("afficher")
    formulaire_un.style.display="flex"
   formulaire_deux.style.display="none"
})
