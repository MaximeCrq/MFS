const b_deconnexion = document.getElementById('deconnexion');

b_deconnexion.addEventListener('mousedown', () => {
    b_deconnexion.style.backgroundColor = 'rgb(204, 88, 49)';
})

b_deconnexion.addEventListener('mouseup', () => {
    b_deconnexion.style.backgroundColor = 'white';
    b_deconnexion.style.color = 'black';
})