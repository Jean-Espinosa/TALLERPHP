<?php

$message='';

if (!empty($_POST)) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $second = $_POST['second'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $position = $_POST['position'];

    $sql= "SET @p0='$id'; SET @p1='$name'; SET @p2='$second'; SET @p3='$email'; SET @p4='$pass'; SET @p5='$position'; 
					CALL `updateUser`(@p0, @p1, @p2, @p3, @p4, @p5);";
    
    $query = $user->updateData($id,$name,$second,$email,$pass,$position);

    if ($query) {
        $message='<div class="alert alert-success">Actualizado correctamente</div>';
    }else{
        $message = '<div class="alert alert-dark">Algó quedó mal</div>';
    }
}

?>