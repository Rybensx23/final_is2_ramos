<h1 class="text-center">Formulario de sexos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formulariosexo">
        <input type="hidden" name="sex_cod" id="sex_cod">
        <div class="row mb-3">
            <div class="col">
                <label for="sex_descr">Tipo de sexo</label>
                <input type="text" name="sex_descr" id="sex_descr" class="form-control">
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formulariosexo" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <h2>Listado de sexos</h2>
        <table class="table table-bordered table-hover" id="tablaSexos">
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
<script src="<?= asset('./build/js/sexos/index.js')  ?>"></script>