
$(function () {
  listarAlquileres();
 // cargarCarros();

  $("#txtFechaDevolucion").datepicker({
  firstDay: 1,
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
  'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
  dateFormat: 'yy/mm/dd',
  minDate: 3, maxDate: "+1M +10D"
  });
  
  /*$("#btnDevolucion").click(function () {
        var parametros = {
                "opcion": 2,
                "idCarro": $("#idCarroModal").val(),
                "idAlquiler": $("#idAlquilerModal").val()
            }
        $.ajax({
            url: '../../Controlador/ctrlAlquiler.php',
            data: parametros,
            type: 'post',
            dataType: 'json',
        })
    
        .done(function(json){
            console.log(json.mensaje);
        })

        .fail(function(json){
            console.log(json.mensaje);
        })
    
    });*/

  $("#btnDevolucion").click(function () {
        var parametros = {
                "opcion": 4,
                "idAlquiler": $("#idAlquilerModal").val()
            }
        $.ajax({
            url: '../../Controlador/ctrlAlquiler.php',
            data: parametros,
            type: 'post',
            dataType: 'json',
        })
    
        .done(function(json){
            console.log(json.mensaje);
            if(json.datos!==null){
              location.href='generarFactura.php?json='+json.datos;
            }
        })

        .fail(function(json){
            console.log(json.mensaje);
        })
    
    });

});

function cargarCarro(idCarro){
  document.getElementById('txtIdCarro').value = idCarro;
}

function cargarCarros() {
    $.ajax({
        url: '../../Controlador/ctrlCarro.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '3'},
    })
            .done(function (json) {
                console.log("succes");
                var divi='<br>';
                $.each(json.datos, function (contador, fila) {
                    divi +=    '<div id="contenedor" class="columna '+fila.carMarca+'">';
                    divi +=       '<div class="contenido">';
                    divi +=           '<div class="imagen">';
                    divi +=             '<img src="../FotosCarro/'+ fila.carPlaca+'.png" style="width:100%">';
                    divi +=           '</div>';

                    divi +=           '<div class="texto">';
                    divi +=             '<h4>'+fila.carMarca+'</h4>';
                    divi +=             '<p>'+fila.carPlaca+' - '+fila.carColor+ '</p>';
                    divi +=           '</div>';
                    divi +=       '</div>';
                    divi +=       '<div class="medio">';
                    divi +=          '<button class="botonAlq bg-dark" onclick="cargarCarro(' + fila.idCarro +')" data-toggle="modal" data-target="#modalAlquiler">ALQUILAR</button>';
                    divi +=       '</div>';
                    divi +=   '</div>';
                });
                $(".fila").html(divi);
            })
            .fail(function (json) {
                console.log("Error: " + json.mensaje);
            })
}

function devolverAlquiler(idAlquiler,idCarro){
  document.getElementById('idAlquilerModal').value = idAlquiler;
  document.getElementById('idCarroModal').value = idCarro;
}

function listarAlquileres() {
    $.ajax({
        url: '../../Controlador/ctrlAlquiler.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '3'},
    })
            .done(function (json) {
                console.log("succes");
                $.each(json.datos, function (contador, fila) {
                    $('#placaAlq').html(fila.carPlaca);
                    $('#marcaAlq').html(fila.carMarca);
                    $('#identificacionCliente').html(fila.perIdentificacion);
                    $('#nombreCliente').html(fila.perNombres);
                    $('#apellidoCliente').html(fila.perApellidos);
                    $('#fechaAlquiler').html(fila.alqFechaAlquiler);
                    $('#devolucion').html('<img class="foto" id="devolucionAlq" src="../../Recursos/Imagenes/devolucion.png" onclick="devolverAlquiler(' + fila.idAlquiler +','+ fila.alqCarro+')" data-toggle="modal" data-target="#modalAlquiler" style="margin-right: 30%">');
                    $('tbody').append($('#fila').clone(true));
                });
               $('tbody tr').first().hide();
            })
            .fail(function (json) {
                console.log("Error al listar: " + json.mensaje);
            })
}

/*
  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }
  
  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }
  
  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }
  
  
  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
*/
