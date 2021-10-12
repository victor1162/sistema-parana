let data = new Date(); //ojeto da data
let dia = data.getDate() //dia de hoje
let mes = data.getMonth() + 1 //este hoje
let ano = data.getFullYear() //este ano
let hora = data.getHours() //horas
let minutos = data.getMinutes() //minutos

if(mes == 1 || mes == 2 || mes == 3 || mes == 4 || mes == 5 || mes == 6 || mes == 7 || mes == 8 || mes == 9){
    mes = '0'+ mes
}
if(dia == 1 || dia == 2 || dia == 3 || dia == 4 || dia == 5 || dia == 6 || dia == 7 || dia == 8 || dia == 9){
    dia = '0'+ dia
}

// function mascaraData( campo, e )
// {
// 	var kC = (document.getElementById('pesquisar-data')) ? event.keyCode : e.keyCode;
// 	var data = campo.value;
	
// 	if( kC!=8 && kC!=46 )
// 	{
// 		if( data.length==2 )
// 		{
// 			campo.value = data += '/';
// 		}
// 		else if( data.length==5 )
// 		{
// 			campo.value = data += '/';
// 		}
// 		else
// 			campo.value = data;
// 	}
// }

// data atual configurando abaixo do navbar
document.getElementById('data-atual').innerHTML = `${dia}/${mes}/${ano} - ${hora}:${minutos}`

function abrirModalInfo(){
    document.getElementById('area-modal-info').style.display = 'flex'
}
function removerModalInfo(){
    document.getElementById('area-modal-info').style.display = 'none'
}


