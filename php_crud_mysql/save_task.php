<?php
include("db.php");


if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO tareas(Titulo, descripcion) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die(" Query failed");
    }
    $_SESSION['message'] = 'Tarea Guardada con Exito';
    $_SESSION['message_type'] = 'success';
    header("location: index.php");
}
?>