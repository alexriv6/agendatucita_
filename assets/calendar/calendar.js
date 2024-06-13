
var f=new Date();
var numdias = cant_ds(f.getMonth()+1,f.getFullYear());
var count = 1
 
var capa = document.getElementById("cabecera");
var dias = ["Lunes", "Martes", "Míercoles", "Juéves", "Viernes", "Sábado", "Domingo"];
var k=numdias;
 
//creo la cabecera
for (i in dias){
   $(capa).append('<div class="cal-cell1">'+dias[i]+'</div>');
}
 
 
var capa2 = document.getElementById("cuerpo");
 
 
//aca creo "una semana" y por cada semana ingreso 7 días
while(k>0){
     $(capa2).append('<div id="Day'+k+'"class="cal-row-fluid cal-before-eventlist"></div>');
     var capa3 = document.getElementById('Day'+k);
     for (j=0; j<7;j++){
          $(capa3).append('<div class="cal-cell1 cal-cell" data-cal-row="-day1">'+count+'</div>');
     count++
  }
  k-=7
}
 
 
// Funcion para determinar numero de días del mes
function cant_ds(mes,ano){ 
    di=28 
    f = new Date(ano,mes-1,di); 
    while(f.getMonth()==mes-1){ 
    di++; 
    f = new Date(ano,mes-1,di); 
    } 
    return di-1; 
} 