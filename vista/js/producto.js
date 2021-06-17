$(document).ready(function() {
    cargarTabla();

    function limpiarCampos() {
        $("#txtNombre").val("");
        $("#descripcion").val("");
        $("#cantidad").val("");
        $("#precio").val("");
        $("#imagen").val("");

        $("#codigo").val("");
        $("#iva").val("");



    }

    function cargarTabla() {
        var mensaje = "ok";
        var objData = new FormData();
        objData.append("cargar", mensaje);
        $.ajax({
            url: "control/productoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var concatenar = "";

                respuesta.forEach(control);

                function control(item, index) {

                    concatenar += '<tr>';
                    concatenar += '<td>' + item.nombreProducto + '</td>';
                    concatenar += '<td>' + item.descripcion + '</td>';
                    concatenar += '<td>' + item.cantidadStock + '</td>';
                    concatenar += '<td>' + "$" + item.precio + '</td>';
                    concatenar += '<td><img id="imagenTabla" src="' + item.imagen + '"></img></td>';
                    concatenar += '<td>' + item.codigo + '</td>';
                    concatenar += '<td>' + item.iva + "%" + '</td>';
                    concatenar += '<td>';
                    concatenar += '<div class="uk-margin-small">';
                    //concatenar += '<div class="uk-button-group">';
                    concatenar += '<a id="btnmod" class="uk-button uk-button-primary" href="#modalModificar" uk-toggle idProducto="' + item.idProducto + '" nombre="' + item.nombreProducto + '" descripcion="' + item.descripcion + '" cantidad="' + item.cantidadStock + '" precio="' + item.precio + '"  imagen="' + item.imagen + '"  codigo="' + item.codigo + '" iva="' + item.iva + '"   >' + '<span uk-icon="icon:pencil"></span>' + '</a> <br>';
                    concatenar += '<button id="btnDel" class="uk-button uk-button-danger" idProducto="' + item.idProducto + '"  imagen="' + item.imagen + '" >' + '<span uk-icon="icon:info"></span>' + '</button>';
                    concatenar += '</div>';
                    concatenar += '</div>';



                    concatenar += '</td>';




                    concatenar += '</tr>';







                }
                // alert(concatenar);
                $("#cuerpoTabla").html(concatenar);






            }
        })



    }
    var idModificar = "";
    var imagen = "";
    $("#tablaProductos").on("click", "#btnmod", function() {
        $("#modalModificar").addClass('uk-open').show();
        idModificar = $(this).attr("idProducto");
        var nombre = $(this).attr("nombre");
        var descripcion = $(this).attr("descripcion");
        var cantidad = $(this).attr("cantidad");
        var precio = $(this).attr("precio");
        imagen = $(this).attr("imagen");
        var codigo = $(this).attr("codigo");
        var iva = $(this).attr("iva");

        $("#txtNombreMod").val(nombre);
        $("#descripcionMod").val(descripcion);
        $("#cantidadMod").val(cantidad);
        $("#precioMod").val(precio);
        $("#imagenPr").attr("src", imagen);
        $("#codigoMod").val(codigo);
        $("#ivaMod").val(iva);




    })



    $("#tablaProductos").on("click", "#btnDel", function() {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var idEliminar = $(this).attr("idproducto");
                    var imagenEliminar = $(this).attr("imagen");
                    alert(idEliminar);
                    var objData = new FormData();
                    objData.append("idEliminar", idEliminar);
                    objData.append("imagenEliminar", imagenEliminar);



                    $.ajax({
                        url: "control/productoControl.php",
                        type: "post",
                        dataType: "json",
                        data: objData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            if (respuesta == "ok") {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                cargarTabla();

                            }



                        }
                    })






                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    })




    $("#btnAbrirModal").click(function() {
        limpiarCampos();
        $("#modal-overflow").addClass('uk-open').show();



    })

    $("#btnRegistrar").click(function() {

        var nombreProducto = $("#txtNombre").val();
        var descripcion = $("#descripcion").val();
        var cantidad = $("#cantidad").val();
        var precio = $("#precio").val();
        var imagen = document.getElementById("imagen").files[0];
        var codigo = $("#codigo").val();
        var iva = $("#iva").val();



        // alert(nombreProducto + " " + descripcion + " " + cantidad + " " + precio + " " + imagen + " " + codigo);

        var objData = new FormData();

        objData.append("nombre", nombreProducto);
        objData.append("descripcion", descripcion);
        objData.append("cantidad", cantidad);
        objData.append("precio", precio);
        objData.append("imagen", imagen);
        objData.append("codigo", codigo);
        objData.append("iva", iva);


        $.ajax({
            url: "control/productoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta == "ok") {
                    cargarTabla();
                    // alert(respuesta);
                    $("#modal-overflow").removeClass('uk-open').hide();
                    limpiarCampos();
                    swal("Buen Trabajo!", "Se realizo registro exitosamente!", "success");
                }



            }
        })









    })

    $("#btnModificar").click(function() {

        var nombre = $("#txtNombreMod").val();
        var descripcion = $("#descripcionMod").val();
        var cantidad = $("#cantidadMod").val();
        var precio = $("#precioMod").val();
        var anterior = imagen;
        var imagenMod = document.getElementById("imagenMod").files[0];
        var codigo = $("#codigoMod").val();
        var iva = $("#ivaMod").val();
        var objData = new FormData();

        objData.append("nombreMod", nombre);
        objData.append("descripcionMod", descripcion);
        objData.append("cantidadMod", cantidad);
        objData.append("precioMod", precio);
        objData.append("codigoMod", codigo);
        objData.append("idModificar", idModificar);
        objData.append("ivaMod", iva);
        objData.append("imagenAnteriorMod", anterior);

        if (imagenMod == null || imagenMod == "") {

            objData.append("anteriorImagen", anterior);



        } else {

            objData.append("imagenMod", imagenMod);

        }

        $.ajax({
            url: "control/productoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta == "ok") {
                    cargarTabla();
                    $("#modalModificar").removeClass('uk-open').hide();

                    swal("Registro Modificado!", "Se ha modificado el registro!", "success");
                }




            }
        })
















    })











})