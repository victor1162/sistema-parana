function abrirModal(acao, id){
    let valorModal = document.querySelector('.value-modal').value
    valorModal = id


    if(acao == 'abrir' && id == valorModal ){

        document.querySelector('.id-' + id).style.display = 'flex'
    }
}

function fecharModal(acao, id){

    let valorModal = document.querySelector('.value-modal').value
    valorModal = id

    if(acao == 'fechar' && valorModal == id){
        
        document.querySelector('.id-' + id).style.display = 'none'

    }
}

function  removerVeiculo(acao, id){

        window.location.href = `recem-adicionados.php?acao=remover&id=${id}`;

}

function abrirEspeciais(acao, id){
    let modalOpcional = document.querySelector('.valueModalOp').value
    modalOpcional = id

    document.getElementById('container').style.overflowY = 'hidden';

    if(acao == 'abrir' && id == modalOpcional){
        document.querySelector('.idOp-' + id).style.display = 'flex';
        let lavagemEspeciais = document.querySelectorAll('.status-lavagem-especial')
            
            for (i = 0; i < lavagemEspeciais.length; i++) {
                if(lavagemEspeciais[i].innerText == 'Sim'){
                    lavagemEspeciais[i].style.color = 'orange';
                }
          }

    }
}

function fecharModalEspeciais(acao, id){
    let modalOpcional = document.querySelector('.valueModalOp').value
    modalOpcional = id

    if(acao == 'fechar' && id == modalOpcional){
        document.querySelector('.idOp-' + id).style.display = 'none';
    }
}
function abrirEspeciaisOp(){
    document.getElementById('area-recem-adicionados-especiais').style.display = 'inline-block';
    document.getElementById('area-recem-adicionados').style.display = 'none';
}
function abrirComumOp(){
    document.getElementById('area-recem-adicionados').style.display = 'block';
    document.getElementById('area-recem-adicionados-especiais').style.display = 'none';
}
