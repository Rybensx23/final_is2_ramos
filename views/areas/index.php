<h1 class="text-center">Formulario de areas</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioarea">
        <input type="hidden" name="area_cod" id="area_cod">
        <div class="row mb-3">
            <div class="col">
                <label for="area_nom">Nombre del area</label>
                <input type="text" name="area_nom" id="area_nom" class="form-control">
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioarea" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center" id="divTabla">
    <div class="col-lg-8">
        <h2>Listado de areas</h2>
        <table class="table table-bordered table-hover" id="tablaAreas">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>Descripcion</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/areas/index.js')  ?>"></script>