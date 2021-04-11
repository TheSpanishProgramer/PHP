<?php
include("Views/partitions/head.php");
include("Views/references.php");
echo "Hola examen!";


?>
<h1>LOGIN</h1>
<p>Introduce un usuario y contraseña válidos (e.g.: jvadillo / 1234)</p>
<form action = "Views/logged.php" method="get">
    <label>User</label>
    <input type="text" name="user" placeholder="user">
    <br>
    <label>Password</label>
    <input type="text" name="password" placeholder="password">
    <br>
    <input type="submit" value="Log in">
</form>
<?php
include("Views/partitions/footer.php");
?>

