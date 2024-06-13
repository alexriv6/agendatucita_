var modalEvento;
  
modalEvento= new bootstrap.Modal( document.getElementById('modalEvento'),{ keyboard:false } );
var calendar;

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendario');
calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: 'dayGridMonth', 
  locale:"es", 
  headerToolbar:{
    left:'prev,next today', 
    center:'title', 
    right:'dayGridMonth,timeGridWeek,timeGridDay',
  }, 


  dateClick:function(informacion){
    
    limpiarFormulario(informacion.dateStr);
    // alert("Presionaste "+informacion.dateStr);
    modalEvento.show();

  }, 
  eventClick:function(informacion){
    console.log(informacion);
    modalEvento.show();
    recuperarDatosEvento(informacion.event);

  },
  events:"calendar/api2.php"
});

calendar.render();
});


function recuperarDatosEvento(evento){
limpiarErrores();
var fecha= evento.startStr.split("T");
var hora= fecha[1].split(":");

document.getElementById('id').value=evento.id;
document.getElementById('title').value=evento.title;
document.getElementById('name').value=evento.name;
document.getElementById('fecha').value=fecha[0];
document.getElementById('hora').value=hora[0]+":"+hora[1];
document.getElementById('motivo').value=evento.extendedProps.motivo;
document.getElementById('color').value=evento.backgroundColor;
document.getElementById('estatus').value=evento.estatus;

document.getElementById('btnBorrar').removeAttribute('disabled',"");
document.getElementById('btnGuardar').removeAttribute('disabled',"");

}

function borrarEvento(){

  Swal.fire({
    title: '¿Deseas eliminar el evento?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Sí',
    denyButtonText: `Mejor no`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Eliminado correctamente', '', 'success')
      enviarDatosApi("borrar")
    } else if (result.isDenied) {
      Swal.fire('Cancelado', '', 'info')
      enviarDatosApi(null);
    }
  });

}

function agregarEvento(){

if(document.getElementById('title').value==""){
  document.getElementById('title').classList.add('is-invalid');
  return true;
}
  

accion= (document.getElementById("id").value==0)?"agregar":"actualizar";
enviarDatosApi(accion);
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Agendado',
  showConfirmButton: false,
  timer: 1500
})

}
function enviarDatosApi(accion){
      fetch("calendar/api.php?accion="+accion,{
          method:"POST",
          body:recolectarDatos()
        })
        .then(data=>{
          console.log(data);
          location.href=('ver.php');
          modalEvento.hide();
        })
        .catch(error=>{
          console.log(error);
        });
}

function recolectarDatos(){
var evento=new FormData(); 
evento.append("title", document.getElementById('title').value);
evento.append("name", document.getElementById('name').value);
evento.append("fecha", document.getElementById('fecha').value);
evento.append("hora", document.getElementById('hora').value);
evento.append("motivo", document.getElementById('motivo').value);
evento.append("color", document.getElementById('color').value);
evento.append("estatus", document.getElementById('estatus').value);
evento.append("id", document.getElementById('id').value);
return evento;
}

function limpiarFormulario(fecha){
limpiarErrores();
document.getElementById('title').value="";
document.getElementById('name').value="";
document.getElementById('fecha').value=fecha;
document.getElementById('hora').value="12:00";
document.getElementById('motivo').value="";
document.getElementById('color').value="";
document.getElementById('id').value="";
document.getElementById('estatus').value="";
document.getElementById('btnBorrar').setAttribute('disabled',"disabled");
}

function limpiarErrores(){
document.getElementById('title').classList.remove('is-invalid');
}