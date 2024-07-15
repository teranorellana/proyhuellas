const iconoMenu = document.querySelector('#icono-menu'),
menu = document.querySelector('#menuu');

iconoMenu.addEventListener('click', (e) =>{
    menu.classList.toggle('active');
    document.body.classList.toggle('opacity');

    const rutaActual = e.target.getAttribute('src');
    if(rutaActual == 'imagenes/icon-menu.png'){
        e.target.setAttribute('src', 'imagenes/icon-menu.png');
    }else{
        e.target.setAttribute('src','imagenes/icon-menu.png');
    }
}); 