<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>12. Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
de conocimientos en las diferentes asignaturas del curso.<br>
    <form action="test.php" method="get">
    <br>1. ¿Qué web usamos para tener actualizados nuestros trabajos en programación?<br>
      <input type="radio" name="p1" value="1"> GitHub<br>
      <input type="radio" name="p1" value="0"> Stackoverflow<br>
      <input type="radio" name="p1" value="0"> DropBox<br>
    <br>2. ¿Cómo se hace Hola mundo en php?<br>
      <input type="radio" name="p2" value="0"> <?php highlight_string('<?php print "hola mundo" ?>') ?><br>
      <input type="radio" name="p2" value="1"> <?php highlight_string('<?php echo "hola mundo" ?>') ?><br>
      <input type="radio" name="p2" value="0"> <?php highlight_string('<?==  "hola mundo" ?>') ?><br>
    <br>3. ¿Cual es la ultima versión estable de NetBeans?<br>
      <input type="radio" name="p3" value="0"> 8.1<br>
      <input type="radio" name="p3" value="1"> 8.0.2<br>
      <input type="radio" name="p3" value="0"> 8.0.3<br>
    <br>4. ¿Cual es la contraseña de ITGUEST? <br>
      <input type="radio" name="p4" value="1"> invitado2015<br>
      <input type="radio" name="p4" value="0"> invitado2014<br>
      <input type="radio" name="p4" value="0"> itguest2015<br>
    <br>5. ¿Como se llama tu profesor de programación?<br>
      <input type="radio" name="p5" value="0"> John<br>
      <input type="radio" name="p5" value="0"> Michael<br>
      <input type="radio" name="p5" value="1"> Luis<br>
    <br>6. ¿Cuantos Luises hay en la clase?<br>
      <input type="radio" name="p6" value="1"> = 2<br>
      <input type="radio" name="p6" value="0"> < 2<br>
      <input type="radio" name="p6" value="0"> > 2<br>
    <br>7. ¿Que significaban las siglas PHP en su inicio?<br>
      <input type="radio" name="p7" value="0"> Programming Hypertext Page<br>
      <input type="radio" name="p7" value="0"> Hypertext Preprocessor<br>
      <input type="radio" name="p7" value="1"> Personal Home Page<br>
    <br>8. ¿Cuantos lenguajes de programación existen aproximadamente?<br>
      <input type="radio" name="p8" value="0"> 80<br>
      <input type="radio" name="p8" value="1"> 600<br>
      <input type="radio" name="p8" value="0"> 10.000<br>
    <br>9. ¿Quien es Rasmus Lerdorf?<br>
      <input type="radio" name="p9" value="1"> Creador del lenguaje PHP<br>
      <input type="radio" name="p9" value="0"> Creador del lenguaje JAVA<br>
      <input type="radio" name="p9" value="0"> Creador del portal Github<br>
    <br>10. ¿Cuantas preguntas has respondido en este test?<br>
      <input type="radio" name="p10" value="1"> 9<br>
      <input type="radio" name="p10" value="0"> 10<br>
      <input type="submit" value="RESULTADO">
    </form>
  </body>
</html>
