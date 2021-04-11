<?php
foreach ($pacientes as $paciente) {
    ?>
    <tr>
        <td><?= $paciente->codigo ?></td>
        <td><?= $paciente->nombre ?></td>
        <td><?= $paciente->apellidos ?></td>
        <td><?= $paciente->atendido ?></td>
        <td><a href="action/pacientes.act.php?action=update&id=<?= $paciente->id ?>">Marcar atendido</a></td>
    </tr>
<?php } ?>
