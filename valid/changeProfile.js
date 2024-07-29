
let form = document.getElementById('form');

document.addEventListener("DOMContentLoaded", function (){
    form.addEventListener('submit', corregirValores);
});

function corregirValores(evento){

evento.preventDefault();

let name = document.getElementById('name');

let corregirName = document.getElementById('corregirName');

let validar = true;

if(name.value.trim() === "" || !/^[a-zA-Z\s]{1,25}$/.test(name.value)){
    name = document.getElementById('name').style.border = "1px red solid";
    corregirName.style.color = 'red';
    corregirName.innerHTML = "El nombre tiene que tener entre 1 y 25 caracteres, sin caracteres especiales";
    validar = false;
}
else{
    name = document.getElementById('name').style.border = "1px green solid";
    corregirName.innerHTML = "";
    validar = true;
}

if(validar === true){
form.submit();
}


}