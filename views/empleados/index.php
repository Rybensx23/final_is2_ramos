
<h1 class="text-center">Formulario de empleados</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioEmpleado">
        <input type="hidden" name="emp_cod" id="emp_cod">
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nom">Nombre del empleado</label>
                <input type="text" name="emp_nom" id="emp_nom" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
            <label for="emp_dpi">DPI del empleado</label>
            <input type="text" name="emp_dpi" id="emp_dpi" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
    <div class="col">
                <label for="unidad">Puestos</label>
                <select class="form-control" name="emp_puesto_cod" id="emp_puesto_cod" >
                            <option value="">Seleccione un puesto..</option>
                            <?php foreach ($puestos as $puesto) : ?>
                                <option value="<?= $puesto['pue_cod'] ?>">
                                    <?= $puesto['pue_descr'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>            
    </div>
    <div class="row mb-3">
    <div class="col">
                <label for="unidad">Sexos</label>
                <select class="form-control" name="emp_sex_cod" id="emp_sex_cod" >
                            <option value="">Seleccione un sexo..</option>
                            <?php foreach ($sexos as $sexo) : ?>
                                <option value="<?= $sexo['sex_cod'] ?>">
                                    <?= $sexo['sex_descr'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
            </div>
            <div class="col">
            <label for="emp_edad">Edad del empleado</label>
            <input type="text" name="emp_edad" id="emp_edad" class="form-control">
        </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <label for="unidad">Areas</label>
                <select class="form-control" name="emp_area_cod" id="emp_area_cod" >
                            <option value="">Seleccione un area..</option>
                            <?php foreach ($areas as $area) : ?>
                                <option value="<?= $area['area_cod'] ?>">
                                    <?= $area['area_nom'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
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

<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nombre</th>
                    <th>DPI</th>
                    <th>Puesto</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Área</th>                   
                </tr>
            </thead>
            <tbody>              
            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/empleados/index.js')  ?>"></script>

