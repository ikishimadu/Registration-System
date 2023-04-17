<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletando Registros</title>
</head>
</html>
<?php

include 'model.php';
$model = new Model();
echo $id = $_REQUEST['id'];
$delete = $model->delete($id);

   if ($delete) {
       echo "<script>alert('Registro excluído com sucesso!')</script>";
       echo "<script>window.location.href='list.php'</script>";
   } 

?>