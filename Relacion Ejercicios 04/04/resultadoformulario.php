<?php
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$correo = recoge("correo");
$correo2 = recoge("correo2");
$recibir = recoge("recibir");

$correoOk = false;
$correo2Ok = false;
$recibirOk = false;

if ($correo == "") {
    print "  <p class=\"aviso\">No ha escrito su dirección de correo.</p>\n";
    print "\n";
} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    print "  <p class=\"aviso\">No ha escrito una dirección de correo correcta.</p>\n";
    print "\n";
} else {
    $correoOk = true;
}

if ($correo2 != $correo) {
    print "  <p class=\"aviso\">Las direcciones de correo no coinciden.</p>\n";
    print "\n";
} else {
    $correo2Ok = true;
}

if ($recibir == "-1") {
    print "  <p class=\"aviso\">No ha indicado si desea recibir correo.</p>\n";
    print "\n";
} elseif ($recibir != "0" && $recibir != "1") {
    print "  <p class=\"aviso\">Por favor, indique si quiere recibir o no correo.</p>\n";
    print "\n";
} else {
    $recibirOk = true;
}

if ($correoOk && $correo2Ok && $recibirOk) {
    print "  <p>Su dirección de correo es <strong>$correo</strong>.</p>\n";
    print "\n";
    if ($recibir == "0") {
        print "  <p><strong>No</strong> recibirá correos nuestros.</p>\n";
        print "\n";
    } else {
        print "  <p><strong>Sí</strong> recibirá correos nuestros.</p>\n";
        print "\n";
    }
}
?>