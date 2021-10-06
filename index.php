<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PHP</title>
</head>
<body>
    <h1>Ejemplo PHP</h1>
    <form action="store.php" method="POST">
        <label for="tarea">Nombre de Tarea</label><br>
        <input type="text" name="tarea">
        <br>

        <label for="descripcion">Descripción</label><br>
        <textarea name="descripcion" cols="30" rows="3"></textarea>
        <br>

        <label for="prioridad">Prioridad</label><br>
        <select name="prioridad">
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select>
        <br>

        <input type="checkbox" name="urgente" value="1">
        <label for="urgente">Urgente</label>
        <br>

        <input type="radio" name="tipo" value="escuela">
        <label for="tipo">Escuela</label>
        <br>

        <input type="radio" name="tipo" value="trabajo">
        <label for="tipo">Trabajo</label>
        <br>
        <input type="submit" value="Enviar">
    </form>
   <?php
        /*
        $arr1 = array("elemento 1","elemento 2");
        $arr2 = ["nombre"=>"Marco","apellido"=>"Castro"];
        foreach($arr1 as $elemento){
            echo $elemento."<br>";
        }
        echo $arr2["nombre"]."<br>"
    ?>
    <hr>
    
    <ul>
    <?php
        foreach($arr2 as $elemento => $val){
            echo "<li>$elemento: $val</li><br>";
        }
        $nombre = $_POST["tarea"];
        echo $nombre."<br>";
        foreach($_POST as $key => $val){
            echo "<li>$key: $val</li>";
        }*/
        
        include("conexcion.php");

        $sql = "SELECT * FROM tareas";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        echo "<table border='1'>";
        echo "<tr> <th>ID</th><th>Tarea</th><th>Descripcion</th></tr>";

        foreach ($stmt->fetchAll() as $tarea){
            echo "<tr> 
                <td>" . $tarea['id'] . "</td>
                <td>" . $tarea['tarea'] . "</td>
                <td>" . $tarea['descripcion'] . "</td>
            </tr>";
        }

    ?>
    </ul>
</body>
</html>