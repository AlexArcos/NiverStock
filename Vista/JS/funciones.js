/*
 * Código JavaScript
 */

$(function () {
  //  listarCarros();
  //  listarClientes();

    //Método para verificar que la identificacion ya existe empleado
    $("#txtIdentificacion").change(function () {
        var parametros = {
            "opcion": 3,
            "identificacion": $("#txtIdentificacion").val()
        };
        $.ajax({
            url: '../../Controlador/ctrlEmpleado.php',
            data: parametros,
            type: 'post',
            success: function (response) {
                $("#msj").html(response);
            }
        });
    });

    //Método para verificar que la identificacion ya existe cliente
    $("#txtIdentificacionAlquiler").change(function () {
        var parametros = {
                "opcion": 2,
                "identificacion": $("#txtIdentificacionAlquiler").val()
            };
        $.ajax({
            url: '../../Controlador/ctrlCliente.php',
            data: parametros,
            type: 'post',
            dataType: 'json',
        })
    
        .done(function(json){
            console.log(json.mensaje);
            $('#txtIdCliente').val(json.datos.idCliente);

            var cliente ="";
            if($('#txtIdCliente') != null){
                cliente += "<div class='form-group col'>Nombre<div type='text' class='form-control'>"+json.datos.perNombres+"</div></div>";
                cliente += "<div class='form-group col'>Apellido<div type='text' class='form-control'>"+json.datos.perApellidos+"</div></div>";
                cliente += "<div class='form-group col'>Telefono<div type='text' class='form-control'>"+json.datos.cliTelefono+"</div></div>";               
            }else{
                cliente += "<p> No existe cliente, ¿desea agregarlo? </p>";
            }
            
            $("#datosCliente").html(cliente);
        })

        .fail(function(json){
            console.log(json.mensaje);
        })
    
    });

    //Método para verificar la placa de un carro
    $("#txtPlacaAlquiler").change(function () {
        var parametros = {
                "opcion": 2,
                "placa": $("#txtPlacaAlquiler").val()
            };
        $.ajax({
            url: '../../Controlador/ctrlCarro.php',
            data: parametros,
            type: 'post',
            dataType: 'json',
        })
    
        .done(function(json){
            console.log(json.mensaje);
            $('#txtIdCarro').val(json.datos.idCarro);
            $('#msj').html('msj: '+ json.mensaje);
        })

        .fail(function(json){
            console.log(json.mensaje);
            $('#msj').html('msj: ' + json.mensaje);
        })
    
    });
    
    $("#foto").change(function () {
        var ruta = $("#foto").val();
        var extension = (ruta.substring(ruta.lastIndexOf("."))).toLowerCase();
        var sizeByte = this.files[0].size;
        var sizeKilobyte = parseInt(sizeByte / 1024);
        if (extension !== ".png") {
            alert("La imagen sólo debe ser PNG.");
            $('#foto').val('');
            return false;
        }
        if (sizeKilobyte > 2048) {
            alert("La imagen supera el tamaño permitido de 2 megas");
            $('#foto').val('');
            return false;
        }
    });

    var modal = document.getElementById('myModal');
    $("img").click(function () {
        var id = $(this).attr("id");
        var img = document.getElementById(id.toString());
        var modalImg = document.getElementById("img01");

        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function () {
            modal.style.display = "none";
        }
    });
});

function listarCarros() {
    $.ajax({
        url: '../../Controlador/ctrlCarro.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '4'},
    })
            .done(function (json) {
                console.log("succes");
                $.each(json.datos, function (contador, fila) {
                    $('#placa').html(fila.carPlaca);
                    $('#marca').html(fila.carMarca);
                    $('#color').html(fila.carColor);
                    $('#estado').html(fila.carEstado);
                    $('#foto').attr("src", "../FotosCarro/" + fila.carPlaca + ".png");
                    $('tbody').append($('#fila').clone(true));
                });
                $('tbody tr').first().hide();
            })
            .fail(function (json) {
                console.log("Error al listar: " + json.mensaje);
            })
}
function listarClientes() {
    $.ajax({
        url: '../../Controlador/ctrlCliente.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '3'},
    })
            .done(function (json) {
                console.log("succes");
                $.each(json.datos, function (contador, fila) {
                    $('#identificacion').html(fila.perIdentificacion);
                    $('#nombre').html(fila.perNombres);
                    $('#apellido').html(fila.perApellidos);
                    $('#correo').html(fila.perCorreo);
                    $('#telefono').html(fila.cliTelefono);
                    $('tbody').append($('#fila').clone(true));
                });
                $('tbody tr').first().hide();
            })
            .fail(function (json) {
                console.log("Error al listar: " + json.mensaje);
            })
}
/*
function cargarCarrosDisponibles(){
    $.ajax({
        url: '../../Controlador/ctrlCarro.php',
        data: {opcion: '3'},
        type: 'POST',
        dataType: 'JSON',
    })

    .done(function(json){
        console.log(json.mensaje);
        $.each(json.datos, function(i,carro){
            $('#txtCarro').append($('<option>',{
                value: carro.idCarro,
                text: carro.carPlaca + " - "+ carro.carMarca + " - " + carro.carColor
            }));
        });
    })

    .fail(function(json){
        console.log("Error al obtener carros: " + json.mensaje);
    });
}*/
