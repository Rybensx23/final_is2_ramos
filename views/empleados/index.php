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
            <label for="emp_puesto_cod">Código de puesto</label>
            <input type="text" name="emp_puesto_cod" id="emp_puesto_cod" class="form-control">
        </div>
        <div class="col">
            <label for="emp_edad">Edad del empleado</label>
            <input type="text" name="emp_edad" id="emp_edad" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="emp_sex_cod">Código de sexo</label>
            <input type="text" name="emp_sex_cod" id="emp_sex_cod" class="form-control">
        </div>
        <div class="col">
            <label for="emp_area_cod">Código de área</label>
            <input type="text" name="emp_area_cod" id="emp_area_cod" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="emp_situacion">Situación</label>
            <input type="text" name="emp_situacion" id="emp_situacion" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <button type="submit" class="btn btn-primary">Guardar</button>
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
                    <th>Situación</th>                    
                </tr>
            </thead>
            <tbody>              
            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/empleados/index.js')  ?>"></script>

