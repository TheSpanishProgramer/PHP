<?php //Ejemplo aprenderaprogramar.com

echo "nombre = " . $_REQUEST['nombre'];

?>

Como podemos observar, el valor que toma $_REQUEST es primero el valor enviado por POST y después el enviado por GET (si no viniera en POST).
Luego, como hemos observado, $_REQUEST da prioridad a los valores enviados por POST antes que a los enviados por GET.

Recuerda también que una URL es modificable por el usuario fácilmente.
Por ejemplo si un formulario envía datos así: www.jpstudioweb.com/action.php?nombre=pedro, el usuario podría modificar la URL escribiendo directamente en su
navegador www.jpwsutioweb.com/action.php?nombre=barack.
Esto puede tener cierta importancia, sobre todo en el caso de transmisión de datos relativos a precios,
ya que si el precio se transmite por get será más fácilmente manipulable por el usuario (algo indeseable).
Get tiene la ventaja de que los datos son visibles y más fáciles de seguir y localizar, y el inconveniente de que puede ser manipulado más fácilmente.
