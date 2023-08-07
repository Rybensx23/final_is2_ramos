<div class="row justify-content-center">
    <div class="col-lg-10">
        <?php foreach ($empleadosPorAreas as $area => $empleados) : ?>
            <h2><?= $area ?></h2>
            <table class="table table-bordered table-hover">
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
                    <?php foreach ($empleados as $indice => $empleado) : ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= $empleado['emp_nom'] ?></td>
                            <td><?= $empleado['emp_dpi'] ?></td>
                            <td><?= $empleado['pue_descr'] ?></td>
                            <td><?= $empleado['emp_edad'] ?></td>
                            <td><?= $empleado['sex_descr'] ?></td>
                            <td>Q. <?= $empleado['pue_suel'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>
</div>
<script src="<?= asset('./build/js/shows/index.js')  ?>"></script>