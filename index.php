<html>

<head>
    <title>
        Registra Productos
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- UIKIT -->

    <link rel="stylesheet" href="vista/librerias/css/uikit.min.css" />
    <link rel="stylesheet" href="vista/css/main.css" />
    <script src="vista/librerias/js/uikit.min.js"></script>
    <script src="vista/librerias/js/uikit-icons.min.js"></script>




    <script src="vista/js/producto.js"></script>

</head>

<body>



    <div class="container">
        <div class="jumbotron">
            <h1>Registre Productos </h1>
            <p>Consulte ,modifique, cree y elimine productos de su inventario</p>
            <br><br>
            <a href="https://github.com/EdissonCamacho/registroProductos"><span  uk-icon="icon: github"></span></a>
        <span uk-icon="icon: whatsapp"></span>
        <span uk-icon="icon: discord"></span>
        <br><br>
        </div>
    </div>

    <div class="container">
    

        <a id="btnAbrirModal" class="uk-button uk-button-primary btn-crear" href="#modal-overflow" uk-toggle>Crear Producto</a>
    </div>
    <br> <br> <br> <br>

    <div id="modal-overflow" uk-modal>
        <div class="uk-modal-dialog">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Registro Producto</h2>
            </div>



            <div class="uk-modal-body" uk-overflow-auto>
                <form>
                    <div class="form-group">
                        <label for="txtNombre">Nombre Producto:</label>
                        <input type="text" class="form-control" id="txtNombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" id="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad Stock:</label>
                        <input type="text" class="form-control" id="cantidad">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="form-control" id="precio">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen: </label>
                        <input type="file" class="form-control" id="imagen">
                    </div>
                    <div class="form-group">
                        <label for="codigo">Codigo:</label>
                        <input type="text" class="form-control" id="codigo">
                    </div>

                    <div class="form-group">
                        <label for="iva">Iva:</label>
                        <input type="text" class="form-control" id="iva">
                    </div>





                </form>




            </div>



            <div class="uk-modal-footer uk-text-right">
                <button class="btn-crear uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button id="btnRegistrar" class="btn-crear uk-button uk-button-primary" type="button">Save</button>
            </div>

        </div>
    </div>










    <div id="modalModificar" uk-modal>
        <div class="uk-modal-dialog">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Modificar Producto</h2>
            </div>



            <div class="uk-modal-body" uk-overflow-auto>
                <form>
                    <div class="form-group">
                        <label for="txtNombre">Nombre Producto:</label>
                        <input type="text" class="form-control" id="txtNombreMod">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" id="descripcionMod"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad Stock:</label>
                        <input type="text" class="form-control" id="cantidadMod">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="form-control" id="precioMod">
                    </div>

                    <div class="form-group">
                        <label for="precio">Actual:</label>
                        <br>
                        <img id="imagenPr" src="">
                    </div>



                    <div class="form-group">
                        <label for="imagen">Imagen: </label>
                        <input type="file" class="form-control" id="imagenMod">
                    </div>
                    <div class="form-group">
                        <label for="codigo">Codigo:</label>
                        <input type="text" class="form-control" id="codigoMod">
                    </div>

                    <div class="form-group">
                        <label for="iva">Iva:</label>
                        <input type="text" class="form-control" id="ivaMod">
                    </div>





                </form>




            </div>



            <div class="uk-modal-footer uk-text-right">
                <button class="btn-crear uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button id="btnModificar" class="btn-crear uk-button uk-button-primary" type="button">Modificar</button>
            </div>

        </div>
    </div>































    <div class="container">
        <table id="tablaProductos" class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Imagen Producto</th>
                    <th>Codigo</th>
                    <th>Iva</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">

            </tbody>
        </table>
        
    </div>

    <img src="">






</body>

</html>