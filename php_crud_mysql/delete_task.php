<?php

    include("db.php");

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $query="DELETE FROM tareas WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("failed");
        }

        $_SESSION['message']= 'Tarea Eliminada Con Exito';
        $_SESSION['message_type']='danger';
        header("Location: index.php"); 
    
    }
?>