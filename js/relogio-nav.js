// relogio
let d = new Date(); //ojeto da data
let Dia = d.getDate() //dia de hoje
let Mes = d.getMonth() + 1 //este hoje
let Ano = d.getFullYear() //este ano
let Hora = d.getHours() //horas
let Minu = d.getMinutes() //minutos

if(Minu < 10){
  document.getElementById('data-atual').innerHTML = `${Dia}/${Mes}/${Ano} - ${Hora}:0${Minu}`
}else{
  // data atual configurando abaixo do navbar
document.getElementById('data-atual').innerHTML = `${Dia}/${Mes}/${Ano} - ${Hora}:${Minu}`
}

