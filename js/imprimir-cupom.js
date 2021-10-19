document.querySelector('.nao-imprimir').addEventListener('click', function(){
    window.location.href = 'pagina-inicial.php';
});
document.querySelector('.sim-imprimir').addEventListener('click', function(){
    document.querySelector('.area-imprimir').style.display = 'none';
    document.querySelector('.body-impressao').style.width = '58mm';
    document.querySelector('.body-impressao').style.margin = '0px auto';
    document.querySelector('.body-impressao').style.height = 'auto';
    document.querySelector('.body-impressao-dados').style.display = 'block';
    window.print();
})
function carregamento(){
    window.location.href = 'pagina-inicial.php';
}
