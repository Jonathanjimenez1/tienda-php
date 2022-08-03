var menu=document.querySelector("nav");
var carrito=document.querySelectorAll(".login");
var hamburgesa=document.querySelector("#hamburgesa");

function mostrarmenu() {
    menu.classList.toggle("visible");
    
     carrito.forEach(element => {
        element.classList.toggle("visible");
        
     });

    
}

hamburgesa.addEventListener("click", mostrarmenu);