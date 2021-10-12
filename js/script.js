
function abrirNavbar(){
    let navbarLateral = document.getElementById('navbar-lateral');

    navbarLateral.style.transform = 'translateX(-0px)'
    navbarLateral.style.transition = '400ms'
}
function fecharNavbar(){
    let navbarLateral = document.getElementById('navbar-lateral');

    navbarLateral.style.transform = 'translateX(-300px)'
    navbarLateral.style.transition = '400ms'
}
function fecharNavbarSemFoco(){
    let navbarLateral = document.getElementById('navbar-lateral');

    navbarLateral.style.transform = 'translateX(-300px)'
    navbarLateral.style.transition = '400ms'
}