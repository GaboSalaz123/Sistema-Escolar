$(document).ready(function() {
    // Manejar el envío del formulario
    $('#registroForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'guardar_registros.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Registro guardado correctamente');
                // Redirigir a la página de observaciones después de guardar el registro
                window.location.href = 'observaciones.php';
                cargarRegistros();
            },
            error: function(xhr, status, error) {
                alert('Error al guardar el registro: ' + error);
            }
        });
    });

    // Cargar los registros al cargar la página
    cargarRegistros();
});

document.addEventListener("keyup", e=>{

    if (e.target.matches("#buscarEstudiante")){
  
        if (e.key ==="Escape")e.target.value = ""
  
        document.querySelectorAll(".registros").forEach(fruta =>{
  
            fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase())
              ?fruta.classList.remove("filtro")
              :fruta.classList.add("filtro")
        })
  
    }
  
  
  })

function cargarRegistros() {
    $.ajax({
        url: 'obtener_registros.php',
        type: 'GET',
        dataType: 'json',
        success: function(registros) {
            mostrarRegistros(registros);
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los registros:', error);
        }
    });
}

function mostrarRegistros(registros) {
    var listaRegistros = $('#listaRegistros');
    listaRegistros.empty();
    registros.forEach(function(registro) {
        var li = $('<li>');
        var fecha = $('<p>').text('Fecha: ' + registro.fecha);
        var observaciones = $('<p>').text('Observaciones: ' + registro.observaciones);
        var eliminarBtn = $('<button>').text('Eliminar').addClass('eliminar-btn').data('id', registro.id);
        li.append(fecha, observaciones, eliminarBtn);
        listaRegistros.append(li);
    });
}



$('#listaRegistros').on('click', '.eliminar-btn', function() {
    var registroId = $(this).data('id');
    var registro = $(this).closest('li');

    // Verificar que el identificador se esté obteniendo correctamente
    console.log('ID de observación:', registroId);

    // Confirmar si el usuario realmente quiere eliminar 
    if (confirm('¿Estás seguro de que deseas eliminar esta Observación?')) {
        // Realizar solicitud AJAX para eliminar 
        $.ajax({
            url: 'eliminar_registro.php',
            type: 'POST',
            data: { id: registroId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Eliminar el registro de la lista
                    registro.remove();
                    alert('Observación eliminada exitosamente');
                } else {
                    alert('Error al eliminar Observación: ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error al eliminar Observación:', error);
            }
        });
    }
});
