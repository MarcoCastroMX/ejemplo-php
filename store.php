<?php

include("conexcion.php");

$tarea = $_POST["tarea"];
$descripcion = $_POST["descripcion"];
$prioridad = empty($_POST["prioridad"])? 0 : 1;
$urgente = $_POST["urgente"];
$tipo = $_POST["tipo"];

$sql = "INSERT INTO tareas(tarea, descripcion, prioridad, urgente, tipo)
VALUES ('$tarea','$descripcion','$prioridad','$urgente','$tipo')";

$conn->exec($sql);

header("Location: index.php");