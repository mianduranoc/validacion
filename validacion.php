<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['nombre'])&&isset($_POST['apellidop'])&&isset($_POST['apellidom'])) {
        $nombre = $_POST['nombre'];
        $apellidop=$_POST['apellidop'];
        $apellidom=$_POST['apellidom'];
        if (strlen($nombre) > 0 && strlen($apellidop)>0 && strlen($apellidom)>0) {
            $nombre = revalidar($_POST['nombre']);
            $apellidop=revalidar($apellidop);
            $apellidom=revalidar($apellidom);
            echo "<h1>Formulario Correcto</h1>";
            echo "<h2>Nombre= $nombre</h2>";
            echo "<h2>Apellido Paterno=$apellidop</h2>";
            echo "<h2>Apellido Materno=$apellidom</h2>";
            header("Refresh:5;URL=formulario.php");
            return;
        }
        formularioIncorrecto();
        return;
    }
    formularioIncorrecto();
    return;
}
formularioIncorrecto();
function formularioIncorrecto(){
    echo "Formulario Incorrecto, redireccionando...";
    header("Refresh:5;URL=formulario.php");
    return;
}
function revalidar($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}