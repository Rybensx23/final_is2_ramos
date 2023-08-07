<h1 class="text-center">Formulario de puestos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioPuesto">
        <input type="hidden" name="pue_cod" id="pue_cod">
        <div class="row mb-3">
            <div class="col">
                <label for="pue_descr">Nombre del puesto</label>
                <input type="text" name="pue_descr" id="pue_descr" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pue_suel">Sueldo del puesto</label>
                <input type="number" step="0.01" min="0" name="pue_suel" id="pue_suel" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioPuesto" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <h2>Listado de puestos</h2>
        <table class="table table-bordered table-hover" id="tablaPuestos">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>NOMBRE</th>
                    <th>SUELDO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/puestos/index.js')  ?>"></script>

