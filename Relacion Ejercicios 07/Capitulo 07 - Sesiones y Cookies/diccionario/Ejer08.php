<?php
  if (count($_COOKIE) > 0) {
    $diccionario = $_COOKIE;
    
  } else {
    $diccionario = ["silla" => "Chair", 
                          "rojo" => "Red",
                          "mesa" => "Table",
                          "telefono" => "Phone",
                          "pantalla" => "Screen",
                          "numero" => "Number",
                          "rueda" => "Wheel",
                          "hombre" => "Man",
                          "dibujar" => "Draw",
                          "correr" => "Run",
                          "raton" => "Mouse",
                          "perro" => "Dog",
                          "gato" => "Cat",
                          "comida" => "Foot",
                          "mano" => "Hand",
                          "color" => "Color",
                          "blanco" => "White",
                          "negro" => "Black",
                          "crepusculo" => "Twilight",
                          "fuego" => "Fire" ];

    // Las cookies no pueden contener un array como las sesiones.
    // Para trabajar con arrays en las cookies tenemos que crear una coockie por cada
    // entrada del diccionario.
    foreach ($diccionario as $key => $value) {
      // Para aislar las cookies para este ejercicio, declaramos otra ruta para almacenarlas,
      // asi solo tendriamos que llamar a $_COOKIE para llamar a todas las palabras del diccionario.
      setcookie($key, $value, time() + 7*24*60*60, "/diccionario");

    }
  }
  
  if (isset($_GET['nuevaClave'])) {
    setcookie($_GET['nuevaClave'], $_GET['nuevoValor'], time() + 7*24*60*60);
    $diccionario[$_GET['nuevaClave']] = $_GET['nuevoValor'];
  }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Capitulo 07 - Sesiones y Cookies</title>
    <style>
      body {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        background-color: #403075;

      }

      div {
        position: relative;
        background-color: #C7B6FF;
        border-radius: 15px;
        text-align: center;
        margin: auto;
        margin-top: 50px;
        padding: 10px;
        width: 90%;

      }
    </style>
  </head>
  <body>
    <div>
      <h2>Diccionarios: </h2>
      <p>
        Realiza un programa que escoja al azar 5 palabras en ingl??s de un mini-diccionario. El 
        programa pedir?? que el usuario teclee la traducci??n al espa??ol de cada una de las palabras 
        y comprobar?? si son correctas. Al final, el programa deber?? mostrar cu??ntas respuestas 
        son v??lidas y cu??ntas err??neas. La aplicaci??n debe tener una opci??n para introducir los 
        pares de palabras (ingl??s - espa??ol) que se deben guardar en cookies; de esta forma, si 
        de vez en cuando se dan de alta nuevas palabras, la aplicaci??n puede llegar a contar con 
        un n??mero considerable de entradas en el mini-diccionario.
      </p>
      
      <?php
      
      
      // -- A??adir conjuntos al diccionario --
      echo '<form action="Ejer08.php">'
        . '<input type="text" name="nuevaClave" placeholder="Nueva clave..." required="required">'
        . '<input type="text" name="nuevoValor" placeholder="Nuevo valor..." required="required">'
        . '<input type="submit" value="Guardar">'
        . '</form>';
      
      
      
      
      // -- Comienzo del programa que dirige el test y las correcciones --
      
      // Se utiliza para pedir de forma aleatoria los valores de estas claves
      foreach ($diccionario as $espanol => $ingles) {
        $palabrasEspanol[] = $espanol;
      }
      
      // Recogida de datos
      if (isset($_GET['contador'])) {
        $contador = $_GET['contador'];
        $palabraIntroducida = $_GET['palabraIntroducida'];
        $cadenaRespuestas = $_GET['respuestas'] . " " . $palabraIntroducida;
        $cadenaPreguntas = $_GET['preguntas'];
        
      } else {
        $contador = 0;
        
      }
      
      
      if ($contador == 5) {
        $cadenaRespuestas = substr($cadenaRespuestas, 1);
        $arrayRespuestas = explode(" ", $cadenaRespuestas);
        
        $cadenaPreguntas = substr($cadenaPreguntas, 1);
        $arrayPreguntas = explode(" ", $cadenaPreguntas);
        
        echo "Preguntas | Respuestas<br>";
        for ($i = 0; $i < count($arrayPreguntas); $i++) {
          echo "<br>$arrayPreguntas[$i] | $arrayRespuestas[$i]: ";
          if (array_search($arrayPreguntas[$i], $diccionario) == $arrayRespuestas[$i]) {
            echo "Correcto";
          } else {
            echo "Error";
          }
        }
        
      } else {
        
        $contador++;
        
        $pregunta = $diccionario[$palabrasEspanol[rand(0, count($palabrasEspanol) - 1)]];
        $cadenaPreguntas = $cadenaPreguntas . " " . $pregunta;
        
        echo $contador . "?? Palabra: $pregunta";
        
        
        echo '<form action="Ejer08.php">'
        . '<input type="text" name="palabraIntroducida" autofocus="autofocus" required="required">'
        . '<input type="hidden" name="contador" value="', $contador, '">'
        . '<input type="hidden" name="respuestas" value="', $cadenaRespuestas, '">'
        . '<input type="hidden" name="preguntas" value="', $cadenaPreguntas, '">'
        . '<input type="submit" value="Introducir">'
        . '</form>';
      }
      
      ?>
    </div>
  </body>
</html>