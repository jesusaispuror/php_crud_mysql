<?php
include("db.php");


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tareas WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $titulo=$row["Titulo"];
        $descripcion = $row["descripcion"];
        
    }
   
}

if(isset($_POST['update'])){
    $id = $_GET ['id'];
    $title = $_POST['Titulo'];
    $description = $_POST['descripcion'];

   $query = "UPDATE tareas set Titulo = '$title', descripcion = '$description' WHERE id = $id";
   mysqli_query($conn, $query);

   $_SESSION['message'] = 'Tarea Actualizada con Exito';
   $_SESSION['message_type'] = 'info';
   header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="col.md-4 mx-auto">
        <div class="card card-bady">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <input type="text" name ="Titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza titulo"> 
                </div>
                <div class="form-group">
                    <textarea name="descripcion" rows="2" class="form-control" placeholder="Update descripcion" ><?php echo $descripcion;  ?> </textarea>
                </div>

            <button class="btn btn-success"  name="update"  >
                update
            </button>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>