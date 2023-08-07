<div class="row justify-content-center">
    <div class="col-lg-10">
        <?php foreach ($empleadosPorAreas as $area => $empleados) : ?>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th colspan="7" class="text-center"><?= $area ?></th>
                    </tr>
                </thead>
                <thead class="table-warning">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Puesto</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Sueldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $isGray = false;?>
                    <?php foreach ($empleados as $indice => $empleado) : ?>
                        <tr class="<?= $isGray ? 'table-secondary' : '' ?>">
                            <td><?= $indice + 1 ?></td>
                            <td><?= $empleado['emp_nom'] ?></td>
                            <td><?= $empleado['emp_dpi'] ?></td>
                            <td><?= $empleado['pue_descr'] ?></td>
                            <td><?= $empleado['emp_edad'] ?></td>
                            <td><?= $empleado['sex_descr'] ?></td>
                            <td><?= $empleado['pue_suel'] ?></td>
                        </tr>
                        <?php $isGray = !$isGray;?>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>
</div>
<script src="<?= asset('./build/js/shows/index.js')  ?>"></script>