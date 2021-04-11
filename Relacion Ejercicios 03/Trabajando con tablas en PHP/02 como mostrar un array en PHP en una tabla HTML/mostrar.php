<?php


$a = [
    [
        'Nombre' => 'Mauro',
        'Apellido' => 'Chojrin',
        'Correo' => 'mauro.chojrin@leewayweb.com',
    ],
    [
        'Nombre' => 'Alberto',
        'Apellido' => 'Loffatti',
        'Correo' => 'aloffatti@hotmail.com',
    ],
    [
        'Nombre' => 'Foo',
        'Apellido' => 'Bar',
        'Correo' => 'foo_bar@example.com',
    ]
];

$s = '<table border="1">';
foreach ( $a as $r ) {
    $s .= '<tr>';
    foreach ( $r as $v ) {
        $s .= '<td>'.$v.'</td>';
    }
    $s .= '</tr>';
}
$s .= '</table>';
echo $s;

echo '<table border="1">';
foreach ( $a as $r ) {
    echo '<tr>';
    foreach ( $r as $v ) {
        echo '<td>'.$v.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
<table border="1">
<?php
foreach ( $a as $r ) {
        ?>
        <tr>
        <?php
        foreach ( $r as $v ) {
        ?>
                <td><?php echo $v;?></td>
        <?php
        }
        ?>
        </tr>
<?php
}
?>
</table>